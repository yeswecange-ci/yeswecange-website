@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', __('site.legal.mentions_title') . ' — YesWeCange')
@section('meta_description', $en ? 'Legal notice for the YesWeCange website.' : 'Mentions légales du site YesWeCange.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.mentions_title'),
    'title' => __('site.legal.mentions_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="legal-prose">
      {!! $page->localized('body') !!}
    </div>
  </section>

@endsection
