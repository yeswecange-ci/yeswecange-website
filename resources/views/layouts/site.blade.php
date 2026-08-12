<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="H0o1TMh8dbL4Vc0507W_b9wBzT8RIB9dFyHYNkh4jVA" />
@include('partials.seo')
@php $en = app()->getLocale() === 'en'; @endphp
<script>window.YWC_LOCALE = "{{ app()->getLocale() }}";</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('head')
</head>
<body class="bg-white font-sans text-ywc-ink antialiased selection:bg-ywc-blue selection:text-white">
@if (request()->routeIs('home'))
  @include('partials.loader')
@endif
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[70] focus:rounded-lg focus:bg-ywc-blue focus:px-4 focus:py-2 focus:text-white">{{ app()->getLocale() === 'en' ? 'Skip to content' : 'Aller au contenu' }}</a>
<div id="ywc-b" class="overflow-x-hidden">

  <!-- NAV -->
  <header class="fixed inset-x-0 top-0 z-50 px-4 pt-4 sm:px-6">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 rounded-full border border-black/5 bg-white px-3 py-2.5 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] sm:px-5">
      <a href="{{ route('home') }}" class="flex items-center no-underline" aria-label="YesWeCange — {{ __('site.nav.home') }}">
        <img src="{{ asset('images/logo_ywc.png') }}" alt="YesWeCange" width="225" height="225" class="h-11 w-auto">
      </a>

      <nav class="hidden items-center gap-1 lg:flex" aria-label="{{ $en ? 'Main navigation' : 'Navigation principale' }}">
        <a href="{{ route('home') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.home') }}</a>
        <a href="{{ route('services') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.services') }}</a>
        <a href="{{ route('certifications') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('certifications') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.certifications') }}</a>
        <a href="{{ route('about') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('about') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.about') }}</a>
        <a href="{{ route('contact') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('contact') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.contact') }}</a>
        <span class="mx-2 h-5 w-px bg-ywc-border-soft"></span>
        @include('partials.lang-switcher')
        <a href="{{ route('quote') }}" class="rounded-full bg-ywc-blue px-5 py-2.5 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ __('site.nav.quote') }}</a>
      </nav>

      <div class="flex items-center gap-2 lg:hidden">
        <a href="{{ route('quote') }}" class="rounded-full bg-ywc-blue px-4 py-2 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ __('site.nav.quote') }}</a>
        <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="{{ __('site.nav.menu') }}" class="flex h-9 w-9 items-center justify-center rounded-full text-ywc-ink transition hover:bg-ywc-bg-soft">
          <span data-menu-icon class="text-xl leading-none">☰</span>
        </button>
      </div>
    </div>

    <div id="mobile-menu" data-menu-panel class="hidden mx-auto mt-2 max-w-6xl rounded-3xl border border-black/5 bg-white p-2 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] lg:hidden">
      <nav class="flex flex-col gap-1 p-1.5" aria-label="{{ $en ? 'Mobile navigation' : 'Navigation mobile' }}">
        <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.home') }}</a>
        <a href="{{ route('services') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.services') }}</a>
        <a href="{{ route('certifications') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('certifications') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.certifications') }}</a>
        <a href="{{ route('about') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('about') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.about') }}</a>
        <a href="{{ route('faq') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('faq') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.faq') }}</a>
        <a href="{{ route('contact') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('contact') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.contact') }}</a>
        <div class="mt-1.5 border-t border-ywc-border-soft px-2 pt-2.5">@include('partials.lang-switcher')</div>
      </nav>
    </div>
  </header>

  <main id="main">
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="border-t border-ywc-border-soft bg-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-[30px] py-14 sm:grid-cols-2 lg:grid-cols-4">
      <div class="lg:col-span-2">
        <div class="flex items-center">
          <img src="{{ asset('images/logo_ywc.png') }}" alt="YesWeCange" width="225" height="225" class="h-14 w-auto">
        </div>
        <p class="mt-4 max-w-[320px] text-[14px] leading-[1.6] text-ywc-text-soft">{{ __('site.footer.tagline') }}</p>
      </div>

      <div>
        <div class="mb-3.5 text-[12px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">{{ __('site.footer.nav_title') }}</div>
        <ul class="flex flex-col gap-2 text-sm">
          <li><a href="{{ route('services') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.services') }}</a></li>
          <li><a href="{{ route('realisations') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.realisations') }}</a></li>
          <li><a href="{{ route('about') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.about') }}</a></li>
          <li><a href="{{ route('faq') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.faq') }}</a></li>
          <li><a href="{{ route('contact') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.contact') }}</a></li>
          <li><a href="{{ route('quote') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.quote') }}</a></li>
        </ul>
      </div>

      <div>
        <div class="mb-3.5 text-[12px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">{{ __('site.footer.legal_title') }}</div>
        <ul class="flex flex-col gap-2 text-sm">
          <li><a href="{{ route('legal.mentions') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.footer.legal') }}</a></li>
          <li><a href="{{ route('legal.privacy') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.footer.privacy') }}</a></li>
          <li><a href="{{ route('legal.terms') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.footer.terms') }}</a></li>
          <li><a href="{{ route('legal.cookies') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.footer.cookies') }}</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-ywc-border-soft">
      <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-[30px] py-6">
        <div class="flex flex-wrap items-center gap-3">
          <a href="https://www.facebook.com/Yes-We-Cange-668925849823227/" target="_blank" rel="noopener" aria-label="Facebook" class="flex h-9 w-9 items-center justify-center rounded-full border border-ywc-border-soft bg-white text-ywc-text-soft transition hover:border-ywc-border-blue hover:bg-ywc-blue hover:text-white">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg>
          </a>
          <a href="https://twitter.com/yeswecange" target="_blank" rel="noopener" aria-label="X (Twitter)" class="flex h-9 w-9 items-center justify-center rounded-full border border-ywc-border-soft bg-white text-ywc-text-soft transition hover:border-ywc-border-blue hover:bg-ywc-blue hover:text-white">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
          </a>
          <a href="https://fr.linkedin.com/company/yeswecange" target="_blank" rel="noopener" aria-label="LinkedIn" class="flex h-9 w-9 items-center justify-center rounded-full border border-ywc-border-soft bg-white text-ywc-text-soft transition hover:border-ywc-border-blue hover:bg-ywc-blue hover:text-white">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.55V9h3.57v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.22.79 24 1.77 24h20.45c.98 0 1.78-.78 1.78-1.73V1.73C24 .77 23.2 0 22.22 0z"/></svg>
          </a>
          <a href="https://www.instagram.com/yeswecangeagency/" target="_blank" rel="noopener" aria-label="Instagram" class="flex h-9 w-9 items-center justify-center rounded-full border border-ywc-border-soft bg-white text-ywc-text-soft transition hover:border-ywc-border-blue hover:bg-ywc-blue hover:text-white">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.72 3.72 0 0 1-1.38-.9 3.72 3.72 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.42 2.17 8.8 2.16 12 2.16zm0 3.68a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32zm0 10.16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.41-10.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/></svg>
          </a>
        </div>
        <div class="text-[13px] text-ywc-text-faint">© <span id="year"></span> YesWeCange — {{ __('site.footer.rights') }}</div>
      </div>
    </div>
  </footer>
</div>

@php
  $waNumber = '2250777787780';
  $waMessage = $en
      ? "Hello 👋, I'm visiting the YesWeCange website and I'd like to know more."
      : "Bonjour 👋, je viens du site YesWeCange et j'aimerais en savoir plus.";
@endphp
<a
  href="https://wa.me/{{ $waNumber }}?text={{ rawurlencode($waMessage) }}"
  target="_blank"
  rel="noopener"
  aria-label="WhatsApp"
  class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-[0_14px_34px_-10px_rgba(37,211,102,0.6)] transition hover:scale-105 sm:bottom-7 sm:right-7"
>
  <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12.05 2C6.578 2 2.13 6.447 2.13 11.92c0 1.876.52 3.703 1.505 5.288L2 22l4.939-1.596a9.87 9.87 0 004.874 1.267h.005c5.472 0 9.92-4.447 9.92-9.92 0-2.65-1.032-5.14-2.906-7.014A9.86 9.86 0 0012.05 2zm0 18.16h-.004a8.23 8.23 0 01-4.196-1.152l-.301-.179-3.12 1.014.99-3.043-.198-.312a8.223 8.223 0 01-1.264-4.404c0-4.553 3.706-8.259 8.263-8.259 2.207 0 4.28.86 5.842 2.423a8.203 8.203 0 012.415 5.846c0 4.553-3.706 8.066-8.427 8.066z"/></svg>
</a>

@include('partials.cookie-banner')
</body>
</html>
