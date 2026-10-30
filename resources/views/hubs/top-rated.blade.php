@php
    $itemListElements = [];
    foreach ($titles as $index => $item) {
        $itemListElements[] = [
            '@type' => 'ListItem',
            'position' => $titles->firstItem() + $index,
            'url' => route('title.show', $item->slug),
            'name' => $item->title . ' (' . ($item->release_year ?? 'Cinema') . ')',
            'image' => $item->poster_url,
        ];
    }

    $topRatedSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'name' => $seoTitle,
        'description' => $seoDescription,
        'itemListOrder' => 'https://schema.org/ItemListOrderDescending',
        'numberOfItems' => $titles->total(),
        'itemListElement' => $itemListElements,
    ];
@endphp

<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
>
    @push('head')
        <!-- Google ItemList Schema.org JSON-LD for Ranking Rich Snippets -->
        <script type="application/ld+json">
        {!! json_encode($topRatedSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-10 pb-16 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Top Rated']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Cinema Hall of Fame
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Top Rated <span class="text-[#FFA500]">{{ $type === 'movie' ? 'Movies' : ($type === 'tv_series' ? 'TV Shows' : 'Cinema & Series') }}</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    The highest-rated cinematic masterpieces and binge-worthy television sagas of all time, ranked by critical acclaim and cinephile ratings.
                </p>
            </div>

            <!-- Filters Bar -->
            <div class="mt-8 flex flex-wrap items-center justify-between gap-4 pt-6 border-t border-[#0d163f]">
                <!-- Type Filter Pills -->
                <div class="flex items-center p-1 rounded-xl bg-white/5 border border-white/10 text-xs">
                    <a href="{{ route('top-rated', array_merge(request()->query(), ['type' => 'all'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'all' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        All ({{ $titles->total() }})
                    </a>
                    <a href="{{ route('top-rated', array_merge(request()->query(), ['type' => 'movie'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'movie' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        Movies
                    </a>
                    <a href="{{ route('top-rated', array_merge(request()->query(), ['type' => 'tv_series'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'tv_series' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        TV Series
                    </a>
                </div>

                <!-- Genre Quick Select -->
                <div class="flex items-center gap-2 text-xs">
                    <label for="genre-filter" class="text-slate-400 font-medium hidden sm:inline">Filter Genre:</label>
                    <select 
                        id="genre-filter"
                        onchange="window.location.href = this.value"
                        class="px-3 py-2 rounded-xl bg-[#0a1445] text-white border border-slate-700 focus:outline-none focus:ring-2 focus:ring-[#FFA500] text-xs font-semibold"
                    >
                        <option value="{{ route('top-rated', array_merge(request()->except('genre', 'page'))) }}">All Genres</option>
                        @foreach($genres as $g)
                            <option value="{{ route('top-rated', array_merge(request()->except('page'), ['genre' => $g->slug])) }}" {{ $genreSlug === $g->slug ? 'selected' : '' }}>
                                {{ $g->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Ranked Content Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @forelse($titles as $index => $item)
                @php
                    $rank = $titles->firstItem() + $index;
                    $isSeries = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                @endphp
                <article class="group relative flex flex-col bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl hover:border-[#FFA500]/50 transition-all duration-300">
                    <!-- Rank Badge & Poster -->
                    <div class="relative aspect-2/3 overflow-hidden bg-slate-900">
                        <img 
                            src="{{ $item->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                            alt="{{ $item->title }}"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        >
                        <!-- Top Rank Floating Pill -->
                        <div class="absolute top-2 left-2 px-2 py-0.5 rounded-lg bg-[#010629]/90 text-white backdrop-blur-xs font-black text-xs shadow-md border border-white/10 flex items-center gap-1">
                            <span class="text-[#FFA500]">#</span><span>{{ $rank }}</span>
                        </div>

                        <!-- Rating Badge -->
                        @if($item->rating)
                            <div class="absolute top-2 right-2 px-2 py-0.5 rounded-lg bg-black/85 text-[#FFA500] backdrop-blur-xs font-extrabold text-xs shadow-md border border-white/10 flex items-center gap-1">
                                <span>★</span>
                                <span class="text-white">{{ number_format((float)$item->rating, 1) }}</span>
                            </div>
                        @endif

                        <!-- Type Pill -->
                        <div class="absolute bottom-2 left-2 px-2 py-0.5 rounded-md bg-slate-900/80 text-[10px] text-slate-300 font-semibold backdrop-blur-xs">
                            {{ $isSeries ? 'TV Series' : 'Movie' }}
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-3.5 flex flex-col flex-grow justify-between">
                        <div>
                            <div class="text-[11px] text-slate-400 font-medium mb-1">
                                {{ $item->release_year ?? 'Cinema' }}
                                @if($item->runtime_minutes)
                                    • {{ $item->runtime_minutes }}m
                                @endif
                            </div>
                            <h2 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-xs sm:text-sm line-clamp-1 transition-colors">
                                <a href="{{ route('title.show', $item->slug) }}">
                                    {{ $item->title }}
                                </a>
                            </h2>
                            <div class="flex flex-wrap gap-1 mt-1.5">
                                @foreach($item->genres->take(2) as $g)
                                    <span class="text-[10px] px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 font-medium">
                                        {{ $g->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px]">
                            <a href="{{ route('title.show', $item->slug) }}" class="text-[#010629] font-bold hover:text-[#FFA500] transition-colors">
                                View Details →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-sm font-bold text-slate-700">No titles found matching criteria.</p>
                    <a href="{{ route('top-rated') }}" class="text-xs text-[#FFA500] font-bold mt-2 inline-block">Clear all filters</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $titles->links() }}
        </div>
    </div>
</x-layouts.app>
