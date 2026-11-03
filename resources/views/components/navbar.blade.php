@php
    $watchlistCount = count(session('watchlist', []));
    $popularGenres = \App\Models\Genre::orderBy('name')->take(8)->get();
@endphp

<header 
    x-data="{
        mobileMenuOpen: false,
        mobileSearchOpen: false,
        query: '{{ request('q') }}',
        isOpen: false,
        isLoading: false,
        results: { titles: [], people: [], companies: [], total: 0 },
        async fetchResults() {
            if (this.query.trim().length < 2) {
                this.results = { titles: [], people: [], companies: [], total: 0 };
                this.isOpen = false;
                return;
            }
            this.isLoading = true;
            try {
                const res = await fetch(`{{ route('search.autocomplete') }}?q=${encodeURIComponent(this.query)}`);
                if (res.ok) {
                    this.results = await res.json();
                    this.isOpen = true;
                }
            } catch (err) {
                console.error('Autocomplete error:', err);
            } finally {
                this.isLoading = false;
            }
        },
        clear() {
            this.query = '';
            this.isOpen = false;
            this.results = { titles: [], people: [], companies: [], total: 0 };
        }
    }"
    x-effect="document.body.classList.toggle('overflow-hidden', mobileMenuOpen)"
    @keydown.escape.window="mobileMenuOpen = false; isOpen = false; mobileSearchOpen = false"
    class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18 sm:h-20">
            <!-- Brand Logo -->
            <div class="flex items-center gap-6 lg:gap-8">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group shrink-0" title="TonightOnScreen">
                    <img 
                        src="{{ asset('Tonight OnScreen Logo.png') }}" 
                        alt="TonightOnScreen" 
                        class="h-9 sm:h-11 w-auto object-contain transition-transform group-hover:scale-102"
                    >
                </a>

                <!-- Desktop Nav Navigation (>= md screens) -->
                <nav class="hidden md:flex items-center gap-5 lg:gap-6 text-sm font-medium text-slate-600">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        Home
                    </a>
                    <a href="{{ route('what-to-watch') }}" class="{{ request()->routeIs('what-to-watch') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] text-amber-600 font-bold transition-colors py-2 flex items-center gap-1' }}">
                        <span>✦</span><span>What to Watch</span>
                    </a>
                    <a href="{{ route('ott.releases') }}" class="{{ request()->routeIs('ott.releases') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        OTT Releases
                    </a>
                    <a href="{{ route('box-office') }}" class="{{ request()->routeIs('box-office') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        Box Office
                    </a>
                    <a href="{{ route('explore', ['type' => 'movie']) }}" class="{{ request()->fullUrlIs('*type=movie*') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        Movies
                    </a>
                    <a href="{{ route('explore', ['type' => 'tv_series']) }}" class="{{ request()->fullUrlIs('*type=tv_series*') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        TV Series
                    </a>
                    <a href="{{ route('top-rated') }}" class="{{ request()->routeIs('top-rated') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        Top Rated
                    </a>
                    <a href="{{ route('person.index') }}" class="{{ request()->routeIs('person.*') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] transition-colors py-2' }}">
                        People
                    </a>
                    <a href="{{ route('games.index') }}" class="{{ request()->routeIs('games.*') ? 'text-[#010629] font-bold relative py-2 after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFA500]' : 'hover:text-[#010629] text-emerald-600 font-bold transition-colors py-2 flex items-center gap-1' }}">
                        <span>🎮</span><span>Games</span>
                    </a>
                </nav>
            </div>

            <!-- Right Controls: Quick Search, Watchlist, Admin & Mobile Hamburger Toggle -->
            <div class="flex items-center gap-2 sm:gap-3.5">
                <!-- Desktop Search Bar (>= sm screens) -->
                <div 
                    @click.outside="isOpen = false"
                    class="relative hidden sm:block sm:w-64 md:w-60 lg:w-80"
                >
                    <form action="{{ route('explore') }}" method="GET" @submit="isOpen = false">
                        <div class="relative">
                            <input 
                                type="text" 
                                name="q"
                                x-model="query"
                                @input.debounce.200ms="fetchResults()"
                                @focus="if (query.trim().length >= 2) isOpen = true"
                                placeholder="Search movies, series, stars..." 
                                autocomplete="off"
                                class="w-full bg-slate-100/90 hover:bg-slate-100 focus:bg-white text-xs text-slate-800 placeholder-slate-400 pl-9 pr-8 py-2.5 rounded-full border border-slate-200/80 focus:border-slate-400 focus:outline-none transition-all shadow-xs"
                            >
                            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>

                            <!-- Loading Spinner -->
                            <div x-show="isLoading" x-cloak class="absolute right-3 top-3">
                                <svg class="animate-spin h-3.5 w-3.5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                            </div>

                            <!-- Clear Button -->
                            <button 
                                type="button" 
                                x-show="!isLoading && query.length > 0" 
                                @click="clear()" 
                                x-cloak 
                                class="absolute right-3 top-3 text-slate-400 hover:text-slate-600 cursor-pointer"
                                title="Clear"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Desktop Autocomplete Floating Dropdown Menu -->
                    <div 
                        x-show="isOpen && query.trim().length >= 2" 
                        x-cloak 
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 -translate-y-1 scale-98"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 -translate-y-1 scale-98"
                        class="absolute right-0 mt-2 w-80 sm:w-96 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-200/90 py-2 z-50 overflow-hidden divide-y divide-slate-100 text-xs"
                    >
                        <!-- 0. Instant Answer Knowledge Card (Zero-Click Answer Snippet) -->
                        <template x-if="results.instant_card">
                            <div class="p-3.5 bg-gradient-to-br from-[#010629] via-slate-900 to-[#0d163f] text-white border-b border-amber-500/30">
                                <div class="flex items-start gap-3">
                                    <template x-if="results.instant_card.image">
                                        <img :src="results.instant_card.image" :alt="results.instant_card.title" class="w-12 h-14 object-cover rounded-lg shrink-0 border border-amber-400/30 shadow-md">
                                    </template>
                                    <div class="flex-grow min-w-0">
                                        <div class="flex items-center gap-1.5 mb-1 flex-wrap">
                                            <span 
                                                class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase tracking-wider border shadow-xs"
                                                :class="results.instant_card.badge_class || 'bg-amber-500/20 text-amber-300 border-amber-500/40'"
                                                x-text="results.instant_card.badge"
                                            ></span>
                                            <span class="text-[9px] text-amber-400/80 font-bold">★ Instant Fact</span>
                                        </div>
                                        <h4 class="font-bold text-xs text-white truncate" x-text="results.instant_card.title"></h4>
                                        <div class="mt-1 flex items-baseline gap-2">
                                            <span class="text-sm font-black text-[#FFA500]" x-text="results.instant_card.main_stat.value"></span>
                                            <span class="text-[10px] text-slate-300" x-text="results.instant_card.main_stat.label"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Detail Chips -->
                                <div class="grid grid-cols-2 gap-1.5 mt-2.5 pt-2 border-t border-white/10 text-[10px]">
                                    <template x-for="detail in results.instant_card.details" :key="detail.label">
                                        <div class="bg-white/5 rounded-md px-2 py-1 border border-white/5">
                                            <span class="text-slate-400 block text-[9px]" x-text="detail.label"></span>
                                            <span class="font-semibold text-slate-200 truncate block" x-text="detail.value"></span>
                                        </div>
                                    </template>
                                </div>

                                <!-- Direct CTA -->
                                <a 
                                    :href="results.instant_card.url" 
                                    class="mt-2.5 flex items-center justify-between px-3 py-1.5 rounded-lg bg-[#FFA500] hover:bg-amber-400 text-[#010629] font-black text-[11px] transition-colors shadow-xs group"
                                >
                                    <span x-text="results.instant_card.cta_label"></span>
                                    <span class="group-hover:translate-x-0.5 transition-transform">→</span>
                                </a>
                            </div>
                        </template>

                        <!-- Discovery / Recommendation Section (Pattern F) -->
                        <template x-if="results.discovery && results.discovery.length > 0">
                            <div class="p-2 space-y-1 bg-amber-50/50 border-b border-amber-100">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-amber-700 block">
                                    Recommendations & Curated Guides
                                </span>
                                <template x-for="item in results.discovery" :key="item.url">
                                    <a 
                                        :href="item.url" 
                                        class="flex items-center gap-3 p-2 rounded-xl hover:bg-amber-100/70 transition-colors group"
                                    >
                                        <div class="w-8 h-8 rounded-lg bg-amber-500 text-white flex items-center justify-center font-black text-xs shrink-0 shadow-xs">
                                            ★
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <div class="flex items-center gap-1.5">
                                                <h4 class="font-bold text-slate-900 group-hover:text-amber-700 transition-colors truncate" x-text="item.label"></h4>
                                                <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-amber-200/80 text-amber-900 shrink-0" x-text="item.badge"></span>
                                            </div>
                                            <span class="text-[10px] text-slate-500">Curated rankings & streaming list</span>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <!-- Talent Section (Prioritized when query has Person Intent) -->
                        <template x-if="results.is_person && results.people && results.people.length > 0">
                            <div class="p-2 space-y-1 bg-amber-50/40 border-b border-amber-100/60">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-amber-800 block">
                                    Talent & Stars Match
                                </span>
                                <template x-for="person in results.people" :key="'priority-' + person.slug">
                                    <a 
                                        :href="person.url" 
                                        class="flex items-center gap-3 p-2 rounded-xl hover:bg-white transition-colors group border border-transparent hover:border-amber-200"
                                    >
                                        <div class="w-9 h-9 rounded-full bg-slate-200 overflow-hidden shrink-0 shadow-xs flex items-center justify-center border border-amber-300/60">
                                            <template x-if="person.photo">
                                                <img :src="person.photo" :alt="person.name" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!person.photo">
                                                <svg class="w-5 h-5 text-slate-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/>
                                                </svg>
                                            </template>
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <div class="flex items-center gap-1.5 mb-0.5">
                                                <h4 class="font-bold text-slate-900 group-hover:text-amber-600 transition-colors truncate" x-text="person.name"></h4>
                                                <template x-if="person.intent_badge">
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-black bg-amber-200 text-amber-900 border border-amber-400/50 shrink-0" x-text="person.intent_badge"></span>
                                                </template>
                                            </div>
                                            <p class="text-[10px] text-slate-500 font-medium" x-text="person.role"></p>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <!-- Titles Section -->
                        <template x-if="results.titles && results.titles.length > 0">
                            <div class="p-2 space-y-1">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 block">
                                    Movies & Shows
                                </span>
                                <template x-for="item in results.titles" :key="item.slug">
                                    <a 
                                        :href="item.url" 
                                        class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-100/80 transition-colors group"
                                    >
                                        <img :src="item.poster" :alt="item.title" class="w-9 h-12 object-cover rounded-lg bg-slate-900 shrink-0 shadow-xs">
                                        <div class="flex-grow min-w-0">
                                            <div class="flex items-center gap-1.5 mb-0.5">
                                                <h4 class="font-bold text-slate-900 group-hover:text-amber-600 transition-colors truncate" x-text="item.title"></h4>
                                                <span 
                                                    class="px-1.5 py-0.2 rounded text-[9px] font-bold shrink-0"
                                                    :class="item.is_series ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-700'"
                                                    x-text="item.type_label"
                                                ></span>
                                                <template x-if="item.intent_badge">
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-black bg-amber-100 text-amber-800 border border-amber-300/60 shrink-0" x-text="item.intent_badge"></span>
                                                </template>
                                            </div>
                                            <div class="flex items-center gap-2 text-[11px] text-slate-400">
                                                <span x-text="item.year || 'Cinema'"></span>
                                                <template x-if="item.rating">
                                                    <span class="text-amber-500 font-bold" x-text="'★ ' + item.rating"></span>
                                                </template>
                                            </div>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <!-- Standard Talent Section (when query is general) -->
                        <template x-if="!results.is_person && results.people && results.people.length > 0">
                            <div class="p-2 space-y-1">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 block">
                                    Talent & Stars
                                </span>
                                <template x-for="person in results.people" :key="person.slug">
                                    <a 
                                        :href="person.url" 
                                        class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-100/80 transition-colors group"
                                    >
                                        <div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden shrink-0 shadow-inner flex items-center justify-center">
                                            <template x-if="person.photo">
                                                <img :src="person.photo" :alt="person.name" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!person.photo">
                                                <svg class="w-5 h-5 text-slate-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/>
                                                </svg>
                                            </template>
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <div class="flex items-center gap-1.5 mb-0.5">
                                                <h4 class="font-bold text-slate-900 group-hover:text-amber-600 transition-colors truncate" x-text="person.name"></h4>
                                                <template x-if="person.intent_badge">
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-black bg-amber-100 text-amber-800 border border-amber-300/60 shrink-0" x-text="person.intent_badge"></span>
                                                </template>
                                            </div>
                                            <p class="text-[10px] text-slate-400 font-medium" x-text="person.role"></p>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <!-- Studios Section -->
                        <template x-if="results.companies && results.companies.length > 0">
                            <div class="p-2 space-y-1">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-400 block">
                                    Studios & Networks
                                </span>
                                <template x-for="comp in results.companies" :key="comp.slug">
                                    <a 
                                        :href="comp.url" 
                                        class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-100/80 transition-colors group"
                                    >
                                        <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 border border-amber-200/50">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-bold text-slate-900 group-hover:text-amber-600 transition-colors truncate" x-text="comp.name"></h4>
                                            <p class="text-[10px] text-slate-400 truncate" x-text="comp.headquarters || 'Production Studio'"></p>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </template>

                        <!-- Empty State -->
                        <div x-show="!isLoading && results.total === 0" class="p-6 text-center text-slate-400">
                            <p class="text-xs mb-1 font-medium">No results found for "<span class="font-bold text-slate-700" x-text="query"></span>"</p>
                            <p class="text-[11px] text-slate-400">Try searching for a movie title, actor, or studio.</p>
                        </div>

                        <!-- Footer View All CTA -->
                        <div class="p-2 bg-slate-50/80">
                            <a 
                                :href="`{{ route('explore') }}?q=${encodeURIComponent(query)}`" 
                                class="w-full py-2 px-3 rounded-xl bg-slate-950 hover:bg-slate-800 text-white text-[11px] font-bold flex items-center justify-center gap-1.5 transition-colors"
                            >
                                <span>See all results for</span>
                                <span class="truncate max-w-[120px]" x-text="'&ldquo;' + query + '&rdquo;'"></span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Search Toggle Button (< sm screens) -->
                <button 
                    type="button" 
                    @click="mobileSearchOpen = !mobileSearchOpen; if (mobileSearchOpen) $nextTick(() => $refs.mobileHeaderSearchInput.focus())"
                    class="sm:hidden w-10 h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-slate-950 hover:bg-slate-100 transition-colors"
                    :class="{ 'bg-amber-100 text-amber-900': mobileSearchOpen }"
                    title="Search"
                    aria-label="Toggle Search"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Bookmark / Watchlist Link -->
                <a 
                    href="{{ route('watchlist.index') }}" 
                    class="relative w-10 h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-slate-950 hover:bg-slate-100 transition-colors {{ request()->routeIs('watchlist.*') ? 'bg-amber-100 text-amber-900' : '' }}" 
                    title="My Watchlist"
                >
                    <svg class="w-5 h-5 {{ $watchlistCount > 0 ? 'text-amber-600 fill-amber-500/20' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                    @if($watchlistCount > 0)
                        <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 rounded-full bg-amber-500 text-slate-950 text-[10px] font-extrabold flex items-center justify-center shadow-xs border border-white">
                            {{ $watchlistCount }}
                        </span>
                    @endif
                </a>

                <!-- Profile / Admin Link (hidden on small mobile screens to keep header clean) -->
                <a href="/admin" class="hidden sm:flex w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200/90 text-slate-700 items-center justify-center transition-colors border border-slate-200/60" title="Admin CMS Panel">
                    <svg class="w-5 h-5 text-slate-600" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 4a4 4 0 100 8 4 4 0 000-8zm-2 9a4 4 0 00-4 4v1a2 2 0 002 2h8a2 2 0 002-2v-1a4 4 0 00-4-4h-4z" clip-rule="evenodd"/>
                    </svg>
                </a>

                <!-- Mobile Hamburger Menu Button (< md screens) -->
                <button 
                    type="button" 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="relative w-10 h-10 rounded-xl flex md:hidden items-center justify-center text-slate-700 hover:text-slate-950 hover:bg-slate-100 focus:outline-none transition-colors border border-slate-200/80 shadow-xs"
                    :class="{ 'bg-slate-100 text-slate-950 border-amber-400': mobileMenuOpen }"
                    aria-label="Toggle Navigation Menu"
                    :aria-expanded="mobileMenuOpen"
                >
                    <div class="w-5 h-4 flex flex-col justify-between relative">
                        <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 transform origin-left" :class="{ 'rotate-45 translate-x-0.5 translate-y-0.5': mobileMenuOpen }"></span>
                        <span class="w-full h-0.5 bg-current rounded-full transition-all duration-200" :class="{ 'opacity-0 translate-x-2': mobileMenuOpen }"></span>
                        <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 transform origin-left" :class="{ '-rotate-45 translate-x-0.5 -translate-y-0.5': mobileMenuOpen }"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Expandable Search Bar Drawer (< sm screens) -->
        <div 
            x-show="mobileSearchOpen" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="sm:hidden pb-4 pt-1"
        >
            <form action="{{ route('explore') }}" method="GET" @submit="mobileSearchOpen = false">
                <div class="relative">
                    <input 
                        type="text" 
                        name="q"
                        x-ref="mobileHeaderSearchInput"
                        x-model="query"
                        @input.debounce.200ms="fetchResults()"
                        placeholder="Search movies, series, stars..." 
                        class="w-full bg-slate-100 focus:bg-white text-xs text-slate-900 placeholder-slate-400 pl-9 pr-10 py-3 rounded-xl border border-slate-200 focus:border-amber-400 focus:outline-none transition-all shadow-inner"
                    >
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>

                    <!-- Close/Clear Search Button -->
                    <button 
                        type="button" 
                        @click="clear(); mobileSearchOpen = false" 
                        class="absolute right-3 top-3 text-slate-400 hover:text-slate-600 p-0.5"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Instant Autocomplete Results -->
                <div 
                    x-show="query.trim().length >= 2 && results.total > 0" 
                    x-cloak 
                    class="mt-2 bg-white rounded-xl shadow-xl border border-slate-200 overflow-hidden divide-y divide-slate-100 text-xs"
                >
                    <!-- Mobile Instant Card -->
                    <template x-if="results.instant_card">
                        <div class="p-3 bg-gradient-to-br from-[#010629] via-slate-900 to-[#0d163f] text-white">
                            <div class="flex items-start gap-2.5">
                                <template x-if="results.instant_card.image">
                                    <img :src="results.instant_card.image" :alt="results.instant_card.title" class="w-10 h-12 object-cover rounded shrink-0 border border-amber-400/30">
                                </template>
                                <div class="flex-grow min-w-0">
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-black uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/40" x-text="results.instant_card.badge"></span>
                                    <h4 class="font-bold text-xs text-white truncate mt-1" x-text="results.instant_card.title"></h4>
                                    <div class="text-[#FFA500] font-black text-xs" x-text="results.instant_card.main_stat.value"></div>
                                </div>
                            </div>
                            <a :href="results.instant_card.url" class="mt-2 block text-center py-1.5 rounded bg-[#FFA500] text-[#010629] font-black text-[11px]" x-text="results.instant_card.cta_label"></a>
                        </div>
                    </template>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= MOBILE MENU SLIDE-OVER DRAWER ================= -->
    <!-- Backdrop Overlay -->
    <div 
        x-show="mobileMenuOpen" 
        x-cloak
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-[#010629]/75 backdrop-blur-sm z-50 md:hidden"
        aria-hidden="true"
    ></div>

    <!-- Slide-over Off-Canvas Panel -->
    <div 
        x-show="mobileMenuOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-y-0 right-0 w-full max-w-sm bg-white shadow-2xl z-50 flex flex-col md:hidden border-l border-slate-200/80 overflow-hidden"
        role="dialog"
        aria-modal="true"
        aria-label="Mobile Navigation"
    >
        <!-- Drawer Top Bar -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100 bg-slate-50/60">
            <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="flex items-center gap-2">
                <img 
                    src="{{ asset('Tonight OnScreen Logo.png') }}" 
                    alt="TonightOnScreen" 
                    class="h-8 w-auto object-contain"
                >
            </a>

            <!-- Close Drawer Button -->
            <button 
                type="button" 
                @click="mobileMenuOpen = false" 
                class="w-9 h-9 rounded-full bg-slate-200/70 text-slate-600 hover:text-slate-950 hover:bg-slate-300 flex items-center justify-center transition-colors focus:outline-none"
                aria-label="Close Navigation Menu"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Scrollable Drawer Body -->
        <div class="flex-1 overflow-y-auto px-5 py-5 space-y-6 no-scrollbar">
            <!-- Search Inside Drawer -->
            <div>
                <form action="{{ route('explore') }}" method="GET" @submit="mobileMenuOpen = false">
                    <div class="relative">
                        <input 
                            type="text" 
                            name="q"
                            x-model="query"
                            placeholder="Search movies, series, stars..." 
                            class="w-full bg-slate-100 focus:bg-white text-xs text-slate-900 placeholder-slate-400 pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 focus:border-amber-400 focus:outline-none transition-all shadow-xs"
                        >
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>
            </div>

            <!-- Primary Navigation Links -->
            <div class="space-y-1">
                <p class="px-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Main Menu</p>

                <!-- 1. Home -->
                <a 
                    href="{{ route('home') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('home') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('home') ? 'bg-amber-500 text-slate-950' : 'bg-slate-100 text-slate-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold">Home</span>
                    </div>
                    <span class="text-xs text-slate-400">Hub</span>
                </a>

                <!-- 1b. What to Watch Tonight -->
                <a 
                    href="{{ route('what-to-watch') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('what-to-watch') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 font-black text-xs">
                            ✦
                        </div>
                        <div>
                            <span class="text-sm font-semibold block text-amber-700">What to Watch</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Mood & Time Recommender</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-200 text-amber-900">Featured</span>
                </a>

                <!-- 1c. OTT Releases -->
                <a 
                    href="{{ route('ott.releases') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('ott.releases') ? 'bg-rose-50 text-slate-950 font-bold border-l-4 border-rose-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-700 flex items-center justify-center shrink-0 text-xs">
                            🔴
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">OTT Releases</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Digital Streaming Calendar</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-700">Live</span>
                </a>

                <!-- 1d. Box Office -->
                <a 
                    href="{{ route('box-office') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('box-office') ? 'bg-emerald-50 text-slate-950 font-bold border-l-4 border-emerald-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 text-xs">
                            💰
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Box Office</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Budgets & Verdicts</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Stats</span>
                </a>

                <!-- 1e. Cinema Games Arcade -->
                <a 
                    href="{{ route('games.index') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('games.*') ? 'bg-emerald-50 text-slate-950 font-bold border-l-4 border-emerald-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center shrink-0 text-xs">
                            🎮
                        </div>
                        <div>
                            <span class="text-sm font-semibold block text-sky-800">Cinema Games</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Daily Cinele & Box Office Clash</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-sky-100 text-sky-800">Play</span>
                </a>

                <!-- 2. Movies -->
                <a 
                    href="{{ route('explore', ['type' => 'movie']) }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->fullUrlIs('*type=movie*') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->fullUrlIs('*type=movie*') ? 'bg-amber-500 text-slate-950' : 'bg-orange-50 text-orange-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Movies</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Blockbusters & Classics</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-orange-700">Film</span>
                </a>

                <!-- 3. TV Series -->
                <a 
                    href="{{ route('explore', ['type' => 'tv_series']) }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->fullUrlIs('*type=tv_series*') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->fullUrlIs('*type=tv_series*') ? 'bg-amber-500 text-slate-950' : 'bg-purple-50 text-purple-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect width="20" height="15" x="2" y="7" rx="2" ry="2"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 2-5 5-5-5"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">TV Series</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Binge-Worthy Shows</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-100 text-purple-700">Shows</span>
                </a>

                <!-- 4. Top Rated -->
                <a 
                    href="{{ route('top-rated') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('top-rated') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('top-rated') ? 'bg-amber-500 text-slate-950' : 'bg-amber-50 text-amber-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Top Rated</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Hall of Fame</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">★ 8.0+</span>
                </a>

                <!-- 5. Trending -->
                <a 
                    href="{{ route('trending') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('trending') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('trending') ? 'bg-amber-500 text-slate-950' : 'bg-rose-50 text-rose-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Trending</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">What's Hot Tonight</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-700">Hot</span>
                </a>

                <!-- 6. Genres -->
                <a 
                    href="{{ route('genre.index') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('genre.*') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('genre.*') ? 'bg-amber-500 text-slate-950' : 'bg-indigo-50 text-indigo-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Genres</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Explore Categories</span>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                <!-- 7. People & Stars -->
                <a 
                    href="{{ route('person.index') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('person.*') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('person.*') ? 'bg-amber-500 text-slate-950' : 'bg-emerald-50 text-emerald-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">People & Stars</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Actors & Directors</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-700">Talent</span>
                </a>

                <!-- 8. Streaming Platforms -->
                <a 
                    href="{{ route('platforms.index') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('platforms.*') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('platforms.*') ? 'bg-amber-500 text-slate-950' : 'bg-sky-50 text-sky-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Streaming Platforms</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Netflix, Prime, Apple TV+</span>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                <!-- 9. Explore -->
                <a 
                    href="{{ route('explore') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl transition-all {{ request()->routeIs('explore') && !request()->has('type') ? 'bg-amber-50 text-slate-950 font-bold border-l-4 border-amber-500' : 'text-slate-700 hover:bg-slate-50 hover:text-slate-950 border-l-4 border-transparent' }}"
                >
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-lg {{ request()->routeIs('explore') && !request()->has('type') ? 'bg-amber-500 text-slate-950' : 'bg-teal-50 text-teal-600' }} flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold block">Explore All</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Advanced Filters & Discover</span>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- Quick Browse Genres Section -->
            @if($popularGenres->count() > 0)
                <div class="pt-2 border-t border-slate-100">
                    <p class="px-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2.5">Popular Genres</p>
                    <div class="flex flex-wrap gap-1.5 px-1">
                        @foreach($popularGenres as $g)
                            <a 
                                href="{{ route('genre.show', $g->slug) }}" 
                                @click="mobileMenuOpen = false"
                                class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-amber-100 hover:text-amber-900 text-slate-700 text-xs font-semibold transition-colors"
                            >
                                {{ $g->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- User Tools: Watchlist & Admin -->
            <div class="pt-2 border-t border-slate-100 space-y-2">
                <p class="px-2 text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">My Tools</p>
                
                <!-- My Watchlist Card -->
                <a 
                    href="{{ route('watchlist.index') }}" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl bg-slate-50 hover:bg-amber-50/70 border border-slate-200/80 transition-colors group"
                >
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-600 flex items-center justify-center">
                            <svg class="w-4 h-4 fill-amber-500" viewBox="0 0 24 24">
                                <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-slate-900 group-hover:text-amber-700 transition-colors block">My Watchlist</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Saved movies & series</span>
                        </div>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-extrabold bg-amber-500 text-slate-950 shadow-xs">
                        {{ $watchlistCount }}
                    </span>
                </a>

                <!-- Admin CMS Link -->
                <a 
                    href="/admin" 
                    @click="mobileMenuOpen = false"
                    class="flex items-center justify-between p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 transition-colors group"
                >
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-slate-200 text-slate-700 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 4a4 4 0 100 8 4 4 0 000-8zm-2 9a4 4 0 00-4 4v1a2 2 0 002 2h8a2 2 0 002-2v-1a4 4 0 00-4-4h-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-slate-900 group-hover:text-slate-950 transition-colors block">Admin CMS Panel</span>
                            <span class="text-[11px] text-slate-400 block -mt-0.5">Database & Content Management</span>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Drawer Footer Info -->
        <div class="p-4 border-t border-slate-100 bg-slate-50/70 text-center">
            <p class="text-[11px] font-medium text-slate-500">TonightOnScreen &copy; {{ date('Y') }}</p>
            <p class="text-[10px] text-slate-400 mt-0.5">Discover Movies, TV Shows & Talent</p>
        </div>
    </div>
</header>
