<x-layouts.app :title="'My Watchlist — Saved Movies & Series | TonightOnScreen'">
    <div class="bg-[#f8fafc] min-h-screen pb-20">
        <!-- 1. Header Section -->
        <div class="bg-[#010629] text-white pt-10 pb-12 px-4 sm:px-6 lg:px-8 border-b border-[#0d163f] relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 right-1/4 w-80 h-80 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    <span class="text-slate-200">Watchlist</span>
                </nav>

                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/20 text-amber-400 text-xs font-bold mb-3">
                            <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" alt="TonightOnScreen" class="w-3.5 h-3.5 rounded-xs object-contain">
                            <span>Personal Library</span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                            My Watchlist
                        </h1>
                        <p class="text-xs sm:text-sm text-slate-400 mt-1 max-w-lg">
                            Track the cinema releases, documentaries, and binge-worthy series you plan to stream next.
                        </p>
                    </div>

                    @if($totalCount > 0)
                        <form action="{{ route('watchlist.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear your entire watchlist?');">
                            @csrf
                            <button type="submit" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-rose-500/20 text-slate-300 hover:text-rose-300 text-xs font-semibold border border-white/10 hover:border-rose-500/30 transition-all cursor-pointer flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span>Clear Watchlist</span>
                            </button>
                        </form>
                    @endif
                </div>

                <!-- 2. Segmented Filter Tabs -->
                @if($totalCount > 0)
                    <div class="mt-8 pt-6 border-t border-white/10 flex items-center gap-2 overflow-x-auto no-scrollbar">
                        <a 
                            href="{{ route('watchlist.index', ['type' => 'all']) }}" 
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 flex items-center gap-2 {{ $activeFilter === 'all' ? 'bg-amber-400 text-slate-950 shadow-sm' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                        >
                            <span>All Saved</span>
                            <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-slate-950/20 text-current">{{ $totalCount }}</span>
                        </a>

                        @if($movieCount > 0)
                            <a 
                                href="{{ route('watchlist.index', ['type' => 'movie']) }}" 
                                class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 flex items-center gap-2 {{ $activeFilter === 'movie' ? 'bg-amber-400 text-slate-950 shadow-sm' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                            >
                                <span>Movies</span>
                                <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-slate-950/20 text-current">{{ $movieCount }}</span>
                            </a>
                        @endif

                        @if($seriesCount > 0)
                            <a 
                                href="{{ route('watchlist.index', ['type' => 'tv_series']) }}" 
                                class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 flex items-center gap-2 {{ $activeFilter === 'tv_series' ? 'bg-amber-400 text-slate-950 shadow-sm' : 'bg-white/5 text-slate-300 hover:bg-white/10' }}"
                            >
                                <span>TV Series</span>
                                <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-slate-950/20 text-current">{{ $seriesCount }}</span>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- 3. Saved Items Grid or Empty State -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            @if($titles->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-3xl border border-slate-200/80 p-12 sm:p-16 text-center max-w-lg mx-auto shadow-sm my-8">
                    <div class="w-20 h-20 rounded-full bg-amber-50 text-amber-500 mx-auto flex items-center justify-center mb-5 border border-amber-200/60 shadow-inner">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Your Watchlist is Empty</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mb-8 leading-relaxed max-w-sm mx-auto">
                        Discover blockbuster films, gripping series, and save them to your personal watchlist to never lose track of what to stream.
                    </p>
                    <a href="{{ route('explore') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-slate-950 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-md active:scale-95">
                        <span>Explore Catalog</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            @else
                <!-- Interactive Watchlist Cards Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($titles as $item)
                        @php
                            $isTv = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                            $poster = $item->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        @endphp

                        <div 
                            x-data="{
                                removed: false,
                                async removeItem(id) {
                                    try {
                                        const res = await fetch(`{{ route('watchlist.toggle') }}`, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                                'Accept': 'application/json'
                                            },
                                            body: JSON.stringify({ title_id: id })
                                        });
                                        if (res.ok) {
                                            this.removed = true;
                                            setTimeout(() => window.location.reload(), 300);
                                        }
                                    } catch (err) {
                                        console.error(err);
                                    }
                                }
                            }"
                            x-show="!removed"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col group relative"
                        >
                            <!-- Poster Frame -->
                            <div class="aspect-[2/3] w-full bg-slate-950 relative overflow-hidden">
                                <a href="{{ route('title.show', $item->slug) }}">
                                    <img 
                                        src="{{ $poster }}" 
                                        alt="{{ $item->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </a>

                                <!-- Format Badge -->
                                <div class="absolute top-2.5 left-2.5">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold {{ $isTv ? 'bg-purple-900/80 text-purple-200 border border-purple-500/30' : 'bg-slate-950/80 text-white border border-white/20' }} backdrop-blur-md">
                                        {{ $isTv ? 'TV Series' : 'Movie' }}
                                    </span>
                                </div>

                                <!-- Remove Bookmark Button -->
                                <button 
                                    type="button" 
                                    @click="removeItem({{ $item->id }})"
                                    class="absolute top-2.5 right-2.5 w-7 h-7 rounded-full bg-slate-950/80 hover:bg-rose-600 text-white flex items-center justify-center backdrop-blur-md transition-colors shadow-sm cursor-pointer"
                                    title="Remove from Watchlist"
                                >
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                        <path d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>

                                <!-- Rating Badge -->
                                <div class="absolute bottom-2.5 left-2.5">
                                    <div class="flex items-center gap-1 px-2 py-0.5 rounded-md bg-slate-950/80 backdrop-blur-md text-amber-400 text-[11px] font-bold border border-white/10">
                                        <span>★</span>
                                        <span>{{ number_format((float) $item->rating, 1) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-950 group-hover:text-amber-600 transition-colors line-clamp-1 mb-1">
                                        <a href="{{ route('title.show', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h3>

                                    <div class="flex items-center gap-1.5 text-[11px] text-slate-500 mb-2">
                                        <span>{{ $item->release_year ?? 'Cinema' }}</span>
                                        @if($item->genres->isNotEmpty())
                                            <span>•</span>
                                            <span class="truncate">{{ $item->genres->pluck('name')->take(2)->join(', ') }}</span>
                                        @endif
                                    </div>

                                    @if($item->overview)
                                        <p class="text-[11px] text-slate-400 line-clamp-2 leading-relaxed mb-3">
                                            {{ $item->overview }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="pt-3 border-t border-slate-100 flex items-center gap-2">
                                    <a 
                                        href="{{ route('title.show', $item->slug) }}" 
                                        class="flex-grow py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-[11px] font-bold text-center transition-colors"
                                    >
                                        View Details
                                    </a>

                                    <button 
                                        type="button" 
                                        @click="removeItem({{ $item->id }})"
                                        class="p-2 rounded-xl bg-slate-100 hover:bg-rose-50 text-slate-500 hover:text-rose-600 transition-colors cursor-pointer"
                                        title="Remove"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
