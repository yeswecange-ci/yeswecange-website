@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'Our services' : 'Nos services') . ' — YesWeCange')
@section('meta_description', $en
    ? "From strategy to execution, YesWeCange covers all 360° of your digital communication: social media, data, chatbots, SEO, branding and training."
    : "De la stratégie à l'exécution, YesWeCange couvre les 360° de votre communication digitale : social media, data, chatbots, SEO, branding et formation.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $en ? 'Our services' : 'Nos services',
    'title' => $en
        ? 'A single partner for <span class="text-ywc-blue">your entire</span> digital strategy.'
        : 'Un partenaire unique pour <span class="text-ywc-blue">toute</span> votre stratégie digitale.',
    'lead' => $en
        ? "From strategy to execution, we cover all 360° of your communication. One team, one direction, measurable results — in Paris as in Abidjan."
        : "De la stratégie à l'exécution, on couvre les 360° de votre communication. Une équipe, un cap, des résultats mesurables — à Paris comme à Abidjan.",
    'stats' => $en ? [
      ['value' => '08', 'label' => 'areas of expertise'],
      ['value' => '360°', 'label' => 'strategy → execution'],
      ['value' => '24/7', 'label' => 'chatbots & customer care'],
    ] : [
      ['value' => '08', 'label' => "domaines d'expertise"],
      ['value' => '360°', 'label' => 'stratégie → exécution'],
      ['value' => '24/7', 'label' => 'chatbots & relation client'],
    ],
  ])

  <!-- SERVICES GRID (visuel) -->
  @php
    $services = $en ? [
      ['n' => '01', 't' => 'Strategy & Design', 'd' => "Positioning, message, audiences and action plan. Every decision guided by your business goals.", 'tags' => ['Positioning', 'Audit', 'Roadmap'], 'icon' => '🎯'],
      ['n' => '02', 't' => 'Social Media & 360° Communication', 'd' => "Content that sparks reactions, adapted to every channel. We run your communities and orchestrate your campaigns.", 'tags' => ['Community management', 'Content', 'Campaigns']],
      ['n' => '03', 't' => 'Marketing Intelligence', 'd' => "We turn data into decisions. Monitoring, social listening and performance-driven management.", 'tags' => ['Social listening', 'KPIs', 'Reporting'], 'icon' => '📊'],
      ['n' => '04', 't' => 'Web & Mobile Development', 'd' => "Custom sites, apps and platforms designed for performance and user experience.", 'tags' => ['Websites', 'Applications', 'UX/UI']],
      ['n' => '05', 't' => 'Chatbots & WhatsApp', 'd' => "Automate conversation 24/7 on WhatsApp, web, Messenger and SMS. Lead qualification and support.", 'tags' => ['WhatsApp', 'Web assistant', 'Messenger'], 'feature' => true],
      ['n' => '06', 't' => 'Search (SEO/SEA)', 'd' => "Be found at the right time by the right people. Organic search, paid campaigns and optimisation.", 'tags' => ['SEO', 'Google Ads', 'Social Ads'], ],
      ['n' => '07', 't' => 'Branding & Lean Marketing', 'd' => "A brand that creates emotion and leaves a mark. Consistent identity, design and experience everywhere.", 'tags' => ['Visual identity', 'Art direction', 'Print'], 'icon' => '🎨'],
      ['n' => '08', 't' => 'Training', 'd' => "We hand you the keys to digital, in practice. Tailored workshops to make your teams self-sufficient.", 'tags' => ['Social media', 'Tools', 'Workshops'], 'icon' => '🎓'],
    ] : [
      ['n' => '01', 't' => 'Stratégie omnicale', 'd' => "Positionnement, message, audiences et plan d'action. Chaque décision guidée par vos objectifs business.", 'tags' => ['Positionnement', 'Audit', 'Roadmap'], 'icon' => '🎯'],
      ['n' => '02', 't' => 'Production des kits global', 'd' => "Des contenus qui font réagir, déclinés sur tous les canaux. On anime vos communautés et orchestre vos campagnes.", 'tags' => ['Community management', 'Contenu', 'Campagnes']],
      ['n' => '03', 't' => 'Publicité Mobile', 'd' => "On transforme la donnée en décisions. Veille, social listening et pilotage par la performance.", 'tags' => ['Social listening', 'KPIs', 'Reporting'], 'icon' => '📊'],
      ['n' => '04', 't' => 'Referencement SEO & IA search', 'd' => "Sites, applications et plateformes sur-mesure, pensés pour la performance et l'expérience utilisateur.", 'tags' => ['Sites web', 'Applications', 'UX/UI']],
      ['n' => '05', 't' => 'Digitalisation IA / process', 'd' => "Automatisez la conversation 24/7 sur WhatsApp, web, Messenger et SMS. Qualification de leads et support.", 'tags' => ['WhatsApp', 'Assistant web', 'Messenger'], 'feature' => true],
      ['n' => '06', 't' => 'Developpement IT', 'd' => "Soyez trouvé au bon moment par les bonnes personnes. Référencement naturel, campagnes payantes et optimisation.", 'tags' => ['SEO', 'Google Ads', 'Social Ads'],],
      ['n' => '07', 't' => 'DATA analytics ', 'd' => "Une marque qui crée l'émotion et marque les esprits. Identité, design et expérience cohérents partout.", 'tags' => ['Identité visuelle', 'Direction artistique', 'Print'], 'icon' => '🎨'],
      ['n' => '08', 't' => 'Chatbot Whatsapp', 'd' => "On vous donne les clés du digital, en pratique. Ateliers sur-mesure pour rendre vos équipes autonomes.", 'tags' => ['Social media', 'Outils', 'Ateliers'], 'icon' => '🎓' ],
    ];
  @endphp

  @push('head')
  <script type="application/ld+json">
  {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => $en ? 'YesWeCange services' : 'Services YesWeCange',
      'itemListElement' => collect($services)->values()->map(fn ($s, $i) => [
          '@type' => 'ListItem',
          'position' => $i + 1,
          'item' => [
              '@type' => 'Service',
              'name' => $s['t'],
              'description' => $s['d'],
              'provider' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
              'areaServed' => ['FR', 'CI'],
          ],
      ])->all(),
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
  </script>
  @endpush

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($services as $s)
        <article class="group flex flex-col overflow-hidden rounded-[20px] border border-ywc-border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] {{ ($s['feature'] ?? false) ? 'sm:col-span-2 lg:col-span-1' : '' }}">
          @isset($s['img'])
            <div class="relative aspect-[16/10] overflow-hidden">
              <img src="{{ asset('images/' . $s['img']) }}" alt="{{ $s['t'] }}" width="600" height="375" loading="lazy" decoding="async" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
              <span class="absolute left-3.5 top-3.5 rounded-full bg-white/90 px-2.5 py-1 font-display text-[11px] font-bold text-ywc-blue shadow-sm">{{ $s['n'] }}</span>
            </div>
          @endisset
          <div class="flex flex-1 flex-col p-6">
            @unless(isset($s['img']))
              <span class="mb-3 font-display text-[11px] font-bold text-ywc-blue">{{ $s['n'] }}</span>
            @endunless
            <h3 class="m-0 mb-2 font-display text-[17px] font-bold leading-[1.2] tracking-[-0.01em]">{{ $s['t'] }}</h3>
            <p class="m-0 mb-4 flex-1 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $s['d'] }}</p>
            <div class="flex flex-wrap gap-1.5">
              @foreach ($s['tags'] as $tag)
                <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-[11.5px] font-semibold text-ywc-text-soft">{{ $tag }}</span>
              @endforeach
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </section>

  <!-- NOTRE METHODE -->
  <section class="bg-ywc-ink py-24 text-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-[30px]">
      <div data-breveal class="mb-[42px]">
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $en ? 'Our method' : 'Notre méthode' }}</div>
        <h2 class="m-0 max-w-[600px] font-display text-[clamp(28px,3.2vw,42px)] font-bold leading-[1.08] tracking-[-0.02em] text-white">{{ $en ? 'Four steps, zero improvisation.' : 'Quatre étapes, zéro improvisation.' }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">01</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $en ? 'Listen & diagnose' : 'Écoute & diagnostic' }}</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $en ? 'We understand your market, goals and constraints.' : 'On comprend votre marché, vos objectifs et vos contraintes.' }}</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">02</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $en ? 'Tailored strategy' : 'Stratégie sur-mesure' }}</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $en ? 'We set the direction, channels and success metrics.' : 'On définit le cap, les canaux et les indicateurs de succès.' }}</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">03</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $en ? 'Production & rollout' : 'Production & déploiement' }}</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $en ? 'Content, campaigns and bots delivered with rigour.' : 'Contenus, campagnes et bots livrés avec exigence.' }}</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">04</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $en ? 'Measure & optimise' : 'Mesure & optimisation' }}</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $en ? 'We analyse, adjust and amplify what works.' : 'On analyse, on ajuste, on amplifie ce qui marche.' }}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- A LA UNE · CHATBOTS -->
  <section class="mx-auto max-w-7xl px-5 py-20 sm:px-[30px]">
    <div data-breveal class="overflow-hidden rounded-[24px] bg-ywc-bg-soft p-8 sm:p-10">
      <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Featured · Chatbots' : 'À la une · Chatbots' }}</div>
          <h2 class="m-0 mb-3 font-display text-[26px] font-bold leading-[1.1] tracking-[-0.02em]">{{ $en ? 'Conversation, automated across 6 channels.' : 'La conversation, automatisée sur 6 canaux.' }}</h2>
          <p class="m-0 mb-7 max-w-[440px] text-[14.5px] leading-[1.6] text-ywc-text-soft">{{ $en
            ? 'WhatsApp, web, Messenger, SMS… We deploy assistants that qualify your leads, reply 24/7 and feed your data — and never sleep.'
            : "WhatsApp, web, Messenger, SMS… On déploie des assistants qui qualifient vos leads, répondent 24/7 et nourrissent votre data — sans jamais dormir." }}</p>
          <a href="{{ route('home') }}#chatbots" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ $en ? 'Discover the platform →' : 'Découvrir la plateforme →' }}</a>
        </div>
        <div class="overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chatbot2.webp') }}" alt="{{ $en ? 'YesWeCange chatbot platform' : 'Plateforme chatbot YesWeCange' }}" width="600" height="450" loading="lazy" decoding="async" class="h-full w-full object-cover">
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Got a project in mind? Let’s make it stand out together.' : 'Un projet en tête ? Démarquons-le ensemble.',
    'lead' => $en ? 'Free audit, reply within 24h. Tell us where you want to go, we’ll map the way.' : 'Audit gratuit, réponse sous 24h. Dites-nous où vous voulez aller, on trace le chemin.',
    'cta' => $en ? 'Request an audit →' : 'Demander un audit →',
    'href' => route('quote'),
  ])

@endsection
