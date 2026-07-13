@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'Our work' : 'Réalisations') . ' — YesWeCange')
@section('meta_description', $en
    ? 'Brands that chose to stand out. A look at the campaigns, conversational platforms and identities we have deployed — across Europe and Africa.'
    : "Des marques qui ont choisi de se démarquer. Aperçu de campagnes, plateformes conversationnelles et identités que nous avons déployées — en Europe et en Afrique.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $en ? 'Our work' : 'Réalisations',
    'title' => $en ? 'We bring all your projects to life, with passion.' : 'On réalise tous vos projets avec passion.',
    'lead' => $en
        ? "Brands that chose to stand out. A look at the campaigns, conversational platforms and identities we have deployed — across Europe and Africa."
        : "Des marques qui ont choisi de se démarquer. Aperçu de campagnes, plateformes conversationnelles et identités que nous avons déployées — en Europe et en Afrique.",
  ])

  <!-- FILTER CHIPS -->
  <section class="mx-auto max-w-7xl px-[30px] pt-10">
    <div data-filter-group="#realisations-grid" class="flex flex-wrap gap-2.5">
      <button type="button" data-filter="all" class="chip is-active">{{ $en ? 'All' : 'Tout' }}</button>
      <button type="button" data-filter="chatbots" class="chip">Chatbots</button>
      <button type="button" data-filter="communication" class="chip">{{ $en ? 'Communication' : 'Communication' }}</button>
      <button type="button" data-filter="social" class="chip">Social Media</button>
      <button type="button" data-filter="branding" class="chip">Branding</button>
      <button type="button" data-filter="publicite" class="chip">{{ $en ? 'Advertising' : 'Publicité' }}</button>
    </div>
  </section>

  <!-- PORTFOLIO MASONRY -->
  <section class="mx-auto max-w-7xl px-[30px] py-12">
    <div id="realisations-grid" class="grid auto-rows-[minmax(170px,auto)] gap-4 [grid-auto-flow:dense] sm:grid-cols-2 lg:grid-cols-3">

      <div data-breveal data-category="chatbots" class="group sm:col-span-2">
        <div class="relative aspect-[16/9] overflow-hidden rounded-[18px] border border-ywc-border sm:aspect-[2/1]">
          <img src="{{ asset('images/chainewhatsapp.webp') }}" alt="{{ $en ? 'WhatsApp Broadcast' : 'Chaîne WhatsApp' }}" width="1200" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'WhatsApp Broadcast' : 'Chaîne WhatsApp' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Mass broadcast & 1:1 relationship' : 'Diffusion de masse & relation 1:1' }}</div>
      </div>

      <div data-breveal data-category="communication" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/com-digital.webp') }}" alt="{{ $en ? 'Digital communication' : 'Communication digitale' }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">{{ $en ? 'Communication' : 'Communication' }}</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'Digital communication' : 'Communication digitale' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Content & 360° strategy' : 'Contenus & stratégie 360°' }}</div>
      </div>

      <div data-breveal data-category="chatbots" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chatbot2.webp') }}" alt="Chatbot Messenger" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Chatbot Messenger</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? '24/7 automated engagement' : 'Engagement automatisé 24/7' }}</div>
      </div>

      <div data-breveal data-category="publicite" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/publicité.webp') }}" alt="{{ $en ? 'Online advertising' : 'Publicité en ligne' }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">{{ $en ? 'Advertising' : 'Publicité' }}</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'Online advertising' : 'Publicité en ligne' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Acquisition & measurable ROI' : 'Acquisition & ROI mesurable' }}</div>
      </div>

      <div data-breveal data-category="branding" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/brand.png') }}" alt="{{ $en ? 'Brand identity' : 'Identité de marque' }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Branding</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'Brand identity' : 'Identité de marque' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Logo, guidelines & art direction' : 'Logo, charte & direction artistique' }}</div>
      </div>

      <div data-breveal data-category="social" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/socialmedia.png') }}" alt="{{ $en ? 'Social media campaign' : 'Campagne social media' }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Social Media</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'Social media campaign' : 'Campagne social media' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Community management & influence' : 'Community management & influence' }}</div>
      </div>

      <div data-breveal data-category="chatbots" class="group row-span-2">
        <div class="relative h-[calc(100%-2.4rem)] min-h-[170px] overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/datamining.png') }}" alt="Data Mining" width="600" height="900" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Data Mining</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Targeted audiences & qualified leads' : 'Audiences ciblées & leads qualifiés' }}</div>
      </div>

      <div data-breveal data-category="communication" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/websiteredisign.png') }}" alt="{{ $en ? 'Website redesign' : 'Refonte de site' }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">{{ $en ? 'Communication' : 'Communication' }}</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $en ? 'Website redesign' : 'Refonte de site' }}</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'UX/UI & development' : 'UX/UI & développement' }}</div>
      </div>

      <div data-breveal data-category="social" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/gamification.png') }}" alt="Gamification" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Social Media</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Gamification</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $en ? 'Contests & engagement' : 'Jeux concours & engagement' }}</div>
      </div>

    </div>
  </section>

  <!-- ETUDE DE CAS -->
  <section class="mx-auto max-w-7xl px-[30px] py-12">
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-ywc-ink p-8 text-white sm:p-12">
      <div class="absolute -top-20 -right-20 h-[300px] w-[300px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_60%)]"></div>
      <div class="relative grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $en ? 'Case study · WhatsApp Broadcast' : 'Étude de cas · Chaîne WhatsApp' }}</div>
          <h3 class="m-0 mb-3 font-display text-[28px] font-bold leading-[1.1] tracking-[-0.02em] text-white">{{ $en ? 'A brand talking to 50,000 customers, 1:1.' : 'Une marque qui parle à 50 000 clients, en 1:1.' }}</h3>
          <p class="m-0 mb-7 max-w-[440px] text-[15px] leading-[1.6] text-[#a8afc0]">{{ $en
            ? 'Rollout of a WhatsApp Broadcast + qualification chatbot. Mass broadcast, personalised conversations and continuous data collection.'
            : "Déploiement d'une Chaîne WhatsApp + chatbot de qualification. Diffusion de masse, conversations personnalisées et collecte de data en continu." }}</p>
          <div class="grid max-w-[360px] grid-cols-3 gap-6">
            <div><div class="font-display text-2xl font-bold text-ywc-blue-pale">×3.2</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $en ? 'engagement rate' : "taux d'engagement" }}</div></div>
            <div><div class="font-display text-2xl font-bold text-white">+38%</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $en ? 'qualified leads' : 'leads qualifiés' }}</div></div>
            <div><div class="font-display text-2xl font-bold text-white">24/7</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $en ? 'availability' : 'disponibilité' }}</div></div>
          </div>
        </div>
        <div data-tilt3d-zone class="flex justify-center">
          <div data-tilt3d data-rest-y="-10" data-rest-x="4" class="relative w-[260px] rounded-[30px] border border-[#262936] bg-[#15171f] p-[10px] shadow-[0_50px_90px_-36px_rgba(0,0,0,0.8)]" style="transform-style: preserve-3d;">
            <div data-glare class="sim-glare"></div>
            <div class="overflow-hidden rounded-[22px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-3.5 py-3 text-white">
                <span class="flex h-7 w-7 items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-6 w-6"></span>
                <div class="leading-[1.2]"><div class="text-[13px] font-bold">YesWeCange</div><div class="text-[10px] opacity-80">WhatsApp Business</div></div>
              </div>
              <div class="flex min-h-[220px] flex-col gap-2 bg-[#e9e2db] p-3 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]">
                <div class="max-w-[82%] rounded-2xl rounded-tl-sm bg-white px-3 py-2 text-[11.5px] text-ywc-ink shadow-sm">Super ! Je vous envoie tout ça 🙌</div>
                <div class="ml-auto max-w-[82%] rounded-2xl rounded-tr-sm bg-[#dcf8c6] px-3 py-2 text-[11.5px] text-ywc-ink shadow-sm">Un conseiller vous rappelle ?</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Your project could be next.' : 'Votre projet sera le prochain.',
    'lead' => $en ? "Let's talk about your goals. Free quote, reply within 24h." : 'Parlons de vos objectifs. Devis gratuit, réponse sous 24h.',
    'cta' => $en ? 'Start a project →' : 'Démarrer un projet →',
  ])

@endsection
