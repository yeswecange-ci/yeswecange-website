@php
    $en = app()->getLocale() === 'en';
    $defaultChip = $trustChips->firstWhere('is_default', true) ?? $trustChips->first();
@endphp
@extends('layouts.site')

@section('title', 'YesWeCange — ' . $texts['home.seo.title']->localized('value'))
@section('meta_description', $texts['home.seo.meta_description']->localized('value'))

@section('content')

@push('head')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://yeswecange.com/#organization",
      "name": "YesWeCange",
      "url": "https://yeswecange.com/",
      "description": "YesWeCange est une agence spécialisée dans le webmarketing, l'intelligence artificielle et la performance digitale en Afrique.",

      "telephone": [
        "+225 58 46 79 51",
        "+33 1 71 04 07 21"
      ],
      "address": [
        {
          "@type": "PostalAddress",
          "streetAddress": "Rue Des Jardins, 176 avenue Charles de Gaulle",
          "addressLocality": "Cocody, II Plateaux Vallons",
          "addressCountry": "CI"
        },
        {
          "@type": "PostalAddress",
          "streetAddress": "176 avenue Charles de Gaulle",
          "postalCode": "92200",
          "addressLocality": "Neuilly-sur-Seine",
          "addressCountry": "FR"
        }
      ],
      "sameAs": [
        "https://www.facebook.com/YesWeCange",
        "https://x.com/yeswecange",
        "https://fr.linkedin.com/company/yeswecange",
        "https://www.instagram.com/yeswecangeagency/"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "https://yeswecange.com/#website",
      "url": "https://yeswecange.com/",
      "name": "YesWeCange",
      "publisher": {
        "@id": "https://yeswecange.com/#organization"
      },
      "inLanguage": "fr-FR"
    },
    {
      "@type": "WebPage",
      "@id": "https://yeswecange.com/#webpage",
      "url": "https://yeswecange.com/",
      "name": "YesWeCange — Accélérer votre croissance",
      "description": "YesWeCange accompagne les entreprises dans leur croissance grâce au webmarketing, à l'intelligence artificielle et à la performance digitale.",
      "isPartOf": {
        "@id": "https://yeswecange.com/#website"
      },
      "about": {
        "@id": "https://yeswecange.com/#organization"
      }
    }
  ]
}
</script>
@endpush


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
          <x-split-heading :text="$texts['home.hero.title']->localized('value')" highlight-class="bg-gradient-to-r from-ywc-blue-pale to-white bg-clip-text text-transparent" />
        </h1>
        <p data-bhero class="m-0 mb-8 max-w-[470px] text-[clamp(17px,1.4vw,20px)] leading-[1.55] text-white">{{ $texts['home.hero.subtitle']->localized('value') }}</p>
        <div data-bhero class="flex flex-wrap gap-[13px]">
          <a href="#contact" class="rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white no-underline shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">{{ $texts['home.hero.cta_primary']->localized('value') }}</a>
          <a href="#chatbots" class="rounded-xl border-[1.5px] border-ywc-border bg-white/85 px-7 py-[15px] text-base font-bold text-ywc-ink no-underline backdrop-blur-sm transition hover:border-ywc-text-pale">{{ $texts['home.hero.cta_secondary']->localized('value') }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUST CHIPS -->
  <section class="px-[30px] py-[30px]">
    <div data-breveal data-chip-group class="flex flex-wrap justify-center gap-2.5">
      @foreach ($trustChips as $chip)
        <button
          type="button"
          data-chip
          data-chip-target="{{ $chip->key }}"
          class="rounded-full border px-4 py-[9px] text-sm font-semibold transition {{ $chip->is($defaultChip) ? 'is-active border-transparent bg-ywc-blue text-white' : 'border-ywc-border-soft bg-ywc-bg-soft text-ywc-text-soft hover:border-ywc-border-blue' }}"
        >{{ $chip->localized('label') }}</button>
      @endforeach
    </div>
    <div data-breveal class="mx-auto mt-6 max-w-[560px] rounded-2xl border border-ywc-border-soft bg-ywc-bg-soft px-6 py-5 text-center">
      @foreach ($trustChips as $chip)
        <p data-chip-panel="{{ $chip->key }}" class="m-0 text-[15px] font-bold leading-[1.6] text-ywc-ink {{ $chip->is($defaultChip) ? 'animate-ywc-fade-in' : 'hidden' }}">{{ $chip->localized('text') }}</p>
      @endforeach
    </div>
  </section>

  <!-- CLIENTS / TRUST -->
  <section id="clients" class="mx-auto max-w-7xl px-[30px] py-[70px] pb-5">
    <div data-breveal class="mx-auto mb-9 max-w-[640px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['home.trust.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $texts['home.trust.title']->localized('value') }}</h2>
      <p class="mt-3.5 text-base leading-[1.55] text-ywc-text-soft">{{ $texts['home.trust.intro']->localized('value') }}</p>
    </div>
    <div data-bclient-grid class="b-client-grid"></div>
    <div data-breveal class="mt-[38px] flex flex-wrap justify-center gap-12">
      @foreach ($stats as $stat)
        <div class="text-center"><div class="font-display text-4xl font-bold tracking-[-0.02em] {{ $loop->first ? 'text-ywc-blue' : 'text-ywc-ink' }}">{{ $stat->value }}</div><div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $stat->localized('label') }}</div></div>
      @endforeach
    </div>
  </section>

  <!-- SERVICES BENTO -->
  <section id="services" class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="mx-auto mb-[46px] max-w-[680px] text-center">
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['home.services.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $texts['home.services.title']->localized('value') }}</h2>
    </div>
    <div data-bbento class="b-bento"></div>
    <div class="mt-9 text-center">
      <a href="{{ route('services') }}" class="rounded-full bg-ywc-ink px-[22px] py-[13px] text-[14.5px] font-bold text-white no-underline transition hover:bg-ywc-text">{{ $texts['home.services.cta_label']->localized('value') }}</a>
    </div>
  </section>

  <!-- CHATBOTS DARK -->
  <section id="chatbots" class="relative overflow-hidden bg-ywc-ink text-white">
    <div class="absolute -top-32 -right-44 h-[640px] w-[640px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.34),transparent_60%)]"></div>
    <div class="animate-ywcb-dash absolute inset-x-0 bottom-0 h-[340px] [background-image:linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:46px_46px] [mask-image:linear-gradient(to_top,#000,transparent)]"></div>
    <div class="relative mx-auto max-w-7xl px-5 py-24 sm:px-[30px]">
      <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-[60px]">
        <div data-breveal>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $texts['home.chatbots.eyebrow']->localized('value') }}</div>
          <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em] text-white">
            <x-split-heading :text="$texts['home.chatbots.title']->localized('value')" highlight-class="text-ywc-blue-pale" />
          </h2>
          <p class="mt-3.5 mb-[30px] max-w-[470px] text-[17.5px] leading-[1.6] text-[#a8afc0]">{{ $texts['home.chatbots.paragraph']->localized('value') }}</p>
          <div class="grid max-w-[520px] grid-cols-2 gap-2.5 sm:grid-cols-3">
            @foreach ($chatbotChannels as $channel)
              <div data-bbot class="rounded-[13px] border border-[#20222e] bg-white/[0.02] px-[15px] py-[18px]"><div class="text-[13.5px] font-bold">{{ $channel->localized('label') }}</div></div>
            @endforeach
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
      <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['home.testimonials.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $texts['home.testimonials.title']->localized('value') }}</h2>
    </div>
    <div data-breveal class="grid gap-5 md:grid-cols-3">
      @foreach ($testimonials as $t)
        <figure class="m-0 flex flex-col rounded-[20px] border border-ywc-border bg-white p-7">
          <div class="mb-3 flex gap-0.5 text-ywc-blue" aria-label="5 / 5">★★★★★</div>
          <blockquote class="m-0 flex-1 text-[15px] leading-[1.6] text-ywc-text">{{ $en ? '"' . $t->localized('quote') . '"' : '« ' . $t->localized('quote') . ' »' }}</blockquote>
          <figcaption class="mt-6 flex items-center gap-3">
            <span class="flex h-10 w-10 flex-none items-center justify-center rounded-full bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[13px] font-bold text-white">{{ $t->initials }}</span>
            <span class="leading-[1.3]">
              <span class="block font-display text-[14px] font-bold tracking-[-0.01em]">{{ $t->author_name }}</span>
              <span class="block text-[12.5px] text-ywc-text-muted">{{ $t->localized('role') }}</span>
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
        <div class="mb-[14px] text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['home.offices.eyebrow']->localized('value') }}</div>
        <h2 class="m-0 font-display text-[clamp(30px,3.6vw,50px)] font-bold leading-[1.04] tracking-[-0.03em]">{{ $texts['home.offices.title']->localized('value') }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2">
        @foreach ($officeLocations as $office)
          @if ($office->is_dark)
            <div class="group relative overflow-hidden rounded-[24px] bg-ywc-ink p-8 text-white transition hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.5)] sm:p-10">
              <div class="absolute -top-16 -right-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_65%)]"></div>
              <div class="relative">
                <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $office->eyebrow }}</div>
                <h3 class="m-0 mb-3 font-display text-[clamp(24px,2.6vw,32px)] font-bold leading-[1.06] tracking-[-0.02em] text-white">{{ $office->localized('title') }}</h3>
                <p class="m-0 mb-7 text-[14.5px] leading-[1.6] text-[#c5cbd8]">{!! nl2br(e($office->address)) !!}<br>{{ $office->phone }}</p>
                <a href="{{ route('quote', ['office' => $office->slug]) }}" class="inline-flex items-center gap-2 rounded-xl border border-white px-5 py-3 text-[14px] font-bold text-white no-underline transition group-hover:bg-white group-hover:text-ywc-ink">{{ $office->localized('cta_label') }} →</a>
              </div>
            </div>
          @else
            <div class="group relative overflow-hidden rounded-[24px] border border-ywc-border bg-white p-8 transition hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.25)] sm:p-10">
              <div class="absolute -top-16 -right-16 h-[220px] w-[220px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.10),transparent_65%)]"></div>
              <div class="relative">
                <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $office->eyebrow }}</div>
                <h3 class="m-0 mb-3 font-display text-[clamp(24px,2.6vw,32px)] font-bold leading-[1.06] tracking-[-0.02em]">{{ $office->localized('title') }}</h3>
                <p class="m-0 mb-7 text-[14.5px] leading-[1.6] text-ywc-text-soft">{!! nl2br(e($office->address)) !!}<br>{{ $office->phone }}</p>
                <a href="{{ route('quote', ['office' => $office->slug]) }}" class="inline-flex items-center gap-2 rounded-xl border border-ywc-blue px-5 py-3 text-[14px] font-bold text-ywc-blue no-underline transition group-hover:bg-ywc-blue group-hover:text-white">{{ $office->localized('cta_label') }} →</a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  @include('partials.contact-cta')

@endsection
