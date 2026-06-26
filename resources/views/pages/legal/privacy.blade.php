@extends('layouts.site')

@section('title', __('site.legal.privacy_title') . ' — YesWeCange')
@section('meta_description', 'Politique de confidentialité et protection des données personnelles (RGPD) de YesWeCange.')

@section('content')

  @include('partials.page-header', [
    'eyebrow' => __('site.legal.privacy_title'),
    'title' => __('site.legal.privacy_title'),
    'lead' => __('site.legal.updated') . ' : ' . now()->format('d/m/Y'),
  ])

  @include('partials.legal-body')

@endsection

@section('legal')
  <p>
    YesWeCange accorde une grande importance à la protection de vos données personnelles. La présente
    politique explique quelles données nous collectons, pourquoi, et quels sont vos droits, conformément
    au Règlement Général sur la Protection des Données (RGPD – UE 2016/679) et à la législation ivoirienne
    applicable.
  </p>

  <h2>1. Responsable du traitement</h2>
  <p>
    Le responsable du traitement est YesWeCange, dont les coordonnées figurent dans les
    <a href="{{ route('legal.mentions') }}">mentions légales</a>.<br>
    Contact pour toute question relative à vos données : <strong>privacy@yeswecange.com</strong>
  </p>

  <h2>2. Données collectées</h2>
  <ul>
    <li><strong>Données de formulaire</strong> : nom, e-mail, téléphone, entreprise, message, budget et services souhaités, lorsque vous nous contactez ou demandez un devis.</li>
    <li><strong>Données de navigation</strong> : adresse IP, type de navigateur, pages consultées, via des cookies et outils de mesure d'audience.</li>
    <li><strong>Données issues de nos services conversationnels</strong> (chatbots, WhatsApp) lorsque vous interagissez avec eux.</li>
  </ul>

  <h2>3. Finalités & bases légales</h2>
  <ul>
    <li>Répondre à vos demandes de contact et de devis — base : votre consentement / mesures précontractuelles.</li>
    <li>Gérer la relation commerciale et le suivi de projet — base : exécution du contrat / intérêt légitime.</li>
    <li>Améliorer notre site et mesurer l'audience — base : votre consentement (cookies).</li>
    <li>Vous adresser des communications — base : votre consentement, révocable à tout moment.</li>
  </ul>

  <h2>4. Destinataires</h2>
  <p>
    Vos données sont destinées aux équipes habilitées de YesWeCange (Paris, Abidjan) et à nos
    sous-traitants techniques (hébergement, e-mailing, analytics) qui s'engagent contractuellement à les
    protéger. Aucune donnée n'est vendue à des tiers.
  </p>

  <h2>5. Durée de conservation</h2>
  <p>
    Les données de prospection sont conservées 3 ans à compter du dernier contact. Les données liées à un
    contrat sont conservées pendant la durée légale applicable (généralement jusqu'à 10 ans pour les
    obligations comptables).
  </p>

  <h2>6. Transferts hors UE</h2>
  <p>
    Notre activité s'exerçant entre l'Europe et l'Afrique, certaines données peuvent être traitées en
    Côte d'Ivoire. Ces transferts sont encadrés par des garanties appropriées (clauses contractuelles types).
  </p>

  <h2>7. Vos droits</h2>
  <p>
    Vous disposez d'un droit d'accès, de rectification, d'effacement, de limitation, d'opposition et de
    portabilité de vos données, ainsi que du droit de définir des directives post-mortem. Pour les exercer,
    écrivez à <strong>privacy@yeswecange.com</strong>. Vous pouvez également introduire une réclamation
    auprès de la CNIL (France) ou de l'ARTCI (Côte d'Ivoire).
  </p>

  <h2>8. Cookies</h2>
  <p>
    La gestion des cookies est détaillée dans notre
    <a href="{{ route('legal.cookies') }}">politique de cookies</a>.
  </p>
@endsection
