<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    @push('head')
        <x-seo.json-ld :data="$itemListSchema" />
    @endpush

    <!-- Hero Banner -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#050e38] to-[#010629] text-white py-14 sm:py-18 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-rose-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-500/15 border border-rose-500/30 text-rose-400 text-xs font-bold uppercase tracking-wider mb-5 shadow-sm">
                <span>🔴</span>
                <span>Live Streaming & Digital Calendar</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-4xl mx-auto leading-tight mb-4">
                Latest <span class="text-[#FFA500] italic font-serif">OTT Releases</span> & Streaming Guide
            </h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Track new movies and web series released on Netflix, Prime Video, JioCinema, Hotstar, Zee5, and Apple TV with verified streaming links.
            </p>
        </div>
    </div>

    <!-- Platform Filter Pills -->
    <div class="bg-white border-b border-slate-200 sticky top-18 sm:top-20 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-0.5">
                <a 
                    href="{{ route('ott.releases') }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $selectedPlatform === 'all' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    All Platforms
                </a>
                @foreach($platforms as $p)
                    <a 
                        href="{{ route('ott.releases', ['platform' => $p->slug]) }}"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors flex items-center gap-2 {{ $selectedPlatform === $p->slug ? 'bg-[#010629] text-[#FFA500] ring-1 ring-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                    >
                        <span>{{ $p->name }}</span>
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $selectedPlatform === $p->slug ? 'bg-[#FFA500]/20 text-[#FFA500]' : 'bg-slate-200 text-slate-600' }}">
                            {{ $p->titles_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Spotlight: Trending on OTT Right Now -->
        @if($selectedPlatform === 'all' && $featuredOtt->isNotEmpty())
            <div class="mb-14">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-black text-[#010629] flex items-center gap-2">
                            <span>🔥</span>
                            <span>Highest-Rated Movies on OTT</span>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Top-rated streaming titles critically verified on TonightOnScreen</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach($featuredOtt as $f)
                        @php
                            $plat = $f->streamingPlatforms->first();
                        @endphp
                        <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-xl hover:border-[#FFA500] transition-all flex flex-col">
                            <div class="relative aspect-2/3 bg-slate-900 overflow-hidden">
                                <img src="{{ $f->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $f->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                @if($f->rating)
                                    <div class="absolute top-2 right-2 px-1.5 py-0.5 rounded bg-black/85 text-[#FFA500] text-[10px] font-black border border-white/10 flex items-center gap-0.5">
                                        <span>★</span>
                                        <span class="text-white">{{ number_format((float) $f->rating, 1) }}</span>
                                    </div>
                                @endif
                                @if($plat)
                                    <div class="absolute bottom-2 left-2 px-1.5 py-0.5 rounded bg-slate-900/90 text-[9px] font-bold text-amber-400 backdrop-blur-xs">
                                        {{ $plat->name }}
                                    </div>
                                @endif
                            </div>
                            <div class="p-2.5 flex flex-col flex-grow justify-between">
                                <h3 class="font-bold text-xs text-slate-900 truncate group-hover:text-[#FFA500]">
                                    <a href="{{ route('title.show', $f->slug) }}">{{ $f->title }}</a>
                                </h3>
                                <div class="text-[10px] text-slate-400 mt-1">
                                    {{ $f->release_date?->format('Y') ?: $f->release_year }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Main OTT Releases Catalog -->
        <div>
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#010629]">
                        All Digital & OTT Releases
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Browse available titles with direct provider links</p>
                </div>
                <div class="text-xs font-bold text-slate-500">
                    Showing {{ $titles->total() }} Titles
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6">
                @forelse($titles as $item)
                    @php
                        $isSeries = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                    @endphp
                    <article class="bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs hover:shadow-xl hover:border-rose-400/60 transition-all duration-300 flex flex-col group">
                        <!-- Poster -->
                        <div class="relative aspect-16/10 bg-slate-900 overflow-hidden">
                            <img src="{{ $item->backdrop_url ?: $item->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                            <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5">
                                <span class="px-2 py-0.5 rounded-md bg-black/70 backdrop-blur-xs text-[10px] font-bold text-white">
                                    {{ $isSeries ? 'TV Series' : 'Movie' }}
                                </span>
                            </div>

                            @if($item->rating)
                                <div class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-lg bg-black/85 text-[#FFA500] font-black text-xs border border-white/10 flex items-center gap-1">
                                    <span>★</span>
                                    <span class="text-white">{{ number_format((float)$item->rating, 1) }}</span>
                                </div>
                            @endif

                            <div class="absolute bottom-2.5 left-2.5 right-2.5">
                                <h3 class="font-black text-white text-sm truncate drop-shadow-sm">
                                    <a href="{{ route('title.show', $item->slug) }}" class="hover:text-amber-400 transition-colors">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <div class="text-[10px] text-slate-300 mt-0.5">
                                    {{ $item->release_date?->format('F Y') ?: ($item->release_year ?? 'Released') }}
                                </div>
                            </div>
                        </div>

                        <!-- Info & Streaming Badges -->
                        <div class="p-4 flex flex-col flex-grow justify-between">
                            <div>
                                <div class="text-xs text-slate-500 font-bold mb-2">Available On:</div>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach($item->streamingPlatforms->take(3) as $platform)
                                        <a 
                                            href="{{ $platform->pivot->watch_url ?: route('title.show', $item->slug) }}" 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-700 text-slate-700 text-[11px] font-bold transition-colors border border-slate-200"
                                            title="Watch on {{ $platform->name }}"
                                        >
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span>{{ $platform->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                                <a href="{{ route('title.show', $item->slug) }}" class="text-[#010629] font-bold hover:text-amber-600">
                                    Full Streaming Guide →
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                        <div class="text-4xl mb-3">📺</div>
                        <h3 class="text-base font-bold text-slate-800">No titles listed for this platform yet</h3>
                        <a href="{{ route('ott.releases') }}" class="inline-block mt-3 px-4 py-2 rounded-xl bg-[#010629] text-white text-xs font-bold">
                            View All OTT Platforms
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $titles->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>

