@extends('layouts.site')

@php $en = app()->getLocale() === 'en'; @endphp

@section('title', $en ? 'Blog — YesWeCange' : 'Blog — YesWeCange')
@section('meta_description', $en
  ? 'Articles, advice and news from YesWeCange on digital strategy in French-speaking Africa.'
  : "Articles, conseils et actualités de YesWeCange sur la stratégie digitale en Afrique francophone.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => 'Blog',
    'title' => $en ? 'Our advice & news' : 'Nos conseils & actualités',
    'lead' => $en
      ? 'Digital strategy, web, SEO and chatbots — analysis and feedback from the YesWeCange team.'
      : "Stratégie digitale, web, SEO et chatbots — analyses et retours d'expérience de l'équipe YesWeCange.",
  ])

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
    @if ($articles->isEmpty())
      <div data-breveal class="rounded-[24px] border border-ywc-border-soft bg-ywc-bg-soft p-10 text-center">
        <p class="m-0 text-[15.5px] text-ywc-text-soft">{{ $en ? 'No articles published yet — check back soon.' : 'Aucun article publié pour le moment — revenez bientôt.' }}</p>
      </div>
    @else
      <div data-breveal class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($articles as $article)
          <a href="{{ route('blog.show', $article) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ywc-border-soft bg-white no-underline transition duration-300 hover:-translate-y-1 hover:border-ywc-border-blue hover:shadow-[0_24px_50px_-28px_rgba(10,10,15,0.22)]">
            <div class="aspect-[16/10] w-full overflow-hidden bg-ywc-bg-soft">
              @if ($article->cover_image)
                <img src="{{ asset('storage/' . $article->cover_image) }}" alt="" width="640" height="400" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
              @else
                <div class="flex h-full w-full items-center justify-center text-ywc-blue-pale">
                  <x-icon name="clipboard" class="h-10 w-10" />
                </div>
              @endif
            </div>
            <div class="flex flex-1 flex-col p-5 sm:p-6">
              @if ($article->published_at)
                <div class="mb-2 text-[12px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">{{ $article->published_at->translatedFormat('d M Y') }}</div>
              @endif
              <h2 class="m-0 mb-2 font-display text-[18px] font-bold leading-[1.25] tracking-[-0.01em] text-ywc-ink">{{ $article->localized('title') }}</h2>
              <p class="m-0 mb-4 flex-1 text-[14.5px] leading-[1.6] text-ywc-text-soft">{{ $article->localized('excerpt') }}</p>
              <span class="inline-flex items-center gap-1.5 text-[13.5px] font-bold text-ywc-blue">{{ $en ? 'Read the article' : "Lire l'article" }} →</span>
            </div>
          </a>
        @endforeach
      </div>

      @if ($articles->hasPages())
        <div data-breveal class="mt-10">
          {{ $articles->onEachSide(1)->links() }}
        </div>
      @endif
    @endif
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Ready to launch your project?' : 'Prêt à lancer votre projet ?',
    'lead' => $en ? 'Talk to our team and get a free audit.' : 'Échangez avec notre équipe et obtenez un audit gratuit.',
    'cta' => $en ? 'Request a free audit' : 'Demander un audit gratuit',
    'href' => route('quote'),
  ])

@endsection
