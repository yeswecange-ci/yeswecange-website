@extends('layouts.site')

@php $en = app()->getLocale() === 'en'; @endphp

@section('title', $article->localized('title') . ' — YesWeCange')
@section('meta_description', $article->localized('excerpt'))

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $article->localized('title'),
    'description' => $article->localized('excerpt'),
    'datePublished' => optional($article->published_at)->toIso8601String(),
    'dateModified' => $article->updated_at->toIso8601String(),
    'image' => $article->cover_image ? asset('storage/'.$article->cover_image) : null,
    'author' => ['@type' => 'Organization', 'name' => 'YesWeCange'],
    'publisher' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
    'mainEntityOfPage' => route('blog.show', $article),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')

  <!-- BLOC 1 — HERO -->
  <section class="relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-5 pt-28 pb-14 sm:px-[30px] sm:pt-[120px]">
      <nav aria-label="{{ $en ? 'Breadcrumb' : 'Fil d\'Ariane' }}" class="mb-[18px]">
        <ol class="flex flex-wrap items-center gap-2 text-[13px] font-semibold">
          <li><a href="{{ route('home') }}" class="text-ywc-text-muted no-underline transition hover:text-ywc-blue">{{ __('site.nav.home') }}</a></li>
          <li aria-hidden="true" class="text-ywc-text-pale">/</li>
          <li><a href="{{ route('blog.index') }}" class="text-ywc-text-muted no-underline transition hover:text-ywc-blue">Blog</a></li>
          <li aria-hidden="true" class="text-ywc-text-pale">/</li>
          <li><span aria-current="page" class="text-ywc-blue">{{ $article->localized('title') }}</span></li>
        </ol>
      </nav>

      <div data-breveal class="max-w-3xl">
        @if ($article->published_at)
          <div class="mb-4 text-[13px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">{{ $article->published_at->translatedFormat('d M Y') }}</div>
        @endif
        <h1 class="m-0 mb-4 font-display text-[clamp(28px,4vw,44px)] font-bold leading-[1.1] tracking-[-0.03em] text-ywc-ink">{{ $article->localized('title') }}</h1>
        <p class="m-0 text-[17px] leading-[1.6] text-ywc-text-soft">{{ $article->localized('excerpt') }}</p>
      </div>
    </div>
  </section>

  @if ($article->cover_image)
    <section class="mx-auto max-w-4xl px-5 pb-4 sm:px-[30px]">
      <div data-breveal class="overflow-hidden rounded-[24px]">
        <img src="{{ asset('storage/' . $article->cover_image) }}" alt="" width="1200" height="675" loading="eager" decoding="async" class="aspect-[16/9] w-full object-cover">
      </div>
    </section>
  @endif

  <!-- BLOC 2 — CONTENU -->
  <section class="mx-auto max-w-3xl px-5 py-14 sm:px-[30px]">

    @if ($articleIntro)
      <div data-breveal class="legal-prose mb-8">
        {!! $articleIntro !!}
      </div>
    @endif

    @if ($takeaways)
      <div data-breveal class="mb-8 overflow-hidden rounded-2xl border-l-[3px] border-ywc-blue bg-ywc-bg-soft p-6 sm:p-7">
        <div class="mb-3.5 flex items-center gap-2.5 text-[13px] font-bold uppercase tracking-[0.06em] text-ywc-blue">
          <x-icon name="key" class="h-4 w-4" />
          {{ $takeaways['title'] }}
        </div>
        <ul class="m-0 space-y-2.5 p-0" style="list-style:none">
          @foreach ($takeaways['items'] as $item)
            <li class="flex items-start gap-2.5 text-[14.5px] leading-[1.55] text-ywc-ink">
              <x-icon name="check" class="mt-[3px] h-4 w-4 flex-none text-ywc-blue" />
              <span>{{ $item }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (count($toc) > 2)
      <div data-breveal class="mb-10 rounded-2xl border border-ywc-border-soft bg-white p-6 sm:p-7">
        <div class="mb-4 flex items-center gap-2.5 text-[13px] font-bold uppercase tracking-[0.06em] text-ywc-text-muted">
          <x-icon name="list" class="h-4 w-4" />
          {{ $en ? 'Table of contents' : 'Sommaire' }}
        </div>
        <ol class="m-0 space-y-1 p-0" style="list-style:none">
          @foreach ($toc as $entry)
            <li>
              <a href="#{{ $entry['id'] }}" class="group flex items-center gap-3 rounded-lg py-2 no-underline transition hover:bg-ywc-bg-soft">
                <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-[12.5px] font-bold text-ywc-blue transition group-hover:bg-ywc-blue group-hover:text-white">{{ sprintf('%02d', $loop->iteration) }}</span>
                <span class="text-[14.5px] font-semibold text-ywc-text-soft transition group-hover:text-ywc-blue">{{ $entry['label'] }}</span>
              </a>
            </li>
          @endforeach
        </ol>
      </div>
    @endif

    <div data-breveal class="legal-prose">
      {!! $articleHtml !!}
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Ready to launch your project?' : 'Prêt à lancer votre projet ?',
    'lead' => $en ? 'Talk to our team and get a free audit.' : 'Échangez avec notre équipe et obtenez un audit gratuit.',
    'cta' => $en ? 'Request a free audit' : 'Demander un audit gratuit',
    'href' => route('quote'),
  ])

  @if ($related->isNotEmpty())
    <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px]">
      <div data-breveal class="mb-8 text-center">
        <h2 class="m-0 font-display text-[clamp(24px,2.6vw,32px)] font-bold tracking-[-0.02em] text-ywc-ink">{{ $en ? 'More articles' : 'À lire aussi' }}</h2>
      </div>
      <div data-breveal class="grid gap-7 sm:grid-cols-3">
        @foreach ($related as $item)
          <a href="{{ route('blog.show', $item) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-ywc-border-soft bg-white no-underline transition duration-300 hover:-translate-y-1 hover:border-ywc-border-blue hover:shadow-[0_24px_50px_-28px_rgba(10,10,15,0.22)]">
            <div class="aspect-[16/10] w-full overflow-hidden bg-ywc-bg-soft">
              @if ($item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" alt="" width="640" height="400" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
              @else
                <div class="flex h-full w-full items-center justify-center text-ywc-blue-pale">
                  <x-icon name="clipboard" class="h-10 w-10" />
                </div>
              @endif
            </div>
            <div class="p-5">
              <h3 class="m-0 mb-2 font-display text-[16px] font-bold leading-[1.25] tracking-[-0.01em] text-ywc-ink">{{ $item->localized('title') }}</h3>
              <span class="inline-flex items-center gap-1.5 text-[13px] font-bold text-ywc-blue">{{ $en ? 'Read' : 'Lire' }} →</span>
            </div>
          </a>
        @endforeach
      </div>
    </section>
  @endif

@endsection
