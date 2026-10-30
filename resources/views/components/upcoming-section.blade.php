@props(['upcomingMovies'])

<section id="upcoming-movies" class="py-16 bg-white border-t border-slate-100" x-data="{ viewMode: 'carousel' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-700 text-[11px] font-bold uppercase tracking-wider mb-2.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-600 animate-ping"></span>
                    <span>Next 60 Days Preview</span>
                    <span class="w-1 h-1 rounded-full bg-indigo-300"></span>
                    <span class="text-indigo-900 font-semibold">In Cinemas & Streaming</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#010629] tracking-tight flex items-center gap-3">
                    <span>Upcoming Movies</span>
                    <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                        {{ $upcomingMovies->count() }} Releasing Soon
                    </span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-2xl">
                    High-anticipation theatrical blockbusters and exclusive premieres releasing over the next two months.
                </p>
            </div>

            <!-- Controls (Scroll Arrows & View All) -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex items-center gap-2">
                    <button 
                        onclick="document.getElementById('upcoming-scroll-container').scrollBy({ left: -320, behavior: 'smooth' })"
                        class="w-9 h-9 rounded-full bg-slate-100 hover:bg-[#010629] hover:text-white text-slate-700 flex items-center justify-center transition-all cursor-pointer shadow-xs border border-slate-200"
                        title="Scroll Left"
                        aria-label="Previous Movies"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button 
                        onclick="document.getElementById('upcoming-scroll-container').scrollBy({ left: 320, behavior: 'smooth' })"
                        class="w-9 h-9 rounded-full bg-slate-100 hover:bg-[#010629] hover:text-white text-slate-700 flex items-center justify-center transition-all cursor-pointer shadow-xs border border-slate-200"
                        title="Scroll Right"
                        aria-label="Next Movies"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <a 
                    href="{{ route('explore', ['sort' => 'release_date_desc']) }}" 
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold transition-all shadow-xs shrink-0"
                >
                    <span>Explore All</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Horizontal Scrollable Container -->
        <div class="relative group">
            <div 
                id="upcoming-scroll-container" 
                class="flex gap-5 overflow-x-auto no-scrollbar scroll-smooth pb-4 pt-1 snap-x snap-mandatory"
            >
                @foreach($upcomingMovies as $movie)
                    @php
                        $genreName = $movie->genres->first()?->name ?? 'Cinema';
                        $posterUrl = $movie->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        $releaseDateFormatted = $movie->release_date ? $movie->release_date->format('M j, Y') : 'Coming Soon';
                        $daysLeft = $movie->days_until_release ?? ($movie->release_date ? (int) max(0, now()->diffInDays($movie->release_date, false)) : 0);
                    @endphp

                    <div class="w-[240px] sm:w-[260px] md:w-[280px] shrink-0 snap-start bg-slate-900 rounded-2xl overflow-hidden relative group/card shadow-md hover:shadow-2xl transition-all duration-300 flex flex-col justify-between border border-slate-800 hover:border-amber-400/50">
                        
                        <!-- Top Image Aspect Container -->
                        <div class="aspect-[2/3] w-full overflow-hidden bg-slate-950 relative">
                            <img 
                                src="{{ $posterUrl }}" 
                                alt="{{ $movie->title }}" 
                                class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-700"
                                loading="lazy"
                                decoding="async"
                            >

                            <!-- Gradient Protection -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>

                            <!-- Top Badges Row -->
                            <div class="absolute top-3 inset-x-3 flex items-center justify-between z-10">
                                <!-- Days Countdown Badge -->
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-black bg-amber-400 text-slate-950 shadow-md flex items-center gap-1 uppercase tracking-wide">
                                    <svg class="w-3 h-3 text-slate-950" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @if($daysLeft === 0)
                                        <span>Releases Today!</span>
                                    @elseif($daysLeft === 1)
                                        <span>Releases Tomorrow</span>
                                    @else
                                        <span>In {{ $daysLeft }} Days</span>
                                    @endif
                                </span>

                                <!-- Quick Watchlist Button -->
                                <button 
                                    type="button"
                                    onclick="toggleWatchlist('{{ $movie->id }}', this)"
                                    class="w-8 h-8 rounded-full bg-slate-950/70 hover:bg-amber-400 hover:text-slate-950 text-white backdrop-blur-md flex items-center justify-center transition-all border border-white/20 cursor-pointer shadow-xs"
                                    title="Add to Watchlist"
                                    aria-label="Add to Watchlist"
                                >
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Rating & Genre Badges at bottom of poster -->
                            <div class="absolute bottom-3 left-3 right-3 z-10 flex items-center justify-between">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-white/20 backdrop-blur-md text-white border border-white/10">
                                    {{ $genreName }}
                                </span>
                                @if($movie->rating)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-extrabold bg-amber-400/90 text-slate-950">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        {{ number_format($movie->rating, 1) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Content Body -->
                        <div class="p-4 flex flex-col justify-between flex-1 bg-gradient-to-b from-slate-900 to-slate-950 text-white">
                            <div>
                                <a href="{{ route('title.show', $movie->slug) }}" class="block">
                                    <h3 class="text-sm sm:text-base font-bold text-white group-hover/card:text-amber-400 transition-colors line-clamp-1 mb-1">
                                        {{ $movie->title }}
                                    </h3>
                                </a>

                                <div class="flex items-center gap-2 text-[11px] text-amber-300 font-semibold mb-2">
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Releases {{ $releaseDateFormatted }}</span>
                                </div>

                                @if($movie->tagline)
                                    <p class="text-[11px] text-slate-400 italic line-clamp-2 mb-3">
                                        "{{ $movie->tagline }}"
                                    </p>
                                @elseif($movie->overview)
                                    <p class="text-[11px] text-slate-400 line-clamp-2 mb-3">
                                        {{ $movie->overview }}
                                    </p>
                                @endif
                            </div>

                            <!-- Bottom Action Button -->
                            <a 
                                href="{{ route('title.show', $movie->slug) }}" 
                                class="mt-2 w-full py-2 px-3 rounded-xl bg-white/10 hover:bg-amber-400 hover:text-slate-950 text-white text-xs font-bold text-center transition-all duration-200 flex items-center justify-center gap-1.5 border border-white/10"
                            >
                                <span>View Details & Teaser</span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
