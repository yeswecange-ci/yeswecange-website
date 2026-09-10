@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', 'Nos Services — Stratégie, Publicité, Data & IA | YesWeCange')
@section('meta_description', "10 services pour une stratégie digitale complète : growth marketing, publicité, WhatsApp Business, tracking, SEO/IA search... Devis personnalisé.")

@section('content')

  @include('partials.page-header', [
    'eyebrow' => $texts['services.header.eyebrow']->localized('value'),
    'title' => $texts['services.header.title']->localized('value'),
    'lead' => $texts['services.header.lead']->localized('value'),
    'stats' => [
      ['value' => '08', 'label' => $texts['services.header.stat1_label']->localized('value')],
      ['value' => '360°', 'label' => $texts['services.header.stat2_label']->localized('value')],
      ['value' => '24/7', 'label' => $texts['services.header.stat3_label']->localized('value')],
    ],
  ])

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://yeswecange.com/services#webpage",
      "url": "https://yeswecange.com/services",
      "name": "Services | YesWeCange",
      "description": "Découvrez les services de YesWeCange en stratégie digitale, production de contenus, data analytics, publicité, SEO, IA, développement IT et automatisation.",
      "isPartOf": {
        "@id": "https://yeswecange.com/#website"
      },
      "about": {
        "@id": "https://yeswecange.com/#organization"
      },
      "mainEntity": {
        "@id": "https://yeswecange.com/services#services"
      }
    },
    {
      "@type": "ItemList",
      "@id": "https://yeswecange.com/services#services",
      "name": "Services proposés par YesWeCange",
      "numberOfItems": 10,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#strategie-omnicanale",
            "name": "Stratégie omnicanale",
            "serviceType": "Stratégie omnicanale",
            "description": "Nous définissons votre positionnement, vos messages, vos audiences et votre plan d’action pour construire une stratégie omnicanale cohérente, alignée sur vos objectifs business.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#production-kits-global",
            "name": "Production des kits global",
            "serviceType": "Production de contenus",
            "description": "Nous concevons et déclinons des contenus adaptés à vos différents canaux de communication pour renforcer votre visibilité, engager vos communautés et accompagner vos campagnes.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#datamining-analytics",
            "name": "Datamining & analytics",
            "serviceType": "Datamining et analytics",
            "description": "Nous exploitons vos données pour identifier les opportunités de croissance, optimiser vos parcours d’acquisition et de conversion et piloter vos performances à partir d’indicateurs clés.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 4,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#publicite-mobile",
            "name": "Publicité Mobile",
            "serviceType": "Publicité mobile",
            "description": "Nous concevons et optimisons des campagnes publicitaires adaptées aux usages mobiles afin d’atteindre les bonnes audiences, générer de l’engagement et améliorer vos performances d’acquisition.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 5,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#video",
            "name": "Vidéo",
            "serviceType": "Production vidéo",
            "description": "Nous créons des contenus vidéo à fort impact, de la captation au tournage, en passant par l’animation 2D/3D, l’animatique et le motion design, pour donner vie à vos projets.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 6,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#referencement-seo-ia-search",
            "name": "Référencement SEO & IA Search",
            "serviceType": "Référencement SEO et IA Search",
            "description": "Nous optimisons votre présence dans les moteurs de recherche et les nouveaux environnements de recherche alimentés par l’IA afin d’améliorer votre visibilité et votre capacité à être trouvé par vos audiences.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 7,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#digitalisation-ia-process",
            "name": "Digitalisation IA / process",
            "serviceType": "Digitalisation et automatisation par l’IA",
            "description": "Nous intégrons l’intelligence artificielle et les outils digitaux à vos processus pour automatiser certaines tâches, améliorer votre efficacité opérationnelle et fluidifier l’expérience client.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 8,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#developpement-it",
            "name": "Développement IT",
            "serviceType": "Développement informatique",
            "description": "Nous concevons des sites web, applications et plateformes sur mesure, pensés pour répondre à vos besoins métiers tout en offrant une expérience utilisateur performante.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 9,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#data-analytics",
            "name": "DATA analytics",
            "serviceType": "Data analytics",
            "description": "Nous transformons vos données en informations exploitables grâce à des tableaux de bord, des analyses et des indicateurs de performance qui facilitent vos décisions et l’optimisation de vos actions.",
            "provider": {
              "@id": "https://yeswecange.com/#organization"
            }
          }
        },
        {
          "@type": "ListItem",
          "position": 10,
          "item": {
            "@type": "Service",
            "@id": "https://yeswecange.com/services#chatbot-whatsapp",
            "name": "Chatbot WhatsApp",
            "serviceType": "Chatbot WhatsApp",
            "description": "Nous concevons des assistants conversationnels automatisés sur WhatsApp et d’autres canaux pour qualifier vos prospects, répondre aux demandes et assurer un accompagnement disponible 24h/24.",
            "provider": {
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


  <!-- PREUVE + TABLEAU DES SERVICES (format AEO) -->
{{--   <section class="mx-auto max-w-3xl px-5 pt-4 pb-14 sm:px-[30px]">
    <div data-breveal>
      <h2 class="m-0 mb-5 font-display text-[22px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[26px]">Nos 10 services</h2>
      <div class="overflow-x-auto rounded-2xl border border-ywc-border shadow-[0_20px_50px_-32px_rgba(10,10,15,0.18)]">
        <table class="w-full min-w-[480px] text-left text-[13.5px]">
          <thead>
            <tr class="bg-ywc-ink">
              <th scope="col" class="px-5 py-3.5 font-display text-[11.5px] font-bold uppercase tracking-[0.06em] text-white">Service</th>
              <th scope="col" class="px-5 py-3.5 font-display text-[11.5px] font-bold uppercase tracking-[0.06em] text-white">En bref</th>
            </tr>
          </thead>
          <tbody>
            @foreach ([
                ['Stratégie omnicanale', 'Un plan d\'action unique qui aligne tous vos canaux', 'Growth & Performance Marketing', '/expertise/growth-performance-marketing-afrique'],
                ['Production des kits global', 'Supports de communication cohérents pour tous vos marchés', null, null],
                ['Datamining & analytics', 'Transformer vos données en décisions', 'Tracking, Data & GTM/GA4', '/expertise/tracking-data-ga4-gtm'],
                ['Publicité mobile', 'Campagnes pensées pour un usage 100% mobile', 'Google Ads & Meta Ads Afrique', '/expertise/google-ads-meta-ads-afrique'],
                ['Vidéo', 'Contenus vidéo pour les réseaux sociaux et la publicité', null, null],
                ['Référencement SEO & IA Search', 'Être visible sur Google et dans les IA génératives', 'SEO, GEO & AEO', '/expertise/seo-geo-aeo'],
                ['Digitalisation IA / process', 'Automatiser sans perdre en qualité', 'IA Marketing & Automatisation', '/expertise/ia-marketing-automatisation'],
                ['Développement IT', 'Sites web et outils sur mesure', null, null],
                ['DATA analytics', 'Reporting et pilotage de la performance', null, null],
                ['Chatbot WhatsApp', 'Support client et vente automatisés', 'WhatsApp Business API', '/expertise/whatsapp-business-api'],
            ] as $i => [$service, $brief, $seeAlsoLabel, $seeAlsoHref])
              <tr class="border-t border-ywc-border-soft transition hover:bg-ywc-bg-soft {{ $i % 2 === 1 ? 'bg-ywc-bg-faint' : 'bg-white' }}">
                <td class="px-5 py-4 align-top">
                  <span class="flex items-center gap-2 font-display font-bold text-ywc-ink">
                    <span class="h-1.5 w-1.5 flex-none rounded-full bg-ywc-blue"></span>
                    {{ $service }}
                  </span>
                </td>
                <td class="px-5 py-4 align-top text-ywc-text-soft">
                  <div class="flex flex-col items-start gap-1.5">
                    <span>{{ $brief }}</span>
                    @if ($seeAlsoHref)
                      <a href="{{ $seeAlsoHref }}" class="inline-flex items-center gap-1 rounded-full bg-ywc-bg-soft px-2.5 py-1 text-[12px] font-bold text-ywc-blue no-underline transition hover:bg-ywc-blue hover:text-white">{{ $seeAlsoLabel }} →</a>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section> --}}

  <!-- SERVICES GRID (visuel) -->
  @php
    $services = \App\Models\Service::orderBy('order_column')->get();
  @endphp

  @push('head')
  <script type="application/ld+json">
  {!! json_encode([
      '@@context' => 'https://schema.org',
      '@type' => 'ItemList',
      'name' => $en ? 'YesWeCange services' : 'Services YesWeCange',
      'itemListElement' => $services->values()->map(fn ($s, $i) => [
          '@type' => 'ListItem',
          'position' => $i + 1,
          'item' => [
              '@type' => 'Service',
              'name' => $s->localized('title'),
              'description' => $s->localized('description'),
              'provider' => ['@type' => 'Organization', 'name' => 'YesWeCange', 'url' => url('/')],
              'areaServed' => ['FR', 'CI'],
          ],
      ])->all(),
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
  </script>
  @endpush

  <section class="mx-auto max-w-7xl px-5 py-16 sm:px-[30px] sm:py-20">
    <h2 class="m-0 mb-5 font-display text-[22px] font-bold leading-[1.15] tracking-[-0.02em] text-ywc-ink sm:text-[26px]">Nos 10 services</h2>
    <div data-breveal class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($services as $s)
        <article class="group flex flex-col overflow-hidden rounded-[20px] border border-ywc-border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-[0_30px_60px_-30px_rgba(10,10,15,0.28)] {{ $s->feature ? 'sm:col-span-2 lg:col-span-1' : '' }}">
          @isset($s->image)
            <div class="relative aspect-[16/10] overflow-hidden">
              <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->localized('title') }}" width="600" height="375" loading="lazy" decoding="async" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
              <span class="absolute left-3.5 top-3.5 rounded-full bg-white/90 px-2.5 py-1 font-display text-[11px] font-bold text-ywc-blue shadow-sm">{{ sprintf('%02d', $loop->iteration) }}</span>
            </div>
          @endisset
          <div class="flex flex-1 flex-col p-6">
            @unless($s->image)
              <span class="mb-3 font-display text-[11px] font-bold text-ywc-blue">{{ sprintf('%02d', $loop->iteration) }}</span>
            @endunless
            <h3 class="m-0 mb-2 font-display text-[17px] font-bold leading-[1.2] tracking-[-0.01em]">{{ $s->localized('title') }}</h3>
            <p class="m-0 mb-4 flex-1 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ $s->localized('description') }}</p>
            <div class="flex flex-wrap gap-1.5">
              @foreach ($s->localized('tags') as $tag)
                <span class="rounded-full bg-ywc-bg-soft px-2.5 py-1 text-[11.5px] font-semibold text-ywc-text-soft">{{ $tag }}</span>
              @endforeach
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </section>

 {{--  <!-- MAILLAGE — PAGES STRATÉGIQUES -->
  @php
    $expertisePages = collect(config('strategic_pages.expertise'))->map(fn ($p, $slug) => ['label' => $p['h1'], 'href' => '/expertise/'.$slug]);
    $localPages = collect(config('strategic_pages.local'))->map(fn ($p, $slug) => ['label' => $p['h1'], 'href' => '/agence-digitale-'.$slug]);
    $secteurPages = collect(config('strategic_pages.secteur'))->map(fn ($p, $slug) => ['label' => $p['h1'], 'href' => '/secteurs/'.$slug]);
  @endphp
  <section class="mx-auto max-w-7xl px-5 pb-16 sm:px-[30px]">
    <div data-breveal class="rounded-[24px] border border-ywc-border-soft bg-ywc-bg-soft p-7 sm:p-8">
      <div class="mb-4 text-[12px] font-bold uppercase tracking-[0.08em] text-ywc-text-muted">Nos expertises, zones et secteurs</div>
      <div class="flex flex-wrap gap-2.5">
        @foreach ($expertisePages->merge($secteurPages)->merge($localPages) as $link)
          <a href="{{ $link['href'] }}" class="rounded-full border border-ywc-border-soft bg-white px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft no-underline transition hover:border-ywc-border-blue hover:text-ywc-blue">{{ $link['label'] }}</a>
        @endforeach
      </div>
    </div>
  </section> --}}

  <!-- NOTRE METHODE -->
  <section class="bg-ywc-ink py-24 text-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-[30px]">
      <div data-breveal class="mb-[42px]">
        <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue-pale">{{ $texts['services.method.eyebrow']->localized('value') }}</div>
        <h2 class="m-0 max-w-[600px] font-display text-[clamp(28px,3.2vw,42px)] font-bold leading-[1.08] tracking-[-0.02em] text-white">{{ $texts['services.method.title']->localized('value') }}</h2>
      </div>
      <div data-breveal class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach (range(1, 4) as $step)
          <div class="rounded-[16px] border border-[#20222e] bg-white/[0.02] p-6">
            <div class="font-display text-2xl font-bold text-ywc-blue-pale">{{ sprintf('%02d', $step) }}</div>
            <h3 class="mt-3 mb-1.5 font-display text-[15px] font-bold tracking-[-0.01em] text-white">{{ $texts["services.method.step{$step}_title"]->localized('value') }}</h3>
            <p class="m-0 text-[13px] leading-[1.5] text-[#a8afc0]">{{ $texts["services.method.step{$step}_desc"]->localized('value') }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- A LA UNE · CHATBOTS -->
  <section class="mx-auto max-w-7xl px-5 py-20 sm:px-[30px]">
    <div data-breveal class="overflow-hidden rounded-[24px] bg-ywc-bg-soft p-8 sm:p-10">
      <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
          <div class="mb-3 text-[13px] font-bold uppercase tracking-[0.08em] text-ywc-blue">{{ $texts['services.featured.eyebrow']->localized('value') }}</div>
          <h2 class="m-0 mb-3 font-display text-[26px] font-bold leading-[1.1] tracking-[-0.02em]">{{ $texts['services.featured.title']->localized('value') }}</h2>
          <p class="m-0 mb-7 max-w-[440px] text-[14.5px] leading-[1.6] text-ywc-text-soft">{{ $texts['services.featured.paragraph']->localized('value') }}</p>
          <a href="https://api.whatsapp.com/send/?phone=2250777787780&text=Bonjour+%EF%BF%BD%2C+je+viens+du+site+YesWeCange+et+j%27aimerais+en+savoir+plus.&type=phone_number&app_absent=0" class="inline-flex items-center gap-2 rounded-xl bg-ywc-blue px-6 py-3 text-sm font-bold text-white no-underline transition hover:bg-ywc-blue-mid">{{ $texts['services.featured.cta_label']->localized('value') }}</a>
        </div>
        <div class="flex justify-center">
          <div class="relative w-full max-w-[300px] rounded-[30px] border border-[#262936] bg-[#15171f] p-[11px] shadow-[0_40px_80px_-30px_rgba(0,0,0,0.5)]">
            <div class="overflow-hidden rounded-[26px] bg-white">
              <div class="flex items-center gap-2.5 bg-ywc-whatsapp px-4 py-[15px] text-white">
                <span class="flex h-[34px] w-[34px] items-center justify-center overflow-hidden rounded-full bg-white"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange" class="h-[28px] w-[28px]"></span>
                <div class="leading-[1.2]"><div class="text-[14.5px] font-bold">YesWeCange</div><div class="text-[11px] opacity-80">WhatsApp Business</div></div>
              </div>
              <div id="ywc-chatb-services" class="flex min-h-[308px] flex-col gap-2.5 bg-[#e9e2db] p-3.5 [background-image:radial-gradient(rgba(0,0,0,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
              <div class="flex items-center gap-2.5 bg-[#f2f2f2] px-3.5 py-[11px]">
                <div class="flex-1 rounded-full bg-white px-3.5 py-2 text-[12.5px] text-ywc-text-faint">{{ $en ? 'Write a message…' : 'Écrivez un message…' }}</div>
                <span class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-ywc-whatsapp text-white">➤</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  @php $servicesFaq = config('strategic_pages.core.services.faq', []); @endphp
  @if (count($servicesFaq))
    @push('head')
    <script type="application/ld+json">
    {!! json_encode([
        '@@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => collect($servicesFaq)->map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
        ])->all(),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @endpush
    <section class="mx-auto max-w-3xl px-5 pb-16 sm:px-[30px]">
      <h2 class="m-0 mb-6 font-display text-[24px] font-bold leading-[1.1] tracking-[-0.02em] text-ywc-ink sm:text-[28px]">Questions fréquentes</h2>
      <div data-breveal>
        <x-faq-accordion :items="$servicesFaq" />
      </div>
    </section>
  @endif

  @include('partials.cta-banner', [
    'title' => $texts['services.cta.title']->localized('value'),
    'lead' => $texts['services.cta.lead']->localized('value'),
    'cta' => $texts['services.cta.cta_label']->localized('value'),
    'href' => route('quote'),
  ])

@endsection
