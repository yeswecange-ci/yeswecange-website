@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', $texts['quote.header.title']->localized('value') . ' — YesWeCange')
@section('meta_description', $texts['quote.header.lead']->localized('value'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['quote.header.eyebrow']->localized('value'),
    'title' => $texts['quote.header.title']->localized('value'),
    'lead' => $texts['quote.header.lead']->localized('value'),
  ])

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-[56px]">

      {{-- Colonne arguments --}}
      <aside data-breveal class="lg:sticky lg:top-28 lg:self-start">
        <h2 class="m-0 mb-5 font-display text-[clamp(22px,2.4vw,30px)] font-bold leading-[1.12] tracking-[-0.02em]">{{ $texts['quote.intro.title']->localized('value') }}</h2>

        <ul class="m-0 grid list-none gap-3.5 p-0">
          @foreach ([1, 2, 3, 4] as $i)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-blue text-[13px] font-bold text-white">✓</span>
              <div>
                <div class="font-display text-[15px] font-bold tracking-[-0.01em]">{{ $texts["quote.perks.perk{$i}_title"]->localized('value') }}</div>
                <div class="text-[13.5px] leading-[1.5] text-ywc-text-soft">{{ $texts["quote.perks.perk{$i}_desc"]->localized('value') }}</div>
              </div>
            </li>
          @endforeach
        </ul>

        <div class="mt-7 flex items-center gap-4 rounded-2xl bg-ywc-ink p-5 text-white">
          <span class="flex h-11 w-11 flex-none items-center justify-center overflow-hidden rounded-xl bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-9 w-9"></span>
          <p class="m-0 text-[13.5px] leading-[1.5] text-[#c5cbd8]">{{ $texts['quote.intro.trust_blurb']->localized('value') }}</p>
        </div>
      </aside>

      {{-- Formulaire --}}
      <div data-breveal class="rounded-[24px] border border-ywc-border bg-white p-6 shadow-[0_30px_70px_-44px_rgba(10,10,15,0.25)] sm:p-9">
        @include('partials.lead-form', ['type' => 'quote'])
      </div>
    </div>
  </section>

  {{-- COMMENT CA MARCHE --}}
  <section class="border-t border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
      <div data-breveal class="mb-10 text-center">
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['quote.steps.eyebrow']->localized('value') }}</div>
        <h2 class="m-0 font-display text-[clamp(24px,3vw,38px)] font-bold tracking-[-0.02em]">{{ $texts['quote.steps.title']->localized('value') }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-3">
        @foreach ([1, 2, 3] as $i)
          <div class="rounded-[18px] border border-ywc-border bg-white p-6">
            <div class="font-display text-2xl font-bold text-ywc-blue">{{ sprintf('%02d', $i) }}</div>
            <h3 class="mt-3 mb-1.5 font-display text-[15.5px] font-bold tracking-[-0.01em]">{{ $texts["quote.steps.step{$i}_title"]->localized('value') }}</h3>
            <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $texts["quote.steps.step{$i}_desc"]->localized('value') }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
