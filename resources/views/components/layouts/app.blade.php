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
    $pageDescription = $description ?? 'Explore the world of entertainment — from blockbuster movies and binge-worthy TV series to talented actors, visionary directors, reviews, and streaming platform guides.';
    $canonicalUrl = $canonical ?? url()->current();
    $pageOgImage = $ogImage ?? asset('Tonight OnScreen Logo.png');

    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'TonightOnScreen',
        'url' => url('/'),
        'description' => 'Discover Movies, TV Shows & Talent All in One Place',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => url('/explore') . '?q={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];

    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'TonightOnScreen',
        'url' => url('/'),
        'logo' => asset('Tonight OnScreen Logo Icon.png'),
        'description' => 'Your ultimate cinema & television entertainment discovery platform.',
        'sameAs' => [
            'https://twitter.com/TonightOnScreen',
            'https://facebook.com/TonightOnScreen',
            'https://instagram.com/TonightOnScreen',
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Modular SEO Meta Tags -->
    <x-seo.meta
        :title="$title"
        :description="$description"
        :canonical="$canonical"
        :og-image="$ogImage"
        :og-type="$ogType"
        :robots="$robots"
    />

    <!-- Google Fonts: Plus Jakarta Sans & Caveat & Instrument Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7R0B0YSZ6Q"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-7R0B0YSZ6Q');
    </script>
    <!-- Favicon & Brand Icons -->
    <link rel="icon" type="image/png" href="{{ asset('Tonight OnScreen Logo Icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('Tonight OnScreen Logo Icon.png') }}">

    <!-- Structured Data: WebSite & Organization -->
    <x-seo.json-ld :data="$websiteSchema" />
    <x-seo.json-ld :data="$organizationSchema" />

    @stack('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] text-[#010629] antialiased font-sans flex flex-col min-h-screen selection:bg-[#010629] selection:text-[#FFA500]">
    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />

    @stack('scripts')
</body>
</html>
