@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', 'À propos — YesWeCange')
@section('meta_description', $texts['about.header.lead']->localized('value'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['about.header.eyebrow']->localized('value'),
    'title' => $texts['about.header.title']->localized('value'),
    'lead' => $texts['about.header.lead']->localized('value'),
  ])

  {{-- MANIFESTE --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 lg:items-center">
      <div data-breveal class="overflow-hidden rounded-[24px] border border-ywc-border">
        <img src="{{ asset('images/troupeau-mouton-noir.webp') }}" alt="{{ $en ? 'A black sheep standing out in a white flock' : 'Un mouton noir au milieu d\'un troupeau blanc' }}" width="1200" height="800" loading="lazy" decoding="async" class="h-full w-full object-cover">
      </div>
      <div data-breveal>
        <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['about.manifesto.eyebrow']->localized('value') }}</div>
        <h2 class="m-0 mb-5 font-display text-[clamp(26px,3.2vw,40px)] font-bold leading-[1.08] tracking-[-0.03em]">{{ $texts['about.manifesto.title']->localized('value') }}</h2>
        <div class="space-y-4 text-[16px] leading-[1.7] text-ywc-text-soft">
          @foreach (explode("\n\n", $texts['about.manifesto.paragraphs']->localized('value')) as $paragraph)
            <p>{{ $paragraph }}</p>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- CHIFFRES --}}
  <section class="border-y border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
      <div data-breveal class="grid grid-cols-2 gap-8 text-center lg:grid-cols-4">
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-blue">+120</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $texts['about.stats.stat1_label']->localized('value') }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">2</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $texts['about.stats.stat2_label']->localized('value') }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">94%</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $texts['about.stats.stat3_label']->localized('value') }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">6</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $texts['about.stats.stat4_label']->localized('value') }}</div></div>
      </div>
    </div>
  </section>

  {{-- FIDELITE --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['about.loyalty.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $texts['about.loyalty.title']->localized('value') }}</h2>
    </div>

    <div data-breveal class="grid gap-4 lg:grid-cols-2 lg:items-stretch">
      {{-- Ailleurs --}}
      <div class="rounded-[24px] border border-ywc-border bg-ywc-bg-soft p-8 sm:p-9">
        <div class="mb-6 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-text-muted">{{ $en ? 'Elsewhere' : 'Ailleurs' }}</div>
        <ul class="m-0 grid list-none gap-4 p-0">
          @foreach ([1, 2, 3] as $i)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-border text-[12px] font-bold text-ywc-text-muted">✕</span>
              <span class="text-[15px] leading-[1.5] text-ywc-text-muted line-through decoration-ywc-text-pale">{{ $texts["about.loyalty.painpoint{$i}"]->localized('value') }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      {{-- Chez YesWeCange --}}
      <div class="relative overflow-hidden rounded-[24px] bg-ywc-ink p-8 text-white sm:p-9">
        <div class="absolute -top-20 -right-20 h-[260px] w-[260px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_60%)]"></div>
        <div class="relative mb-6 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">YesWeCange</div>
        <ul class="relative m-0 grid list-none gap-4 p-0">
          @foreach ([1, 2, 3] as $i)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-blue text-[13px] font-bold text-white">✓</span>
              <span class="text-[15px] leading-[1.5] text-[#edf1ff]">{{ $texts["about.loyalty.win{$i}"]->localized('value') }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div data-breveal class="mx-auto mt-4 max-w-3xl rounded-[24px] border border-ywc-border bg-white p-8 text-center sm:p-10">
      <div class="font-display text-[clamp(40px,5vw,64px)] font-bold leading-none tracking-[-0.03em] text-ywc-blue">94%</div>
      <p class="m-0 mt-3 text-[16px] leading-[1.6] text-ywc-text-soft">{{ $texts['about.loyalty.callout']->localized('value') }}</p>
    </div>
  </section>

  {{-- VALEURS --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['about.values.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $texts['about.values.title']->localized('value') }}</h2>
    </div>
    <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      @php
        $values = \App\Models\CompanyValue::orderBy('order_column')->get();
      @endphp
      @foreach($values as $v)
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <div class="mb-3 text-2xl text-ywc-blue">{!! \App\Support\ValueIcons::svg($v->icon_key) !!}</div>
          <h3 class="mb-2 font-display text-lg font-bold tracking-[-0.01em]">{{ $v->localized('title') }}</h3>
          <p class="m-0 text-[14px] leading-[1.55] text-ywc-text-soft">{{ $v->localized('description') }}</p>
        </div>
      @endforeach
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $texts['about.cta.title']->localized('value'),
    'lead' => $texts['about.cta.lead']->localized('value'),
    'cta' => $texts['about.cta.cta_label']->localized('value'),
    'href' => route('quote'),
  ])

@endsection
