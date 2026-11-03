@php
    $itemListElements = [];
    foreach ($titles as $idx => $t) {
        $itemListElements[] = [
            '@type' => 'ListItem',
            'position' => $titles->firstItem() + $idx,
            'url' => route('title.show', $t->slug),
            'name' => $t->title,
        ];
    }
    $exploreSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'itemListElement' => $itemListElements,
    ];
@endphp

<x-layouts.app :title="'Explore Movies, TV Shows & Streaming Titles — TonightOnScreen'">
    @push('head')
        <!-- Schema.org ItemList JSON-LD for Search Engine SEO -->
        <x-seo.json-ld :data="$exploreSchema" />
    @endpush

    @php
        $activeGenre = $genres->firstWhere('slug', $filters['genre']);
        $activePlatform = $platforms->firstWhere('slug', $filters['platform']);

        $pageTitle = 'Explore Entertainment';
        if ($filters['type'] === 'movie') $pageTitle = 'Explore Movies';
        elseif ($filters['type'] === 'tv_series') $pageTitle = 'Explore TV Series';

        if ($activeGenre) $pageTitle .= ' • ' . $activeGenre->name;
        if ($activePlatform) $pageTitle .= ' on ' . $activePlatform->name;

        $hasActiveFilters = !empty($filters['q']) || $filters['type'] !== 'all' || !empty($filters['genre']) || !empty($filters['platform']) || !empty($filters['rating']) || $filters['sort'] !== 'trending';
    @endphp

    <div class="bg-[#f8fafc] min-h-screen pb-20">
        <!-- 1. Header & Search Command Section -->
        <div class="bg-[#010629] text-white pt-10 pb-12 px-4 sm:px-6 lg:px-8 border-b border-[#0d163f] relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 right-1/3 w-80 h-80 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-1/4 w-80 h-80 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-slate-200">Explore Catalog</span>
                </nav>

                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
                    <div>
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/10 text-[11px] font-bold uppercase tracking-wider text-amber-400 mb-2 border border-white/10 shadow-xs">
                            <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" alt="TonightOnScreen" class="w-3.5 h-3.5 rounded-xs object-contain">
                            <span>TonightOnScreen Catalog</span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                            {{ $pageTitle }}
                        </h1>
                        <p class="text-xs sm:text-sm text-slate-400 mt-1 max-w-xl">
                            Search our curated catalog of cinema releases, binge-worthy series, and where to stream them.
                        </p>
                    </div>

                    <!-- Search Input Form -->
                    <form action="{{ route('explore') }}" method="GET" class="w-full md:w-96 relative">
                        <input type="hidden" name="type" value="{{ $filters['type'] }}">
                        @if($filters['genre']) <input type="hidden" name="genre" value="{{ $filters['genre'] }}"> @endif
                        @if($filters['platform']) <input type="hidden" name="platform" value="{{ $filters['platform'] }}"> @endif
                        @if($filters['rating']) <input type="hidden" name="rating" value="{{ $filters['rating'] }}"> @endif
                        @if($filters['sort'] !== 'trending') <input type="hidden" name="sort" value="{{ $filters['sort'] }}"> @endif

                        <div class="relative">
                            <input 
                                type="text" 
                                name="q" 
                                value="{{ $filters['q'] }}" 
                                placeholder="Search by title, overview, or cast..."
                                class="w-full bg-white/10 text-white placeholder-slate-400 text-xs rounded-xl pl-10 pr-10 py-3 border border-white/10 focus:border-amber-400 focus:outline-none focus:bg-white/15 transition-all shadow-inner"
                            >
                            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>

                            @if(!empty($filters['q']))
                                <a href="{{ route('explore', array_merge(request()->except('q'), ['page' => 1])) }}" class="absolute right-3.5 top-3.5 text-slate-400 hover:text-white" title="Clear search">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- 2. Fast Filter Pills Bar -->
                <div class="space-y-4 pt-4 border-t border-white/10">
                    <!-- Format Switcher & Reset -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-1.5 p-1 rounded-xl bg-white/5 border border-white/10">
                            <a 
                                href="{{ route('explore', array_merge(request()->except(['type', 'page']), ['type' => 'all'])) }}"
                                class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $filters['type'] === 'all' ? 'bg-amber-400 text-slate-950 shadow-xs' : 'text-slate-300 hover:text-white' }}"
                            >
                                All Titles
                            </a>
                            <a 
                                href="{{ route('explore', array_merge(request()->except(['type', 'page']), ['type' => 'movie'])) }}"
                                class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $filters['type'] === 'movie' ? 'bg-amber-400 text-slate-950 shadow-xs' : 'text-slate-300 hover:text-white' }}"
                            >
                                Movies
                            </a>
                            <a 
                                href="{{ route('explore', array_merge(request()->except(['type', 'page']), ['type' => 'tv_series'])) }}"
                                class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all {{ $filters['type'] === 'tv_series' ? 'bg-amber-400 text-slate-950 shadow-xs' : 'text-slate-300 hover:text-white' }}"
                            >
                                TV Series
                            </a>
                        </div>

                        <!-- Sort & Rating Controls -->
                        <form action="{{ route('explore') }}" method="GET" id="filterForm" class="flex flex-wrap items-center gap-2">
                            @foreach(request()->except(['sort', 'rating', 'page']) as $k => $v)
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endforeach

                            <!-- Rating Filter -->
                            <select 
                                name="rating" 
                                onchange="document.getElementById('filterForm').submit()" 
                                class="bg-white/10 text-white text-xs font-semibold px-3 py-2 rounded-xl border border-white/10 focus:border-amber-400 focus:outline-none cursor-pointer"
                            >
                                <option value="" class="bg-slate-900 text-white">All Ratings</option>
                                <option value="8.5" class="bg-slate-900 text-white" {{ $filters['rating'] == '8.5' ? 'selected' : '' }}>★ 8.5+ Masterpieces</option>
                                <option value="8.0" class="bg-slate-900 text-white" {{ $filters['rating'] == '8.0' ? 'selected' : '' }}>★ 8.0+ Highly Rated</option>
                                <option value="7.5" class="bg-slate-900 text-white" {{ $filters['rating'] == '7.5' ? 'selected' : '' }}>★ 7.5+ Recommended</option>
                            </select>

                            <!-- Sort Selector -->
                            <select 
                                name="sort" 
                                onchange="document.getElementById('filterForm').submit()" 
                                class="bg-white/10 text-white text-xs font-semibold px-3 py-2 rounded-xl border border-white/10 focus:border-amber-400 focus:outline-none cursor-pointer"
                            >
                                <option value="trending" class="bg-slate-900 text-white" {{ $filters['sort'] === 'trending' ? 'selected' : '' }}>Trending First</option>
                                <option value="rating_desc" class="bg-slate-900 text-white" {{ $filters['sort'] === 'rating_desc' ? 'selected' : '' }}>Highest Rated</option>
                                <option value="date_desc" class="bg-slate-900 text-white" {{ $filters['sort'] === 'date_desc' ? 'selected' : '' }}>Newest Releases</option>
                                <option value="title_asc" class="bg-slate-900 text-white" {{ $filters['sort'] === 'title_asc' ? 'selected' : '' }}>Title (A-Z)</option>
                            </select>

                            @if($hasActiveFilters)
                                <a 
                                    href="{{ route('explore') }}" 
                                    class="px-3 py-2 rounded-xl text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/30 hover:bg-rose-500/30 transition-colors"
                                >
                                    Reset
                                </a>
                            @endif
                        </form>
                    </div>

                    <!-- Genre Horizontal Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 text-xs">
                        <span class="text-slate-400 font-bold shrink-0 text-[11px] uppercase tracking-wider mr-1">Genres:</span>
                        <a 
                            href="{{ route('explore', array_merge(request()->except(['genre', 'page']), ['genre' => ''])) }}"
                            class="px-3 py-1.5 rounded-lg font-semibold shrink-0 transition-all {{ empty($filters['genre']) ? 'bg-white text-slate-950 font-bold' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                        >
                            All
                        </a>
                        @foreach($genres as $genre)
                            <a 
                                href="{{ route('explore', array_merge(request()->except(['genre', 'page']), ['genre' => $filters['genre'] === $genre->slug ? '' : $genre->slug])) }}"
                                class="px-3 py-1.5 rounded-lg font-semibold shrink-0 transition-all {{ $filters['genre'] === $genre->slug ? 'bg-amber-400 text-slate-950 font-bold' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                            >
                                {{ $genre->name }}
                            </a>
                        @endforeach
                    </div>

                    <!-- Streaming Platforms Horizontal Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 text-xs">
                        <span class="text-slate-400 font-bold shrink-0 text-[11px] uppercase tracking-wider mr-1">Stream On:</span>
                        <a 
                            href="{{ route('explore', array_merge(request()->except(['platform', 'page']), ['platform' => ''])) }}"
                            class="px-3 py-1 rounded-md font-semibold shrink-0 transition-all {{ empty($filters['platform']) ? 'bg-white text-slate-950 font-bold' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                        >
                            All Platforms
                        </a>
                        @foreach($platforms as $platform)
                            <a 
                                href="{{ route('explore', array_merge(request()->except(['platform', 'page']), ['platform' => $filters['platform'] === $platform->slug ? '' : $platform->slug])) }}"
                                class="px-3 py-1 rounded-md font-semibold shrink-0 transition-all {{ $filters['platform'] === $platform->slug ? 'bg-purple-500 text-white font-bold' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                            >
                                {{ $platform->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Results Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <div class="flex items-center justify-between text-xs text-slate-500 mb-6">
                <span>
                    Showing <strong class="text-slate-900">{{ $titles->firstItem() ?? 0 }}–{{ $titles->lastItem() ?? 0 }}</strong> of <strong class="text-slate-900">{{ $titles->total() }}</strong> titles
                </span>

                @if(!empty($filters['q']))
                    <span>Search results for: <strong class="text-slate-900">"{{ $filters['q'] }}"</strong></span>
                @endif
            </div>

            @if($titles->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-3xl border border-slate-200/80 p-12 text-center max-w-lg mx-auto shadow-sm my-12">
                    <div class="w-16 h-16 rounded-full bg-slate-100 mx-auto flex items-center justify-center text-slate-400 mb-4">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">No titles matched your criteria</h3>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        Try adjusting your keywords, broadening genre filters, or clearing platform filters to see more results.
                    </p>
                    <a href="{{ route('explore') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-slate-950 text-white text-xs font-semibold hover:bg-slate-800 transition-colors">
                        Clear all filters
                    </a>
                </div>
            @else
                <!-- Titles Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($titles as $item)
                        @php
                            $isTv = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                            $poster = $item->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        @endphp
                        <a 
                            href="{{ route('title.show', $item->slug) }}" 
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col group"
                        >
                            <!-- Poster Frame -->
                            <div class="aspect-[2/3] w-full bg-slate-950 relative overflow-hidden">
                                <img 
                                    src="{{ $poster }}" 
                                    alt="{{ $item->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >

                                <!-- Format Badge -->
                                <div class="absolute top-2.5 left-2.5">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold {{ $isTv ? 'bg-purple-900/80 text-purple-200 border border-purple-500/30' : 'bg-slate-950/80 text-white border border-white/20' }} backdrop-blur-md">
                                        {{ $isTv ? 'TV Series' : 'Movie' }}
                                    </span>
                                </div>

                                <!-- Rating Badge -->
                                <div class="absolute top-2.5 right-2.5">
                                    <div class="flex items-center gap-1 px-2 py-0.5 rounded-md bg-slate-950/80 backdrop-blur-md text-amber-400 text-[11px] font-bold border border-white/10">
                                        <span>★</span>
                                        <span>{{ number_format((float) $item->rating, 1) }}</span>
                                    </div>
                                </div>

                                @if($item->content_rating)
                                    <div class="absolute bottom-2.5 left-2.5">
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-slate-950/70 text-slate-300 backdrop-blur-xs border border-white/10">
                                            {{ $item->content_rating }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Card Body -->
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-950 group-hover:text-amber-600 transition-colors line-clamp-1 mb-1">
                                        {{ $item->title }}
                                    </h3>

                                    <div class="flex items-center gap-1.5 text-[11px] text-slate-500 mb-2">
                                        <span>{{ $item->release_year ?? 'Cinema' }}</span>
                                        @if($item->genres->isNotEmpty())
                                            <span>•</span>
                                            <span class="truncate">{{ $item->genres->pluck('name')->take(2)->join(', ') }}</span>
                                        @endif
                                    </div>

                                    @if($item->overview)
                                        <p class="text-[11px] text-slate-400 line-clamp-2 leading-relaxed mb-3">
                                            {{ $item->overview }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Streaming Availability Footer -->
                                @if($item->streamingPlatforms->isNotEmpty())
                                    <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[10px]">
                                        <span class="text-slate-400 font-medium">Stream on:</span>
                                        <span class="font-bold text-purple-700 bg-purple-50 px-2 py-0.5 rounded">
                                            {{ $item->streamingPlatforms->first()->name }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- 4. Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $titles->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
