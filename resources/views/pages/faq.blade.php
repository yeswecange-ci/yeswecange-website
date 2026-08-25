@php
  $en = app()->getLocale() === 'en';
@endphp
@extends('layouts.site')

@section('title', 'FAQ — YesWeCange')
@section('meta_description', $texts['faq.header.lead']->localized('value'))

@push('head')
<script type="application/ld+json">
{{-- JSON-LD : arobases doublees pour les echapper cote Blade (sinon la directive context casse la page en 500). --}}
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'FAQPage',
    'mainEntity' => $faqItems->map(fn ($faq) => [
        '@@type' => 'Question',
        'name' => $faq->localized('question'),
        'acceptedAnswer' => ['@@type' => 'Answer', 'text' => $faq->localized('answer')],
    ])->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['faq.header.eyebrow']->localized('value'),
    'title' => $texts['faq.header.title']->localized('value'),
    'lead' => $texts['faq.header.lead']->localized('value'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="space-y-3">
      @foreach($faqItems as $i => $faq)
        <details class="group rounded-2xl border border-ywc-border bg-white px-5 py-1 [&_summary::-webkit-details-marker]:hidden" @if($i === 0) open @endif>
          <summary class="flex cursor-pointer items-center justify-between gap-4 py-4 font-display text-[16.5px] font-bold tracking-[-0.01em] text-ywc-ink">
            {{ $faq->localized('question') }}
            <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-ywc-blue transition group-open:rotate-45">+</span>
          </summary>
          <p class="m-0 pb-5 pr-10 text-[15px] leading-[1.65] text-ywc-text-soft">{{ $faq->localized('answer') }}</p>
        </details>
      @endforeach
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $texts['faq.cta.title']->localized('value'),
    'lead' => $texts['faq.cta.lead']->localized('value'),
    'cta' => $texts['faq.cta.cta_label']->localized('value'),
    'href' => route('contact'),
  ])

@endsection
