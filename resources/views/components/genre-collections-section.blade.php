@props(['genres', 'collections'])

<section id="genres" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Side: Explore by Genre (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <span class="text-[11px] font-bold tracking-widest text-slate-400 uppercase block mb-1.5">
                            Explore by Genre
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 tracking-tight">
                            Find Your Next Favorite
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            From adrenaline-pumping action to epic sci-fi and human drama.
                        </p>
                    </div>

                    <a href="{{ route('genre.index') }}" class="group flex items-center gap-1 text-xs font-semibold text-amber-600 hover:text-amber-700 transition-colors">
                        <span>View All Genres</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Genre Cards Grid (Interlinked with Dedicated Imagery) -->
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3.5">
                    @foreach($genres->take(10) as $genre)
                        <a 
                            href="{{ route('genre.show', $genre->slug) }}" 
                            class="aspect-[4/5] rounded-2xl p-3.5 flex flex-col justify-end items-center relative overflow-hidden group shadow-sm hover:shadow-xl transition-all card-shadow-hover border border-slate-200/50"
                        >
                            <!-- Genre Backdrop Image -->
                            <img 
                                src="{{ $genre->image_url }}" 
                                alt="{{ $genre->name }} movies and series" 
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>

                            <!-- Genre Name & Count -->
                            <div class="z-10 text-center w-full">
                                <span class="text-xs font-extrabold text-white block group-hover:text-amber-400 transition-colors tracking-wide drop-shadow-xs">
                                    {{ $genre->name }}
                                </span>
                                @if(isset($genre->titles_count) && $genre->titles_count > 0)
                                    <span class="text-[10px] text-slate-300 font-medium block mt-0.5">
                                        {{ $genre->titles_count }} titles
                                    </span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Right Side: Popular Collections with 3D Film Reel (5 Cols) -->
            <div class="lg:col-span-5 bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-sm relative overflow-hidden">
                <div class="relative z-10">
                    <span class="text-[10px] font-bold tracking-widest text-slate-400 uppercase block mb-1">
                        Quick Access
                    </span>
                    <h3 class="text-xl font-extrabold text-slate-950 tracking-tight">
                        Popular Collections
                    </h3>
                    <p class="text-xs text-slate-500 mt-1 mb-5">
                        Curated entertainment categories across world cinema.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <!-- Left List (7 Cols) -->
                    <div class="sm:col-span-7 space-y-3 z-10">
                        @foreach($collections as $col)
                            @php
                                $colSlug = $col['slug'] ?? 'action';
                                $colImg = asset("images/genres/{$colSlug}.jpg");
                            @endphp
                            <a 
                                href="{{ route('genre.show', $colSlug) }}" 
                                class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-200/60 transition-all group"
                            >
                                <div class="w-12 h-10 rounded-lg overflow-hidden bg-slate-900 shrink-0 shadow-xs">
                                    <img 
                                        src="{{ $colImg }}" 
                                        alt="{{ $col['title'] }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-amber-600 transition-colors truncate">
                                        {{ $col['title'] }}
                                    </h4>
                                    <p class="text-[10px] text-slate-400 truncate">
                                        {{ $col['count'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Right 3D Film Reel Visual (5 Cols) -->
                    <div class="sm:col-span-5 flex justify-center items-center pointer-events-none select-none">
                        <img 
                            src="{{ asset('images/film_reel_3d.jpg') }}" 
                            alt="Film Reel 3D Graphic" 
                            class="w-40 sm:w-48 h-auto object-contain transform rotate-[-4deg] drop-shadow-xl"
                        >
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
                </div>
            </div>

        </div>
    </div>
</section>
