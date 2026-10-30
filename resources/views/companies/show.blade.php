@php
    $companySchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $company->name,
        'url' => route('company.show', $company->slug),
    ];
    if ($company->headquarters) {
        $companySchema['address'] = $company->headquarters;
    }
    if ($company->description) {
        $companySchema['description'] = strip_tags($company->description);
    }
@endphp

<x-layouts.app 
    :title="$company->name . ' — Studio Profile, Productions & Filmography | TonightOnScreen'"
    :description="\Illuminate\Support\Str::limit(strip_tags($company->description ?: 'Explore movies and TV series produced by ' . $company->name . '. Studio history, major releases, and critical ratings on TonightOnScreen.'), 155)"
>
    @push('head')
        <!-- Schema.org Organization JSON-LD for Search Engine SEO -->
        <x-seo.json-ld :data="$companySchema" />
    @endpush

    <!-- 1. Studio Hero & Identity Section -->
    <div class="relative bg-[#010629] text-white overflow-hidden pb-16 border-b border-[#0d163f]">
        <!-- Ambient Backdrop Lighting -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/90 to-[#010629]/60"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <!-- Breadcrumbs -->
            <x-breadcrumbs :items="[
                ['name' => 'Explore', 'url' => route('explore')],
                ['name' => $company->name]
            ]" />

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Left: Studio Monogram / Logo Card (4 Cols) -->
                <div class="md:col-span-4 lg:col-span-3">
                    <div class="aspect-square w-full rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-gradient-to-br from-slate-900 to-slate-950 flex flex-col items-center justify-center p-6 text-center relative group">
                        @if($company->logo_path && file_exists(public_path($company->logo_path)))
                            <img src="{{ asset($company->logo_path) }}" alt="{{ $company->name }}" class="max-h-28 object-contain">
                        @else
                            <!-- Stylized Studio Insignia Monogram -->
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-amber-400/20 to-amber-600/10 border border-amber-400/30 flex items-center justify-center mb-4 shadow-inner group-hover:scale-105 transition-transform p-3">
                                <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" class="w-full h-full object-contain" alt="{{ $company->name }}">
                            </div>
                            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Production Studio</span>
                        @endif

                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-white/10 backdrop-blur-md text-slate-300 border border-white/10">
                                Verified Studio
                            </span>
                        </div>
                    </div>

                    <!-- Quick Facts Sidebar -->
                    <div class="mt-5 bg-white/5 backdrop-blur-md rounded-2xl p-4 border border-white/10 space-y-3 text-xs">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block">Studio Dossier</span>

                        @if($company->headquarters)
                            <div>
                                <span class="text-slate-400 block mb-0.5 font-medium">Headquarters</span>
                                <span class="text-slate-200 font-semibold">{{ $company->headquarters }}</span>
                            </div>
                        @endif

                        <div>
                            <span class="text-slate-400 block mb-0.5 font-medium">Catalog Footprint</span>
                            <span class="text-slate-200 font-semibold">{{ $stats['totalTitles'] }} Premier Productions</span>
                        </div>

                        @if($company->website)
                            <div class="pt-2">
                                <a 
                                    href="{{ $company->website }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="w-full py-2.5 px-3 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold flex items-center justify-center gap-2 border border-white/10 transition-colors"
                                >
                                    <span>Official Website</span>
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Studio Bio, Financial Analytics & Spotlight (8-9 Cols) -->
                <div class="md:col-span-8 lg:col-span-9 space-y-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-slate-300 text-xs font-semibold mb-3 border border-white/10">
                            <span>Entertainment Studio</span>
                            <span>•</span>
                            <span class="text-amber-400">Active {{ $stats['catalogSpan'] }}</span>
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                            {{ $company->name }}
                        </h1>

                        <p class="text-sm font-medium text-amber-300/90 mt-1">
                            Cinematic Production, Distribution & Creative Development
                        </p>
                    </div>

                    <!-- Studio Financial & Performance KPI Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl">
                            <span class="text-[11px] text-slate-400 block font-medium">Total Catalog</span>
                            <span class="text-xl font-extrabold text-white">{{ $stats['totalTitles'] }} Titles</span>
                        </div>
                        @php
                            $isIndianCompany = str_contains(strtolower($company->headquarters ?? ''), 'india') 
                                || str_contains(strtolower($company->headquarters ?? ''), 'mumbai') 
                                || str_contains(strtolower($company->headquarters ?? ''), 'chennai')
                                || ($titles->isNotEmpty() && $titles->filter(fn($t) => $t->isIndian())->count() >= ($titles->count() / 2));
                        @endphp
                        <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl">
                            <span class="text-[11px] text-slate-400 block font-medium">{{ $isIndianCompany ? 'Total Collection' : 'Box Office Gross' }}</span>
                            <span class="text-xl font-extrabold text-emerald-400">
                                @if($isIndianCompany)
                                    @if($stats['totalBoxOffice'] >= 10000000)
                                        Rs. {{ number_format($stats['totalBoxOffice'] / 10000000, 0) }} Cr
                                    @elseif($stats['totalBoxOffice'] > 0)
                                        Rs. {{ number_format($stats['totalBoxOffice'] / 100000, 0) }} L
                                    @else
                                        —
                                    @endif
                                @else
                                    @if($stats['totalBoxOffice'] > 0)
                                        ${{ number_format($stats['totalBoxOffice'] / 1000000, 1) }}M
                                    @else
                                        —
                                    @endif
                                @endif
                            </span>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl">
                            <span class="text-[11px] text-slate-400 block font-medium">Avg Rating</span>
                            <span class="text-xl font-extrabold text-amber-400">★ {{ $stats['avgRating'] }}</span>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl">
                            <span class="text-[11px] text-slate-400 block font-medium">Key Focus</span>
                            <span class="text-xl font-extrabold text-white truncate block">{{ $stats['topGenre'] }}</span>
                        </div>
                    </div>

                    <!-- Studio Narrative -->
                    <div class="space-y-2">
                        <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400">Overview</h2>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-3xl">
                            {{ $company->description ?: $company->name . ' is an esteemed production company in the global entertainment industry known for quality cinema and television.' }}
                        </p>
                    </div>

                    <!-- Studio Hall of Fame Spotlight -->
                    @if($spotlight->isNotEmpty())
                        <div class="pt-4 border-t border-white/10">
                            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">Hall of Fame Releases</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                @foreach($spotlight as $sTitle)
                                    <a 
                                        href="{{ route('title.show', $sTitle->slug) }}" 
                                        class="group rounded-xl overflow-hidden bg-white/5 border border-white/10 hover:border-amber-400/40 transition-all card-shadow-hover"
                                    >
                                        <div class="aspect-[3/4] w-full bg-slate-900 overflow-hidden relative">
                                            <img 
                                                src="{{ $sTitle->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                                                alt="{{ $sTitle->title }}" 
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                loading="lazy"
                                            >
                                        </div>
                                        <div class="p-2.5">
                                            <h4 class="text-xs font-bold text-white group-hover:text-amber-400 transition-colors truncate">
                                                {{ $sTitle->title }}
                                            </h4>
                                            <div class="flex items-center justify-between text-[10px] text-slate-400 mt-0.5">
                                                <span>{{ $sTitle->release_year ?? 'Cinema' }}</span>
                                                <span class="text-amber-400 font-bold">★ {{ number_format((float) $sTitle->rating, 1) }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- 2. Studio Production Catalog Explorer -->
    <section class="py-12 bg-[#f8fafc] min-h-[500px]" x-data="{ catalogFilter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Filmography & Releases</span>
                    <h2 class="text-2xl font-extrabold text-slate-950">Produced Titles</h2>
                </div>

                <!-- Catalog Filter Pills -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                    <button 
                        @click="catalogFilter = 'all'"
                        :class="catalogFilter === 'all' ? 'bg-slate-950 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer flex items-center gap-2"
                    >
                        <span>All Releases</span>
                        <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-white/20 text-current">{{ $titles->count() }}</span>
                    </button>

                    @if($movies->isNotEmpty())
                        <button 
                            @click="catalogFilter = 'movies'"
                            :class="catalogFilter === 'movies' ? 'bg-slate-950 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer flex items-center gap-2"
                        >
                            <span>Movies</span>
                            <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-white/20 text-current">{{ $movies->count() }}</span>
                        </button>
                    @endif

                    @if($series->isNotEmpty())
                        <button 
                            @click="catalogFilter = 'series'"
                            :class="catalogFilter === 'series' ? 'bg-slate-950 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer flex items-center gap-2"
                        >
                            <span>TV Series</span>
                            <span class="px-1.5 py-0.2 rounded-md text-[10px] bg-white/20 text-current">{{ $series->count() }}</span>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Titles Grid -->
            @if($titles->isEmpty())
                <div class="p-12 text-center text-slate-400 bg-white rounded-3xl border border-slate-200">
                    No active productions cataloged for this studio yet.
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($titles as $item)
                        @php
                            $isTv = ($item->type instanceof \App\Enums\TitleType ? $item->type === \App\Enums\TitleType::TV_SERIES : $item->type === 'tv_series');
                            $filterCategory = $isTv ? 'series' : 'movies';
                            $poster = $item->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                        @endphp

                        <div 
                            x-show="catalogFilter === 'all' || catalogFilter === '{{ $filterCategory }}'" 
                            x-cloak
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col group"
                        >
                            <a href="{{ route('title.show', $item->slug) }}" class="aspect-[2/3] w-full bg-slate-950 relative overflow-hidden block">
                                <img 
                                    src="{{ $poster }}" 
                                    alt="{{ $item->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >

                                <div class="absolute top-2.5 left-2.5">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold {{ $isTv ? 'bg-purple-900/80 text-purple-200 border border-purple-500/30' : 'bg-slate-950/80 text-white border border-white/20' }} backdrop-blur-md">
                                        {{ $isTv ? 'TV Series' : 'Movie' }}
                                    </span>
                                </div>

                                <div class="absolute top-2.5 right-2.5">
                                    <div class="flex items-center gap-1 px-2 py-0.5 rounded-md bg-slate-950/80 backdrop-blur-md text-amber-400 text-[11px] font-bold border border-white/10">
                                        <span>★</span>
                                        <span>{{ number_format((float) $item->rating, 1) }}</span>
                                    </div>
                                </div>

                                @if($item->pivot->role)
                                    <div class="absolute bottom-2.5 left-2.5">
                                        <span class="px-2 py-0.5 rounded text-[9px] font-bold bg-slate-950/80 text-amber-300 backdrop-blur-xs border border-white/10">
                                            {{ $item->pivot->role }}
                                        </span>
                                    </div>
                                @endif
                            </a>

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

                                @if($item->box_office)
                                    <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[10px]">
                                        <span class="text-slate-400 font-medium">Box Office:</span>
                                        <span class="font-bold text-emerald-600 font-mono">
                                            ${{ number_format($item->box_office) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

</x-layouts.app>
