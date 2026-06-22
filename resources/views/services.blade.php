@extends('layouts.site')

@section('title', 'Nos services — YesWeCange')

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

  <!-- SERVICES LIST -->
  <section class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="grid gap-3.5">

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">🎯</span>
          <span class="font-display text-xs text-ywc-text-pale">01</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Stratégie & Conception</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">On pose les fondations : positionnement, message, audiences et plan d'action. Chaque décision est guidée par vos objectifs business.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Positionnement</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Audit</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Roadmap</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Brand platform</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">📣</span>
          <span class="font-display text-xs text-ywc-text-pale">02</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Social Media & Communication 360°</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">Des contenus qui font réagir, déclinés sur tous les canaux. On anime vos communautés et on orchestre vos campagnes de bout en bout.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Community management</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Création de contenu</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Campagnes</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Influence</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">🧠</span>
          <span class="font-display text-xs text-ywc-text-pale">03</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Marketing Intelligence</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">Marketing 3.0 et social business : on transforme la donnée en décisions. Veille, social listening et pilotage par la performance.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Social listening</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">KPIs</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Reporting</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Insights</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">🛰️</span>
          <span class="font-display text-xs text-ywc-text-pale">04</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Data Mining & Technologie</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">On collecte, structure et active vos données pour construire des audiences ciblées et générer des leads qualifiés.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Bases d'audience</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Lead generation</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">CRM</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Automation</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] bg-gradient-to-br from-ywc-blue to-[#1b33d6] p-6 text-white shadow-[0_30px_60px_-24px_rgba(43,77,255,0.55)] lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">💬</span>
          <span class="font-display text-xs text-white/60">05</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em] text-white">Chatbots & WhatsApp</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-white/85">Automatisez la conversation 24/7 sur WhatsApp, web, Messenger et SMS. Qualification de leads, support et gamification.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[300px] lg:justify-end">
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold text-white">Chaîne WhatsApp</span>
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold text-white">Assistant web</span>
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold text-white">Messenger</span>
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold text-white">Call & SMS bot</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">🔍</span>
          <span class="font-display text-xs text-ywc-text-pale">06</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Référencement (SEO/SEA)</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">Soyez trouvé au bon moment par les bonnes personnes. Référencement naturel, campagnes payantes et optimisation continue.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">SEO</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Google Ads</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Social Ads</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Optimisation</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">✦</span>
          <span class="font-display text-xs text-ywc-text-pale">07</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Branding & Lean Marketing</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">Une marque qui crée l'émotion et marque les esprits. Identité, design et expérience cohérents sur tous les points de contact.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Identité visuelle</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Direction artistique</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">UX/UI</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Print & digital</span>
        </div>
      </div>

      <div class="grid items-center gap-5 rounded-[18px] border border-ywc-border bg-white p-6 lg:grid-cols-[auto_1fr_auto]">
        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-1.5">
          <span class="text-2xl">🎓</span>
          <span class="font-display text-xs text-ywc-text-pale">08</span>
        </div>
        <div>
          <h3 class="m-0 mb-1.5 font-display text-lg font-bold tracking-[-0.01em]">Formation</h3>
          <p class="m-0 max-w-[520px] text-[13.5px] leading-[1.5] text-ywc-text-soft">On vous donne les clés du digital, en pratique. Ateliers sur-mesure pour rendre vos équipes autonomes et performantes.</p>
        </div>
        <div class="flex flex-wrap gap-2 lg:max-w-[260px] lg:justify-end">
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Social media</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Outils</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Stratégie</span>
          <span class="rounded-full bg-ywc-bg-soft px-3 py-1.5 text-[12px] font-semibold text-ywc-text-soft">Ateliers sur-mesure</span>
        </div>
      </div>

    </div>
  </section>

  <!-- NOTRE METHODE -->
  <section class="bg-ywc-ink py-24 text-white">
    <div class="mx-auto max-w-7xl px-[30px]">
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
  <section class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="rounded-[24px] bg-ywc-bg-soft p-8 sm:p-10">
      <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">À la une · Chatbots</div>
          <h2 class="m-0 mb-3 font-display text-[26px] font-bold leading-[1.1] tracking-[-0.02em]">La conversation, automatisée sur 6 canaux.</h2>
          <p class="m-0 mb-7 max-w-[440px] text-[14.5px] leading-[1.6] text-ywc-text-soft">WhatsApp, web, Messenger, SMS… On déploie des assistants qui qualifient vos leads, répondent 24/7 et nourrissent votre data — sans jamais dormir.</p>
          <a href="{{ route('home') }}#chatbots" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">Découvrir la plateforme →</a>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div class="rounded-[14px] border border-ywc-border bg-white p-4"><span class="text-lg">💬</span><div class="mt-2 text-[13px] font-bold">Chaîne WhatsApp</div></div>
          <div class="rounded-[14px] border border-ywc-border bg-white p-4"><span class="text-lg">🌐</span><div class="mt-2 text-[13px] font-bold">Assistant web</div></div>
          <div class="rounded-[14px] border border-ywc-border bg-white p-4"><span class="text-lg">📨</span><div class="mt-2 text-[13px] font-bold">Messenger</div></div>
          <div class="rounded-[14px] border border-ywc-border bg-white p-4"><span class="text-lg">📊</span><div class="mt-2 text-[13px] font-bold">Data Mining</div></div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => 'Un projet en tête ? Démarquons-le ensemble.',
    'lead' => 'Devis gratuit, réponse sous 24h. Dites-nous où vous voulez aller, on trace le chemin.',
    'cta' => 'Demander un devis →',
  ])

@endsection
