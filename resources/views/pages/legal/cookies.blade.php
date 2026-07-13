@php $en = app()->getLocale() === 'en'; @endphp
@extends('layouts.site')

@section('title', __('site.legal.cookies_title') . ' — YesWeCange')
@section('meta_description', $en ? 'YesWeCange cookie policy: cookie types, purposes and consent management.' : 'Politique de cookies du site YesWeCange : types de cookies, finalités et gestion du consentement.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.cookies_title'),
    'title' => __('site.legal.cookies_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="legal-prose">
      @if($en)

      <p>
        A cookie is a small file placed on your device when you visit a site. It allows your browser to be
        recognised and certain information to be retained.
      </p>

      <h2>Cookies we use</h2>
      <h3>Strictly necessary cookies</h3>
      <p>
        Essential for the site to function (session, security, remembering your language and cookie choice).
        They do not require your consent.
      </p>
      <h3>Audience measurement cookies</h3>
      <p>
        We use analytics tools (e.g. Google Analytics) to understand and improve site usage. They are only
        set after your consent.
      </p>
      <h3>Third-party cookies</h3>
      <p>
        Some content (social networks, chat tool) may set their own cookies, subject to the policies of their
        respective publishers.
      </p>

      <h2>Managing your consent</h2>
      <p>
        On your first visit, a banner lets you accept or reject non-essential cookies. You can change your
        choice at any time by deleting cookies from your browser, or via its settings:
      </p>
      <ul>
        <li>Chrome: Settings → Privacy and security → Cookies</li>
        <li>Firefox: Settings → Privacy & security</li>
        <li>Safari: Preferences → Privacy</li>
        <li>Edge: Settings → Cookies and site permissions</li>
      </ul>

      <h2>Learn more</h2>
      <p>
        For more information on how your data is processed, see our
        <a href="{{ route('legal.privacy') }}">privacy policy</a>.
      </p>

      @else

      <p>
        Un cookie est un petit fichier déposé sur votre terminal lors de la visite d'un site. Il permet de
        reconnaître votre navigateur et de conserver certaines informations.
      </p>

      <h2>Cookies que nous utilisons</h2>
      <h3>Cookies strictement nécessaires</h3>
      <p>
        Indispensables au fonctionnement du site (session, sécurité, mémorisation de votre langue et de votre
        choix en matière de cookies). Ils ne nécessitent pas votre consentement.
      </p>
      <h3>Cookies de mesure d'audience</h3>
      <p>
        Nous utilisons des outils d'analyse (ex. Google Analytics) pour comprendre l'usage du site et
        l'améliorer. Ils ne sont déposés qu'après votre consentement.
      </p>
      <h3>Cookies tiers</h3>
      <p>
        Certains contenus (réseaux sociaux, outil de chat) peuvent déposer leurs propres cookies, soumis aux
        politiques de leurs éditeurs respectifs.
      </p>

      <h2>Gérer votre consentement</h2>
      <p>
        Lors de votre première visite, un bandeau vous permet d'accepter ou de refuser les cookies non
        essentiels. Vous pouvez modifier votre choix à tout moment en supprimant les cookies de votre
        navigateur, ou via ses paramètres :
      </p>
      <ul>
        <li>Chrome : Paramètres → Confidentialité et sécurité → Cookies</li>
        <li>Firefox : Paramètres → Vie privée et sécurité</li>
        <li>Safari : Préférences → Confidentialité</li>
        <li>Edge : Paramètres → Cookies et autorisations de site</li>
      </ul>

      <h2>En savoir plus</h2>
      <p>
        Pour plus d'informations sur le traitement de vos données, consultez notre
        <a href="{{ route('legal.privacy') }}">politique de confidentialité</a>.
      </p>

      @endif
    </div>
  </section>

@endsection
