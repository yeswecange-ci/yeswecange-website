@extends('layouts.site')

@section('title', $page['meta_title'])
@section('meta_description', $page['meta_description'])

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'YesWeCange',
    'description' => $page['meta_description'],
    'url' => url($page['url']),
    'areaServed' => 'Sénégal',
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

@section('content')

  {{-- BLOC 1 — HERO : Monument de la Renaissance Africaine en fond, texte centré superposé --}}
  <section class="relative overflow-hidden bg-ywc-ink">
    <div class="absolute inset-0">
      <img src="{{ asset('images/dakar-monument-renaissance.jpeg') }}" alt="Monument de la Renaissance Africaine à Dakar" width="1600" height="900" loading="eager" decoding="async" class="h-full w-full object-cover object-[center_38%]">
      <div class="absolute inset-0 bg-ywc-ink/70"></div>
      <div class="absolute inset-x-0 bottom-0 h-[130px] bg-gradient-to-t from-ywc-bg to-transparent"></div>
    </div>

    <div class="relative mx-auto max-w-3xl px-5 pt-28 pb-16 text-center sm:px-[30px] sm:pt-[120px] sm:pb-20">
      <nav aria-label="Fil d'Ariane" class="mb-[18px] flex justify-center">
        <ol class="flex flex-wrap items-center gap-2 text-[13px] font-semibold">
          <li><a href="{{ route('home') }}" class="text-white/70 no-underline transition hover:text-white">Accueil</a></li>
          <li aria-hidden="true" class="text-white/30">/</li>
          <li><span aria-current="page" class="text-ywc-blue-pale">Agence locale</span></li>
        </ol>
      </nav>

      <div data-breveal>
        <span class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-[13px] font-bold text-white backdrop-blur-sm">
          <x-icon name="map-pin" class="h-4 w-4" /> Piloté depuis notre bureau d'Abidjan
        </span>
        <h1 class="m-0 mb-[18px] font-display text-[clamp(32px,4vw,52px)] font-bold leading-[1.08] tracking-[-0.03em] text-white">{{ $page['h1'] }}</h1>
        <p class="m-0 mb-8 text-[17px] leading-[1.65] text-white/85">{{ $page['intro'] }}</p>
        <a href="{{ $page['cta']['href'] }}" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white no-underline shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">{{ $page['cta']['label'] }}</a>
      </div>

      <div data-breveal class="mx-auto mt-14 grid max-w-xl grid-cols-3 gap-4">
        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
          <div class="mb-2 text-ywc-blue-pale"><x-icon name="clipboard" class="h-6 w-6" /></div>
          <div class="text-[14px] font-bold text-white">Cadrage</div>
          <div class="text-[13px] text-white/70">1er échange</div>
        </div>
        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
          <div class="mb-2 text-ywc-blue-pale"><x-icon name="video" class="h-6 w-6" /></div>
          <div class="text-[14px] font-bold text-white">Suivi visio</div>
          <div class="text-[13px] text-white/70">Points réguliers</div>
        </div>
        <div class="rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
          <div class="mb-2 text-ywc-blue-pale"><x-icon name="rocket" class="h-6 w-6" /></div>
          <div class="text-[14px] font-bold text-white">Lancement</div>
          <div class="text-[13px] text-white/70">1 à 2 semaines</div>
        </div>
      </div>
    </div>
  </section>

  {{-- BLOC 2 — POURQUOI NOUS CHOISIR (cartes) --}}
  <section class="mx-auto max-w-3xl px-5 pt-16 sm:px-[30px]">
    <h2 class="m-0 mb-5 text-center font-display text-[21px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[24px]">Pourquoi choisir YesWeCange à Dakar</h2>
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-ywc-ink p-6 sm:p-8">
      <div class="absolute -top-20 -right-20 h-[280px] w-[280px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.35),transparent_65%)]"></div>
      <div class="absolute -bottom-24 -left-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.18),transparent_65%)]"></div>
      <div class="relative grid gap-x-6 gap-y-8 sm:grid-cols-2">
        @foreach ([
            ['video', 'Suivi visio régulier', "Des points de suivi réguliers en visioconférence depuis notre bureau d'Abidjan."],
            ['star', "Même niveau d'exigence qu'à Abidjan", 'Une stratégie digitale au même niveau que sur notre marché historique ivoirien.'],
            ['rocket', 'Démarrage rapide', 'Généralement 1 à 2 semaines après le premier échange de cadrage.'],
            ['wrench', 'Méthodes déjà éprouvées', "Les mêmes secteurs prioritaires et les mêmes outils qu'à Abidjan : télécom, distribution, institutionnels."],
        ] as [$icon, $title, $desc])
          <div>
            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-ywc-blue-pale">
              <x-icon :name="$icon" class="h-6 w-6" />
            </div>
            <div class="font-display text-[16px] font-bold text-white">{{ $title }}</div>
            <p class="m-0 mt-2 text-[15px] leading-[1.6] text-[#a8afc0]">{{ $desc }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- BLOC 3 — CONTENU PRINCIPAL --}}
  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px]">
    <div data-breveal class="space-y-10">
      @foreach ($page['content'] as $block)
        <div>
          <h2 class="m-0 mb-3 font-display text-[21px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[24px]">{{ $block['heading'] }}</h2>
          <p class="m-0 text-[15.5px] leading-[1.7] text-ywc-text">{{ $block['body'] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  {{-- BLOC 3 — PREUVE CLIENT --}}
  <section class="mx-auto max-w-3xl px-5 pb-14 sm:px-[30px]">
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
