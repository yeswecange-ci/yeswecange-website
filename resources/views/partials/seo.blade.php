@php
    $seoEn = app()->getLocale() === 'en';
    $seoTitle = trim($__env->yieldContent('title', config('app.name') . ($seoEn ? ' — Don\'t follow the flock. Stand out.' : ' — Ne suivez pas le troupeau. Démarquez-vous.')));
    $seoDescription = trim($__env->yieldContent('meta_description', $seoEn
        ? 'YesWeCange, the 360° digital agency that makes you stand out. Strategy, social media, data mining, WhatsApp chatbots, SEO and branding — between Paris and Abidjan.'
        : "YesWeCange, l'agence digitale 360° qui vous démarque. Stratégie, social media, data mining, chatbots WhatsApp, SEO et branding — entre Paris et Abidjan."));
    $seoImagePath = $__env->yieldContent('meta_image', 'images/og-cover.jpg');
    $seoImage = asset($seoImagePath);
    [$seoImageW, $seoImageH] = @getimagesize(public_path($seoImagePath)) ?: [1200, 630];
    $canonical = $__env->yieldContent('canonical', url()->current());
    $seoLocale = app()->getLocale() === 'en' ? 'en_US' : 'fr_FR';
    $seoAltLocale = app()->getLocale() === 'en' ? 'fr_FR' : 'en_US';
@endphp
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<meta name="author" content="{{ config('app.name') }}">
<meta name="theme-color" content="#2b4dff">
<link rel="icon" type="image/png" href="{{ asset('images/logo_ywc.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/logo_ywc.png') }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:width" content="{{ $seoImageW }}">
<meta property="og:image:height" content="{{ $seoImageH }}">
<meta property="og:image:alt" content="{{ $seoTitle }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:locale" content="{{ $seoLocale }}">
<meta property="og:locale:alternate" content="{{ $seoAltLocale }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:image:alt" content="{{ $seoTitle }}">
<meta name="twitter:site" content="@yeswecange">

{{-- hreflang --}}
<link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
<link rel="alternate" hreflang="en" href="{{ url()->current() }}">
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

{{-- Données structurées : Organisation + bureaux --}}
<script type="application/ld+json">
{{-- JSON-LD : arobases doublees pour les echapper cote Blade (sinon la directive context casse la page en 500). --}}
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'Organization',
    'name' => 'YesWeCange',
    'url' => url('/'),
    'logo' => asset('images/logo_ywc.png'),
    'description' => $seoDescription,
    'sameAs' => [
        'https://www.facebook.com/Yes-We-Cange-668925849823227/',
        'https://twitter.com/yeswecange',
        'https://fr.linkedin.com/company/yeswecange',
        'https://www.instagram.com/yeswecangeagency/',
    ],
    'address' => [
        [
            '@@type' => 'PostalAddress',
            'streetAddress' => '176 avenue Charles de Gaulle',
            'postalCode' => '92200',
            'addressLocality' => 'Neuilly-sur-Seine',
            'addressCountry' => 'FR',
        ],
        [
            '@@type' => 'PostalAddress',
            'streetAddress' => 'Cocody, II Plateaux Vallons, Rue Des Jardins',
            'addressLocality' => 'Abidjan',
            'addressCountry' => 'CI',
        ],
    ],
    'contactPoint' => [
        '@@type' => 'ContactPoint',
        'telephone' => '+33 1 71 04 07 21',
        'contactType' => 'sales',
        'areaServed' => ['FR', 'CI'],
        'availableLanguage' => ['French', 'English'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

{{-- Données structurées : Site web --}}
<script type="application/ld+json">
{{-- JSON-LD : arobases doublees pour les echapper cote Blade (sinon la directive context casse la page en 500). --}}
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'WebSite',
    'name' => 'YesWeCange',
    'alternateName' => 'YWC',
    'url' => url('/'),
    'inLanguage' => app()->getLocale() === 'en' ? 'en' : 'fr',
    'publisher' => [
        '@@type' => 'Organization',
        'name' => 'YesWeCange',
        'logo' => asset('images/logo_ywc.png'),
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
