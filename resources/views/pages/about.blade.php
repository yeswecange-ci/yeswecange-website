@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'About us' : 'À propos') . ' — YesWeCange')
@section('meta_description', $en
    ? 'YesWeCange: the digital agency that makes you stand out. Our story, mission and values, between Paris and Abidjan.'
    : "YesWeCange, l'agence digitale qui vous démarque. Notre histoire, notre mission et nos valeurs, entre Paris et Abidjan.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $en ? 'About us' : 'À propos',
    'title' => $en ? 'We help brands<br><span class="text-ywc-blue">stand out.</span>' : 'Nous aidons les marques<br>à <span class="text-ywc-blue">se démarquer.</span>',
    'lead' => $en
        ? "More than an online presence: we shape digital identities that outperform the competition — across two continents."
        : "Bien plus qu'une présence en ligne : nous façonnons des identités digitales qui surclassent la concurrence — sur deux continents.",
  ])

  {{-- MANIFESTE --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16 lg:items-center">
      <div data-breveal class="overflow-hidden rounded-[24px] border border-ywc-border">
        <img src="{{ asset('images/troupeau-mouton-noir.webp') }}" alt="{{ $en ? 'A black sheep standing out in a white flock' : 'Un mouton noir au milieu d\'un troupeau blanc' }}" width="1200" height="800" loading="lazy" decoding="async" class="h-full w-full object-cover">
      </div>
      <div data-breveal>
        <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our manifesto' : 'Notre manifeste' }}</div>
        <h2 class="m-0 mb-5 font-display text-[clamp(26px,3.2vw,40px)] font-bold leading-[1.08] tracking-[-0.03em]">{{ $en ? "Don't follow the flock." : 'Ne suivez pas le troupeau.' }}</h2>
        <div class="space-y-4 text-[16px] leading-[1.7] text-ywc-text-soft">
          @if($en)
            <p>In a world where everyone communicates the same way, blending in means disappearing. We believe every brand has something singular — and our job is to reveal it.</p>
            <p>Born between Paris and Abidjan, YesWeCange combines European marketing rigor with the energy and creativity of African markets. This dual culture is our strength: we think globally and act locally.</p>
          @else
            <p>Dans un monde où tout le monde communique de la même façon, se fondre dans la masse, c'est disparaître. Nous croyons que chaque marque a une singularité — et notre métier, c'est de la révéler.</p>
            <p>Née entre Paris et Abidjan, YesWeCange allie la rigueur du marketing européen à l'énergie et la créativité des marchés africains. Cette double culture est notre force : penser global, agir local.</p>
          @endif
        </div>
      </div>
    </div>
  </section>

  {{-- CHIFFRES --}}
  <section class="border-y border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
      <div data-breveal class="grid grid-cols-2 gap-8 text-center lg:grid-cols-4">
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-blue">+120</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'projects delivered' : 'projets livrés' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">2</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'continents' : 'continents' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">94%</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'client retention' : 'de clients fidèles' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">6</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'chatbot channels' : 'canaux chatbot' }}</div></div>
      </div>
    </div>
  </section>

  {{-- VALEURS --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our values' : 'Nos valeurs' }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $en ? 'What drives us every day' : 'Ce qui nous anime au quotidien' }}</h2>
    </div>
    <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      @php
        $iconAttrs = 'width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';
        $iconTarget = "<svg $iconAttrs><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><circle cx=\"12\" cy=\"12\" r=\"6\"></circle><circle cx=\"12\" cy=\"12\" r=\"2\"></circle></svg>";
        $iconChart = "<svg $iconAttrs><line x1=\"18\" y1=\"20\" x2=\"18\" y2=\"10\"></line><line x1=\"12\" y1=\"20\" x2=\"12\" y2=\"4\"></line><line x1=\"6\" y1=\"20\" x2=\"6\" y2=\"14\"></line></svg>";
        $iconUsers = "<svg $iconAttrs><path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"></path><circle cx=\"9\" cy=\"7\" r=\"4\"></circle><path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"></path><path d=\"M16 3.13a4 4 0 0 1 0 7.75\"></path></svg>";
        $iconZap = "<svg $iconAttrs><polygon points=\"13 2 3 14 12 14 11 22 21 10 12 10 13 2\"></polygon></svg>";
        $iconGlobe = "<svg $iconAttrs><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><line x1=\"2\" y1=\"12\" x2=\"22\" y2=\"12\"></line><path d=\"M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z\"></path></svg>";
        $iconRocket = "<svg $iconAttrs><path d=\"M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z\"></path><path d=\"M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z\"></path><path d=\"M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0\"></path><path d=\"M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5\"></path></svg>";

        $values = $en ? [
          [$iconTarget, 'Boldness', 'We dare the ideas that make brands stand out, never the safe and forgettable.'],
          [$iconChart, 'Data-driven', 'Every decision is backed by data: audiences, KPIs, measurable results.'],
          [$iconUsers, 'Partnership', 'We grow with our clients, as a long-term partner — not a one-shot vendor.'],
          [$iconZap, 'Reactivity', 'A response within 24h, a team that anticipates instead of reacting.'],
          [$iconGlobe, 'Dual culture', 'Paris × Abidjan: a global vision rooted in local realities.'],
          [$iconRocket, 'Innovation', 'Chatbots, AI, automation — we bring tomorrow\'s tools today.'],
        ] : [
          [$iconTarget, 'Audace', "On ose les idées qui démarquent, jamais le consensuel qu'on oublie."],
          [$iconChart, 'Data-driven', 'Chaque décision est nourrie par la donnée : audiences, KPIs, résultats mesurables.'],
          [$iconUsers, 'Partenariat', "On grandit avec nos clients, comme un partenaire de long terme — pas un prestataire one-shot."],
          [$iconZap, 'Réactivité', 'Une réponse sous 24h, une équipe qui anticipe au lieu de subir.'],
          [$iconGlobe, 'Double culture', 'Paris × Abidjan : une vision globale ancrée dans les réalités locales.'],
          [$iconRocket, 'Innovation', "Chatbots, IA, automatisation — on apporte les outils de demain dès aujourd'hui."],
        ];
      @endphp
      @foreach($values as $v)
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <div class="mb-3 text-2xl text-ywc-blue">{!! $v[0] !!}</div>
          <h3 class="mb-2 font-display text-lg font-bold tracking-[-0.01em]">{{ $v[1] }}</h3>
          <p class="m-0 text-[14px] leading-[1.55] text-ywc-text-soft">{{ $v[2] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Ready to stand out?' : 'Prêt à vous démarquer ?',
    'lead' => $en ? "Tell us about your project — we'll reply within 24h." : "Parlez-nous de votre projet — on vous répond sous 24h.",
    'cta' => $en ? 'Start a project →' : 'Démarrer un projet →',
    'href' => route('quote'),
  ])

@endsection
