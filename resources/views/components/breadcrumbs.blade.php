@props([
    'items' => [], // Array of ['name' => 'Label', 'url' => 'https://...'] (url optional for active last item)
])

@if(!empty($items))
@php
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [],
    ];

    $pos = 1;
    // Always include Home as first element
    $breadcrumbSchema['itemListElement'][] = [
        '@type' => 'ListItem',
        'position' => $pos++,
        'name' => 'Home',
        'item' => url('/'),
    ];

    foreach ($items as $item) {
        $breadcrumbSchema['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => $pos++,
            'name' => $item['name'],
            'item' => $item['url'] ?? url()->current(),
        ];
    }
@endphp

<!-- BreadcrumbList JSON-LD for Google Rich Results -->
<x-seo.json-ld :data="$breadcrumbSchema" />

<!-- Visual Breadcrumb Navigation -->
<nav aria-label="Breadcrumb" class="py-3 px-4 sm:px-0">
    <ol class="flex items-center flex-wrap gap-2 text-xs text-slate-500 font-medium">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1 hover:text-[#FFA500] transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 12 2-2m0 0 7-7 7 7M5 10v10a1 1 0 0 0 1 1h3m10-11 2 2m-2-2v10a1 1 0 0 1-1 1h-3m-6 0a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1m-6 0h6"/>
                </svg>
                <span>Home</span>
            </a>
        </li>
        @foreach($items as $index => $item)
            <li class="inline-flex items-center gap-2">
                <svg class="w-3 h-3 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                </svg>
                @if(!$loop->last && !empty($item['url']))
                    <a href="{{ $item['url'] }}" class="hover:text-[#FFA500] transition-colors">
                        {{ $item['name'] }}
                    </a>
                @else
                    <span class="text-slate-800 font-semibold truncate max-w-xs sm:max-w-md" aria-current="page">
                        {{ $item['name'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif
