<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@include('partials.seo')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('head')
</head>
<body class="bg-white font-sans text-ywc-ink antialiased selection:bg-ywc-blue selection:text-white">
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[70] focus:rounded-lg focus:bg-ywc-blue focus:px-4 focus:py-2 focus:text-white">{{ app()->getLocale() === 'en' ? 'Skip to content' : 'Aller au contenu' }}</a>
<div id="ywc-b" class="overflow-x-hidden">

  <!-- NAV -->
  <header class="fixed inset-x-0 top-0 z-50 px-4 pt-4 sm:px-6">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 rounded-full border border-black/5 bg-white px-3 py-2.5 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] sm:px-5">
      <a href="{{ route('home') }}" class="flex items-center gap-[9px] text-ywc-ink no-underline" aria-label="YesWeCange">
        <span class="flex h-8 w-8 items-center justify-center rounded-[9px] bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[19px] font-bold text-white">y</span>
        <span class="font-display text-lg font-bold tracking-[-0.02em]">yeswecange</span>
      </a>

      <nav class="hidden items-center gap-1 md:flex" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.home') }}</a>
        <a href="{{ route('services') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.services') }}</a>
        <a href="{{ route('realisations') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('realisations') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.realisations') }}</a>
        <span class="mx-2 h-5 w-px bg-ywc-border-soft"></span>
        @include('partials.lang-switcher')
        <a href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}" class="rounded-full bg-ywc-blue px-5 py-2.5 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ __('site.nav.quote') }}</a>
      </nav>

      <div class="flex items-center gap-2 md:hidden">
        <a href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}" class="rounded-full bg-ywc-blue px-4 py-2 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ __('site.nav.quote') }}</a>
        <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="{{ __('site.nav.menu') }}" class="flex h-9 w-9 items-center justify-center rounded-full text-ywc-ink transition hover:bg-ywc-bg-soft">
          <span data-menu-icon class="text-xl leading-none">☰</span>
        </button>
      </div>
    </div>

    <div id="mobile-menu" data-menu-panel class="hidden mx-auto mt-2 max-w-6xl rounded-3xl border border-black/5 bg-white p-2 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] md:hidden">
      <nav class="flex flex-col gap-1 p-1.5" aria-label="Navigation mobile">
        <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.home') }}</a>
        <a href="{{ route('services') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.services') }}</a>
        <a href="{{ route('realisations') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('realisations') ? 'text-ywc-blue' : 'text-ywc-text' }}">{{ __('site.nav.realisations') }}</a>
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
        <div class="flex items-center gap-[11px]">
          <span class="flex h-[30px] w-[30px] items-center justify-center rounded-[9px] bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[17px] font-bold text-white">y</span>
          <span class="font-display text-lg font-bold tracking-[-0.02em]">yeswecange</span>
        </div>
        <p class="mt-4 max-w-[320px] text-[14px] leading-[1.6] text-ywc-text-soft">{{ __('site.footer.tagline') }}</p>
      </div>

      <div>
        <div class="mb-3.5 text-[12px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">{{ __('site.footer.nav_title') }}</div>
        <ul class="flex flex-col gap-2 text-sm">
          <li><a href="{{ route('services') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.services') }}</a></li>
          <li><a href="{{ route('realisations') }}" class="text-ywc-text-soft no-underline hover:text-ywc-ink">{{ __('site.nav.realisations') }}</a></li>
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
        <div class="flex flex-wrap gap-6 text-sm text-ywc-text-soft">
          <a href="https://www.facebook.com/Yes-We-Cange-668925849823227/" class="text-ywc-text-soft no-underline hover:text-ywc-ink" aria-label="Facebook">Facebook</a>
          <a href="https://twitter.com/yeswecange" class="text-ywc-text-soft no-underline hover:text-ywc-ink" aria-label="Twitter">Twitter</a>
          <a href="https://fr.linkedin.com/company/yeswecange" class="text-ywc-text-soft no-underline hover:text-ywc-ink" aria-label="LinkedIn">LinkedIn</a>
          <a href="https://www.instagram.com/yeswecangeagency/" class="text-ywc-text-soft no-underline hover:text-ywc-ink" aria-label="Instagram">Instagram</a>
        </div>
        <div class="text-[13px] text-ywc-text-faint">© <span id="year"></span> YesWeCange — {{ __('site.footer.rights') }}</div>
      </div>
    </div>
  </footer>
</div>

@include('partials.cookie-banner')
</body>
</html>
