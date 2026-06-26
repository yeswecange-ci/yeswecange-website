@extends('layouts.site')

@section('title', __('site.quote.title') . ' — YesWeCange')
@section('meta_description', __('site.quote.lead'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.quote.eyebrow'),
    'title' => __('site.quote.title'),
    'lead' => __('site.quote.lead'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="rounded-[24px] border border-ywc-border bg-white p-6 shadow-[0_30px_70px_-40px_rgba(10,10,15,0.25)] sm:p-10">
      @include('partials.lead-form', ['type' => 'quote'])
    </div>
  </section>

@endsection
