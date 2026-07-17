@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'About us' : 'À propos') . ' — YesWeCange')
@section('meta_description', $en
    ? "YesWeCange: the digital agency that refuses consensus. Our manifesto, our values and why 94% of our clients never leave — between Paris and Abidjan."
    : "YesWeCange, l'agence digitale qui refuse le consensus. Notre manifeste, nos valeurs et pourquoi 94% de nos clients ne repartent jamais ailleurs — entre Paris et Abidjan.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $en ? 'About us' : 'À propos',
    'title' => $en ? 'We don\'t sell consensus.<br>We sell <span class="text-ywc-blue">difference.</span>' : 'On ne vend pas du consensus.<br>On vend la <span class="text-ywc-blue">différence.</span>',
    'lead' => $en
        ? "YesWeCange exists for one reason: sameness kills brands. We build identities that get noticed, remembered and chosen — between Paris and Abidjan."
        : "YesWeCange existe pour une seule raison : la ressemblance tue les marques. Nous construisons des identités qui se remarquent, se retiennent et se préfèrent — entre Paris et Abidjan.",
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
            <p>We've seen too many brands choose safety: the same palette, the same tone, the same promise seen a thousand times elsewhere. The result: nobody remembers them.</p>
            <p>At YesWeCange, we start from the opposite principle. A brand that never bothers anyone interests no one. Our work begins where consensus ends.</p>
            <p>Born between Paris and Abidjan, we combine the rigor of European marketing with the energy of African markets — without ever diluting one into the other.</p>
          @else
            <p>On a vu trop de marques choisir la sécurité : la même palette, le même ton, la même promesse vue mille fois ailleurs. Résultat : personne ne s'en souvient.</p>
            <p>Chez YesWeCange, on part du principe inverse. Une marque qui ne dérange jamais personne n'intéresse personne. Notre travail commence là où s'arrête le consensus.</p>
            <p>Nées entre Paris et Abidjan, nos équipes combinent la rigueur du marketing européen à l'énergie des marchés africains — sans jamais diluer l'un dans l'autre.</p>
          @endif
        </div>
      </div>
    </div>
  </section>

  {{-- CHIFFRES --}}
  <section class="border-y border-ywc-border-soft bg-ywc-bg-soft">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
      <div data-breveal class="grid grid-cols-2 gap-8 text-center lg:grid-cols-4">
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-blue">+120</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'brands that stopped blending in' : 'marques qui ont arrêté de se fondre dans la masse' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">2</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'continents, one team' : 'continents, une seule équipe' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">94%</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'never look elsewhere again' : 'ne repartent jamais ailleurs' }}</div></div>
        <div><div class="font-display text-4xl font-bold tracking-[-0.02em] text-ywc-ink">6</div><div class="mt-1 text-[14px] text-ywc-text-muted">{{ $en ? 'channels, one conversation' : 'canaux, une seule conversation' }}</div></div>
      </div>
    </div>
  </section>

  {{-- FIDELITE --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'The real difference' : 'La vraie différence' }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $en ? 'One client. No second thoughts.' : "Un client. Plus aucune arrière-pensée." }}</h2>
    </div>

    <div data-breveal class="grid gap-4 lg:grid-cols-2 lg:items-stretch">
      {{-- Ailleurs --}}
      <div class="rounded-[24px] border border-ywc-border bg-ywc-bg-soft p-8 sm:p-9">
        <div class="mb-6 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-text-muted">{{ $en ? 'Elsewhere' : 'Ailleurs' }}</div>
        <ul class="m-0 grid list-none gap-4 p-0">
          @php
            $painPoints = $en ? [
              'A new project manager every renewal.',
              'You re-explain your brand from scratch.',
              'Radio silence between two missions.',
            ] : [
              'Un nouveau chef de projet à chaque renouvellement.',
              'On réexplique la marque depuis le début.',
              'Silence radio entre deux missions.',
            ];
          @endphp
          @foreach ($painPoints as $point)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-border text-[12px] font-bold text-ywc-text-muted">✕</span>
              <span class="text-[15px] leading-[1.5] text-ywc-text-muted line-through decoration-ywc-text-pale">{{ $point }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      {{-- Chez YesWeCange --}}
      <div class="relative overflow-hidden rounded-[24px] bg-ywc-ink p-8 text-white sm:p-9">
        <div class="absolute -top-20 -right-20 h-[260px] w-[260px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.28),transparent_60%)]"></div>
        <div class="relative mb-6 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">YesWeCange</div>
        <ul class="relative m-0 grid list-none gap-4 p-0">
          @php
            $wins = $en ? [
              'The same team, who knows your brand by heart.',
              'Zero reset, zero friction.',
              'We stay close, even between missions.',
            ] : [
              'La même équipe, qui connaît votre marque par cœur.',
              'Zéro remise à zéro, zéro friction.',
              'On reste présents, même sans mission en cours.',
            ];
          @endphp
          @foreach ($wins as $win)
            <li class="flex items-start gap-3">
              <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-ywc-blue text-[13px] font-bold text-white">✓</span>
              <span class="text-[15px] leading-[1.5] text-[#edf1ff]">{{ $win }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div data-breveal class="mx-auto mt-4 max-w-3xl rounded-[24px] border border-ywc-border bg-white p-8 text-center sm:p-10">
      <div class="font-display text-[clamp(40px,5vw,64px)] font-bold leading-none tracking-[-0.03em] text-ywc-blue">94%</div>
      <p class="m-0 mt-3 text-[16px] leading-[1.6] text-ywc-text-soft">{{ $en
        ? "Once a client works with us, they never look elsewhere again."
        : "Une fois qu'un client travaille avec nous, il ne repart plus jamais ailleurs." }}</p>
    </div>
  </section>

  {{-- VALEURS --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our values' : 'Nos valeurs' }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $en ? 'Six non-negotiables' : 'Six lignes qu\'on ne franchit jamais' }}</h2>
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
          [$iconTarget, 'Boldness', 'The safe idea is the one we throw out first. If it looks like everyone else\'s, it\'s not ready.'],
          [$iconChart, 'Data-driven', 'Opinions are a starting point, not a decision. Every choice is checked against audiences, KPIs, results.'],
          [$iconUsers, 'Partnership', 'We\'re not a vendor you renew. We\'re a team you keep — that\'s the whole point.'],
          [$iconZap, 'Reactivity', 'You get an answer within 24h, always. We move before you have to ask twice.'],
          [$iconGlobe, 'Dual culture', 'Paris sets the rigor, Abidjan sets the energy. Neither one waters down the other.'],
          [$iconRocket, 'Innovation', 'Chatbots, AI, automation: we ship what others are still presenting in slide decks.'],
        ] : [
          [$iconTarget, 'Audace', "L'idée trop sage, c'est la première qu'on jette. Si elle ressemble à celle du concurrent, elle n'est pas prête."],
          [$iconChart, 'Data-driven', "L'opinion est un point de départ, jamais une décision. Chaque choix est confronté aux audiences, aux KPIs, aux résultats."],
          [$iconUsers, 'Partenariat', "On n'est pas un prestataire qu'on renouvelle. On est une équipe qu'on garde — c'est tout l'enjeu."],
          [$iconZap, 'Réactivité', "Une réponse sous 24h, toujours. On avance avant que vous ayez à redemander."],
          [$iconGlobe, 'Double culture', "Paris impose la rigueur, Abidjan apporte l'énergie. Aucune des deux ne dilue l'autre."],
          [$iconRocket, 'Innovation', "Chatbots, IA, automatisation : on livre ce que d'autres présentent encore en PowerPoint."],
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
