@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', __('site.quote.title') . ' — YesWeCange')
@section('meta_description', __('site.quote.lead'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.quote.eyebrow'),
    'title' => __('site.quote.title'),
    'lead' => __('site.quote.lead'),
  ])

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-[56px]">

      {{-- Colonne arguments --}}
      <aside data-breveal class="lg:sticky lg:top-28 lg:self-start">
        <h2 class="m-0 mb-5 font-display text-[clamp(22px,2.4vw,30px)] font-bold leading-[1.12] tracking-[-0.02em]">{{ $en ? 'A tailored proposal, no strings attached.' : 'Une proposition sur-mesure, sans engagement.' }}</h2>

        @php
          $perks = $en ? [
            ['Free & no commitment', 'Get a detailed quote at no cost.'],
            ['Reply within 24h', 'A real human gets back to you, fast.'],
            ['Custom-built', 'Scoped to your goals, budget and timeline.'],
            ['Paris × Abidjan experts', 'Two continents, one dedicated team.'],
          ] : [
            ['Gratuit & sans engagement', 'Recevez un devis détaillé, sans frais.'],
            ['Réponse sous 24h', "Un vrai humain vous recontacte, vite."],
            ['Sur-mesure', 'Calibré sur vos objectifs, budget et délais.'],
            ['Experts Paris × Abidjan', 'Deux continents, une équipe dédiée.'],
          ];
        @endphp
        <ul class="m-0 grid list-none gap-3.5 p-0">
          @foreach ($perks as $p)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-blue text-[13px] font-bold text-white">✓</span>
              <div>
                <div class="font-display text-[15px] font-bold tracking-[-0.01em]">{{ $p[0] }}</div>
                <div class="text-[13.5px] leading-[1.5] text-ywc-text-soft">{{ $p[1] }}</div>
              </div>
            </li>
          @endforeach
        </ul>

        <div class="mt-7 flex items-center gap-4 rounded-2xl bg-ywc-ink p-5 text-white">
          <span class="flex h-11 w-11 flex-none items-center justify-center overflow-hidden rounded-xl bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-9 w-9"></span>
          <p class="m-0 text-[13.5px] leading-[1.5] text-[#c5cbd8]">{{ $en ? '+120 projects delivered · 94% client retention across 2 continents.' : '+120 projets livrés · 94% de clients fidèles sur 2 continents.' }}</p>
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
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'How it works' : 'Comment ça marche' }}</div>
        <h2 class="m-0 font-display text-[clamp(24px,3vw,38px)] font-bold tracking-[-0.02em]">{{ $en ? 'Three steps to your quote' : 'Trois étapes vers votre devis' }}</h2>
      </div>
      @php
        $steps = $en ? [
          ['01', 'You describe your project', 'Fill in the form — a few lines are enough to get started.'],
          ['02', 'We study & scope it', 'Our team analyses your needs and prepares a tailored proposal.'],
          ['03', 'You get your quote', 'A clear, detailed quote within 24 hours. No commitment.'],
        ] : [
          ['01', 'Vous décrivez votre projet', 'Remplissez le formulaire — quelques lignes suffisent pour démarrer.'],
          ['02', 'On étudie & cadre', 'Notre équipe analyse vos besoins et prépare une proposition sur-mesure.'],
          ['03', 'Vous recevez votre devis', 'Un devis clair et détaillé sous 24h. Sans engagement.'],
        ];
      @endphp
      <div data-breveal class="grid gap-4 sm:grid-cols-3">
        @foreach ($steps as $st)
          <div class="rounded-[18px] border border-ywc-border bg-white p-6">
            <div class="font-display text-2xl font-bold text-ywc-blue">{{ $st[0] }}</div>
            <h3 class="mt-3 mb-1.5 font-display text-[15.5px] font-bold tracking-[-0.01em]">{{ $st[1] }}</h3>
            <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $st[2] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
