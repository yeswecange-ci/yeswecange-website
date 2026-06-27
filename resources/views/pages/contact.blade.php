@extends('layouts.site')

@section('title', __('site.contact.title') . ' — YesWeCange')
@section('meta_description', __('site.contact.lead'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.contact.eyebrow'),
    'title' => __('site.contact.title'),
    'lead' => __('site.contact.lead'),
  ])

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-[60px]">

      {{-- Formulaire --}}
      <div data-breveal class="rounded-[24px] border border-ywc-border bg-white p-6 shadow-[0_30px_70px_-44px_rgba(10,10,15,0.25)] sm:p-8">
        @include('partials.lead-form', ['type' => 'contact'])
      </div>

      {{-- Coordonnées --}}
      <aside data-breveal class="grid content-start gap-4">
        <a href="tel:+33171040721" class="block rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6 no-underline transition hover:border-ywc-border-blue">
          <div class="mb-[7px] flex items-center gap-2 text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue"><span>📍</span>{{ __('site.contact.paris') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine</div>
          <div class="mt-1 text-[15px] font-semibold text-ywc-blue">+33 1 71 04 07 21</div>
        </a>
        <a href="tel:+22558467951" class="block rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6 no-underline transition hover:border-ywc-border-blue">
          <div class="mb-[7px] flex items-center gap-2 text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue"><span>📍</span>{{ __('site.contact.abidjan') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">Cocody, II Plateaux Vallons, Rue Des Jardins</div>
          <div class="mt-1 text-[15px] font-semibold text-ywc-blue">+225 58 46 79 51</div>
        </a>
        <a href="mailto:contact@yeswecange.com" class="block rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6 no-underline transition hover:border-ywc-border-blue">
          <div class="mb-[7px] flex items-center gap-2 text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue"><span>✉️</span>E-mail</div>
          <div class="text-[15px] font-semibold text-ywc-text">contact@yeswecange.com</div>
        </a>
        <div class="rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6">
          <div class="mb-[7px] flex items-center gap-2 text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue"><span>🕘</span>{{ __('site.contact.hours') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">{{ __('site.contact.hours_value') }}</div>
        </div>
      </aside>
    </div>
  </section>

  {{-- CARTES --}}
  <section class="mx-auto max-w-7xl px-5 pb-20 sm:px-[30px]">
    <div data-breveal class="grid gap-5 lg:grid-cols-2">
      <div class="overflow-hidden rounded-[22px] border border-ywc-border">
        <div class="flex items-center justify-between bg-white px-5 py-3.5 text-[13px] font-bold text-ywc-ink">
          <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-ywc-blue"></span>{{ __('site.contact.paris') }}</span>
          <a href="https://www.google.com/maps/search/?api=1&query=176+avenue+Charles+de+Gaulle+92200+Neuilly-sur-Seine" target="_blank" rel="noopener" class="text-[12px] font-semibold text-ywc-blue no-underline hover:underline">{{ app()->getLocale() === 'en' ? 'Open map ↗' : 'Ouvrir ↗' }}</a>
        </div>
        <iframe title="{{ __('site.contact.paris') }}" src="https://www.openstreetmap.org/export/embed.html?bbox=2.2585%2C48.8796%2C2.2785%2C48.8896&layer=mapnik&marker=48.8846%2C2.2685" width="100%" height="300" style="border:0;display:block" loading="lazy"></iframe>
      </div>
      <div class="overflow-hidden rounded-[22px] border border-ywc-border">
        <div class="flex items-center justify-between bg-white px-5 py-3.5 text-[13px] font-bold text-ywc-ink">
          <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-ywc-green"></span>{{ __('site.contact.abidjan') }}</span>
          <a href="https://www.google.com/maps/search/?api=1&query=Cocody+II+Plateaux+Vallons+Rue+des+Jardins+Abidjan" target="_blank" rel="noopener" class="text-[12px] font-semibold text-ywc-blue no-underline hover:underline">{{ app()->getLocale() === 'en' ? 'Open map ↗' : 'Ouvrir ↗' }}</a>
        </div>
        <iframe title="{{ __('site.contact.abidjan') }}" src="https://www.openstreetmap.org/export/embed.html?bbox=-3.9970%2C5.3510%2C-3.9770%2C5.3610&layer=mapnik&marker=5.3560%2C-3.9870" width="100%" height="300" style="border:0;display:block" loading="lazy"></iframe>
      </div>
    </div>
  </section>

@endsection
