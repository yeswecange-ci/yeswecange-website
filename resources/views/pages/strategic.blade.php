@extends('layouts.site')

@section('title', $page['meta_title'])
@section('meta_description', $page['meta_description'])

@push('head')
@php
  $schemaEntity = match ($page['schema_type']) {
      'LocalBusiness' => [
          '@context' => 'https://schema.org',
          '@type' => 'LocalBusiness',
          'name' => 'YesWeCange — '.$page['h1'],
          'description' => $page['meta_description'],
          'url' => url($page['url']),
          'address' => [
              '@type' => 'PostalAddress',
              'streetAddress' => 'Cocody, II Plateaux Vallons, Rue Des Jardins',
              'addressLocality' => 'Abidjan',
              'addressCountry' => 'CI',
          ],
          'parentOrganization' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
      ],
      'Organization' => [
          '@context' => 'https://schema.org',
          '@type' => 'Organization',
          'name' => 'YesWeCange',
          'description' => $page['meta_description'],
          'url' => url($page['url']),
          'areaServed' => $page['h1'],
      ],
      default => [
          '@context' => 'https://schema.org',
          '@type' => 'Service',
          'name' => $page['h1'],
          'serviceType' => $page['keyword'],
          'description' => $page['meta_description'],
          'url' => url($page['url']),
          'provider' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
          'areaServed' => ['CI', 'SN', 'CD', 'FR'],
      ],
  };
@endphp
<script type="application/ld+json">
{!! json_encode($schemaEntity, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

@if (count($page['faq']))
<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => collect($page['faq'])->map(fn ($item) => [
        '@type' => 'Question',
        'name' => $item['q'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
    ])->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endif
@endpush

@section('content')

  {{-- BLOC 1 — HERO --}}
  @include('partials.page-header', [
    'eyebrow' => $page['eyebrow'],
    'title' => $page['h1'],
    'lead' => $page['intro'],
    'cta' => $page['cta'],
    'chart' => $page['hero_chart'] ?? false,
  ])

  {{-- BLOC 2 — CONTENU PRINCIPAL --}}
  <section class="mx-auto max-w-3xl px-5 py-14 sm:px-[30px] sm:py-16">
    <div data-breveal class="space-y-10">
      @foreach ($page['content'] as $block)
        @php $blockType = $block['type'] ?? 'text'; @endphp
        <div>
          <h2 class="m-0 mb-3 font-display text-[22px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[26px]">{{ $block['heading'] }}</h2>

          @if ($blockType === 'text')
            <p class="m-0 text-[15.5px] leading-[1.7] text-ywc-text">{{ $block['body'] }}</p>

          @elseif ($blockType === 'list')
            @if (!empty($block['intro']))
              <p class="m-0 mb-3 text-[15.5px] leading-[1.7] text-ywc-text">{{ $block['intro'] }}</p>
            @endif
            <ol class="m-0 space-y-2.5">
              @foreach ($block['items'] as $i => $item)
                <li class="flex list-none items-start gap-3 rounded-xl border border-ywc-border-soft bg-white px-4 py-3">
                  <span class="flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-bg-soft font-display text-[11.5px] font-bold text-ywc-blue">{{ $i + 1 }}</span>
                  <span class="pt-px text-[15px] leading-[1.55] text-ywc-text">{{ $item }}</span>
                </li>
              @endforeach
            </ol>

          @elseif ($blockType === 'table')
            @if (!empty($block['intro']))
              <p class="m-0 mb-3 text-[15.5px] leading-[1.7] text-ywc-text">{{ $block['intro'] }}</p>
            @endif
            <div class="grid gap-4 sm:grid-cols-2">
              @php $isOddTotal = count($block['rows']) % 2 !== 0; @endphp
              @foreach ($block['rows'] as $row)
                @php $isLastWide = $isOddTotal && $loop->last; @endphp
                <div class="group relative overflow-hidden rounded-2xl border border-ywc-border-soft bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-ywc-border-blue hover:shadow-[0_24px_50px_-28px_rgba(10,10,15,0.22)] {{ $isLastWide ? 'sm:col-span-2' : '' }}">
                  <div class="absolute -top-10 -right-10 h-[110px] w-[110px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.12),transparent_70%)] transition duration-300 group-hover:scale-125"></div>
                  <div class="relative {{ $isLastWide ? 'flex flex-wrap items-center gap-x-6 gap-y-3' : '' }}">
                    <div class="{{ $isLastWide ? 'flex flex-none items-center gap-3' : 'mb-3' }}">
                      <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-gradient-to-br from-ywc-blue to-ywc-blue-mid text-white shadow-[0_10px_20px_-8px_rgba(43,77,255,0.55)]">
                        <x-icon name="check" class="h-5 w-5" />
                      </div>
                      <div class="font-display text-[15.5px] font-bold text-ywc-ink">{{ $row[0] }}</div>
                    </div>
                    <div class="{{ $isLastWide ? 'flex flex-1 flex-wrap gap-3' : 'mt-3 space-y-2' }}">
                      @foreach (array_slice($row, 1) as $j => $cell)
                        <div class="rounded-lg bg-ywc-bg-soft px-3 py-2 {{ $isLastWide ? 'flex-1 min-w-[160px]' : '' }}">
                          <div class="text-[10.5px] font-bold uppercase tracking-[0.05em] text-ywc-text-muted">{{ $block['columns'][$j + 1] }}</div>
                          <div class="mt-0.5 text-[13.5px] leading-[1.45] text-ywc-text-soft">{{ $cell }}</div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </div>
  </section>

  {{-- BLOC 3 — PREUVE CLIENT --}}
  <section class="mx-auto max-w-3xl px-5 pb-14 sm:px-[30px] sm:pb-16">
    <div data-breveal>
      <x-client-proof :text="$page['client_proof']" :case-study-href="$page['client_proof_href']" />
    </div>
  </section>

  {{-- BLOC 4 — FAQ --}}
  @if (count($page['faq']))
    <section class="mx-auto max-w-3xl px-5 pb-16 sm:px-[30px] sm:pb-20">
      <h2 class="m-0 mb-6 font-display text-[24px] font-bold leading-[1.1] tracking-[-0.02em] text-ywc-ink sm:text-[28px]">Questions fréquentes</h2>
      <div data-breveal>
        <x-faq-accordion :items="$page['faq']" />
      </div>
    </section>
  @endif

  {{-- BLOC 5 — CTA FINAL --}}
  @include('partials.cta-banner', [
    'title' => $page['h1'],
    'lead' => $page['intro'],
    'cta' => $page['cta']['label'],
    'href' => $page['cta']['href'],
  ])

  {{-- BLOC 6 — MAILLAGE INTERNE --}}
  <section class="mx-auto max-w-3xl px-5 py-14 sm:px-[30px]">
    <div data-breveal class="border-t border-ywc-border-soft pt-8">
      <div class="mb-3.5 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-text-muted">À explorer aussi</div>
      <div class="flex flex-wrap gap-2.5">
        <a href="{{ route('home') }}" class="rounded-full border border-ywc-border-soft bg-white px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue">Accueil</a>
        <a href="{{ route('services') }}" class="rounded-full border border-ywc-border-soft bg-white px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue">Nos services</a>
        @foreach ($page['internal_links'] as $link)
          <a href="{{ $link['href'] }}" class="rounded-full border border-ywc-border-soft bg-white px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue">{{ $link['label'] }}</a>
        @endforeach
      </div>
    </div>
  </section>

@endsection
