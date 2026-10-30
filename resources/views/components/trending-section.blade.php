@props(['trending'])

<section id="trending" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex items-end justify-between mb-8">
            <div>
                <span class="text-[11px] font-bold tracking-widest text-slate-400 uppercase block mb-1.5">
                    Trending Now
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 tracking-tight">
                    What's Hot Right Now
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    The most popular movies, series and people — updated daily.
                </p>
            </div>

            <a href="#trending" class="group flex items-center gap-1 text-xs font-semibold text-slate-700 hover:text-slate-950 transition-colors">
                <span>View All</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- Cards Carousel / Grid -->
        <div class="relative group">
            <div id="trending-scroll-container" class="flex gap-5 overflow-x-auto no-scrollbar scroll-smooth pb-4">
                @forelse($trending as $item)
                    @php
                        $genreName = $item->genres->first()?->name ?? 'Cinema';
                        $year = $item->release_date ? $item->release_date->format('Y') : '2025';
                        $posterUrl = $item->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        $formatLabel = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series') ? 'TV Series' : 'Movie';
                    @endphp

                    <a href="{{ route('title.show', $item->slug) }}" class="w-[220px] sm:w-[240px] shrink-0 rounded-2xl overflow-hidden relative group/card cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300 block">
                        <!-- Poster Image Container -->
                        <div class="aspect-[3/4] w-full overflow-hidden bg-slate-900 relative">
                            <img 
                                src="{{ $posterUrl }}" 
                                alt="{{ $item->title }}" 
                                class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>

                            <!-- Format Badge (Top Left) -->
                            <div class="absolute top-3 left-3 z-10">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-semibold bg-slate-950/60 backdrop-blur-md text-slate-200 border border-white/10">
                                    {{ $formatLabel }}
                                </span>
                            </div>

                            <!-- Card Bottom Info -->
                            <div class="absolute bottom-0 left-0 right-0 p-4 z-10 text-white">
                                <h3 class="text-sm font-bold tracking-tight text-white line-clamp-1 mb-1 group-hover/card:text-amber-300 transition-colors">
                                    {{ $item->title }}
                                </h3>
                                
                                <div class="flex items-center gap-2 text-[11px] text-slate-300 mb-2">
                                    <span>{{ $year }}</span>
                                    <span>•</span>
                                    <span>{{ $genreName }}</span>
                                </div>

                                <div class="flex items-center gap-1 text-[11px] font-bold text-amber-400">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span>{{ number_format((float) $item->rating, 1) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="p-8 text-center text-slate-400 w-full">No titles cataloged yet.</div>
                @endforelse
            </div>

            <!-- Scroll Arrow Right -->
            <button 
                onclick="document.getElementById('trending-scroll-container').scrollBy({ left: 300, behavior: 'smooth' })" 
                class="hidden sm:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 w-10 h-10 rounded-full bg-white text-slate-800 shadow-lg border border-slate-200/80 items-center justify-center hover:bg-slate-50 transition-all z-20"
                aria-label="Scroll right"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

    </div>
</section>
