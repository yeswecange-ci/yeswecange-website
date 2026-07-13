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
      @if($en)

      <h2>Site publisher</h2>
      <p>
        This site is published by <strong>YesWeCange</strong>, a digital communication agency.<br>
        Legal form: [TO BE COMPLETED — e.g. SAS]<br>
        Share capital: [TO BE COMPLETED]<br>
        Registered office: 176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine, France<br>
        Abidjan office: Cocody, II Plateaux Vallons, Rue Des Jardins, Abidjan, Côte d'Ivoire<br>
        SIRET / RCS: [TO BE COMPLETED]<br>
        Intra-community VAT number: [TO BE COMPLETED]<br>
        Phone: +33 1 71 04 07 21<br>
        E-mail: contact@yeswecange.com
      </p>

      <h2>Publication director</h2>
      <p>[TO BE COMPLETED — Name of the legal representative]</p>

      <h2>Hosting</h2>
      <p>
        This site is hosted by: [TO BE COMPLETED — host name]<br>
        Address: [TO BE COMPLETED]<br>
        Phone: [TO BE COMPLETED]
      </p>

      <h2>Intellectual property</h2>
      <p>
        All content on this site (text, images, logos, visual identity, code) is the exclusive property
        of YesWeCange, unless otherwise stated. Any reproduction, representation or distribution, in whole
        or in part, without prior written authorisation, is prohibited and would constitute an infringement
        sanctioned under the French Intellectual Property Code.
      </p>

      <h2>Liability</h2>
      <p>
        YesWeCange strives to ensure the accuracy of the information published on this site, but cannot be
        held responsible for errors, omissions or unavailability. Links to third-party sites do not engage
        YesWeCange's responsibility regarding their content.
      </p>

      <h2>Personal data & cookies</h2>
      <p>
        The processing of your personal data is described in our
        <a href="{{ route('legal.privacy') }}">privacy policy</a> and our
        <a href="{{ route('legal.cookies') }}">cookie policy</a>.
      </p>

      @else

      <h2>Éditeur du site</h2>
      <p>
        Le présent site est édité par <strong>YesWeCange</strong>, agence de communication digitale.<br>
        Forme juridique : [À COMPLÉTER — ex. SAS]<br>
        Capital social : [À COMPLÉTER]<br>
        Siège social : 176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine, France<br>
        Agence d'Abidjan : Cocody, II Plateaux Vallons, Rue Des Jardins, Abidjan, Côte d'Ivoire<br>
        SIRET / RCS : [À COMPLÉTER]<br>
        Numéro de TVA intracommunautaire : [À COMPLÉTER]<br>
        Téléphone : +33 1 71 04 07 21<br>
        E-mail : contact@yeswecange.com
      </p>

      <h2>Directeur de la publication</h2>
      <p>[À COMPLÉTER — Nom du représentant légal]</p>

      <h2>Hébergement</h2>
      <p>
        Le site est hébergé par : [À COMPLÉTER — nom de l'hébergeur]<br>
        Adresse : [À COMPLÉTER]<br>
        Téléphone : [À COMPLÉTER]
      </p>

      <h2>Propriété intellectuelle</h2>
      <p>
        L'ensemble des contenus présents sur ce site (textes, images, logos, charte graphique, code)
        sont la propriété exclusive de YesWeCange, sauf mention contraire. Toute reproduction,
        représentation ou diffusion, totale ou partielle, sans autorisation écrite préalable, est interdite
        et constituerait une contrefaçon sanctionnée par le Code de la propriété intellectuelle.
      </p>

      <h2>Responsabilité</h2>
      <p>
        YesWeCange s'efforce d'assurer l'exactitude des informations diffusées sur ce site, mais ne saurait
        être tenue responsable des erreurs, omissions ou indisponibilités. Les liens vers des sites tiers
        n'engagent pas la responsabilité de YesWeCange quant à leur contenu.
      </p>

      <h2>Données personnelles & cookies</h2>
      <p>
        Le traitement de vos données personnelles est décrit dans notre
        <a href="{{ route('legal.privacy') }}">politique de confidentialité</a> et notre
        <a href="{{ route('legal.cookies') }}">politique de cookies</a>.
      </p>

      @endif
    </div>
  </section>

@endsection
