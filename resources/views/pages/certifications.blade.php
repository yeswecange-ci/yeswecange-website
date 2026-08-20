@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', 'Certifications — YesWeCange')
@section('meta_description', $texts['certifications.header.lead']->localized('value'))

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['certifications.header.eyebrow']->localized('value'),
    'title' => $texts['certifications.header.title']->localized('value'),
    'lead' => $texts['certifications.header.lead']->localized('value'),
  ])

@push('head')
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@graph": [
        {
        "@type": "CollectionPage",
        "@id": "https://yeswecange.com/certifications#webpage",
        "url": "https://yeswecange.com/certifications",
        "name": "Certifications et expertises | YesWeCange",
        "description": "Découvrez les certifications et partenariats professionnels de YesWeCange, témoignant de son expertise en marketing digital, publicité en ligne et transformation digitale.",
        "isPartOf": {
            "@id": "https://yeswecange.com/#website"
        },
        "about": {
            "@id": "https://yeswecange.com/#organization"
        },
        "mainEntity": {
            "@id": "https://yeswecange.com/certifications#certifications"
        }
        },
        {
        "@type": "ItemList",
        "@id": "https://yeswecange.com/certifications#certifications",
        "name": "Certifications et partenariats de YesWeCange",
        "numberOfItems": 4,
        "itemListElement": [
            {
            "@type": "ListItem",
            "position": 1,
            "item": {
                "@type": "EducationalOccupationalCredential",
                "@id": "https://yeswecange.com/certifications#facebook-marketing-partner",
                "name": "Facebook Marketing Partner",
                "credentialCategory": "Partenariat professionnel",
                "recognizedBy": {
                "@type": "Organization",
                "name": "Meta"
                },
                "about": {
                "@id": "https://yeswecange.com/#organization"
                }
            }
            },
            {
            "@type": "ListItem",
            "position": 2,
            "item": {
                "@type": "EducationalOccupationalCredential",
                "@id": "https://yeswecange.com/certifications#google-partner-premier",
                "name": "Google Partner Premier",
                "credentialCategory": "Partenariat professionnel",
                "recognizedBy": {
                "@type": "Organization",
                "name": "Google"
                },
                "about": {
                "@id": "https://yeswecange.com/#organization"
                }
            }
            },
            {
            "@type": "ListItem",
            "position": 3,
            "item": {
                "@type": "EducationalOccupationalCredential",
                "@id": "https://yeswecange.com/certifications#tiktok-marketing",
                "name": "Certification TikTok Marketing",
                "credentialCategory": "Certification professionnelle",
                "recognizedBy": {
                "@type": "Organization",
                "name": "TikTok"
                },
                "about": {
                "@id": "https://yeswecange.com/#organization"
                }
            }
            },
            {
            "@type": "ListItem",
            "position": 4,
            "item": {
                "@type": "EducationalOccupationalCredential",
                "@id": "https://yeswecange.com/certifications#fdfp",
                "name": "Certification FDFP",
                "credentialCategory": "Certification professionnelle",
                "recognizedBy": {
                "@type": "Organization",
                "name": "FDFP"
                },
                "about": {
                "@id": "https://yeswecange.com/#organization"
                }
            }
            }
        ]
        }
    ]
    }
    </script>
@endpush

  {{-- GRILLE CERTIFICATIONS --}}
  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    @php
      $certifications = \App\Models\Certification::orderBy('order_column')->get();
    @endphp

    <div data-breveal class="mx-auto mb-12 max-w-[680px] text-center">
      <div class="mb-3.5 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['certifications.section.eyebrow']->localized('value') }}</div>
      <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em]">{{ $texts['certifications.section.title']->localized('value') }}</h2>
    </div>

    <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($certifications as $cert)
        <div class="rounded-[18px] border border-ywc-border bg-white p-6">
          <img src="{{ asset('storage/' . $cert->logo) }}" alt="{{ $cert->localized('name') }}" width="2000" height="290" loading="lazy" decoding="async" class="mb-4 h-20 w-auto object-contain object-left">
          <h3 class="mb-1 font-display text-lg font-bold tracking-[-0.01em]">{{ $cert->localized('name') }}</h3>
          <p class="m-0 text-[14px] leading-[1.55] text-ywc-text-soft">{{ $cert->localized('issuer') }}</p>
        </div>
      @endforeach
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $texts['certifications.cta.title']->localized('value'),
    'lead' => $texts['certifications.cta.lead']->localized('value'),
    'cta' => $texts['certifications.cta.cta_label']->localized('value'),
    'href' => route('quote'),
  ])

@endsection
