@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', ($en ? 'FAQ' : 'FAQ') . ' — YesWeCange')
@section('meta_description', $en
    ? 'Frequently asked questions about YesWeCange services, pricing, timelines and ways of working.'
    : 'Questions fréquentes sur les services, tarifs, délais et méthodes de travail de YesWeCange.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => 'FAQ',
    'title' => $en ? 'Frequently asked<br><span class="text-ywc-blue">questions</span>' : 'Questions<br><span class="text-ywc-blue">fréquentes</span>',
    'lead' => $en ? "Everything you need to know before starting a project with us." : "Tout ce qu'il faut savoir avant de démarrer un projet avec nous.",
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    @php
      $faqs = $en ? [
        ['Which services do you offer?', 'Strategy, social media & 360° communication, data mining, WhatsApp & web chatbots, SEO/SEA, branding and training. We can handle your full digital strategy or a single project.'],
        ['How much does a project cost?', 'Every project is unique. We send a tailored quote after a free discovery call, based on your goals and scope. Request a quote and we reply within 24h.'],
        ['How long does a project take?', 'A chatbot can go live in 2–3 weeks; a full branding or website project usually runs 4–10 weeks. We give you a clear timeline in the quote.'],
        ['Do you work remotely?', 'Yes. With teams in Paris and Abidjan, we work with clients across Europe, Africa and beyond — fully remote or on site when needed.'],
        ['What is the YesWeCange chatbot platform?', 'A conversational platform that automates customer relationships across 6 channels (WhatsApp, web, Messenger, SMS…), qualifies leads 24/7 and feeds your data.'],
        ['How do we get started?', 'Send us your project via the contact form or request a quote. We schedule a call, understand your needs, and send a tailored proposal.'],
      ] : [
        ['Quels services proposez-vous ?', "Stratégie, social media & communication 360°, data mining, chatbots WhatsApp & web, SEO/SEA, branding et formation. On peut piloter toute votre stratégie digitale ou un projet unique."],
        ['Combien coûte un projet ?', "Chaque projet est unique. On vous envoie un devis sur-mesure après un échange découverte gratuit, selon vos objectifs et le périmètre. Demandez un devis, on répond sous 24h."],
        ['Quels sont les délais ?', "Un chatbot peut être lancé en 2 à 3 semaines ; un projet de branding ou de site complet prend généralement 4 à 10 semaines. On vous donne un planning clair dans le devis."],
        ['Travaillez-vous à distance ?', "Oui. Avec des équipes à Paris et Abidjan, on travaille avec des clients en Europe, en Afrique et au-delà — 100% à distance ou sur site si besoin."],
        ['C\'est quoi la plateforme chatbot YesWeCange ?', "Une plateforme conversationnelle qui automatise la relation client sur 6 canaux (WhatsApp, web, Messenger, SMS…), qualifie vos leads 24/7 et nourrit votre data."],
        ['Comment démarre-t-on ?', "Envoyez-nous votre projet via le formulaire de contact ou demandez un devis. On planifie un échange, on comprend vos besoins, et on vous envoie une proposition sur-mesure."],
      ];
    @endphp
    <div data-breveal class="space-y-3">
      @foreach($faqs as $i => $faq)
        <details class="group rounded-2xl border border-ywc-border bg-white px-5 py-1 [&_summary::-webkit-details-marker]:hidden" @if($i === 0) open @endif>
          <summary class="flex cursor-pointer items-center justify-between gap-4 py-4 font-display text-[16.5px] font-bold tracking-[-0.01em] text-ywc-ink">
            {{ $faq[0] }}
            <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-ywc-blue transition group-open:rotate-45">+</span>
          </summary>
          <p class="m-0 pb-5 pr-10 text-[15px] leading-[1.65] text-ywc-text-soft">{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </section>

  @include('partials.cta-banner', [
    'title' => $en ? 'Still have a question?' : 'Une autre question ?',
    'lead' => $en ? "Reach out — our team replies within 24h." : "Écrivez-nous — notre équipe répond sous 24h.",
    'cta' => $en ? 'Contact us →' : 'Nous contacter →',
    'href' => route('contact'),
  ])

@endsection
