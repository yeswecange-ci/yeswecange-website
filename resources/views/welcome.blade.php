@extends('layouts.site')

@section('title', 'YesWeCange — Démarquez-vous.')

@section('content')

  <!-- HERO -->
  <section id="top" class="relative overflow-hidden bg-ywc-bg">
    <div class="absolute inset-0">
      <video src="{{ asset('images/hero-landscape-v2.mp4') }}" autoplay loop muted playsinline class="block h-full w-full object-cover" style="object-position: 50% center;"></video>
      <div class="absolute inset-0 bg-ywc-ink/5"></div>
      <div class="absolute inset-x-0 bottom-0 h-[130px] bg-gradient-to-t from-ywc-bg/95 to-transparent"></div>
    </div>
    <div class="relative mx-auto flex min-h-[84vh] max-w-7xl flex-col justify-center px-5 pt-28 pb-16 sm:px-[30px] sm:pt-32 sm:pb-[88px]">
      <div class="max-w-[600px]">
        <div data-bhero class="mb-[26px] inline-flex items-center gap-[9px] rounded-full border border-ywc-border-blue bg-[#eef2ff]/86 px-[15px] py-[7px] text-[13px] font-semibold text-ywc-blue backdrop-blur-sm">
          <span class="h-[7px] w-[7px] shrink-0 rounded-full bg-ywc-blue"></span>L'agence qui vous démarque · Paris × Abidjan
        </div>
        <h1 data-bhero class="m-0 mb-[22px] font-display text-[clamp(40px,5.6vw,84px)] font-bold leading-[0.97] tracking-[-0.04em] text-ywc-ink">
        <span class="text-white bg-clip-text ">Démarquez-vous.</span>
        </h1>
        <p data-bhero class="m-0 mb-8 max-w-[470px] text-[clamp(17px,1.4vw,20px)] leading-[1.55] text-white">Bien plus qu'une présence en ligne : nous façonnons votre identité digitale pour vous démarquer et surclasser votre concurrence. Le digital à 360° pour dominer votre marché.</p>
        <div data-bhero class="flex flex-wrap gap-[13px]">
          <a href="#contact" class="rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white no-underline shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">Lancer mon projet →</a>
          <a href="#chatbots" class="rounded-xl border-[1.5px] border-ywc-border bg-white/85 px-7 py-[15px] text-base font-bold text-ywc-ink no-underline backdrop-blur-sm transition hover:border-ywc-text-pale">Voir la plateforme chatbot</a>
        </div>
      </div>

      <!-- floating chatbot card over the photo -->
      <div data-bfloat class="relative mt-9 w-full overflow-hidden rounded-[22px] border border-ywc-border bg-white text-left shadow-[0_50px_90px_-30px_rgba(10,10,15,0.45)] sm:absolute sm:right-[30px] sm:bottom-12 sm:mt-0 sm:w-[296px]">
        <div class="flex items-center gap-2.5 border-b border-[#f0f1f5] px-[18px] py-[15px]">
          <span class="flex h-[30px] w-[30px] items-center justify-center overflow-hidden rounded-[9px] border border-ywc-border bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[26px] w-[26px]"></span>
          <div class="leading-[1.2]">
            <div class="text-[13.5px] font-bold">Assistant YesWeCange</div>
            <div class="flex items-center gap-[5px] text-[11px] text-ywc-green"><span class="h-1.5 w-1.5 rounded-full bg-ywc-green"></span>répond en moins d'une minute</div>
          </div>
        </div>
        <div id="ywc-chatb" class="flex min-h-[196px] flex-col gap-2.5 bg-ywc-bg-faint p-4"></div>
      </div>
    </div>
  </section>

  <!-- TRUST CHIPS -->
  <section class="px-[30px] py-[30px]">
    <div data-breveal class="flex flex-wrap justify-center gap-2.5">
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Stratégie</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Social Media</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Data Mining</span>
      <span class="rounded-full bg-ywc-blue px-4 py-[9px] text-sm font-semibold text-white">Chatbots</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">SEO</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Branding</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Formation</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">OuiSnap</span>
    </div>
  </section>

  <!-- CLIENTS / TRUST -->
  <section id="clients" class="mx-auto max-w-7xl px-[30px] py-[70px] pb-5">
    <div data-breveal class="mx-auto mb-9 max-w-[640px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">Ils nous font confiance</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">Des marques qui ont choisi de se démarquer</h2>
      <p class="mt-3.5 text-base leading-[1.55] text-ywc-text-soft">Startups, PME et grands comptes — en Europe et en Afrique — nous confient leur visibilité, leur contenu et leur relation client.</p>
    </div>
    <div data-bclient-grid class="b-client-grid"></div>
    <div data-breveal class="mt-[38px] flex flex-wrap justify-center gap-12">
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-blue">+120</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">projets livrés</div></div>
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">2</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">continents</div></div>
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">94%</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">de clients fidèles</div></div>
    </div>
  </section>

  <!-- SERVICES BENTO -->
  <section id="services" class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="mx-auto mb-[46px] max-w-[680px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">Nos expertises</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">Un partenaire unique pour votre stratégie globale</h2>
    </div>
    <div data-bbento class="b-bento"></div>
    <div class="mt-9 text-center">
      <a href="{{ route('services') }}" class="rounded-full bg-ywc-ink px-[22px] py-[13px] text-[14.5px] font-bold text-white no-underline transition hover:bg-ywc-text">Voir tous nos services →</a>
    </div>
  </section>

  <!-- CHATBOTS DARK -->
  <section id="chatbots" class="relative overflow-hidden bg-ywc-ink text-white">
    <div class="absolute -top-32 -right-44 h-[640px] w-[640px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.34),transparent_60%)]"></div>
    <div class="animate-ywcb-dash absolute inset-x-0 bottom-0 h-[340px] [background-image:linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:46px_46px] [mask-image:linear-gradient(to_top,#000,transparent)]"></div>
    <div class="relative mx-auto max-w-7xl px-5 py-24 sm:px-[30px]">
      <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-[60px]">
        <div data-breveal>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">La plateforme conversationnelle</div>
          <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em] text-white">Une conversation,<br>six canaux, <span class="text-ywc-blue-pale">zéro pause.</span></h2>
          <p class="mt-3.5 mb-[30px] max-w-[470px] text-[17.5px] leading-[1.6] text-[#a8afc0]">On automatise la relation client là où elle se joue : WhatsApp, web, Messenger, SMS. Chaque échange nourrit votre data et qualifie vos leads.</p>
          <div class="grid max-w-[520px] grid-cols-2 gap-2.5 sm:grid-cols-3">
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Chaîne WhatsApp</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Assistant web</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Messenger</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Call & SMS Bot</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Devloppement Web & Mobile</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] p-[15px]"><div class="mb-2 text-lg"></div><div class="text-[13.5px] font-bold">Gamification</div></div>
          </div>
        </div>
        <div data-breveal class="flex justify-center" style="perspective: 1200px;">
          <div class="w-full max-w-[310px] rounded-[36px] border border-[#262936] bg-[#15171f] p-[11px] shadow-[0_60px_100px_-36px_rgba(0,0,0,0.8)]" style="transform: rotateY(13deg) rotateX(5deg); transform-style: preserve-3d;">
            <div class="overflow-hidden rounded-[26px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-4 py-[15px] text-white">
                <span class="flex h-[34px] w-[34px] items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[28px] w-[28px]"></span>
                <div class="leading-[1.2]"><div class="text-[14.5px] font-bold">YesWeCange</div><div class="text-[11px] opacity-80">WhatsApp Business</div></div>
              </div>
              <div id="ywc-chatb2" class="flex min-h-[308px] flex-col gap-2.5 bg-[#e9e2db] p-3.5 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
              <div class="flex items-center gap-2.5 bg-[#f2f2f2] px-3.5 py-[11px]">
                <div class="flex-1 rounded-full bg-white px-3.5 py-2 text-[12.5px] text-ywc-text-faint">Écrivez un message…</div>
                <span class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-ywc-whatsapp text-white">➤</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- REALISATIONS -->
  <section id="realisations" class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="mb-[42px] flex flex-wrap items-end justify-between gap-[18px]">
      <div>
        <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">Réalisations</div>
        <h2 class="m-0 max-w-[560px] font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">On réalise tous vos projets avec passion</h2>
      </div>
      <a href="{{ route('realisations') }}" class="rounded-full bg-ywc-ink px-[22px] py-[13px] text-[14.5px] font-bold text-white no-underline transition hover:bg-ywc-text">En savoir plus →</a>
    </div>
    <div data-breveal class="grid grid-cols-2 gap-4 lg:grid-cols-4">
      <div class="transition hover:-translate-y-2">
        <div class="aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chainewhatsapp.png') }}" alt="Chaîne WhatsApp" class="h-full w-full object-cover object-top">
        </div>
        <div class="mt-[13px] font-display text-base font-bold tracking-[-0.01em]">Chaîne WhatsApp</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Diffusion & relation 1:1</div>
      </div>
      <div class="transition hover:-translate-y-2">
        <div class="aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/com-digital.png') }}" alt="Communication digitale" class="h-full w-full object-cover object-top">
        </div>
        <div class="mt-[13px] font-display text-base font-bold tracking-[-0.01em]">Communication digitale</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Contenus & social media</div>
      </div>
      <div class="transition hover:-translate-y-2">
        <div class="aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chatbot2.png') }}" alt="Chatbot" class="h-full w-full object-cover object-top">
        </div>
        <div class="mt-[13px] font-display text-base font-bold tracking-[-0.01em]">Chatbot</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Automatisation 24/7</div>
      </div>
      <div class="transition hover:-translate-y-2">
        <div class="aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/publicité.png') }}" alt="Publicité en ligne" class="h-full w-full object-cover object-top">
        </div>
        <div class="mt-[13px] font-display text-base font-bold tracking-[-0.01em]">Publicité en ligne</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Acquisition & ROI</div>
      </div>
    </div>
  </section>

  <!-- EQUIPE -->
  <section id="equipe" class="border-y border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-[30px] py-24">
      <div data-breveal class="mx-auto mb-[46px] max-w-[680px] text-center">
        <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">Notre équipe</div>
        <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">Des experts sur deux continents, une culture locale</h2>
      </div>
      <div data-breveal class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <div class="mb-3 text-xs font-bold tracking-[0.04em] text-ywc-blue">ABIDJAN · « babi »</div>
          <h3 class="mb-[9px] font-display text-lg font-bold tracking-[-0.01em]">Vos experts au quotidien</h3>
          <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">Web social, numérique et communication digitale, à votre écoute.</p>
        </div>
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <div class="mb-3 text-xs font-bold tracking-[0.04em] text-ywc-blue">PARIS</div>
          <h3 class="mb-[9px] font-display text-lg font-bold tracking-[-0.01em]">Marketeurs & ingénieurs</h3>
          <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">Une équipe qui innove et anticipe les évolutions du marché.</p>
        </div>
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <div class="mb-3 text-xs font-bold tracking-[0.04em] text-ywc-blue">BACK OFFICE</div>
          <h3 class="mb-[9px] font-display text-lg font-bold tracking-[-0.01em]">Data & strategic planning</h3>
          <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">Researchers et planners pour analyser data et KPIs.</p>
        </div>
        <div class="rounded-[18px] bg-ywc-ink p-6 text-white">
          <div class="mb-3 text-xs font-bold tracking-[0.04em] text-ywc-blue-pale">BAMAKO · MONTRÉAL</div>
          <h3 class="mb-[9px] font-display text-lg font-bold tracking-[-0.01em]">Pour aller plus loin</h3>
          <p class="m-0 text-[13.5px] leading-[1.55] text-[#a8afc0]">Jeux, audiences ciblées et optimisation des conversions.</p>
        </div>
      </div>
    </div>
  </section>

  @include('partials.contact-cta')

@endsection
