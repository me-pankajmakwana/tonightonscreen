@php
    $platformsSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => 'Streaming Services & Network Guide',
        'description' => $seoDescription,
        'url' => route('platforms.index'),
    ];
@endphp

<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
>
    @push('head')
        <script type="application/ld+json">
        {!! json_encode($platformsSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-10 pb-16 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-[#FFA500]/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Streaming Services']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 tracking-wide uppercase">
                    Where to Watch Streaming
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Streaming Services & <span class="text-[#FFA500]">Networks Guide</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Stop switching between different apps. Explore verified streaming catalogs, top-rated movies, and TV series available to watch right now across leading providers.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        
        <!-- Platforms Directory Cards -->
        <section>
            <div class="border-b border-slate-200 pb-4 mb-8">
                <h2 class="text-xl font-bold text-slate-900">Active Streaming Services</h2>
                <p class="text-xs text-slate-500 mt-1">Select a platform to view its complete catalog and top-rated titles.</p>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($platforms as $p)
                    <a href="{{ route('platforms.show', $p->slug) }}" class="group p-6 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-slate-900 flex items-center justify-center p-2 mb-4 group-hover:scale-105 transition-transform">
                                @if($p->logo_url)
                                    <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" class="max-h-full max-w-full object-contain">
                                @else
                                    <span class="text-lg font-black text-[#FFA500]">{{ substr($p->name, 0, 2) }}</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-base transition-colors">{{ $p->name }}</h3>
                            <p class="text-xs text-slate-500 mt-1">
                                {{ $p->titles_count }} {{ Str::plural('title', $p->titles_count) }} streaming
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-[#010629] group-hover:text-[#FFA500]">
                            <span>Explore Catalog</span>
                            <span>→</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Featured Streaming Titles -->
        @if($featuredTitles->isNotEmpty())
            <section class="border-t border-slate-200 pt-12">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Top Streaming Highlights</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Top-rated cinema available across streaming networks right now</p>
                    </div>
                    <a href="{{ route('top-rated') }}" class="text-xs text-[#FFA500] font-bold hover:underline">View All Top Rated →</a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
                    @foreach($featuredTitles as $item)
                        <a href="{{ route('title.show', $item->slug) }}" class="group block">
                            <div class="aspect-2/3 rounded-xl overflow-hidden bg-slate-900 relative shadow-xs group-hover:shadow-lg transition-all">
                                <img src="{{ $item->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                @if($item->rating)
                                    <div class="absolute top-1.5 right-1.5 px-1.5 py-0.5 rounded bg-black/80 text-[#FFA500] text-[10px] font-bold">
                                        ★ {{ number_format((float)$item->rating, 1) }}
                                    </div>
                                @endif
                            </div>
                            <h4 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-xs mt-2 truncate transition-colors">{{ $item->title }}</h4>
                            <span class="text-[10px] text-slate-400">{{ $item->release_year }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

    </div>
</x-layouts.app>
