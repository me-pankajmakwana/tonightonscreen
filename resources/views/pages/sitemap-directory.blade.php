<x-layouts.app 
    title="HTML Sitemap & Entertainment Directory — TonightOnScreen"
    description="Complete directory and HTML sitemap of TonightOnScreen. Explore all genres, top-rated movies, TV series, actors, directors, streaming guides, and editorial pages."
>
    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Site Directory']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Navigation & Index
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Site Directory & <span class="text-[#FFA500]">HTML Sitemap</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    A comprehensive index of all pages, entertainment hubs, genre collections, talent profiles, and streaming platforms across TonightOnScreen.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        
        <!-- Section 1: Core Hubs & Primary Discovery -->
        <section>
            <div class="flex items-center gap-2 pb-4 border-b border-slate-200">
                <span class="w-2.5 h-2.5 rounded-full bg-[#FFA500]"></span>
                <h2 class="text-lg font-bold text-slate-900">Primary Hubs & Features</h2>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                <a href="{{ route('home') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Home Page</h3>
                    <p class="text-xs text-slate-500 mt-1">Discover featured cinema, what's hot, and entertainment news.</p>
                </a>
                <a href="{{ route('top-rated') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Top Rated Hub</h3>
                    <p class="text-xs text-slate-500 mt-1">The highest-rated movies and TV shows of all time.</p>
                </a>
                <a href="{{ route('trending') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Trending Tonight</h3>
                    <p class="text-xs text-slate-500 mt-1">Hot releases, trending series, and viral cinema right now.</p>
                </a>
                <a href="{{ route('explore') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Explore All Titles</h3>
                    <p class="text-xs text-slate-500 mt-1">Filter titles by release year, platform, and sort order.</p>
                </a>
                <a href="{{ route('platforms.index') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Streaming Services Guide</h3>
                    <p class="text-xs text-slate-500 mt-1">Browse what's on Netflix, Disney+, Prime Video, and Apple TV+.</p>
                </a>
                <a href="{{ route('genre.index') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Genre Directory</h3>
                    <p class="text-xs text-slate-500 mt-1">Browse 10+ cinematic genres with curated showcases.</p>
                </a>
                <a href="{{ route('person.index') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Talent & Stars Index</h3>
                    <p class="text-xs text-slate-500 mt-1">Actors, directors, screenwriters, and cinematic creators.</p>
                </a>
                <a href="{{ route('watchlist.index') }}" class="p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-[#FFA500] hover:shadow-md transition-all group">
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FFA500] text-sm">Personal Watchlist</h3>
                    <p class="text-xs text-slate-500 mt-1">Keep track of every movie and episode you want to watch next.</p>
                </a>
            </div>
        </section>

        <!-- Section 2: Genre Hubs -->
        <section>
            <div class="flex items-center gap-2 pb-4 border-b border-slate-200">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                <h2 class="text-lg font-bold text-slate-900">Genre Collections</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3 mt-6">
                @foreach($genres as $genre)
                    <a href="{{ route('genre.show', $genre->slug) }}" class="p-3 rounded-xl bg-white border border-slate-200/80 hover:border-blue-500 hover:text-blue-600 transition-colors text-xs font-semibold text-slate-800 flex items-center justify-between">
                        <span>{{ $genre->name }}</span>
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Section 3: Streaming Platforms -->
        <section>
            <div class="flex items-center gap-2 pb-4 border-b border-slate-200">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                <h2 class="text-lg font-bold text-slate-900">Streaming Platforms & Networks</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-6">
                @foreach($platforms as $p)
                    <a href="{{ route('platforms.show', $p->slug) }}" class="p-3 rounded-xl bg-white border border-slate-200/80 hover:border-emerald-500 hover:text-emerald-700 transition-colors text-xs font-semibold text-slate-800 flex items-center justify-between">
                        <span>{{ $p->name }}</span>
                        <span class="text-[10px] text-slate-400 font-normal">Streaming Guide →</span>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Section 4: Top Rated Movies & Series Showcase Links -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Top Movies -->
            <section>
                <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                    <h2 class="text-base font-bold text-slate-900">Top Movies Quick Index</h2>
                    <a href="{{ route('top-rated', ['type' => 'movie']) }}" class="text-xs text-[#FFA500] font-bold hover:underline">View All →</a>
                </div>
                <ul class="divide-y divide-slate-100 text-xs mt-3">
                    @foreach($topMovies as $m)
                        <li class="py-2 flex items-center justify-between">
                            <a href="{{ route('title.show', $m->slug) }}" class="text-slate-700 hover:text-[#FFA500] font-medium truncate max-w-xs">
                                {{ $m->title }} <span class="text-slate-400">({{ $m->release_year }})</span>
                            </a>
                            <span class="px-2 py-0.5 rounded bg-amber-50 text-amber-700 font-bold text-[11px]">★ {{ number_format((float)$m->rating, 1) }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>

            <!-- Top TV Series -->
            <section>
                <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                    <h2 class="text-base font-bold text-slate-900">Top TV Series Quick Index</h2>
                    <a href="{{ route('top-rated', ['type' => 'tv_series']) }}" class="text-xs text-[#FFA500] font-bold hover:underline">View All →</a>
                </div>
                <ul class="divide-y divide-slate-100 text-xs mt-3">
                    @foreach($topSeries as $s)
                        <li class="py-2 flex items-center justify-between">
                            <a href="{{ route('title.show', $s->slug) }}" class="text-slate-700 hover:text-[#FFA500] font-medium truncate max-w-xs">
                                {{ $s->title }} <span class="text-slate-400">({{ $s->release_year }})</span>
                            </a>
                            <span class="px-2 py-0.5 rounded bg-amber-50 text-amber-700 font-bold text-[11px]">★ {{ number_format((float)$s->rating, 1) }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

        <!-- Section 5: Featured Talent & Studios -->
        <section>
            <div class="flex items-center gap-2 pb-4 border-b border-slate-200">
                <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                <h2 class="text-lg font-bold text-slate-900">Featured Actors & Directors</h2>
            </div>
            <div class="flex flex-wrap gap-2 mt-6">
                @foreach($featuredTalent as $person)
                    <a href="{{ route('person.show', $person->slug) }}" class="px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:border-purple-500 hover:text-purple-600 transition-colors">
                        {{ $person->name }}
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Section 6: Editorial, Trust & Search Engine Links -->
        <section class="p-8 rounded-3xl bg-slate-900 text-white">
            <h2 class="text-base font-bold text-white mb-4">Editorial Trust, Standards & Machine Feeds</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4 text-xs">
                <div>
                    <h3 class="font-bold text-[#FFA500] mb-2 uppercase tracking-wider text-[11px]">Editorial & Mission</h3>
                    <ul class="space-y-1.5 text-slate-300">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('editorial-guidelines') }}" class="hover:text-white transition-colors">Editorial & Rating Guidelines</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact & Corrections</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors">Help & FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-[#FFA500] mb-2 uppercase tracking-wider text-[11px]">Legal & Governance</h3>
                    <ul class="space-y-1.5 text-slate-300">
                        <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="{{ route('terms') }}#dmca" class="hover:text-white transition-colors">DMCA Takedown Notice</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-[#FFA500] mb-2 uppercase tracking-wider text-[11px]">Search Engine Feeds</h3>
                    <ul class="space-y-1.5 text-slate-300">
                        <li><a href="{{ route('sitemap') }}" target="_blank" class="hover:text-white transition-colors">XML Sitemap (sitemap.xml)</a></li>
                        <li><a href="{{ route('robots') }}" target="_blank" class="hover:text-white transition-colors">Robots Directives (robots.txt)</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-[#FFA500] mb-2 uppercase tracking-wider text-[11px]">Platform Specs</h3>
                    <p class="text-slate-400 text-[11px] leading-relaxed">
                         TonightOnScreen index updated continuously with verified cinema metadata, critic scoring, and streaming guides.
                    </p>
                </div>
            </div>
        </section>

    </div>
</x-layouts.app>
