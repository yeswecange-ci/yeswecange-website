  <!-- PAGE HEADER -->
  <section class="relative overflow-hidden bg-ywc-bg">
    <div class="absolute -top-24 -right-24 h-[420px] w-[420px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.12),transparent_65%)]"></div>
    <div class="relative mx-auto max-w-7xl px-5 pt-28 pb-20 sm:px-[30px] sm:pt-[120px] sm:pb-[96px]">
      @php
        $routeName = request()->route()?->getName();
        $crumbLabel = match ($routeName) {
            'services' => __('site.nav.services'),
            'realisations' => __('site.nav.realisations'),
            'about' => __('site.nav.about'),
            'faq' => __('site.nav.faq'),
            'contact' => __('site.nav.contact'),
            'quote' => __('site.nav.quote'),
            'legal.mentions' => __('site.legal.mentions_title'),
            'legal.privacy' => __('site.legal.privacy_title'),
            'legal.terms' => __('site.legal.terms_title'),
            'legal.cookies' => __('site.legal.cookies_title'),
            default => $eyebrow,
        };
      @endphp
      <nav data-bhero aria-label="{{ app()->getLocale() === 'en' ? 'Breadcrumb' : 'Fil d\'Ariane' }}" class="mb-[18px]">
        <ol class="flex flex-wrap items-center gap-2 text-[13px] font-semibold">
          <li><a href="{{ route('home') }}" class="text-ywc-text-muted no-underline transition hover:text-ywc-blue">{{ __('site.nav.home') }}</a></li>
          <li aria-hidden="true" class="text-ywc-text-pale">/</li>
          <li><span aria-current="page" class="text-ywc-blue">{{ $crumbLabel }}</span></li>
        </ol>
      </nav>

      <script type="application/ld+json">
      {!! json_encode([
          '@context' => 'https://schema.org',
          '@type' => 'BreadcrumbList',
          'itemListElement' => [
              ['@type' => 'ListItem', 'position' => 1, 'name' => __('site.nav.home'), 'item' => route('home')],
              ['@type' => 'ListItem', 'position' => 2, 'name' => $crumbLabel, 'item' => url()->current()],
          ],
      ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
      </script>
      <h1 data-bhero class="m-0 mb-[18px] max-w-[760px] font-display text-[clamp(34px,4.6vw,60px)] font-bold leading-[1.02] tracking-[-0.03em] text-ywc-ink">{!! $title !!}</h1>
      <p data-bhero class="m-0 max-w-[560px] text-[clamp(16px,1.2vw,18px)] leading-[1.55] text-ywc-text">{{ $lead }}</p>

      @isset($stats)
        <div data-bhero class="mt-9 flex max-w-[640px] flex-wrap gap-8 border-t border-ywc-border-soft pt-7">
          @foreach ($stats as $stat)
            <div>
              <div class="font-display text-xl font-bold tracking-[-0.02em] text-ywc-blue">{{ $stat['value'] }}</div>
              <div class="mt-0.5 text-[13px] text-ywc-text-muted">{{ $stat['label'] }}</div>
            </div>
          @endforeach
        </div>
      @endisset
    </div>
  </section>
