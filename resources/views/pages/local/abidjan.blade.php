@extends('layouts.site')

@section('title', $page['meta_title'])
@section('meta_description', $page['meta_description'])

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
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
    'telephone' => '+225 58 46 79 51',
    'parentOrganization' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
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

@php
  $office = \App\Models\OfficeLocation::where('slug', 'abidjan')->first();
@endphp

@section('content')

  {{-- BLOC 1 — HERO : photo du pont Henri Konan Bédié en fond, texte + carte bureau superposés --}}
  <section class="relative overflow-hidden bg-ywc-ink">
    <div class="absolute inset-0">
      <img src="{{ asset('images/abidjan-pont-hkb.jpeg') }}" alt="Pont Henri Konan Bédié à Abidjan" width="1600" height="900" loading="eager" decoding="async" class="h-full w-full object-cover object-[center_58%]">
      <div class="absolute inset-0 bg-gradient-to-r from-ywc-ink/90 via-ywc-ink/60 to-ywc-ink/25"></div>
      <div class="absolute inset-x-0 bottom-0 h-[130px] bg-gradient-to-t from-ywc-bg to-transparent"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-5 pt-28 pb-20 sm:px-[30px] sm:pt-[120px] sm:pb-24">
      <nav aria-label="Fil d'Ariane" class="mb-[18px]">
        <ol class="flex flex-wrap items-center gap-2 text-[13px] font-semibold">
          <li><a href="{{ route('home') }}" class="text-white/70 no-underline transition hover:text-white">Accueil</a></li>
          <li aria-hidden="true" class="text-white/30">/</li>
          <li><span aria-current="page" class="text-ywc-blue-pale">Agence locale</span></li>
        </ol>
      </nav>

      <div class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:gap-14">
        <div data-breveal>
          <h1 class="m-0 mb-[18px] font-display text-[clamp(32px,4vw,52px)] font-bold leading-[1.08] tracking-[-0.03em] text-white">{{ $page['h1'] }}</h1>
          <p class="m-0 mb-8 max-w-[520px] text-[16.5px] leading-[1.65] text-white/85">{{ $page['intro'] }}</p>
          <a href="{{ $page['cta']['href'] }}" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white no-underline shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">{{ $page['cta']['label'] }}</a>
        </div>

        {{-- <div data-breveal class="relative overflow-hidden rounded-[28px] border border-white/10 bg-ywc-ink/60 p-8 text-white shadow-[0_30px_70px_-30px_rgba(0,0,0,0.6)] backdrop-blur-md sm:p-10">
          <div class="absolute -top-16 -right-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.32),transparent_65%)]"></div>
          <div class="relative">
            <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">Notre bureau</div>
            <h2 class="m-0 mb-4 font-display text-[24px] font-bold leading-[1.15] tracking-[-0.02em] text-white">{{ $office?->localized('title') ?? "Agence d'Abidjan" }}</h2>
            <p class="m-0 mb-6 text-[14.5px] leading-[1.65] text-[#c5cbd8]">{!! nl2br(e($office?->address ?? "Cocody, II Plateaux Vallons\nRue Des Jardins")) !!}<br>{{ $office?->phone ?? '+225 58 46 79 51' }}</p>
            <div class="flex flex-wrap gap-2">
              <span class="rounded-full bg-white/10 px-3 py-1.5 text-[12.5px] font-semibold text-white">Rendez-vous en présentiel</span>
              <span class="rounded-full bg-white/10 px-3 py-1.5 text-[12.5px] font-semibold text-white">Lun – Sam · 09h–18h</span>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

  {{-- BLOC 2 — CONTENU PRINCIPAL --}}
  <section class="mx-auto max-w-4xl px-5 py-16 sm:px-[30px]">
    <div data-breveal class="space-y-12">
      @foreach ($page['content'] as $block)
        <div>
          <h2 class="m-0 mb-4 font-display text-[22px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[26px]">{{ $block['heading'] }}</h2>

          @if (($block['type'] ?? 'text') === 'table')
            @php
              $reasonIcons = [
                  'Connaissance du marché' => 'compass',
                  'Rencontres' => 'users',
                  'Réseau' => 'link',
                  'Réactivité' => 'bolt',
              ];
            @endphp
            <div class="relative overflow-hidden rounded-[28px] bg-ywc-ink p-6 sm:p-8">
              <div class="absolute -top-20 -right-20 h-[280px] w-[280px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.35),transparent_65%)]"></div>
              <div class="absolute -bottom-24 -left-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.18),transparent_65%)]"></div>
              <div class="relative grid gap-x-6 gap-y-8 sm:grid-cols-2">
                @foreach ($block['rows'] as $row)
                  <div>
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-ywc-blue-pale">
                      <x-icon :name="$reasonIcons[$row[0]] ?? 'check'" class="h-6 w-6" />
                    </div>
                    <div class="font-display text-[16px] font-bold text-white">{{ $row[0] }}</div>
                    <p class="m-0 mt-2 text-[15px] leading-[1.6] text-[#a8afc0]">{{ $row[1] }}</p>
                  </div>
                @endforeach
              </div>
            </div>
          @elseif (($block['type'] ?? 'text') === 'list')
            @php
              $sectorIcons = ['Télécom' => 'signal', 'Distribution & e-commerce' => 'cart', 'Institutionnels' => 'bank', 'PME' => 'office'];
            @endphp
            <div class="grid gap-4 sm:grid-cols-2">
              @foreach ($block['items'] as $item)
                @php [$itemTitle, $itemDesc] = array_pad(explode(' — ', $item, 2), 2, null); @endphp
                <div class="group relative overflow-hidden rounded-2xl border border-ywc-border-soft bg-white p-5 transition duration-300 hover:-translate-y-1 hover:border-ywc-border-blue hover:shadow-[0_24px_50px_-28px_rgba(10,10,15,0.22)]">
                  <div class="absolute -top-10 -right-10 h-[110px] w-[110px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.12),transparent_70%)] transition duration-300 group-hover:scale-125"></div>
                  <div class="relative mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-ywc-blue to-ywc-blue-mid text-white shadow-[0_10px_20px_-8px_rgba(43,77,255,0.55)]">
                    <x-icon :name="$sectorIcons[$itemTitle] ?? 'check'" class="h-6 w-6" />
                  </div>
                  <div class="relative font-display text-[16px] font-bold text-ywc-ink">{{ $itemTitle }}</div>
                  @if ($itemDesc)
                    <p class="relative m-0 mt-2 text-[15px] leading-[1.55] text-ywc-text-soft">{{ $itemDesc }}</p>
                  @endif
                </div>
              @endforeach
            </div>
          @else
            <p class="m-0 text-[15.5px] leading-[1.7] text-ywc-text">{{ $block['body'] }}</p>
          @endif
        </div>
      @endforeach
    </div>
  </section>

  {{-- BLOC 3 — PREUVE CLIENT --}}
  <section class="mx-auto max-w-4xl px-5 pb-16 sm:px-[30px]">
    <div data-breveal>
      <x-client-proof :text="$page['client_proof']" :case-study-href="$page['client_proof_href']" />
    </div>
  </section>

  {{-- BLOC 4 — FAQ --}}
  @if (count($page['faq']))
    <section class="mx-auto max-w-4xl px-5 pb-16 sm:px-[30px] sm:pb-20">
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
  <section class="mx-auto max-w-4xl px-5 py-14 sm:px-[30px]">
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
