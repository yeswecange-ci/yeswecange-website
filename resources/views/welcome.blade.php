@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', 'YesWeCange — ' . ($en ? 'Stand out.' : 'Accélérer votre croissance.'))
@section('meta_description', $en
    ? 'YesWeCange is the 360° digital agency that makes you stand out: strategy, social media, data mining, WhatsApp chatbots, SEO/SEA and branding — between Paris and Abidjan.'
    : "YesWeCange, l'agence digitale 360° qui vous démarque : stratégie, social media, data mining, chatbots WhatsApp, SEO/SEA et branding — entre Paris et Abidjan.")

@section('content')

  <!-- HERO -->
  <section id="top" class="relative overflow-hidden bg-ywc-bg">
    <div class="absolute inset-0">
      <video src="{{ asset('images/videoywc.mp4') }}" autoplay loop muted playsinline preload="auto" poster="{{ asset('images/videoywc-poster.webp') }}" aria-hidden="true" class="block h-full w-full object-cover object-[68%_center] sm:object-[50%_center]"></video>
      <div class="absolute inset-0 bg-gradient-to-r from-ywc-ink/65 via-ywc-ink/30 to-transparent"></div>
      <div class="absolute inset-x-0 bottom-0 h-[130px] bg-gradient-to-t from-ywc-bg/95 to-transparent"></div>
    </div>
    <div class="relative mx-auto flex min-h-[84vh] max-w-7xl flex-col justify-center px-5 pt-28 pb-16 sm:px-[30px] sm:pt-32 sm:pb-[88px]">
      <div class="max-w-[600px]">
        <h1 data-bhero class="m-0 mb-[22px] font-display text-[clamp(40px,5.6vw,84px)] font-bold leading-[0.97] tracking-[-0.04em] text-white [text-shadow:0_2px_30px_rgba(10,10,15,0.45)]">
          @if($en)
            Don't follow<br>the flock.<br><span class="bg-gradient-to-r from-ywc-blue-pale to-white bg-clip-text text-transparent">Stand out.</span>
          @else
            Ne suivez pas<br>le troupeau.<br><span class="bg-gradient-to-r from-ywc-blue-pale to-white bg-clip-text text-transparent">Démarquez-vous.</span>
          @endif
        </h1>
        <p data-bhero class="m-0 mb-8 max-w-[470px] text-[clamp(17px,1.4vw,20px)] leading-[1.55] text-white">{{ $en
          ? "Much more than an online presence: we shape your digital identity to help you stand out and outperform your competition. 360° digital to dominate your market."
          : "Bien plus qu'une présence en ligne : nous façonnons votre identité digitale pour vous démarquer et surclasser votre concurrence. Le digital à 360° pour dominer votre marché." }}</p>
        <div data-bhero class="flex flex-wrap gap-[13px]">
          <a href="#contact" class="rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white no-underline shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">{{ $en ? 'Start my project →' : 'Lancer mon projet →' }}</a>
          <a href="#chatbots" class="rounded-xl border-[1.5px] border-ywc-border bg-white/85 px-7 py-[15px] text-base font-bold text-ywc-ink no-underline backdrop-blur-sm transition hover:border-ywc-text-pale">{{ $en ? 'See the chatbot platform' : 'Voir la plateforme chatbot' }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUST CHIPS -->
  <section class="px-[30px] py-[30px]">
    <div data-breveal class="flex flex-wrap justify-center gap-2.5">
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">{{ $en ? 'Strategy' : 'Stratégie' }}</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Social Media</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Data Mining</span>
      <span class="rounded-full bg-ywc-blue px-4 py-[9px] text-sm font-semibold text-white">Chatbots</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">SEO</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">Branding</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">{{ $en ? 'Training' : 'Formation' }}</span>
      <span class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-[9px] text-sm font-semibold text-ywc-text-soft">OuiSnap</span>
    </div>
  </section>

  <!-- CLIENTS / TRUST -->
  <section id="clients" class="mx-auto max-w-7xl px-[30px] py-[70px] pb-5">
    <div data-breveal class="mx-auto mb-9 max-w-[640px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Trusted by' : 'Ils nous font confiance' }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $en ? 'Brands that chose to stand out' : 'Des marques qui ont choisi de se démarquer' }}</h2>
      <p class="mt-3.5 text-base leading-[1.55] text-ywc-text-soft">{{ $en
        ? 'Startups, SMBs and large accounts — across Europe and Africa — trust us with their visibility, content and customer relationships.'
        : 'Startups, PME et grands comptes — en Europe et en Afrique — nous confient leur visibilité, leur contenu et leur relation client.' }}</p>
    </div>
    <div data-bclient-grid class="b-client-grid"></div>
    <div data-breveal class="mt-[38px] flex flex-wrap justify-center gap-12">
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-blue">+120</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'projects delivered' : 'projets livrés' }}</div></div>
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">2</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">continents</div></div>
      <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">94%</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'client retention' : 'de clients fidèles' }}</div></div>
    </div>
  </section>

  <!-- SERVICES BENTO -->
  <section id="services" class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="mx-auto mb-[46px] max-w-[680px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our expertise' : 'Nos expertises' }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $en ? 'A single partner for your entire strategy' : 'Un partenaire unique pour votre stratégie globale' }}</h2>
    </div>
    <div data-bbento class="b-bento"></div>
    <div class="mt-9 text-center">
      <a href="{{ route('services') }}" class="rounded-full bg-ywc-ink px-[22px] py-[13px] text-[14.5px] font-bold text-white no-underline transition hover:bg-ywc-text">{{ $en ? 'See all our services →' : 'Voir tous nos services →' }}</a>
    </div>
  </section>

  <!-- CHATBOTS DARK -->
  <section id="chatbots" class="relative overflow-hidden bg-ywc-ink text-white">
    <div class="absolute -top-32 -right-44 h-[640px] w-[640px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.34),transparent_60%)]"></div>
    <div class="animate-ywcb-dash absolute inset-x-0 bottom-0 h-[340px] [background-image:linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:46px_46px] [mask-image:linear-gradient(to_top,#000,transparent)]"></div>
    <div class="relative mx-auto max-w-7xl px-5 py-24 sm:px-[30px]">
      <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-[60px]">
        <div data-breveal>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $en ? 'The conversational platform' : 'La plateforme conversationnelle' }}</div>
          <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em] text-white">{{ $en ? 'One conversation,' : 'Une conversation,' }}<br>{{ $en ? 'six channels,' : 'six canaux,' }} <span class="text-ywc-blue-pale">{{ $en ? 'zero pause.' : 'zéro pause.' }}</span></h2>
          <p class="mt-3.5 mb-[30px] max-w-[470px] text-[17.5px] leading-[1.6] text-[#a8afc0]">{{ $en
            ? 'We automate the customer relationship wherever it happens: WhatsApp, web, Messenger, SMS. Every exchange feeds your data and qualifies your leads.'
            : "On automatise la relation client là où elle se joue : WhatsApp, web, Messenger, SMS. Chaque échange nourrit votre data et qualifie vos leads." }}</p>
          <div class="grid max-w-[520px] grid-cols-2 gap-2.5 sm:grid-cols-3">
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">{{ $en ? 'WhatsApp Broadcast' : 'Chaîne WhatsApp' }}</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">{{ $en ? 'Web assistant' : 'Assistant web' }}</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">Messenger</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">Call & SMS Bot</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">Data Mining</div></div>
            <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">Gamification</div></div>
          </div>
        </div>
        <div data-breveal class="relative flex justify-center py-6">
          {{-- Halo --}}
          <div class="pointer-events-none absolute left-1/2 top-1/2 h-[440px] w-[440px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.4),transparent_62%)] blur-2xl"></div>

          <div data-sim-scene class="relative" style="perspective: 1100px;">
            <div data-sim-stage class="relative" style="transform-style: preserve-3d;">

              {{-- Cartes flottantes en profondeur --}}
              <div data-sim-card class="absolute -left-12 top-10 z-20 hidden items-center gap-2.5 rounded-2xl border border-white/12 bg-white/[0.08] px-3.5 py-2.5 shadow-[0_24px_50px_-24px_rgba(0,0,0,0.7)] backdrop-blur-md sm:flex" style="transform: translateZ(95px);">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-ywc-green/20 text-[15px] font-bold text-ywc-green">✓</span>
                <div class="leading-tight"><div class="text-[12px] font-bold text-white">{{ $en ? 'New lead' : 'Nouveau lead' }}</div><div class="text-[10.5px] text-[#a8afc0]">{{ $en ? 'qualified instantly' : "qualifié à l'instant" }}</div></div>
              </div>

              <div data-sim-card class="absolute -right-10 bottom-24 z-20 hidden items-center gap-2.5 rounded-2xl border border-white/12 bg-white/[0.08] px-3.5 py-2.5 shadow-[0_24px_50px_-24px_rgba(0,0,0,0.7)] backdrop-blur-md sm:flex" style="transform: translateZ(64px);">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-ywc-blue/25 text-[14px]">⚡</span>
                <div class="leading-tight"><div class="text-[12px] font-bold text-white">{{ $en ? 'Instant reply' : 'Réponse instantanée' }}</div><div class="text-[10.5px] text-[#a8afc0]">{{ $en ? '24/7, automated' : '24/7, automatisée' }}</div></div>
              </div>

              {{-- Téléphone --}}
              <div data-sim-phone class="relative mx-auto w-full max-w-[300px] rounded-[36px] border border-[#262936] bg-[#15171f] p-[11px] shadow-[0_60px_110px_-36px_rgba(0,0,0,0.9)]" style="transform-style: preserve-3d;">
                <div data-glare class="sim-glare"></div>
                <div class="overflow-hidden rounded-[26px] bg-white">
                  <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-4 py-[15px] text-white">
                    <span class="flex h-[34px] w-[34px] items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[28px] w-[28px]"></span>
                    <div class="leading-[1.2]"><div class="text-[14.5px] font-bold">YesWeCange</div><div class="text-[11px] opacity-80">WhatsApp Business</div></div>
                  </div>
                  <div id="ywc-chatb2" class="flex min-h-[308px] flex-col gap-2.5 bg-[#e9e2db] p-3.5 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
                  <div class="flex items-center gap-2.5 bg-[#f2f2f2] px-3.5 py-[11px]">
                    <div class="flex-1 rounded-full bg-white px-3.5 py-2 text-[12.5px] text-ywc-text-faint">{{ $en ? 'Write a message…' : 'Écrivez un message…' }}</div>
                    <span class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-ywc-whatsapp text-white">➤</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- Reflet au sol --}}
            <div class="pointer-events-none mx-auto mt-4 h-9 w-[68%] rounded-[50%] bg-black/50 blur-xl"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TEMOIGNAGES -->
  <section class="mx-auto max-w-7xl px-5 py-20 sm:px-[30px]">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Testimonials' : 'Témoignages' }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $en ? 'They dared to stand out' : 'Ils ont osé se démarquer' }}</h2>
    </div>
    @php
      $testimonials = $en ? [
        ['q' => "YesWeCange transformed our customer relationship: the WhatsApp chatbot qualifies our leads 24/7 and our team never misses a single request.", 'n' => 'Awa K.', 'r' => 'Marketing Director · Retail', 'i' => 'AK'],
        ['q' => "A team that understands Europe as much as Africa. Our campaigns finally have real consistency across both markets.", 'n' => 'Julien M.', 'r' => 'CEO · SaaS startup', 'i' => 'JM'],
        ['q' => "From branding to data, everything is driven by results. +38% qualified leads in one quarter. We recommend them with full confidence.", 'n' => 'Fatou D.', 'r' => 'Digital Manager · SMB', 'i' => 'FD'],
      ] : [
        ['q' => "YesWeCange a transformé notre relation client : le chatbot WhatsApp qualifie nos leads 24/7 et notre équipe ne perd plus une seule demande.", 'n' => 'Awa K.', 'r' => 'Directrice marketing · Retail', 'i' => 'AK'],
        ['q' => "Une équipe qui comprend autant l'Europe que l'Afrique. Nos campagnes ont enfin une vraie cohérence sur les deux marchés.", 'n' => 'Julien M.', 'r' => 'CEO · Startup SaaS', 'i' => 'JM'],
        ['q' => "Du branding à la data, tout est piloté par les résultats. +38% de leads qualifiés en un trimestre. On recommande les yeux fermés.", 'n' => 'Fatou D.', 'r' => 'Responsable digital · PME', 'i' => 'FD'],
      ];
    @endphp
    <div data-breveal class="grid gap-5 md:grid-cols-3">
      @foreach ($testimonials as $t)
        <figure class="m-0 flex flex-col rounded-[20px] border border-ywc-border bg-white p-7">
          <div class="mb-3 flex gap-0.5 text-ywc-blue" aria-label="5 / 5">★★★★★</div>
          <blockquote class="m-0 flex-1 text-[15px] leading-[1.6] text-ywc-text">{{ $en ? '"' . $t['q'] . '"' : '« ' . $t['q'] . ' »' }}</blockquote>
          <figcaption class="mt-6 flex items-center gap-3">
            <span class="flex h-10 w-10 flex-none items-center justify-center rounded-full bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[13px] font-bold text-white">{{ $t['i'] }}</span>
            <span class="leading-[1.3]">
              <span class="block font-display text-[14px] font-bold tracking-[-0.01em]">{{ $t['n'] }}</span>
              <span class="block text-[12.5px] text-ywc-text-muted">{{ $t['r'] }}</span>
            </span>
          </figcaption>
        </figure>
      @endforeach
    </div>
  </section>

  <!-- AGENCES -->
  <section id="equipe" class="border-y border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-[30px] py-24">
      <div data-breveal class="mx-auto mb-[46px] max-w-[680px] text-center">
        <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our offices' : 'Nos agences' }}</div>
        <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $en ? 'Two offices, one ambition' : 'Deux agences, une seule ambition' }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2">
        <div class="group relative overflow-hidden rounded-[24px] border border-ywc-border bg-white p-8 transition hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.25)] sm:p-10">
          <div class="absolute -top-16 -right-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.10),transparent_65%)]"></div>
          <div class="relative">
            <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue">Paris</div>
            <h3 class="m-0 mb-3 font-display text-[clamp(24px,2.6vw,32px)] font-bold leading-[1.06] tracking-[-0.02em]">{{ $en ? 'Paris office' : 'Agence de Paris' }}</h3>
            <p class="m-0 mb-7 text-[14.5px] leading-[1.6] text-ywc-text-soft">176 avenue Charles de Gaulle<br>92200 Neuilly-sur-Seine<br>+33 1 71 04 07 21</p>
            <a href="{{ route('quote', ['office' => 'paris']) }}" class="inline-flex items-center gap-2 rounded-xl border border-ywc-blue px-5 py-3 text-[14px] font-bold text-ywc-blue no-underline transition group-hover:bg-ywc-blue group-hover:text-white">{{ $en ? 'This is Paris' : "Ici c'est Paris" }} →</a>
          </div>
        </div>
        <div class="group relative overflow-hidden rounded-[24px] bg-ywc-ink p-8 text-white transition hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.5)] sm:p-10">
          <div class="absolute -top-16 -right-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_65%)]"></div>
          <div class="relative">
            <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">Abidjan · « babi »</div>
            <h3 class="m-0 mb-3 font-display text-[clamp(24px,2.6vw,32px)] font-bold leading-[1.06] tracking-[-0.02em] text-white">{{ $en ? 'Abidjan office' : "Agence d'Abidjan" }}</h3>
            <p class="m-0 mb-7 text-[14.5px] leading-[1.6] text-[#c5cbd8]">Cocody, II Plateaux Vallons<br>Rue Des Jardins<br>+225 58 46 79 51</p>
            <a href="{{ route('quote', ['office' => 'abidjan']) }}" class="inline-flex items-center gap-2 rounded-xl border border-white px-5 py-3 text-[14px] font-bold text-white no-underline transition group-hover:bg-white group-hover:text-ywc-ink">{{ $en ? 'This is Babi' : "Ici c'est Babi" }} →</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.contact-cta')

@endsection
