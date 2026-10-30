@props([
    'title' => null,
    'description' => null,
    'canonical' => null,
    'ogImage' => null,
    'ogType' => 'website',
    'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
])

@php
    $pageTitle = $title ?? 'TonightOnScreen — Discover Movies, TV Shows & Talent All in One Place';
    $pageDescription = \App\Support\SeoHelper::cleanMetaDescription($description);
    $canonicalUrl = $canonical ?? url()->current();
    $pageOgImage = $ogImage ?? asset('Tonight OnScreen Logo.png');
@endphp

<!-- Primary Search Engine SEO Meta -->
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="TonightOnScreen">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:image" content="{{ $pageOgImage }}">
<meta property="og:locale" content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageOgImage }}">
