@php
    $seoTitle = trim($__env->yieldContent('title', config('app.name') . ' — Ne suivez pas le troupeau. Démarquez-vous.'));
    $seoDescription = trim($__env->yieldContent('meta_description', "YesWeCange, l'agence digitale 360° qui vous démarque. Stratégie, social media, data mining, chatbots WhatsApp, SEO et branding — entre Paris et Abidjan."));
    $seoImage = asset($__env->yieldContent('meta_image', 'images/troupeau-mouton-noir.png'));
    $canonical = $__env->yieldContent('canonical', url()->current());
@endphp
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="#2b4dff">
<link rel="icon" type="image/png" href="{{ asset('images/logo_ywc.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/logo_ywc.png') }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'fr_FR' }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:site" content="@yeswecange">

{{-- hreflang --}}
<link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
<link rel="alternate" hreflang="en" href="{{ url()->current() }}">
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

{{-- Données structurées : Organisation + bureaux --}}
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
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
            '@type' => 'PostalAddress',
            'streetAddress' => '176 avenue Charles de Gaulle',
            'postalCode' => '92200',
            'addressLocality' => 'Neuilly-sur-Seine',
            'addressCountry' => 'FR',
        ],
        [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Cocody, II Plateaux Vallons, Rue Des Jardins',
            'addressLocality' => 'Abidjan',
            'addressCountry' => 'CI',
        ],
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+33 1 71 04 07 21',
        'contactType' => 'sales',
        'areaServed' => ['FR', 'CI'],
        'availableLanguage' => ['French', 'English'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
