@extends('layouts.site')

@section('title', __('site.legal.terms_title') . ' — YesWeCange')
@section('meta_description', 'Conditions générales de vente et d\'utilisation des prestations YesWeCange.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.terms_title'),
    'title' => __('site.legal.terms_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  <section class="mx-auto max-w-3xl px-5 py-16 sm:px-[30px] sm:py-20">
    <div data-breveal class="legal-prose">

      <p>
        Les présentes conditions générales régissent les prestations de services fournies par YesWeCange à ses
        clients. Toute commande implique l'acceptation sans réserve des présentes conditions. Elles peuvent être
        complétées par des conditions particulières figurant dans le devis ou le contrat signé.
      </p>

      <h2>1. Objet & prestations</h2>
      <p>
        YesWeCange fournit des prestations de stratégie digitale, communication, social media, data mining,
        chatbots, référencement, branding et formation, selon le périmètre défini dans chaque devis.
      </p>

      <h2>2. Devis & commande</h2>
      <p>
        Chaque prestation fait l'objet d'un devis détaillé. Le devis est valable 30 jours. La commande est
        ferme à réception du devis signé et, le cas échéant, de l'acompte prévu.
      </p>

      <h2>3. Tarifs & paiement</h2>
      <p>
        Les prix sont indiqués hors taxes ; la TVA applicable est ajoutée selon la réglementation en vigueur.
        Sauf mention contraire, les conditions de règlement et l'échéancier sont précisés au devis. Tout retard
        de paiement entraîne des pénalités au taux légal ainsi que l'indemnité forfaitaire de recouvrement
        prévue par la loi.
      </p>

      <h2>4. Obligations du client</h2>
      <p>
        Le client s'engage à fournir en temps utile l'ensemble des éléments, accès et validations nécessaires à
        la bonne exécution des prestations. Les retards qui lui sont imputables peuvent décaler le planning.
      </p>

      <h2>5. Propriété intellectuelle</h2>
      <p>
        Les livrables ne sont cédés au client qu'après paiement intégral. YesWeCange conserve le droit de
        mentionner les réalisations à titre de référence, sauf accord de confidentialité contraire.
      </p>

      <h2>6. Confidentialité & données</h2>
      <p>
        Chaque partie s'engage à préserver la confidentialité des informations échangées. Le traitement des
        données personnelles est régi par notre
        <a href="{{ route('legal.privacy') }}">politique de confidentialité</a>.
      </p>

      <h2>7. Responsabilité</h2>
      <p>
        YesWeCange est tenue à une obligation de moyens. Sa responsabilité ne saurait excéder le montant des
        sommes effectivement perçues au titre de la prestation concernée.
      </p>

      <h2>8. Droit applicable & litiges</h2>
      <p>
        Les présentes conditions sont soumises au droit français. En cas de litige, une solution amiable sera
        recherchée avant toute action judiciaire. À défaut, compétence est attribuée aux tribunaux du ressort
        du siège social de YesWeCange.
      </p>

      <p><em>[À COMPLÉTER : conditions particulières, délais de rétractation éventuels, médiateur de la consommation le cas échéant.]</em></p>

    </div>
  </section>

@endsection
