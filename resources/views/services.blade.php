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
    $services = \App\Models\Service::orderBy('order_column')->get();
  @endphp

  @push('head')
  <script type="application/ld+json">
  {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => $en ? 'YesWeCange services' : 'Services YesWeCange',
      'itemListElement' => $services->values()->map(fn ($s, $i) => [
          '@type' => 'ListItem',
          'position' => $i + 1,
          'item' => [
              '@type' => 'Service',
              'name' => $s->localized('title'),
              'description' => $s->localized('description'),
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
        <article class="group flex flex-col overflow-hidden rounded-[20px] border border-ywc-border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] {{ $s->feature ? 'sm:col-span-2 lg:col-span-1' : '' }}">
          @isset($s->image)
            <div class="relative aspect-[16/10] overflow-hidden">
              <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->localized('title') }}" width="600" height="375" loading="lazy" decoding="async" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
              <span class="absolute left-3.5 top-3.5 rounded-full bg-white/90 px-2.5 py-1 font-display text-[11px] font-bold text-ywc-blue shadow-sm">{{ sprintf('%02d', $loop->iteration) }}</span>
            </div>
          @endisset
          <div class="flex flex-1 flex-col p-6">
            @unless($s->image)
              <span class="mb-3 font-display text-[11px] font-bold text-ywc-blue">{{ sprintf('%02d', $loop->iteration) }}</span>
            @endunless
            <h3 class="m-0 mb-2 font-display text-[17px] font-bold leading-[1.2] tracking-[-0.01em]">{{ $s->localized('title') }}</h3>
            <p class="m-0 mb-4 flex-1 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $s->localized('description') }}</p>
            <div class="flex flex-wrap gap-1.5">
              @foreach ($s->localized('tags') as $tag)
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
          <a href="https://api.whatsapp.com/send/?phone=2250777787780&text=Bonjour+%EF%BF%BD%2C+je+viens+du+site+YesWeCange+et+j%27aimerais+en+savoir+plus.&type=phone_number&app_absent=0" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ $en ? 'Discover the platform →' : 'Découvrir la plateforme →' }}</a>
        </div>
        <div class="flex justify-center">
          <div class="relative w-full max-w-[300px] rounded-[30px] border border-[#262936] bg-[#15171f] p-[11px] shadow-[0_40px_80px_-30px_rgba(0,0,0,0.5)]">
            <div class="overflow-hidden rounded-[26px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-4 py-[15px] text-white">
                <span class="flex h-[34px] w-[34px] items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[28px] w-[28px]"></span>
                <div class="leading-[1.2]"><div class="text-[14.5px] font-bold">YesWeCange</div><div class="text-[11px] opacity-80">WhatsApp Business</div></div>
              </div>
              <div id="ywc-chatb-services" class="flex min-h-[308px] flex-col gap-2.5 bg-[#e9e2db] p-3.5 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
              <div class="flex items-center gap-2.5 bg-[#f2f2f2] px-3.5 py-[11px]">
                <div class="flex-1 rounded-full bg-white px-3.5 py-2 text-[12.5px] text-ywc-text-faint">{{ $en ? 'Write a message…' : 'Écrivez un message…' }}</div>
                <span class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-ywc-whatsapp text-white">➤</span>
              </div>
            </div>
          </div>
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
