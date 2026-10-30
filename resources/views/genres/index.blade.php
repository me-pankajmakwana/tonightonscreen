<x-layouts.app 
    :title="'All Movie & TV Genres — Browse Catalog by Category | TonightOnScreen'"
    :description="'Explore all movie and TV genres on TonightOnScreen. Browse top-rated titles in Action, Comedy, Drama, Sci-Fi, Horror, Romance, and more.'"
>
    <div class="bg-[#f8fafc] min-h-screen pb-20">
        <!-- 1. Header Section -->
        <div class="bg-[#010629] text-white pt-10 pb-16 px-4 sm:px-6 lg:px-8 border-b border-[#0d163f] relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto">
                <!-- Breadcrumbs -->
                <x-breadcrumbs :items="[['name' => 'Genres']]" />

                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/20 text-amber-400 text-xs font-bold mb-3">
                        <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" alt="TonightOnScreen" class="w-3.5 h-3.5 rounded-xs object-contain">
                        <span>Categories & Themes</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight">
                        Browse by Genre
                    </h1>

                    <p class="text-xs sm:text-sm text-slate-400 mt-2.5 leading-relaxed font-normal">
                        Dive into curated cinematic universes — from pulse-pounding Action and visionary Sci-Fi to intimate Dramas and laugh-out-loud Comedies.
                    </p>
                </div>
            </div>
        </div>

        <!-- 2. Genre Cards Grid (Interlinking Directory with Dedicated Imagery) -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($genres as $genre)
                    @php
                        $spotlight = $genreSpotlights[$genre->id] ?? null;
                    @endphp

                    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col justify-between group relative overflow-hidden">
                        <div>
                            <!-- Genre Image Visual Banner -->
                            <a href="{{ route('genre.show', $genre->slug) }}" class="h-36 sm:h-40 w-full block overflow-hidden relative rounded-2xl mb-4 bg-slate-900 group/img">
                                <img 
                                    src="{{ $genre->image_url }}" 
                                    alt="{{ $genre->name }} movies and TV series" 
                                    class="w-full h-full object-cover group-hover:scale-105 group-hover/img:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
                                    <h3 class="text-xl font-black text-white group-hover/img:text-amber-400 transition-colors drop-shadow-sm">
                                        {{ $genre->name }}
                                    </h3>
                                    <span class="px-2.5 py-0.5 rounded-lg bg-slate-950/80 backdrop-blur-md text-amber-400 font-bold text-xs border border-white/15">
                                        {{ $genre->titles_count }} {{ \Illuminate\Support\Str::plural('title', $genre->titles_count) }}
                                    </span>
                                </div>
                            </a>

                            <p class="text-xs text-slate-500 leading-relaxed mb-5">
                                {{ $genre->description ?? 'Discover thrilling stories, top-rated features, and original series in this category.' }}
                            </p>

                            <!-- Spotlight Mini Feature -->
                            @if($spotlight)
                                <div class="bg-slate-50 rounded-2xl p-3 border border-slate-100 flex items-center gap-3 mb-4 group/spotlight">
                                    <img 
                                        src="{{ $spotlight->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                                        alt="{{ $spotlight->title }}" 
                                        class="w-11 h-15 object-cover rounded-xl bg-slate-900 shrink-0 shadow-xs"
                                        loading="lazy"
                                    >
                                    <div class="min-w-0">
                                        <span class="text-[9px] font-bold uppercase tracking-wider text-amber-600 block mb-0.5">Top Rated {{ $genre->name }}</span>
                                        <h4 class="text-xs font-bold text-slate-900 truncate group-hover/spotlight:text-amber-600 transition-colors">
                                            <a href="{{ route('title.show', $spotlight->slug) }}">{{ $spotlight->title }}</a>
                                        </h4>
                                        <div class="flex items-center gap-2 text-[10px] text-slate-400 mt-0.5">
                                            <span class="text-amber-500 font-bold">★ {{ number_format((float) $spotlight->rating, 1) }}</span>
                                            <span>•</span>
                                            <span>{{ $spotlight->release_year ?? 'Cinema' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Footer Action -->
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <a 
                                href="{{ route('genre.show', $genre->slug) }}" 
                                class="text-xs font-bold text-slate-900 group-hover:text-amber-600 flex items-center gap-1.5 transition-colors"
                            >
                                <span>Explore {{ $genre->name }}</span>
                                <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>

                            <a 
                                href="{{ route('explore', ['genre' => $genre->slug]) }}" 
                                class="text-[11px] font-semibold text-slate-400 hover:text-slate-600 transition-colors"
                            >
                                Filter in Explore
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
