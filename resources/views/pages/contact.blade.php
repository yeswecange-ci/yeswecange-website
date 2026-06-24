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
      <div data-breveal>
        @include('partials.lead-form', ['type' => 'contact'])
      </div>

      <aside data-breveal class="grid content-start gap-5">
        <div class="rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6">
          <div class="mb-[7px] text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue">{{ __('site.contact.paris') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine</div>
          <a href="tel:+33171040721" class="mt-1 inline-block text-[15px] font-semibold text-ywc-blue no-underline">+33 1 71 04 07 21</a>
        </div>
        <div class="rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6">
          <div class="mb-[7px] text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue">{{ __('site.contact.abidjan') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">Cocody, II Plateaux Vallons, Rue Des Jardins</div>
          <a href="tel:+2255846795 1" class="mt-1 inline-block text-[15px] font-semibold text-ywc-blue no-underline">+225 58 46 79 51</a>
        </div>
        <div class="rounded-2xl border border-ywc-border bg-ywc-bg-soft p-6">
          <div class="mb-[7px] text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue">{{ __('site.contact.hours') }}</div>
          <div class="text-[15px] leading-[1.5] text-ywc-text">{{ __('site.contact.hours_value') }}</div>
        </div>
      </aside>
    </div>
  </section>

@endsection
