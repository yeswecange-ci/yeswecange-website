@extends('layouts.site')

@section('title', 'Réalisations — YesWeCange')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => 'Réalisations',
    'title' => 'On réalise tous vos projets avec passion.',
    'lead' => "Des marques qui ont choisi de se démarquer. Aperçu de campagnes, plateformes conversationnelles et identités que nous avons déployées — en Europe et en Afrique.",
  ])

  <!-- FILTER CHIPS -->
  <section class="mx-auto max-w-7xl px-[30px] pt-10">
    <div data-filter-group="#realisations-grid" class="flex flex-wrap gap-2.5">
      <button type="button" data-filter="all" class="chip is-active">Tout</button>
      <button type="button" data-filter="chatbots" class="chip">Chatbots</button>
      <button type="button" data-filter="communication" class="chip">Communication</button>
      <button type="button" data-filter="social" class="chip">Social Media</button>
      <button type="button" data-filter="branding" class="chip">Branding</button>
      <button type="button" data-filter="publicite" class="chip">Publicité</button>
    </div>
  </section>

  <!-- PORTFOLIO MASONRY -->
  <section class="mx-auto max-w-7xl px-[30px] py-12">
    <div id="realisations-grid" class="grid auto-rows-[minmax(170px,auto)] gap-4 [grid-auto-flow:dense] sm:grid-cols-2 lg:grid-cols-3">

      <div data-breveal data-category="chatbots" class="group sm:col-span-2">
        <div class="relative aspect-[16/9] overflow-hidden rounded-[18px] border border-ywc-border sm:aspect-[2/1]">
          <img src="{{ asset('images/chainewhatsapp.png') }}" alt="Chaîne WhatsApp" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Chaîne WhatsApp</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Diffusion de masse & relation 1:1</div>
      </div>

      <div data-breveal data-category="communication" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/com-digital.png') }}" alt="Communication digitale" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Communication</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Communication digitale</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Contenus & stratégie 360°</div>
      </div>

      <div data-breveal data-category="chatbots" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/chatbot2.png') }}" alt="Chatbot Messenger" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Chatbot Messenger</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Engagement automatisé 24/7</div>
      </div>

      <div data-breveal data-category="publicite" class="group">
        <div class="relative aspect-square overflow-hidden rounded-[18px] border border-ywc-border">
          <img src="{{ asset('images/publicité.png') }}" alt="Publicité en ligne" class="h-full w-full object-cover object-top">
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Publicité</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Publicité en ligne</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Acquisition & ROI mesurable</div>
      </div>

      <div data-breveal data-category="branding" class="group">
        <div class="relative flex aspect-square items-center justify-center overflow-hidden rounded-[18px] border border-ywc-border bg-[#eef2ff]">
          
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Branding</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Identité de marque</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Logo, charte & direction artistique</div>
      </div>

      <div data-breveal data-category="social" class="group">
        <div class="relative flex aspect-square items-center justify-center overflow-hidden rounded-[18px] border border-ywc-border bg-[#eef2ff]">
          
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Social Media</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Campagne social media</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Community management & influence</div>
      </div>

      <div data-breveal data-category="chatbots" class="group row-span-2">
        <div class="relative h-[calc(100%-2.4rem)] min-h-[170px] overflow-hidden rounded-[18px] border border-ywc-border bg-[#eef2ff]">
          <div class="flex h-full items-center justify-center"></div>
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Chatbots</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Data Mining</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Audiences ciblées & leads qualifiés</div>
      </div>

      <div data-breveal data-category="communication" class="group">
        <div class="relative flex aspect-square items-center justify-center overflow-hidden rounded-[18px] border border-ywc-border bg-[#eef2ff]">
          
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Communication</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Refonte de site</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">UX/UI & développement</div>
      </div>

      <div data-breveal data-category="social" class="group">
        <div class="relative flex aspect-square items-center justify-center overflow-hidden rounded-[18px] border border-ywc-border bg-[#eef2ff]">
          
          <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">Social Media</span>
          <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
        </div>
        <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">Gamification</div>
        <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">Jeux concours & engagement</div>
      </div>

    </div>
  </section>

  <!-- ETUDE DE CAS -->
  <section class="mx-auto max-w-7xl px-[30px] py-12">
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-ywc-ink p-8 text-white sm:p-12">
      <div class="absolute -top-20 -right-20 h-[300px] w-[300px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_60%)]"></div>
      <div class="relative grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">Étude de cas · Chaîne WhatsApp</div>
          <h3 class="m-0 mb-3 font-display text-[28px] font-bold leading-[1.1] tracking-[-0.02em] text-white">Une marque qui parle à 50 000 clients, en 1:1.</h3>
          <p class="m-0 mb-7 max-w-[440px] text-[15px] leading-[1.6] text-[#a8afc0]">Déploiement d'une Chaîne WhatsApp + chatbot de qualification. Diffusion de masse, conversations personnalisées et collecte de data en continu.</p>
          <div class="grid max-w-[360px] grid-cols-3 gap-6">
            <div><div class="font-display text-2xl font-bold text-ywc-blue-pale">×3,2</div><div class="mt-0.5 text-[12px] text-[#7c869c]">taux d'engagement</div></div>
            <div><div class="font-display text-2xl font-bold text-white">+38%</div><div class="mt-0.5 text-[12px] text-[#7c869c]">leads qualifiés</div></div>
            <div><div class="font-display text-2xl font-bold text-white">24/7</div><div class="mt-0.5 text-[12px] text-[#7c869c]">disponibilité</div></div>
          </div>
        </div>
        <div class="flex justify-center" style="perspective: 1200px;">
          <div class="w-[260px] rounded-[30px] border border-[#262936] bg-[#15171f] p-[10px] shadow-[0_50px_90px_-36px_rgba(0,0,0,0.8)]" style="transform: rotateY(-10deg) rotateX(4deg); transform-style: preserve-3d;">
            <div class="overflow-hidden rounded-[22px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-3.5 py-3 text-white">
                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-white font-display text-sm font-bold text-ywc-whatsapp">y</span>
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
    'title' => 'Votre projet sera le prochain.',
    'lead' => 'Parlons de vos objectifs. Devis gratuit, réponse sous 24h.',
    'cta' => 'Démarrer un projet →',
  ])

@endsection
