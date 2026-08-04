@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', 'Nos services — YesWeCange')
@section('meta_description', $texts['services.header.lead']->localized('value'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['services.header.eyebrow']->localized('value'),
    'title' => $texts['services.header.title']->localized('value'),
    'lead' => $texts['services.header.lead']->localized('value'),
    'stats' => [
      ['value' => '08', 'label' => $texts['services.header.stat1_label']->localized('value')],
      ['value' => '360°', 'label' => $texts['services.header.stat2_label']->localized('value')],
      ['value' => '24/7', 'label' => $texts['services.header.stat3_label']->localized('value')],
    ],
  ])

  <!-- SERVICES GRID (visuel) -->
  @php
    $services = \App\Models\Service::orderBy('order_column')->get();
  @endphp

  @push('head')
  <script type="application/ld+json">
  {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => $en ? 'YesWeCange services' : 'Services YesWeCange',
      'itemListElement' => $services->values()->map(fn ($s, $i) => [
          '@type' => 'ListItem',
          'position' => $i + 1,
          'item' => [
              '@type' => 'Service',
              'name' => $s->localized('title'),
              'description' => $s->localized('description'),
              'provider' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
              'areaServed' => ['FR', 'CI'],
          ],
      ])->all(),
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
  </script>
  @endpush

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($services as $s)
        <article class="group flex flex-col overflow-hidden rounded-[20px] border border-ywc-border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] {{ $s->feature ? 'sm:col-span-2 lg:col-span-1' : '' }}">
          @isset($s->image)
            <div class="relative aspect-[16/10] overflow-hidden">
              <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->localized('title') }}" width="600" height="375" loading="lazy" decoding="async" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
              <span class="absolute left-3.5 top-3.5 rounded-full bg-white/90 px-2.5 py-1 font-display text-[11px] font-bold text-ywc-blue shadow-sm">{{ sprintf('%02d', $loop->iteration) }}</span>
            </div>
          @endisset
          <div class="flex flex-1 flex-col p-6">
            @unless($s->image)
              <span class="mb-3 font-display text-[11px] font-bold text-ywc-blue">{{ sprintf('%02d', $loop->iteration) }}</span>
            @endunless
            <h3 class="m-0 mb-2 font-display text-[17px] font-bold leading-[1.2] tracking-[-0.01em]">{{ $s->localized('title') }}</h3>
            <p class="m-0 mb-4 flex-1 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $s->localized('description') }}</p>
            <div class="flex flex-wrap gap-1.5">
              @foreach ($s->localized('tags') as $tag)
                <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-[11.5px] font-semibold text-ywc-text-soft">{{ $tag }}</span>
              @endforeach
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </section>

  <!-- NOTRE METHODE -->
  <section class="bg-ywc-ink py-24 text-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-[30px]">
      <div data-breveal class="mb-[42px]">
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $texts['services.method.eyebrow']->localized('value') }}</div>
        <h2 class="m-0 max-w-[600px] font-display text-[clamp(28px,3.2vw,42px)] font-bold leading-[1.08] tracking-[-0.02em] text-white">{{ $texts['services.method.title']->localized('value') }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach (range(1, 4) as $step)
          <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
            <div class="font-display text-2xl font-bold text-ywc-blue-pale">{{ sprintf('%02d', $step) }}</div>
            <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $texts["services.method.step{$step}_title"]->localized('value') }}</h3>
            <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $texts["services.method.step{$step}_desc"]->localized('value') }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- A LA UNE · CHATBOTS -->
  <section class="mx-auto max-w-7xl px-5 py-20 sm:px-[30px]">
    <div data-breveal class="overflow-hidden rounded-[24px] bg-ywc-bg-soft p-8 sm:p-10">
      <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['services.featured.eyebrow']->localized('value') }}</div>
          <h2 class="m-0 mb-3 font-display text-[26px] font-bold leading-[1.1] tracking-[-0.02em]">{{ $texts['services.featured.title']->localized('value') }}</h2>
          <p class="m-0 mb-7 max-w-[440px] text-[14.5px] leading-[1.6] text-ywc-text-soft">{{ $texts['services.featured.paragraph']->localized('value') }}</p>
          <a href="https://api.whatsapp.com/send/?phone=2250777787780&text=Bonjour+%EF%BF%BD%2C+je+viens+du+site+YesWeCange+et+j%27aimerais+en+savoir+plus.&type=phone_number&app_absent=0" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ $texts['services.featured.cta_label']->localized('value') }}</a>
        </div>
        <div class="flex justify-center">
          <div class="relative w-full max-w-[300px] rounded-[30px] border border-[#262936] bg-[#15171f] p-[11px] shadow-[0_40px_80px_-30px_rgba(0,0,0,0.5)]">
            <div class="overflow-hidden rounded-[26px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-4 py-[15px] text-white">
                <span class="flex h-[34px] w-[34px] items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[28px] w-[28px]"></span>
                <div class="leading-[1.2]"><div class="text-[14.5px] font-bold">YesWeCange</div><div class="text-[11px] opacity-80">WhatsApp Business</div></div>
              </div>
              <div id="ywc-chatb-services" class="flex min-h-[308px] flex-col gap-2.5 bg-[#e9e2db] p-3.5 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
              <div class="flex items-center gap-2.5 bg-[#f2f2f2] px-3.5 py-[11px]">
                <div class="flex-1 rounded-full bg-white px-3.5 py-2 text-[12.5px] text-ywc-text-faint">{{ $en ? 'Write a message…' : 'Écrivez un message…' }}</div>
                <span class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-ywc-whatsapp text-white">➤</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $texts['services.cta.title']->localized('value'),
    'lead' => $texts['services.cta.lead']->localized('value'),
    'cta' => $texts['services.cta.cta_label']->localized('value'),
    'href' => route('quote'),
  ])

@endsection
