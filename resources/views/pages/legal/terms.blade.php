@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', __('site.legal.terms_title') . ' — YesWeCange')
@section('meta_description', $en ? 'Terms of sale and use of YesWeCange services.' : 'Conditions générales de vente et d\'utilisation des prestations YesWeCange.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.terms_title'),
    'title' => __('site.legal.terms_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="legal-prose">
      {!! $page->localized('body') !!}
    </div>
  </section>

@endsection
