<x-layouts.app 
    :title="$genre->name . ' Movies & TV Shows — Explore Best Releases | TonightOnScreen'"
    :description="'Best ' . $genre->name . ' movies and TV series to watch tonight. Discover top rated, trending, and latest releases in ' . $genre->name . ' with cast, ratings, and streaming guides.'"
>
    @php
        $isAction = $genre->slug === 'action';

        $genreItemList = [];
        foreach ($titles->take(10) as $index => $item) {
            $genreItemList[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'url' => route('title.show', $item->slug),
                'name' => $item->title,
            ];
        }

        $genreSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $genre->name . ' Movies & TV Shows',
            'description' => $genre->description ?? ('Discover the top-rated and latest ' . $genre->name . ' titles on TonightOnScreen.'),
            'url' => route('genre.show', $genre->slug),
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $genreItemList,
            ],
        ];
    @endphp

    @push('head')
        <!-- Schema.org JSON-LD Structured Data for Genre Collection -->
        <x-seo.json-ld :data="$genreSchema" />
    @endpush

    <div class="bg-[#f8fafc] min-h-screen pb-20">
        <!-- 1. Thematic Hero Header -->
        <div class="bg-[#010629] text-white pt-10 pb-16 px-4 sm:px-6 lg:px-8 border-b border-[#0d163f] relative overflow-hidden">
            <!-- Dynamic Thematic Genre Image & Glow Elements -->
            <div class="absolute inset-0 z-0">
                <img 
                    src="{{ $genre->image_url }}" 
                    alt="{{ $genre->name }} genre backdrop" 
                    class="w-full h-full object-cover opacity-20 filter blur-xs scale-105"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/80 to-[#010629]/40"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#010629] via-[#010629]/70 to-transparent"></div>
                <div class="absolute top-0 right-1/4 w-96 h-96 {{ $theme['glow'] }} rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto">
                <!-- Breadcrumbs -->
                <x-breadcrumbs :items="[
                    ['name' => 'Genres', 'url' => route('genre.index')],
                    ['name' => $genre->name]
                ]" />

                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                    <!-- Title & Overview -->
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $theme['pill'] }} text-xs font-bold mb-3">
                            <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" alt="TonightOnScreen" class="w-3.5 h-3.5 rounded-xs object-contain">
                            <span>Curated Genre Showcase</span>
                        </div>

                        <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight">
                            {{ $genre->name }}
                        </h1>

                        <p class="text-xs sm:text-sm text-slate-300 mt-2.5 leading-relaxed font-normal">
                            {{ $genre->description ?? 'Explore top-rated blockbusters, critically-acclaimed hidden gems, and trending series in this collection.' }}
                        </p>
                    </div>

                    <!-- Genre Snapshot Metrics -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center shrink-0">
                        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-3 sm:p-4 min-w-[90px]">
                            <span class="block text-2xl font-black text-white">{{ $genre->titles_count }}</span>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Titles</span>
                        </div>

                        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-3 sm:p-4 min-w-[90px]">
                            <span class="block text-2xl font-black text-amber-400">★ {{ $avgRating > 0 ? $avgRating : '—' }}</span>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Avg Score</span>
                        </div>

                        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-3 sm:p-4 min-w-[90px]">
                            <span class="block text-2xl font-black text-white">{{ $movieCount }}</span>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Movies</span>
                        </div>

                        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-3 sm:p-4 min-w-[90px]">
                            <span class="block text-2xl font-black text-white">{{ $seriesCount }}</span>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Series</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- 2. Spotlight Masterpiece Title (If available) -->
            @if($spotlight)
                <div class="relative -mt-8 z-20 mb-12">
                    <div class="bg-slate-900 text-white rounded-3xl overflow-hidden border border-white/15 shadow-2xl relative">
                        <!-- Background Backdrop Image with Gradient Overlay -->
                        <div class="absolute inset-0 z-0">
                            <img 
                                src="{{ $spotlight->backdrop_url ?: asset('images/movie_shadow_protocol.jpg') }}" 
                                alt="{{ $spotlight->title }} backdrop" 
                                class="w-full h-full object-cover opacity-25 filter blur-xs"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/70 to-transparent"></div>
                        </div>

                        <div class="relative z-10 p-6 sm:p-10 flex flex-col md:flex-row items-center gap-6 sm:gap-8">
                            <!-- Poster Frame -->
                            <div class="w-36 sm:w-48 h-52 sm:h-64 rounded-2xl overflow-hidden shadow-2xl shrink-0 border border-white/20 bg-slate-950">
                                <img 
                                    src="{{ $spotlight->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                                    alt="{{ $spotlight->title }}" 
                                    class="w-full h-full object-cover"
                                >
                            </div>

                            <!-- Details -->
                            <div class="flex-grow text-center md:text-left">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full {{ $theme['badge'] }} text-[10px] font-extrabold uppercase tracking-wider mb-2">
                                    <span>Spotlight Masterpiece</span>
                                </div>

                                <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                                    <a href="{{ route('title.show', $spotlight->slug) }}" class="hover:text-amber-400 transition-colors">
                                        {{ $spotlight->title }}
                                    </a>
                                </h2>

                                <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 text-xs text-slate-300 mt-1.5 mb-3 font-medium">
                                    <span class="text-amber-400 font-bold">★ {{ number_format((float) $spotlight->rating, 1) }}/10</span>
                                    <span>•</span>
                                    <span>{{ $spotlight->release_year ?? 'Cinema' }}</span>
                                    <span>•</span>
                                    <span class="capitalize">{{ $spotlight->type instanceof \App\Enums\TitleType ? $spotlight->type->label() : ucfirst((string) $spotlight->type) }}</span>
                                    @if($spotlight->content_rating)
                                        <span>•</span>
                                        <span class="px-1.5 py-0.2 rounded bg-white/10 text-slate-200 text-[10px]">{{ $spotlight->content_rating }}</span>
                                    @endif
                                </div>

                                @if($spotlight->tagline)
                                    <p class="text-xs sm:text-sm font-serif italic text-amber-200/90 mb-2">
                                        "{{ $spotlight->tagline }}"
                                    </p>
                                @endif

                                @if($spotlight->overview)
                                    <p class="text-xs text-slate-300 line-clamp-2 max-w-3xl leading-relaxed mb-5">
                                        {{ $spotlight->overview }}
                                    </p>
                                @endif

                                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                                    <a 
                                        href="{{ route('title.show', $spotlight->slug) }}" 
                                        class="px-5 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold transition-all shadow-md active:scale-95 flex items-center gap-2"
                                    >
                                        <span>Explore Title</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </a>

                                    <a 
                                        href="{{ route('explore', ['genre' => $genre->slug]) }}" 
                                        class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold border border-white/10 transition-colors"
                                    >
                                        Filter in Advanced Catalog
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- 3. Toolbar: Format Filter Pills & Sort Dropdown -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-6 border-b border-slate-200/80 mb-8">
                <!-- Format Switcher -->
                <div class="flex items-center gap-1.5 bg-slate-200/70 p-1 rounded-2xl w-fit">
                    <a 
                        href="{{ route('genre.show', ['slug' => $genre->slug, 'format' => 'all', 'sort' => $sort]) }}" 
                        class="px-4 py-1.5 rounded-xl text-xs font-bold transition-all {{ $format === 'all' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950' }}"
                    >
                        All ({{ $genre->titles_count }})
                    </a>

                    @if($movieCount > 0)
                        <a 
                            href="{{ route('genre.show', ['slug' => $genre->slug, 'format' => 'movie', 'sort' => $sort]) }}" 
                            class="px-4 py-1.5 rounded-xl text-xs font-bold transition-all {{ $format === 'movie' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950' }}"
                        >
                            Movies ({{ $movieCount }})
                        </a>
                    @endif

                    @if($seriesCount > 0)
                        <a 
                            href="{{ route('genre.show', ['slug' => $genre->slug, 'format' => 'tv_series', 'sort' => $sort]) }}" 
                            class="px-4 py-1.5 rounded-xl text-xs font-bold transition-all {{ $format === 'tv_series' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950' }}"
                        >
                            TV Series ({{ $seriesCount }})
                        </a>
                    @endif
                </div>

                <!-- Sort Control -->
                <form method="GET" action="{{ route('genre.show', $genre->slug) }}" class="flex items-center gap-2">
                    <input type="hidden" name="format" value="{{ $format }}">
                    <label for="sort" class="text-xs font-semibold text-slate-500 shrink-0">Sort by:</label>
                    <select 
                        name="sort" 
                        id="sort" 
                        onchange="this.form.submit()" 
                        class="bg-white border border-slate-200 rounded-xl px-3 py-1.5 text-xs font-semibold text-slate-800 focus:outline-none focus:border-slate-400 shadow-xs cursor-pointer"
                    >
                        <option value="rating_desc" {{ $sort === 'rating_desc' ? 'selected' : '' }}>Highest Rated</option>
                        <option value="date_desc" {{ $sort === 'date_desc' ? 'selected' : '' }}>Release Date (Newest)</option>
                        <option value="date_asc" {{ $sort === 'date_asc' ? 'selected' : '' }}>Release Date (Oldest)</option>
                        <option value="title_asc" {{ $sort === 'title_asc' ? 'selected' : '' }}>Title (A–Z)</option>
                    </select>
                </form>
            </div>

            <!-- 4. Titles Grid -->
            @if($titles->isEmpty())
                <div class="bg-white rounded-3xl border border-slate-200/80 p-12 text-center max-w-lg mx-auto shadow-sm my-12">
                    <div class="w-16 h-16 rounded-full bg-slate-100 mx-auto flex items-center justify-center text-slate-400 mb-4">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">No titles found for this filter</h3>
                    <p class="text-xs text-slate-500 mb-6">
                        Try switching format filters or explore our complete catalog.
                    </p>
                    <a href="{{ route('genre.show', ['slug' => $genre->slug, 'format' => 'all']) }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-slate-950 text-white text-xs font-semibold hover:bg-slate-800 transition-colors">
                        Show All {{ $genre->name }} Titles
                    </a>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                    @foreach($titles as $item)
                        @php
                            $isTv = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                            $poster = $item->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        @endphp

                        <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col group relative">
                            <!-- Poster Frame -->
                            <div class="aspect-[2/3] w-full bg-slate-950 relative overflow-hidden">
                                <a href="{{ route('title.show', $item->slug) }}">
                                    <img 
                                        src="{{ $poster }}" 
                                        alt="{{ $item->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </a>

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
                            </div>

                            <!-- Card Body -->
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-950 group-hover:text-amber-600 transition-colors line-clamp-1 mb-1">
                                        <a href="{{ route('title.show', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
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

                                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <a 
                                        href="{{ route('title.show', $item->slug) }}" 
                                        class="w-full py-2 px-3 rounded-xl bg-slate-950 hover:bg-slate-800 text-white text-[11px] font-bold text-center transition-colors"
                                    >
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($titles->hasPages())
                    <div class="mb-16">
                        {{ $titles->links() }}
                    </div>
                @endif
            @endif

            <!-- 5. Interlinking Showcase: Explore All Genres -->
            <div class="mt-16 pt-10 border-t border-slate-200/80">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-amber-500 block mb-1">Interlinked Categories</span>
                        <h3 class="text-xl font-extrabold text-slate-950">Explore All Entertainment Genres</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Seamlessly discover titles across all cinematic categories.</p>
                    </div>

                    <a href="{{ route('genre.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                        <span>Directory of All Genres</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3.5">
                    @foreach($allGenres as $og)
                        @php
                            $isCurrent = $og->slug === $genre->slug;
                        @endphp
                        <a 
                            href="{{ route('genre.show', $og->slug) }}" 
                            class="aspect-[4/3] rounded-2xl p-3 flex flex-col justify-end items-center relative overflow-hidden group shadow-xs hover:shadow-lg transition-all card-shadow-hover border {{ $isCurrent ? 'ring-2 ring-amber-400 border-amber-400' : 'border-slate-200/60' }}"
                        >
                            <img 
                                src="{{ $og->image_url }}" 
                                alt="{{ $og->name }} movies and series" 
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>

                            <div class="z-10 text-center w-full">
                                <span class="text-xs font-black {{ $isCurrent ? 'text-amber-400' : 'text-white' }} group-hover:text-amber-400 block tracking-wide truncate">
                                    {{ $og->name }}
                                </span>
                                <span class="text-[10px] text-slate-300 font-medium block mt-0.5">
                                    {{ $og->titles_count }} titles
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
