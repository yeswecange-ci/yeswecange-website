@extends('layouts.site')

@section('title', __('site.legal.cookies_title') . ' — YesWeCange')
@section('meta_description', 'Politique de cookies du site YesWeCange : types de cookies, finalités et gestion du consentement.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.cookies_title'),
    'title' => __('site.legal.cookies_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  @include('partials.legal-body')

@endsection

@section('legal')
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
@endsection
