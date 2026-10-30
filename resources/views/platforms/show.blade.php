@php
    $itemListElements = [];
    foreach ($titles->take(15) as $index => $item) {
        $itemListElements[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'url' => route('title.show', $item->slug),
            'name' => $item->title,
        ];
    }

    $platformSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => $seoTitle,
        'description' => $seoDescription,
        'url' => route('platforms.show', $platform->slug),
        'mainEntity' => [
            '@type' => 'ItemList',
            'itemListElement' => $itemListElements,
        ],
    ];
@endphp

<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
>
    @push('head')
        <!-- Google ItemList Schema.org JSON-LD for Streaming Platform Titles -->
        <script type="application/ld+json">
        {!! json_encode($platformSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-10 pb-16 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-[#FFA500]/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[
                ['name' => 'Streaming Services', 'url' => route('platforms.index')],
                ['name' => $platform->name]
            ]" />

            <div class="mt-6 flex flex-col sm:flex-row items-start sm:items-center gap-6">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-3xl bg-white p-3 flex items-center justify-center shadow-lg border border-white/20 shrink-0">
                    @if($platform->logo_url)
                        <img src="{{ $platform->logo_url }}" alt="{{ $platform->name }}" class="max-h-full max-w-full object-contain">
                    @else
                        <span class="text-2xl font-black text-[#010629]">{{ substr($platform->name, 0, 2) }}</span>
                    @endif
                </div>

                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 tracking-wide uppercase">
                        Streaming Catalog
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-2">
                        Best Movies & Shows on <span class="text-[#FFA500]">{{ $platform->name }}</span>
                    </h1>
                    <p class="mt-2 text-slate-300 text-xs sm:text-sm leading-relaxed">
                        Curated guide to critically acclaimed movies, binge-worthy series, and new releases streaming on {{ $platform->name }}.
                    </p>
                </div>
            </div>

            <!-- Filters Bar -->
            <div class="mt-8 flex flex-wrap items-center justify-between gap-4 pt-6 border-t border-[#0d163f]">
                <div class="flex items-center p-1 rounded-xl bg-white/5 border border-white/10 text-xs">
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page', 'type'), ['type' => 'all'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'all' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        All ({{ $titles->total() }})
                    </a>
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page'), ['type' => 'movie'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'movie' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        Movies
                    </a>
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page'), ['type' => 'tv_series'])) }}" class="px-4 py-2 rounded-lg font-bold transition-all {{ $type === 'tv_series' ? 'bg-[#FFA500] text-[#010629]' : 'text-slate-300 hover:text-white' }}">
                        TV Series
                    </a>
                </div>

                <!-- Sort Order -->
                <div class="flex items-center gap-2 text-xs">
                    <span class="text-slate-400 font-medium">Sort By:</span>
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page'), ['sort' => 'rating'])) }}" class="px-3 py-1.5 rounded-lg border {{ $sort === 'rating' ? 'bg-[#FFA500] text-[#010629] font-bold border-[#FFA500]' : 'border-slate-700 text-slate-300 hover:text-white' }}">
                        Highest Rated
                    </a>
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page'), ['sort' => 'popularity'])) }}" class="px-3 py-1.5 rounded-lg border {{ $sort === 'popularity' ? 'bg-[#FFA500] text-[#010629] font-bold border-[#FFA500]' : 'border-slate-700 text-slate-300 hover:text-white' }}">
                        Most Popular
                    </a>
                    <a href="{{ route('platforms.show', array_merge(['slug' => $platform->slug], request()->except('page'), ['sort' => 'newest'])) }}" class="px-3 py-1.5 rounded-lg border {{ $sort === 'newest' ? 'bg-[#FFA500] text-[#010629] font-bold border-[#FFA500]' : 'border-slate-700 text-slate-300 hover:text-white' }}">
                        Newest
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse($titles as $item)
                @php
                    $isSeries = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                @endphp
                <article class="group relative flex flex-col bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl hover:border-[#FFA500]/50 transition-all duration-300">
                    <div class="relative aspect-2/3 overflow-hidden bg-slate-900">
                        <img 
                            src="{{ $item->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                            alt="{{ $item->title }}"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        >
                        @if($item->rating)
                            <div class="absolute top-2 right-2 px-2 py-0.5 rounded-lg bg-black/85 text-[#FFA500] backdrop-blur-xs font-extrabold text-xs shadow-md border border-white/10 flex items-center gap-1">
                                <span>★</span>
                                <span class="text-white">{{ number_format((float)$item->rating, 1) }}</span>
                            </div>
                        @endif

                        <div class="absolute bottom-2 left-2 px-2 py-0.5 rounded-md bg-slate-900/80 text-[10px] text-slate-300 font-semibold backdrop-blur-xs">
                            {{ $isSeries ? 'TV Series' : 'Movie' }}
                        </div>
                    </div>

                    <div class="p-3.5 flex flex-col flex-grow justify-between">
                        <div>
                            <div class="text-[11px] text-slate-400 font-medium mb-1">
                                {{ $item->release_year ?? 'Cinema' }}
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
                                Streaming Info →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-sm font-bold text-slate-700">No titles currently tagged under this criteria for {{ $platform->name }}.</p>
                    <a href="{{ route('platforms.show', $platform->slug) }}" class="text-xs text-[#FFA500] font-bold mt-2 inline-block">Reset Filters</a>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $titles->links() }}
        </div>

        <!-- Cross Linking to Other Platforms -->
        @if($otherPlatforms->isNotEmpty())
            <div class="mt-16 pt-12 border-t border-slate-200">
                <h3 class="text-base font-bold text-slate-900 mb-4">Explore More Streaming Catalogs</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                    @foreach($otherPlatforms as $op)
                        <a href="{{ route('platforms.show', $op->slug) }}" class="p-3 rounded-xl bg-white border border-slate-200 hover:border-[#FFA500] text-xs font-bold text-slate-800 text-center truncate transition-colors">
                            {{ $op->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
