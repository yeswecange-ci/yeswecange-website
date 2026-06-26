<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'YesWeCange — Ne suivez pas le troupeau. Démarquez-vous.')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ywc-ink antialiased selection:bg-ywc-blue selection:text-white">
<div id="ywc-b" class="overflow-x-hidden">

  <!-- NAV -->
  <header class="fixed inset-x-0 top-0 z-50 px-4 pt-4 sm:px-6">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 rounded-full border border-black/5 bg-white px-3 py-2.5 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] sm:px-5">
      <a href="{{ route('home') }}" class="flex items-center gap-[9px] text-ywc-ink no-underline">
        <span class="flex h-8 w-8 items-center justify-center rounded-[9px] bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[19px] font-bold text-white">y</span>
        <span class="font-display text-lg font-bold tracking-[-0.02em]">yeswecange</span>
      </a>

      <nav class="hidden items-center gap-1 md:flex">
        <a href="{{ route('home') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">Accueil</a>
        <a href="{{ route('services') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">Services</a>
        <a href="{{ route('realisations') }}" class="rounded-full px-3.5 py-2 text-[14.5px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('realisations') ? 'text-ywc-blue' : 'text-ywc-text' }}">Réalisations</a>
        <span class="mx-2 h-5 w-px bg-ywc-border-soft"></span>
        <a href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}" class="rounded-full bg-ywc-blue px-5 py-2.5 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">Devis gratuit</a>
      </nav>

      <div class="flex items-center gap-2 md:hidden">
        <a href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}" class="rounded-full bg-ywc-blue px-4 py-2 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">Devis gratuit</a>
        <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="Ouvrir le menu" class="flex h-9 w-9 items-center justify-center rounded-full text-ywc-ink transition hover:bg-ywc-bg-soft">
          <span data-menu-icon class="text-xl leading-none">☰</span>
        </button>
      </div>
    </div>

    <div id="mobile-menu" data-menu-panel class="hidden mx-auto mt-2 max-w-6xl rounded-3xl border border-black/5 bg-white p-2 shadow-[0_10px_30px_-10px_rgba(10,10,15,0.18)] md:hidden">
      <nav class="flex flex-col gap-1 p-1.5">
        <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('home') ? 'text-ywc-blue' : 'text-ywc-text' }}">Accueil</a>
        <a href="{{ route('services') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('services') ? 'text-ywc-blue' : 'text-ywc-text' }}">Services</a>
        <a href="{{ route('realisations') }}" class="rounded-xl px-4 py-3 text-[15px] font-semibold no-underline transition hover:bg-ywc-bg-soft {{ request()->routeIs('realisations') ? 'text-ywc-blue' : 'text-ywc-text' }}">Réalisations</a>
      </nav>
    </div>
  </header>

  @yield('content')

  <!-- FOOTER -->
  <footer class="border-t border-ywc-border-soft bg-white">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-[22px] px-[30px] py-11">
      <div class="flex items-center gap-[11px]">
        <span class="flex h-[30px] w-[30px] items-center justify-center rounded-[9px] bg-gradient-to-br from-ywc-blue to-ywc-blue-mid font-display text-[17px] font-bold text-white">y</span>
        <span class="font-display text-lg font-bold tracking-[-0.02em]">yeswecange</span>
      </div>
      <div class="flex flex-wrap gap-6 text-sm text-ywc-text-soft">
        <a href="https://www.facebook.com/Yes-We-Cange-668925849823227/" class="text-ywc-text-soft no-underline hover:text-ywc-ink">Facebook</a>
        <a href="https://twitter.com/yeswecange" class="text-ywc-text-soft no-underline hover:text-ywc-ink">Twitter</a>
        <a href="https://fr.linkedin.com/company/yeswecange" class="text-ywc-text-soft no-underline hover:text-ywc-ink">LinkedIn</a>
        <a href="https://www.instagram.com/yeswecangeagency/" class="text-ywc-text-soft no-underline hover:text-ywc-ink">Instagram</a>
      </div>
      <div class="text-[13px] text-ywc-text-faint">© <span id="year"></span> YesWeCange — Tous droits réservés</div>
    </div>
  </footer>
</div>
</body>
</html>
