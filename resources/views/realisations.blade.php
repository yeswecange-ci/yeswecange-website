@php
  $en = app()->getLocale() === 'en';
  $categoryLabels = [
    'chatbots' => 'Chatbots',
    'communication' => 'Communication',
    'social' => 'Social Media',
    'branding' => 'Branding',
    'publicite' => $en ? 'Advertising' : 'Publicité',
  ];
  $sizeClasses = [
    'wide' => 'sm:col-span-2',
    'tall' => 'row-span-2',
    'normal' => '',
  ];
@endphp
@extends('layouts.site')

@section('title', 'Réalisations — YesWeCange')
@section('meta_description', $texts['realisations.header.lead']->localized('value'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['realisations.header.eyebrow']->localized('value'),
    'title' => $texts['realisations.header.title']->localized('value'),
    'lead' => $texts['realisations.header.lead']->localized('value'),
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
      @foreach ($portfolioItems as $item)
        <div data-breveal data-category="{{ $item->category }}" class="group {{ $sizeClasses[$item->size] ?? '' }}">
          <div class="relative {{ $item->size === 'wide' ? 'aspect-[16/9] sm:aspect-[2/1]' : ($item->size === 'tall' ? 'h-[calc(100%-2.4rem)] min-h-[170px]' : 'aspect-square') }} overflow-hidden rounded-[18px] border border-ywc-border">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->localized('title') }}" width="600" height="600" loading="lazy" decoding="async" class="h-full w-full object-cover object-top">
            <span class="absolute top-3.5 right-3.5 rounded-full bg-white/90 px-3 py-1 text-[11px] font-bold text-ywc-blue shadow-sm">{{ $categoryLabels[$item->category] ?? $item->category }}</span>
            <span class="absolute bottom-3.5 right-3.5 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-ywc-ink shadow-sm transition group-hover:bg-white">↗</span>
          </div>
          <div class="mt-3 font-display text-base font-bold tracking-[-0.01em]">{{ $item->localized('title') }}</div>
          <div class="mt-0.5 text-[13.5px] text-ywc-text-muted">{{ $item->localized('description') }}</div>
        </div>
      @endforeach
    </div>
  </section>

  <!-- ETUDE DE CAS -->
  <section class="mx-auto max-w-7xl px-[30px] py-12">
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-ywc-ink p-8 text-white sm:p-12">
      <div class="absolute -top-20 -right-20 h-[300px] w-[300px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_60%)]"></div>
      <div class="relative grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $texts['realisations.case_study.eyebrow']->localized('value') }}</div>
          <h3 class="m-0 mb-3 font-display text-[28px] font-bold leading-[1.1] tracking-[-0.02em] text-white">{{ $texts['realisations.case_study.title']->localized('value') }}</h3>
          <p class="m-0 mb-7 max-w-[440px] text-[15px] leading-[1.6] text-[#a8afc0]">{{ $texts['realisations.case_study.paragraph']->localized('value') }}</p>
          <div class="grid max-w-[360px] grid-cols-3 gap-6">
            <div><div class="font-display text-2xl font-bold text-ywc-blue-pale">×3.2</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $texts['realisations.case_study.stat1_label']->localized('value') }}</div></div>
            <div><div class="font-display text-2xl font-bold text-white">+38%</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $texts['realisations.case_study.stat2_label']->localized('value') }}</div></div>
            <div><div class="font-display text-2xl font-bold text-white">24/7</div><div class="mt-0.5 text-[12px] text-[#7c869c]">{{ $texts['realisations.case_study.stat3_label']->localized('value') }}</div></div>
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
    'title' => $texts['realisations.cta.title']->localized('value'),
    'lead' => $texts['realisations.cta.lead']->localized('value'),
    'cta' => $texts['realisations.cta.cta_label']->localized('value'),
  ])

@endsection
