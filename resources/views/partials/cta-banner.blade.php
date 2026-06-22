@php
  $ctaHref = $href ?? route('home') . '#contact';
  $ctaLabel = $cta ?? 'Démarrer un projet →';
@endphp
  <section class="mx-auto max-w-7xl px-[30px] py-20">
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-ywc-blue to-[#1b33d6] px-8 py-16 text-center text-white sm:py-20">
      <div class="absolute -top-24 left-1/2 h-[300px] w-[300px] -translate-x-1/2 rounded-full bg-[radial-gradient(circle,rgba(255,255,255,0.18),transparent_64%)]"></div>
      <h2 class="relative m-0 mb-3 font-display text-[clamp(28px,3.4vw,42px)] font-bold leading-[1.08] tracking-[-0.02em] text-white">{{ $title }}</h2>
      <p class="relative mx-auto mb-7 max-w-[460px] text-[15.5px] leading-[1.55] text-[#d4dbff]">{{ $lead }}</p>
      <a href="{{ $ctaHref }}" class="relative inline-flex items-center gap-2 rounded-xl bg-white px-7 py-[15px] text-base font-bold text-ywc-blue no-underline">{{ $ctaLabel }}</a>
    </div>
  </section>
