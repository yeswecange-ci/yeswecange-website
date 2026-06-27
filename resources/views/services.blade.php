@extends('layouts.site')

@section('title', 'Nos services — YesWeCange')
@section('meta_description', "De la stratégie à l'exécution, YesWeCange couvre les 360° de votre communication digitale : social media, data, chatbots, SEO, branding et formation.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => 'Nos services',
    'title' => 'Un partenaire unique pour <span class="text-ywc-blue">toute</span> votre stratégie digitale.',
    'lead' => "De la stratégie à l'exécution, on couvre les 360° de votre communication. Une équipe, un cap, des résultats mesurables — à Paris comme à Abidjan.",
    'stats' => [
      ['value' => '08', 'label' => "domaines d'expertise"],
      ['value' => '360°', 'label' => 'stratégie → exécution'],
      ['value' => '24/7', 'label' => 'chatbots & relation client'],
    ],
  ])

  <!-- SERVICES GRID (visuel) -->
  @php
    $services = [
      ['n' => '01', 't' => 'Stratégie & Conception', 'd' => "Positionnement, message, audiences et plan d'action. Chaque décision guidée par vos objectifs business.", 'tags' => ['Positionnement', 'Audit', 'Roadmap'], 'grad' => 'from-[#6366f1] to-[#a855f7]', 'icon' => '🎯'],
      ['n' => '02', 't' => 'Social Media & Communication 360°', 'd' => "Des contenus qui font réagir, déclinés sur tous les canaux. On anime vos communautés et orchestre vos campagnes.", 'tags' => ['Community management', 'Contenu', 'Campagnes'], 'img' => 'com-digital.webp'],
      ['n' => '03', 't' => 'Marketing Intelligence', 'd' => "On transforme la donnée en décisions. Veille, social listening et pilotage par la performance.", 'tags' => ['Social listening', 'KPIs', 'Reporting'], 'grad' => 'from-[#0ea5e9] to-ywc-blue', 'icon' => '📊'],
      ['n' => '04', 't' => 'Développement Web & Mobile', 'd' => "Sites, applications et plateformes sur-mesure, pensés pour la performance et l'expérience utilisateur.", 'tags' => ['Sites web', 'Applications', 'UX/UI'], 'img' => 'chatbot2.webp'],
      ['n' => '05', 't' => 'Chatbots & WhatsApp', 'd' => "Automatisez la conversation 24/7 sur WhatsApp, web, Messenger et SMS. Qualification de leads et support.", 'tags' => ['WhatsApp', 'Assistant web', 'Messenger'], 'img' => 'chainewhatsapp.webp', 'feature' => true],
      ['n' => '06', 't' => 'Référencement (SEO/SEA)', 'd' => "Soyez trouvé au bon moment par les bonnes personnes. Référencement naturel, campagnes payantes et optimisation.", 'tags' => ['SEO', 'Google Ads', 'Social Ads'], 'img' => 'publicité.webp'],
      ['n' => '07', 't' => 'Branding & Lean Marketing', 'd' => "Une marque qui crée l'émotion et marque les esprits. Identité, design et expérience cohérents partout.", 'tags' => ['Identité visuelle', 'Direction artistique', 'Print'], 'grad' => 'from-ywc-green to-[#0ea5e9]', 'icon' => '🎨'],
      ['n' => '08', 't' => 'Formation', 'd' => "On vous donne les clés du digital, en pratique. Ateliers sur-mesure pour rendre vos équipes autonomes.", 'tags' => ['Social media', 'Outils', 'Ateliers'], 'grad' => 'from-ywc-ink to-[#1b33d6]', 'icon' => '🎓'],
    ];
  @endphp

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($services as $s)
        <article class="group flex flex-col overflow-hidden rounded-[20px] border border-ywc-border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] {{ ($s['feature'] ?? false) ? 'sm:col-span-2 lg:col-span-1' : '' }}">
          <div class="relative aspect-[16/10] overflow-hidden">
            @isset($s['img'])
              <img src="{{ asset('images/' . $s['img']) }}" alt="{{ $s['t'] }}" width="600" height="375" loading="lazy" decoding="async" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
            @else
              <div class="flex h-full w-full items-center justify-center bg-gradient-to-br {{ $s['grad'] }}">
                <span class="text-[52px] drop-shadow">{{ $s['icon'] }}</span>
              </div>
            @endisset
            <span class="absolute left-3.5 top-3.5 rounded-full bg-white/90 px-2.5 py-1 font-display text-[11px] font-bold text-ywc-blue shadow-sm">{{ $s['n'] }}</span>
          </div>
          <div class="flex flex-1 flex-col p-6">
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
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">Notre méthode</div>
        <h2 class="m-0 max-w-[600px] font-display text-[clamp(28px,3.2vw,42px)] font-bold leading-[1.08] tracking-[-0.02em] text-white">Quatre étapes, zéro improvisation.</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">01</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">Écoute & diagnostic</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">On comprend votre marché, vos objectifs et vos contraintes.</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">02</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">Stratégie sur-mesure</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">On définit le cap, les canaux et les indicateurs de succès.</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">03</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">Production & déploiement</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">Contenus, campagnes et bots livrés avec exigence.</p>
        </div>
        <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
          <div class="font-display text-2xl font-bold text-ywc-blue-pale">04</div>
          <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">Mesure & optimisation</h3>
          <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">On analyse, on ajuste, on amplifie ce qui marche.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- A LA UNE · CHATBOTS -->
  <section class="mx-auto max-w-7xl px-5 py-20 sm:px-[30px]">
    <div data-breveal class="overflow-hidden rounded-[24px] bg-ywc-bg-soft p-8 sm:p-10">
      <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">À la une · Chatbots</div>
          <h2 class="m-0 mb-3 font-display text-[26px] font-bold leading-[1.1] tracking-[-0.02em]">La conversation, automatisée sur 6 canaux.</h2>
          <p class="m-0 mb-7 max-w-[440px] text-[14.5px] leading-[1.6] text-ywc-text-soft">WhatsApp, web, Messenger, SMS… On déploie des assistants qui qualifient vos leads, répondent 24/7 et nourrissent votre data — sans jamais dormir.</p>
          <a href="{{ route('home') }}#chatbots" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">Découvrir la plateforme →</a>
        </div>
        <div class="overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chatbot2.webp') }}" alt="Plateforme chatbot YesWeCange" width="600" height="450" loading="lazy" decoding="async" class="h-full w-full object-cover">
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => 'Un projet en tête ? Démarquons-le ensemble.',
    'lead' => 'Devis gratuit, réponse sous 24h. Dites-nous où vous voulez aller, on trace le chemin.',
    'cta' => 'Demander un devis →',
    'href' => route('quote'),
  ])

@endsection
