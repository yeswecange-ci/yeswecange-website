@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'Certifications' : 'Certifications') . ' — YesWeCange')
@section('meta_description', $en
    ? 'The certifications and partnerships that back up our expertise, between Paris and Abidjan.'
    : "Les certifications et partenariats qui garantissent notre expertise, entre Paris et Abidjan.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $en ? 'Certifications' : 'Certifications',
    'title' => $en ? 'Expertise you can<br><span class="text-ywc-blue">verify.</span>' : 'Une expertise<br><span class="text-ywc-blue">vérifiable.</span>',
    'lead' => $en
        ? "The certifications and partnerships that back up the way we work."
        : "Les certifications et partenariats qui garantissent la façon dont nous travaillons.",
  ])

  {{-- GRILLE CERTIFICATIONS --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    @php
      // TODO: compléter organisme/année et déposer les fichiers logo dans public/images
      $certifications = [
        ['name' => $en ? 'Facebook Marketing Partner Certification' : 'Certification Facebook Marketing Partner', 'issuer' => $en ? 'Issuing body' : 'Organisme émetteur', 'logo' => 'certifications/FB.jpg'],
        ['name' => $en ? 'Google Partner Premier Certification' : 'Certification Google Partner Premier', 'issuer' => $en ? 'Issuing body' : 'Organisme émetteur', 'logo' => 'certifications/GP.png'],
        ['name' => $en ? 'TikTok Marketing Certification' : 'Certification TikTok Marketing', 'issuer' => $en ? 'Issuing body' : 'Organisme émetteur', 'logo' => 'certifications/tiktok.png'],
        ['name' => $en ? 'FDFP Certification' : 'Certification FDFP', 'issuer' => $en ? 'Issuing body' : 'Organisme émetteur', 'logo' => 'certifications/FDFP.jpeg'],
      ];
    @endphp

    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $en ? 'Our credentials' : 'Nos accréditations' }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $en ? 'Recognised expertise' : 'Une expertise reconnue' }}</h2>
    </div>

    <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($certifications as $cert)
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <img src="{{ asset('images/' . $cert['logo']) }}" alt="{{ $cert['name'] }}" width="2000" height="290" loading="lazy" decoding="async" class="mb-4 h-20 w-auto object-contain object-left">
          <h3 class="mb-1 font-display text-lg font-bold tracking-[-0.01em]">{{ $cert['name'] }}</h3>
          <p class="m-0 text-[14px] leading-[1.55] text-ywc-text-soft">{{ $cert['issuer'] }}</p>
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
