@php
    $isSeries = ($title->type instanceof \App\Enums\TitleType ? $title->type === \App\Enums\TitleType::TV_SERIES : $title->type === 'tv_series');
    $formatLabel = $isSeries ? 'TV Series' : 'Movie';
    $posterUrl = $title->poster_url ?: asset('images/movie_the_last_horizon.jpg');
    $backdropUrl = $title->backdrop_url ?: asset('images/movie_shadow_protocol.jpg');
    $seoTitle = $seoTitle ?? \App\Support\SeoHelper::generateTitleSeoTitle($title);
    $seoDescription = $seoDescription ?? \App\Support\SeoHelper::generateTitleMetaDescription($title, $cast, $directors);
    $allGenres = $allGenres ?? \Illuminate\Support\Facades\Cache::remember('all_genres_nav_v3', 86400, fn() => \App\Models\Genre::withCount('titles')->orderBy('name')->get());
@endphp

<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :ogImage="$backdropUrl ?: $posterUrl"
    :ogType="$isSeries ? 'video.tv_show' : 'video.movie'"
>
    @push('head')
        <!-- Schema.org JSON-LD Structured Data for Title -->
        <x-seo.json-ld :data="$structuredData ?? []" />
        
        <!-- Schema.org FAQPage Structured Data -->
        @if(!empty($faqSchema))
            <x-seo.json-ld :data="$faqSchema" />
        @endif

        <!-- Schema.org HowTo — "how to watch {movie}" / "how to stream {movie}" featured snippet -->
        @if(!empty($watchGuideSchema))
            <x-seo.json-ld :data="$watchGuideSchema" />
        @endif
    @endpush

    <!-- 1. Hero & Backdrop Section -->
    <div class="relative bg-[#010629] text-white overflow-hidden pb-16 border-b border-[#0d163f]">
        <!-- Backdrop Banner with Gradient Fade -->
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ $backdropUrl }}" 
                alt="{{ $title->title }} backdrop" 
                class="w-full h-full object-cover opacity-25 filter blur-xs scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/80 to-[#010629]/40"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#010629] via-[#010629]/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <!-- Breadcrumbs -->
            <x-breadcrumbs :items="[
                ['name' => $formatLabel . 's', 'url' => route('explore', ['type' => $isSeries ? 'tv_series' : 'movie'])],
                ['name' => $title->title . ' (' . ($title->release_year ?? '') . ') ' . ($isSeries ? 'Series' : 'Film')]
            ]" />

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Left: Poster Column (4 Cols) -->
                <div class="md:col-span-4 lg:col-span-3">
                    <div class="aspect-[2/3] w-full rounded-2xl overflow-hidden shadow-2xl border border-white/10 relative group bg-slate-900">
                        <img 
                            src="{{ $posterUrl }}" 
                            alt="{{ $title->title }} poster" 
                            class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500"
                        >
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2.5 py-1 rounded-md text-[11px] font-semibold bg-slate-950/70 backdrop-blur-md text-white border border-white/10">
                                {{ $formatLabel }}
                            </span>
                        </div>

                        @if($title->content_rating)
                            <div class="absolute top-3 right-3 z-10">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-white/20 backdrop-blur-md text-white border border-white/20">
                                    {{ $title->content_rating }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="mt-4 space-y-2.5">
                        @if($youtubeId)
                            <a href="#trailer-player" class="w-full py-3 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-bold flex items-center justify-center gap-2 transition-all shadow-md active:scale-98">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <span>Watch Trailer</span>
                            </a>
                        @endif

                        @php
                            $inWatchlist = in_array($title->id, session('watchlist', []), true);
                        @endphp
                        <div 
                            x-data="{
                                inWatchlist: {{ $inWatchlist ? 'true' : 'false' }},
                                isBusy: false,
                                async toggleWatchlist() {
                                    if (this.isBusy) return;
                                    this.isBusy = true;
                                    try {
                                        const res = await fetch(`{{ route('watchlist.toggle') }}`, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                                'Accept': 'application/json'
                                            },
                                            body: JSON.stringify({ title_id: {{ $title->id }} })
                                        });
                                        if (res.ok) {
                                            const data = await res.json();
                                            this.inWatchlist = data.in_watchlist;
                                        }
                                    } catch (err) {
                                        console.error(err);
                                    } finally {
                                        this.isBusy = false;
                                    }
                                }
                            }"
                        >
                            <button 
                                type="button"
                                @click="toggleWatchlist()" 
                                :class="inWatchlist ? 'bg-amber-500 text-slate-950 border-amber-400 font-bold' : 'bg-white/10 hover:bg-white/20 text-white border-white/10 font-semibold'"
                                class="w-full py-2.5 px-4 rounded-xl text-xs flex items-center justify-center gap-2 border transition-all cursor-pointer shadow-sm active:scale-98"
                            >
                                <svg class="w-4 h-4 transition-transform" :class="inWatchlist ? 'fill-current' : 'fill-none'" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                                <span x-text="inWatchlist ? 'In Watchlist' : 'Add to Watchlist'"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right: Title Details & Plot (8 Cols) -->
                <div class="md:col-span-8 lg:col-span-9 space-y-6">
                    <div>
                        <div class="flex flex-wrap items-center gap-3 text-xs text-slate-400 font-medium mb-2">
                            <span class="text-amber-400 font-bold uppercase tracking-wider">
                                {{ $title->title }} ({{ $title->release_year ?? 'Cinema' }}) {{ $isSeries ? 'Series' : 'Film' }}
                            </span>
                            <span>•</span>

                            @if($title->release_year)
                                <span>{{ $title->release_year }}</span>
                                <span>•</span>
                            @endif

                            @if($isSeries)
                                <span>{{ $title->seasons->count() }} {{ \Illuminate\Support\Str::plural('Season', $title->seasons->count()) }}</span>
                                <span>•</span>
                                <span>{{ $title->seasons->sum(fn($s) => $s->episodes->count()) }} Episodes</span>
                            @elseif($title->formatted_runtime)
                                <span>{{ $title->formatted_runtime }}</span>
                            @endif

                            @if($title->origin_country)
                                <span>•</span>
                                <span>{{ $title->origin_country }} Cinema</span>
                            @endif

                            @if($title->original_language)
                                <span>•</span>
                                <span>{{ $title->original_language }}</span>
                            @endif
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                            {{ $title->title }}
                        </h1>

                        <p class="text-xs sm:text-sm text-slate-300 font-medium mt-1">
                            Cast of {{ $title->title }} ({{ $isSeries ? 'Series' : 'Film' }}), {{ $title->box_office_label }}, Budget & Streaming Guide
                        </p>

                        @if($title->tagline)
                            <p class="text-base sm:text-lg font-serif italic text-amber-300/90 mt-2">
                                "{{ $title->tagline }}"
                            </p>
                        @endif
                    </div>

                    <!-- Ratings & Genres Badges Row -->
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-400/20 text-amber-400 border border-amber-400/30 text-xs font-bold">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-sm">{{ number_format((float) $title->rating, 1) }}</span>
                            <span class="text-slate-400 font-normal">/ 10</span>
                        </div>

                        @foreach($title->genres as $genre)
                            <a 
                                href="{{ route('genre.show', $genre->slug) }}" 
                                class="px-3 py-1 rounded-full text-xs font-semibold bg-white/10 hover:bg-amber-400 hover:text-slate-950 text-slate-200 border border-white/10 transition-all flex items-center gap-1.5 group/genre"
                                title="Explore {{ $genre->name }} movies and series"
                            >
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 group-hover/genre:bg-slate-950 transition-colors"></span>
                                <span>{{ $genre->name }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Overview / Plot — itemprop for semantic entity signal -->
                    <div class="space-y-2">
                        <h2 class="text-xs font-bold uppercase tracking-widest text-[#FFA500]">Storyline & Synopsis</h2>
                        <div itemprop="description" class="text-sm sm:text-base text-slate-200 leading-relaxed max-w-3xl storyline-text rich-content">
                            {!! $title->overview ?: '<p>Plot synopsis is currently in preparation.</p>' !!}
                        </div>
                    </div>

                    <!-- Key Crew Quick Strip -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t border-white/10 text-xs">
                        @if($directors->isNotEmpty())
                            <div>
                                <span class="text-slate-400 block mb-0.5 font-medium">Director</span>
                                <div class="text-white font-bold flex flex-wrap gap-1">
                                    @foreach($directors as $dir)
                                        @if($dir->person && $dir->person->slug)
                                            <a href="{{ route('person.show', $dir->person->slug) }}" rel="author" class="hover:text-amber-400 transition-colors underline decoration-white/30 underline-offset-2">
                                                {{ $dir->person->name }}
                                            </a>{{ !$loop->last ? ',' : '' }}
                                        @elseif($dir->person)
                                            <span>{{ $dir->person->name }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($producers->isNotEmpty())
                            <div>
                                <span class="text-slate-400 block mb-0.5 font-medium">Producer</span>
                                <div class="text-white font-bold flex flex-wrap gap-1">
                                    @foreach($producers->take(2) as $prod)
                                        @if($prod->person && $prod->person->slug)
                                            <a href="{{ route('person.show', $prod->person->slug) }}" class="hover:text-amber-400 transition-colors underline decoration-white/30 underline-offset-2">
                                                {{ $prod->person->name }}
                                            </a>{{ !$loop->last ? ',' : '' }}
                                        @elseif($prod->person)
                                            <span>{{ $prod->person->name }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($writers->isNotEmpty())
                            <div>
                                <span class="text-slate-400 block mb-0.5 font-medium">Writer</span>
                                <div class="text-white font-bold flex flex-wrap gap-1">
                                    @foreach($writers as $w)
                                        @if($w->person && $w->person->slug)
                                            <a href="{{ route('person.show', $w->person->slug) }}" class="hover:text-amber-400 transition-colors underline decoration-white/30 underline-offset-2">
                                                {{ $w->person->name }}
                                            </a>{{ !$loop->last ? ',' : '' }}
                                        @elseif($w->person)
                                            <span>{{ $w->person->name }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($cast->isNotEmpty())
                            <div>
                                <span class="text-slate-400 block mb-0.5 font-medium">Starring</span>
                                <div class="text-white font-bold flex flex-wrap gap-1">
                                    @foreach($cast->take(3) as $c)
                                        @if($c->person && $c->person->slug)
                                            <a href="{{ route('person.show', $c->person->slug) }}" class="hover:text-amber-400 transition-colors underline decoration-white/30 underline-offset-2">
                                                {{ $c->person->name }}
                                            </a>{{ !$loop->last ? ',' : '' }}
                                        @elseif($c->person)
                                            <span>{{ $c->person->name }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- 2. "Where to Watch" Streaming Availability -->
    @if($title->streamingPlatforms->isNotEmpty())
        <section id="where-to-watch" class="py-8 bg-gradient-to-r from-slate-900 via-[#010629] to-slate-900 text-white border-b border-[#0d163f] scroll-mt-24 shadow-inner">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#FFA500]">Verified Streaming Availability</span>
                        </div>
                        <h3 class="text-xl font-black text-white">Where to Stream {{ $title->title }}</h3>
                        <p class="text-xs text-slate-300 mt-0.5">Watch instantly in HD & 4K on official licensed platforms</p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        @foreach($title->streamingPlatforms as $platform)
                            @php
                                $accessType = ucfirst($platform->pivot->access_type ?? 'Streaming');
                                $quality = $platform->pivot->quality ?: 'HD';
                                $watchUrl = $platform->pivot->watch_url ?: $platform->website ?: '#';
                            @endphp
                            <a 
                                href="{{ $watchUrl }}" 
                                target="_blank" 
                                rel="noopener noreferrer" 
                                class="flex items-center gap-3 px-4 py-2.5 rounded-2xl bg-white/10 hover:bg-[#FFA500] hover:text-[#010629] border border-white/15 hover:border-[#FFA500] transition-all group shadow-sm active:scale-95"
                                title="Stream {{ $title->title }} on {{ $platform->name }}"
                            >
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-black tracking-wide text-white group-hover:text-[#010629] transition-colors">
                                            {{ $platform->name }}
                                        </span>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-black uppercase bg-[#FFA500]/20 group-hover:bg-black/20 text-[#FFA500] group-hover:text-[#010629]">
                                            {{ $quality }}
                                        </span>
                                    </div>
                                    <span class="text-[10px] text-slate-300 group-hover:text-[#010629]/80 font-medium">
                                        {{ $accessType }}
                                    </span>
                                </div>
                                <div class="w-7 h-7 rounded-xl bg-white/10 group-hover:bg-[#010629] text-white flex items-center justify-center shrink-0 transition-colors">
                                    <span class="text-xs font-black">↗</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 3. Web Series: Seasons & Episodes Guide (Interactive) -->
    @if($isSeries && $title->seasons->isNotEmpty())
        <section class="py-12 bg-[#f8f9fa] border-b border-slate-200/80" x-data="{ activeSeason: {{ $title->seasons->first()->season_number }} }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-6">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Episode Guide</span>
                        <h2 class="text-2xl font-extrabold text-slate-950">Seasons & Episodes</h2>
                    </div>

                    <!-- Season Switcher Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                        @foreach($title->seasons as $season)
                            <button 
                                @click="activeSeason = {{ $season->season_number }}"
                                :class="activeSeason === {{ $season->season_number }} ? 'bg-slate-950 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                                class="px-4 py-2 rounded-xl text-xs font-bold transition-all shrink-0 cursor-pointer"
                            >
                                {{ $season->name ?: 'Season ' . $season->season_number }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Episodes List per Season -->
                @foreach($title->seasons as $season)
                    <div x-show="activeSeason === {{ $season->season_number }}" x-cloak class="space-y-4">
                        @forelse($season->episodes as $episode)
                            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-slate-300 transition-all">
                                <!-- Episode Thumbnail -->
                                <div class="w-full sm:w-44 aspect-video rounded-xl overflow-hidden bg-slate-900 shrink-0 relative">
                                    <img 
                                        src="{{ $episode->still_path ? asset($episode->still_path) : asset('images/movie_shadow_protocol.jpg') }}" 
                                        alt="{{ $episode->name }}" 
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                    >
                                    <div class="absolute bottom-2 left-2 px-2 py-0.5 rounded text-[10px] font-bold bg-slate-950/80 text-white backdrop-blur-sm">
                                        E{{ $episode->episode_number }}
                                    </div>
                                </div>

                                <!-- Episode Details -->
                                <div class="flex-grow">
                                    <div class="flex flex-wrap items-center gap-2.5 text-xs text-slate-400 mb-1">
                                        <span class="font-bold text-slate-900">Episode {{ $episode->episode_number }}</span>
                                        @if($episode->air_date)
                                            <span>•</span>
                                            <span>{{ $episode->air_date->format('M d, Y') }}</span>
                                        @endif
                                        @if($episode->runtime_minutes)
                                            <span>•</span>
                                            <span>{{ $episode->runtime_minutes }} min</span>
                                        @endif
                                    </div>

                                    <h4 class="text-sm sm:text-base font-bold text-slate-900 mb-1.5">
                                        {{ $episode->name }}
                                    </h4>

                                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-2 max-w-3xl">
                                        {{ $episode->overview ?: 'Episode synopsis will be available soon.' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-slate-400 bg-white rounded-2xl border border-slate-200">
                                No episodes cataloged for this season yet.
                            </div>
                        @endforelse
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 4. Top Billed Cast & Crew Section -->
    @if($cast->isNotEmpty() || $directors->isNotEmpty() || $producers->isNotEmpty())
        <section id="cast" class="py-12 bg-white border-b border-slate-200/80 scroll-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

                <!-- Key Filmmakers (Directors & Producers) -->
                @php
                    $filmmakers = $directors->concat($producers)->unique('person_id')->values();
                @endphp
                @if($filmmakers->isNotEmpty())
                    <div id="crew" class="scroll-mt-24">
                        <div class="flex items-end justify-between mb-6">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-[#FFA500] block mb-1">Behind The Scenes</span>
                                <h2 class="text-xl sm:text-2xl font-black text-[#010629]">Key Filmmakers & Directors</h2>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($filmmakers as $credit)
                                @php
                                    $person = $credit->person;
                                    $jobLabel = $credit->job ?: ($credit->department === 'Directing' ? 'Director' : 'Producer');
                                @endphp
                                @if($person)
                                    <a href="{{ $person->slug ? route('person.show', $person->slug) : '#' }}" class="bg-gradient-to-b from-[#071038] to-[#010629] p-3.5 rounded-2xl border border-[#0d163f] hover:border-[#FFA500]/60 text-center transition-all card-shadow-hover group block shadow-xs">
                                        <div class="w-16 h-16 mx-auto rounded-full bg-slate-800 mb-3 overflow-hidden ring-2 ring-[#FFA500]/30 group-hover:ring-[#FFA500] group-hover:scale-105 transition-all shadow-inner">
                                            @if($person->photo_url)
                                                <img src="{{ $person->photo_url }}" alt="{{ $person->name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center font-bold text-[#FFA500] text-sm">
                                                    {{ substr($person->name, 0, 2) }}
                                                </div>
                                            @endif
                                        </div>

                                        <h4 class="text-xs font-bold text-white group-hover:text-[#FFA500] transition-colors line-clamp-1">
                                            {{ $person->name }}
                                        </h4>

                                        <p class="text-[11px] text-[#FFA500] font-semibold line-clamp-1 mt-0.5">
                                            {{ $jobLabel }}
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Top Billed Cast -->
                @if($cast->isNotEmpty())
                    <div>
                        <div class="flex items-end justify-between mb-6">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-widest text-amber-500 block mb-1">Star Cast & Characters</span>
                                <h2 class="text-xl sm:text-2xl font-black text-slate-950">Cast of {{ $title->title }} ({{ $formatLabel }})</h2>
                                <p class="text-xs text-slate-500 mt-1">Complete cast of {{ $title->title }} ({{ $title->release_year }} {{ strtolower($formatLabel) }}), starring actors, actresses, and character roles.</p>
                            </div>
                        </div>

                        <!-- Cast Carousel / Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($cast as $credit)
                                @php
                                    $person = $credit->person;
                                @endphp
                                @if($person)
                                    <a href="{{ $person->slug ? route('person.show', $person->slug) : '#' }}" class="bg-slate-50 p-3.5 rounded-2xl border border-slate-200/70 text-center hover:border-slate-300 transition-all card-shadow-hover group block">
                                        <div class="w-16 h-16 mx-auto rounded-full bg-slate-200 mb-3 overflow-hidden shadow-inner group-hover:scale-105 transition-transform">
                                            @if($person->photo_url)
                                                <img src="{{ $person->photo_url }}" alt="{{ $person->name }}" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-10 h-10 text-slate-400 mx-auto mt-3" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/>
                                                </svg>
                                            @endif
                                        </div>

                                        <h4 class="text-xs font-bold text-slate-900 group-hover:text-[#FFA500] transition-colors line-clamp-1">
                                            {{ $person->name }}
                                        </h4>

                                        <p class="text-[11px] text-slate-500 font-medium line-clamp-1">
                                            {{ $credit->character_name ?: $credit->job }}
                                        </p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </section>
    @endif

    <!-- Extended Storyline & Detailed Analysis (Quill RichText Content & Internal Links) -->
    @if(!empty($title->description))
        <section id="extended-storyline" class="py-12 bg-[#020938] text-white border-b border-[#0d163f] relative overflow-hidden scroll-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="mb-6">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#FFA500] block mb-1">Extended Narrative & Critical Analysis</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                        {{ $title->title }}: In-Depth Storyline, Characters & Themes
                    </h2>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 sm:p-8 backdrop-blur-sm rich-content text-slate-200 text-sm sm:text-base leading-relaxed">
                    {!! $title->description !!}
                </div>
            </div>
        </section>
    @endif

    <!-- 5. Trailer Video Player Section -->
    @if($youtubeId)
        <section id="trailer-player" class="py-12 bg-slate-950 text-white">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-6">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Official Preview</span>
                    <h2 class="text-2xl font-extrabold text-white">Trailer & Clips</h2>
                </div>

                <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-black">
                    <iframe 
                        class="w-full h-full" 
                        src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}" 
                        title="{{ $title->title }} Official Trailer" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </section>
    @endif

    <!-- 6. Budget, Box Office Collection & Financials -->
    <section id="budget-collection" class="py-12 bg-white border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <span class="text-[11px] font-bold uppercase tracking-widest text-amber-500 block mb-1">Financials & Box Office</span>
                <h2 class="text-xl sm:text-2xl font-black text-slate-950">
                    {{ $title->title }} Budget and {{ $title->box_office_label }}
                </h2>
                <p class="text-xs text-slate-500 mt-1">
                    Official production budget, worldwide {{ strtolower($title->box_office_label) }}, and theatrical financial summary for {{ $title->title }} ({{ $title->release_year }} {{ strtolower($formatLabel) }}).
                </p>
            </div>

            <!-- Key Financial Highlights Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Budget Card -->
                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/80">
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider block mb-1">Estimated Budget</span>
                    @if($title->budget)
                        <div class="text-2xl font-black text-slate-900 tracking-tight">{{ $title->formatted_budget }}</div>
                        <span class="text-[11px] text-slate-400 mt-0.5 block font-medium">{{ $title->isIndian() ? 'Domestic Production Cost' : 'Production Budget' }}</span>
                    @else
                        <div class="text-base font-bold text-slate-500">Not Disclosed</div>
                        <span class="text-[11px] text-slate-400 mt-0.5 block">Studio confidential</span>
                    @endif
                </div>

                <!-- Box Office / Collection Card -->
                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/80">
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider block mb-1">Worldwide {{ $title->box_office_label }}</span>
                    @if($title->box_office)
                        <div class="text-2xl font-black text-emerald-600 font-mono tracking-tight">{{ $title->formatted_box_office }}</div>
                        <span class="text-[11px] text-slate-400 mt-0.5 block font-medium">Lifetime Theatrical Gross</span>
                    @else
                        <div class="text-base font-bold text-slate-500">Under Compilation</div>
                        <span class="text-[11px] text-slate-400 mt-0.5 block">Theatrical figures pending</span>
                    @endif
                </div>

                <!-- Box Office Verdict Card -->
                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/80">
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider block mb-1">Box Office Verdict</span>
                    @if($title->box_office_verdict)
                        <div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-black border {{ $title->box_office_verdict_class }}">
                                {{ $title->box_office_verdict }}
                            </span>
                        </div>
                        <span class="text-[11px] text-slate-500 mt-1 block font-medium">
                            {{ $title->box_office_multiplier }} Multiplier ({{ $title->box_office_roi_percentage }} ROI)
                        </span>
                    @else
                        <div class="text-base font-bold text-slate-700 capitalize">
                            {{ $title->status instanceof \App\Enums\ReleaseStatus ? $title->status->label() : ($title->status ?? 'Theatrical Release') }}
                        </div>
                        <span class="text-[11px] text-slate-400 mt-0.5 block">Official run</span>
                    @endif
                </div>

                <!-- Premiere & Territory Card -->
                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/80">
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider block mb-1">Release & Industry</span>
                    <div class="text-sm font-bold text-slate-900">
                        {{ $title->release_date ? $title->release_date->format('M d, Y') : 'Announced' }}
                    </div>
                    <span class="text-[11px] text-slate-500 mt-0.5 block font-medium">
                        {{ $title->origin_country ? $title->origin_country . ' Cinema' : 'International' }} • {{ $title->original_language ?? 'Original' }}
                    </span>
                </div>
            </div>

            <!-- Structured Quick-Answer Data Table -->
            <div class="overflow-x-auto rounded-2xl border border-slate-200/80 shadow-xs">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-100/80 text-slate-700 font-bold uppercase tracking-wider border-b border-slate-200 text-[11px]">
                            <th scope="col" class="py-3 px-4">Title & Format</th>
                            <th scope="col" class="py-3 px-4">Estimated Budget</th>
                            <th scope="col" class="py-3 px-4">Worldwide {{ $title->box_office_label }}</th>
                            <th scope="col" class="py-3 px-4">Verdict / Status</th>
                            <th scope="col" class="py-3 px-4">Studios / Producers</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200/70 bg-white">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3.5 px-4 font-bold text-slate-900 whitespace-nowrap">
                                {{ $title->title }} ({{ $title->release_year ?? 'Cinema' }} {{ $formatLabel }})
                            </td>
                            <td class="py-3.5 px-4 text-slate-800 font-medium">
                                {{ $title->formatted_budget ?? 'Confidential / Undisclosed' }}
                            </td>
                            <td class="py-3.5 px-4 text-emerald-600 font-bold font-mono">
                                {{ $title->formatted_box_office ?? 'Under compilation' }}
                            </td>
                            <td class="py-3.5 px-4 font-bold">
                                @if($title->box_office_verdict)
                                    <span class="text-slate-900">{{ $title->box_office_verdict }}</span>
                                @else
                                    <span class="text-slate-500 capitalize">{{ $title->status instanceof \App\Enums\ReleaseStatus ? $title->status->label() : ($title->status ?? 'Released') }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-600">
                                @if($title->productionCompanies->isNotEmpty())
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($title->productionCompanies as $comp)
                                            <a href="{{ route('company.show', $comp->slug) }}" class="text-slate-900 hover:text-amber-600 transition-colors underline decoration-slate-300 underline-offset-2">
                                                {{ $comp->name }}
                                            </a>{{ !$loop->last ? '•' : '' }}
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-slate-400">Independent Production</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 7. User Ratings & Community Reviews Section -->
    <section id="community-reviews" class="py-16 bg-white border-b border-slate-200/80" x-data="{
        showForm: false,
        selectedRating: 9,
        ratingLabels: {
            10: 'Masterpiece',
            9: 'Outstanding',
            8: 'Great',
            7: 'Good',
            6: 'Decent',
            5: 'Average',
            4: 'Mediocre',
            3: 'Poor',
            2: 'Terrible',
            1: 'Awful'
        },
        authorName: '{{ auth()->user()->name ?? '' }}',
        headline: '',
        content: '',
        containsSpoilers: false,
        isSubmitting: false,
        submitSuccess: false,
        submitError: '',
        reviewsList: {{ Js::from($reviews->map(fn($r) => [
            'id' => $r->id,
            'author_name' => $r->author_name,
            'rating' => $r->rating,
            'rating_label' => $r->rating_label,
            'headline' => $r->headline,
            'content' => $r->content,
            'contains_spoilers' => (bool)$r->contains_spoilers,
            'revealed' => !(bool)$r->contains_spoilers,
            'helpful_votes' => $r->helpful_votes,
            'voted' => in_array($r->id, $votedReviews, true),
            'created_at' => $r->created_at->format('M d, Y')
        ])) }},
        async submitReview() {
            if (!this.authorName.trim() || !this.headline.trim() || !this.content.trim()) {
                this.submitError = 'Please fill out your name, headline, and review thoughts.';
                return;
            }
            this.isSubmitting = true;
            this.submitError = '';
            try {
                const res = await fetch('{{ route('reviews.store', $title->id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        rating: this.selectedRating,
                        author_name: this.authorName,
                        headline: this.headline,
                        content: this.content,
                        contains_spoilers: this.containsSpoilers
                    })
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    this.reviewsList.unshift({
                        id: data.review.id,
                        author_name: data.review.author_name,
                        rating: data.review.rating,
                        rating_label: data.review.rating_label,
                        headline: data.review.headline,
                        content: data.review.content,
                        contains_spoilers: data.review.contains_spoilers,
                        revealed: !data.review.contains_spoilers,
                        helpful_votes: 0,
                        voted: false,
                        created_at: data.review.created_at
                    });
                    this.headline = '';
                    this.content = '';
                    this.submitSuccess = true;
                    this.showForm = false;
                    setTimeout(() => { this.submitSuccess = false; }, 6000);
                } else {
                    this.submitError = data.message || 'Unable to publish review. Please try again.';
                }
            } catch (err) {
                this.submitError = 'Network error. Please try again.';
            } finally {
                this.isSubmitting = false;
            }
        },
        async upvote(review) {
            if (review.voted) return;
            try {
                const res = await fetch(`/reviews/${review.id}/helpful`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    review.helpful_votes = data.helpful_votes;
                    review.voted = true;
                }
            } catch (err) {
                console.error(err);
            }
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with CTA -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 pb-6 border-b border-slate-100">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-700 text-xs font-bold mb-2">
                        <svg class="w-3.5 h-3.5 fill-current text-amber-500" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <span>Audience Voices</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 tracking-tight">
                        User Ratings & Community Reviews
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Read real verified insights from fellow moviegoers, binge-watchers, and film critics.
                    </p>
                </div>

                <button 
                    type="button"
                    @click="showForm = !showForm"
                    class="px-5 py-3 rounded-full bg-slate-950 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-md active:scale-95 flex items-center justify-center gap-2 cursor-pointer self-start sm:self-auto shrink-0"
                >
                    <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    <span x-text="showForm ? 'Close Review Form' : 'Write a Review'"></span>
                </button>
            </div>

            <!-- Success Alert Banner -->
            <div 
                x-show="submitSuccess" 
                x-cloak 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-3"
            >
                <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <strong class="font-bold">Review published successfully!</strong> Thank you for contributing to the TonightOnScreen cinephile community.
                </div>
            </div>

            <!-- Audience Scorecard & Breakdown Bar Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12 bg-slate-50 p-6 sm:p-8 rounded-3xl border border-slate-200/80">
                <!-- Left: Big Score & Aggregate (5 cols) -->
                <div class="lg:col-span-5 flex flex-col justify-center items-center text-center p-4 sm:border-r sm:border-slate-200/80">
                    <div class="inline-flex items-center gap-2 mb-2">
                        <div class="flex text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>

                    <div class="flex items-baseline gap-1 my-1">
                        <span class="text-5xl sm:text-6xl font-black text-slate-950 tracking-tight">
                            {{ number_format((float) $title->rating, 1) }}
                        </span>
                        <span class="text-xl font-bold text-slate-400">/ 10</span>
                    </div>

                    <p class="text-xs font-bold text-amber-600 mt-1 uppercase tracking-wider">
                        @if($title->rating >= 9.0)
                            Universal Acclaim
                        @elseif($title->rating >= 8.0)
                            Overwhelmingly Positive
                        @elseif($title->rating >= 7.0)
                            Highly Recommended
                        @else
                            Audience Approved
                        @endif
                    </p>

                    <p class="text-xs text-slate-500 mt-2 font-medium">
                        Based on <span x-text="reviewsList.length">{{ $reviewCount }}</span> verified community ratings
                    </p>
                </div>

                <!-- Right: Rating Distribution Bars (7 cols) -->
                <div class="lg:col-span-7 flex flex-col justify-center space-y-2.5">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Score Breakdown</span>
                    @php
                        $totalRev = max(1, $reviewCount);
                        $tiers = [
                            ['label' => '10 Star', 'score' => 10, 'count' => $ratingDistribution[10] ?? 0],
                            ['label' => '9 Star', 'score' => 9, 'count' => $ratingDistribution[9] ?? 0],
                            ['label' => '8 Star', 'score' => 8, 'count' => $ratingDistribution[8] ?? 0],
                            ['label' => '7 Star', 'score' => 7, 'count' => $ratingDistribution[7] ?? 0],
                            ['label' => '6 or below', 'score' => 6, 'count' => ($ratingDistribution[6] ?? 0) + ($ratingDistribution[5] ?? 0) + ($ratingDistribution[4] ?? 0)],
                        ];
                    @endphp

                    @foreach($tiers as $tier)
                        @php
                            $pct = round(($tier['count'] / $totalRev) * 100);
                        @endphp
                        <div class="flex items-center gap-3 text-xs">
                            <span class="w-20 font-bold text-slate-700 shrink-0 text-right">{{ $tier['label'] }}</span>
                            <div class="flex-grow h-3 bg-slate-200/80 rounded-full overflow-hidden relative">
                                <div 
                                    class="h-full rounded-full transition-all duration-700 {{ $tier['score'] >= 9 ? 'bg-amber-400' : ($tier['score'] >= 8 ? 'bg-amber-500' : 'bg-slate-400') }}" 
                                    style="width: {{ $pct }}%"
                                ></div>
                            </div>
                            <span class="w-12 text-[11px] font-semibold text-slate-400 text-right">{{ $tier['count'] }} ({{ $pct }}%)</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Slide-down Review Submission Form -->
            <div 
                x-show="showForm" 
                x-cloak 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="mb-12 bg-slate-900 text-white rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl relative overflow-hidden"
            >
                <div class="absolute -top-24 -right-24 w-72 h-72 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10">
                    <h3 class="text-xl font-extrabold text-white mb-1">
                        Share Your Review for <span class="text-amber-400">{{ $title->title }}</span>
                    </h3>
                    <p class="text-xs text-slate-400 mb-6">
                        Your honest feedback helps the community discover what to watch next.
                    </p>

                    <!-- Error Alert -->
                    <div x-show="submitError" x-cloak class="mb-5 p-3 rounded-xl bg-rose-500/20 border border-rose-500/30 text-rose-300 text-xs">
                        <span x-text="submitError"></span>
                    </div>

                    <form @submit.prevent="submitReview()" class="space-y-6">
                        <!-- 1. Interactive 1-10 Rating Selector -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    Your Score: 
                                    <span class="text-amber-400 text-sm font-black ml-1" x-text="selectedRating + '/10'"></span>
                                    <span class="text-slate-400 text-xs font-normal ml-1" x-text="'(' + ratingLabels[selectedRating] + ')'"></span>
                                </label>
                                <span class="text-[11px] text-slate-400">Click to select rating</span>
                            </div>

                            <div class="flex items-center gap-1.5 sm:gap-2 overflow-x-auto no-scrollbar py-1">
                                <template x-for="r in [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]" :key="r">
                                    <button 
                                        type="button" 
                                        @click="selectedRating = r"
                                        :class="selectedRating >= r ? 'bg-amber-400 text-slate-950 font-black shadow-md scale-105' : 'bg-white/10 text-slate-300 hover:bg-white/20'"
                                        class="flex-1 min-w-[34px] h-10 rounded-xl text-xs font-bold flex items-center justify-center transition-all cursor-pointer"
                                    >
                                        <span x-text="r"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- 2. Headline & Author Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-bold text-slate-300 uppercase tracking-wider block mb-1.5">
                                    Review Headline *
                                </label>
                                <input 
                                    type="text" 
                                    x-model="headline" 
                                    placeholder="e.g. Masterclass in suspense and cinematography" 
                                    required 
                                    maxlength="150"
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:bg-white/10 transition-all"
                                >
                            </div>

                            <div>
                                <label class="text-xs font-bold text-slate-300 uppercase tracking-wider block mb-1.5">
                                    Your Name *
                                </label>
                                <input 
                                    type="text" 
                                    x-model="authorName" 
                                    placeholder="e.g. Cinema Enthusiast" 
                                    required 
                                    maxlength="80"
                                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:bg-white/10 transition-all"
                                >
                            </div>
                        </div>

                        <!-- 3. Review Content -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="text-xs font-bold text-slate-300 uppercase tracking-wider">
                                    Detailed Thoughts *
                                </label>
                                <span class="text-[10px] text-slate-400" x-text="content.length + '/3000 chars'"></span>
                            </div>
                            <textarea 
                                x-model="content" 
                                rows="4" 
                                placeholder="What stood out to you? Mention performances, pacing, directing, score, or plot developments..." 
                                required 
                                maxlength="3000"
                                class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 focus:bg-white/10 transition-all leading-relaxed"
                            ></textarea>
                        </div>

                        <!-- 4. Spoiler Checkbox & Submit -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-2">
                            <label class="flex items-center gap-2 cursor-pointer text-xs text-slate-300 select-none">
                                <input 
                                    type="checkbox" 
                                    x-model="containsSpoilers"
                                    class="w-4 h-4 rounded border-white/20 text-amber-500 focus:ring-amber-400 bg-white/10"
                                >
                                <span>⚠️ This review contains major spoilers</span>
                            </label>

                            <div class="flex items-center gap-3">
                                <button 
                                    type="button" 
                                    @click="showForm = false"
                                    class="px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition-colors cursor-pointer"
                                >
                                    Cancel
                                </button>

                                <button 
                                    type="submit" 
                                    :disabled="isSubmitting"
                                    class="px-6 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold flex items-center justify-center gap-2 transition-all cursor-pointer shadow-md disabled:opacity-50"
                                >
                                    <svg x-show="isSubmitting" x-cloak class="animate-spin h-3.5 w-3.5 text-slate-950" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <span x-text="isSubmitting ? 'Publishing...' : 'Publish Review'"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Reviews Feed / List -->
            <div class="space-y-6">
                <!-- If No Reviews -->
                <template x-if="reviewsList.length === 0">
                    <div class="bg-slate-50 rounded-3xl border border-slate-200/80 p-12 text-center max-w-md mx-auto">
                        <div class="w-14 h-14 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-900 mb-1">No community reviews yet</h4>
                        <p class="text-xs text-slate-500 mb-5">Be the very first viewer to rate and review this title!</p>
                        <button 
                            type="button" 
                            @click="showForm = true"
                            class="px-5 py-2.5 rounded-xl bg-slate-950 text-white text-xs font-bold hover:bg-slate-800 transition-colors cursor-pointer"
                        >
                            Write the First Review
                        </button>
                    </div>
                </template>

                <!-- Review Cards -->
                <template x-for="item in reviewsList" :key="item.id">
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs hover:border-slate-300 transition-all">
                        <!-- Top Metadata: Author & Rating -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-900 text-amber-400 font-bold text-sm flex items-center justify-center shadow-xs">
                                    <span x-text="item.author_name.charAt(0).toUpperCase()"></span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h4 class="text-sm font-bold text-slate-900" x-text="item.author_name"></h4>
                                        <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/60 text-[10px] font-semibold">
                                            Verified Audience
                                        </span>
                                    </div>
                                    <span class="text-[11px] text-slate-400" x-text="item.created_at"></span>
                                </div>
                            </div>

                            <!-- Rating Score Badge -->
                            <div class="flex items-center gap-2 self-start sm:self-auto">
                                <div class="flex items-center gap-1.5 px-3 py-1 rounded-xl bg-amber-50 border border-amber-200/80 text-amber-800 font-extrabold text-xs">
                                    <svg class="w-3.5 h-3.5 fill-current text-amber-500" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <span x-text="item.rating + ' / 10'"></span>
                                    <span class="text-[10px] font-bold text-amber-600 uppercase ml-1" x-text="item.rating_label"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Headline -->
                        <h3 class="text-base font-bold text-slate-950 mb-2" x-text="item.headline"></h3>

                        <!-- Content with Spoiler Protection -->
                        <div class="relative">
                            <!-- Spoiler Overlay -->
                            <template x-if="item.contains_spoilers && !item.revealed">
                                <div class="bg-amber-50/70 border border-amber-200/80 rounded-xl p-4 text-center my-2">
                                    <p class="text-xs font-bold text-amber-900 mb-1">
                                        ⚠️ Spoiler Warning
                                    </p>
                                    <p class="text-[11px] text-amber-700 mb-3">
                                        This review contains plot revelations and spoilers.
                                    </p>
                                    <button 
                                        type="button" 
                                        @click="item.revealed = true"
                                        class="px-3.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-bold transition-all shadow-xs cursor-pointer"
                                    >
                                        Click to Reveal Review
                                    </button>
                                </div>
                            </template>

                            <!-- Actual Content -->
                            <p 
                                x-show="!item.contains_spoilers || item.revealed"
                                class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal whitespace-pre-line" 
                                x-text="item.content"
                            ></p>
                        </div>

                        <!-- Footer: Helpful vote counter -->
                        <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                            <span class="text-[11px] text-slate-400">Did you find this review helpful?</span>

                            <button 
                                type="button" 
                                @click="upvote(item)"
                                :class="item.voted ? 'bg-amber-100 text-amber-900 border-amber-300 font-bold' : 'bg-slate-50 hover:bg-slate-100 text-slate-700 border-slate-200 font-medium'"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border text-xs transition-all cursor-pointer active:scale-95"
                            >
                                <svg class="w-3.5 h-3.5" :class="item.voted ? 'fill-current text-amber-600' : 'fill-none'" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                                <span>Helpful</span>
                                <span class="text-[11px] px-1.5 py-0.2 rounded-md bg-white text-slate-800 font-bold shadow-xs" x-text="item.helpful_votes"></span>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Frequently Asked Questions Section (Rule 1, Rule 8, Rule 12) -->
    @if(!empty($faqs))
        <section id="faqs" class="py-16 bg-white border-t border-slate-200/80 scroll-mt-24">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-amber-500 block mb-1">Got Questions?</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950">Frequently Asked Questions</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2">Everything you need to know about {{ $title->title }} streaming, cast, director, and box office details.</p>
                </div>

                <div class="space-y-4" x-data="{ activeAccordion: 0 }">
                    @foreach($faqs as $index => $faq)
                        <div class="border border-slate-200 rounded-2xl overflow-hidden bg-slate-50/60 transition-colors">
                            <button 
                                type="button" 
                                @click="activeAccordion = (activeAccordion === {{ $index }}) ? null : {{ $index }}"
                                class="w-full flex items-center justify-between p-5 text-left font-bold text-sm sm:text-base text-slate-900 hover:text-amber-600 transition-colors cursor-pointer"
                            >
                                <span class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-lg bg-amber-100 text-amber-700 text-xs font-bold flex items-center justify-center shrink-0">Q</span>
                                    <span>{{ $faq['question'] }}</span>
                                </span>
                                <svg class="w-4 h-4 text-slate-400 transform transition-transform duration-200 shrink-0" :class="activeAccordion === {{ $index }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div 
                                x-show="activeAccordion === {{ $index }}" 
                                x-cloak
                                class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100"
                            >
                                <p class="pl-10">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 8. Similar Titles & Curated Recommendations Section -->
    @if(!empty($similarTitles) && $similarTitles->isNotEmpty())
        <section id="similar-titles" class="py-16 bg-[#010629] text-white border-t border-[#0d163f] relative overflow-hidden scroll-mt-24">
            <!-- Subtle background ambient glows -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Header with Title, Badge & Navigation Link -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 pb-6 border-b border-white/10">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-[11px] font-bold tracking-widest uppercase mb-2 shadow-xs">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <span>Handpicked For You</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight flex items-center gap-3">
                            <span>Similar {{ $isSeries ? 'Series & Shows' : 'Movies' }} Like {{ $title->title }}</span>
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-400 mt-1 max-w-2xl leading-relaxed">
                            Discover titles sharing thrilling themes, visionary filmmakers, celebrated stars, and matching genres with <strong class="text-slate-200">{{ $title->title }}</strong>.
                        </p>
                    </div>

                    <a href="{{ route('explore', ['type' => $title->type]) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-xs font-bold text-amber-400 border border-white/10 hover:border-amber-400/40 transition-all active:scale-95 shrink-0 self-start md:self-auto group">
                        <span>Browse All {{ $formatLabel }}s</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- 6-Card Responsive Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-5">
                    @foreach($similarTitles as $similar)
                        @php
                            $similarPoster = $similar->poster_url ?: asset('images/movie_the_last_horizon.jpg');
                            $simRating = (float) $similar->rating;
                            $primaryGenre = $similar->genres->first();
                        @endphp
                        <a 
                            href="{{ route('title.show', $similar->slug) }}" 
                            class="group flex flex-col rounded-2xl bg-gradient-to-b from-[#0a1445]/90 to-[#020721]/90 border border-white/10 hover:border-amber-400/50 shadow-lg hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300 transform hover:-translate-y-1.5 overflow-hidden focus:outline-hidden focus:ring-2 focus:ring-amber-400"
                        >
                            <!-- Poster Container with Aspect Ratio 2/3 -->
                            <div class="aspect-[2/3] w-full bg-slate-950 overflow-hidden relative">
                                <img 
                                    src="{{ $similarPoster }}" 
                                    alt="{{ $similar->title }} ({{ $similar->release_year ?? 'Cinema' }}) poster" 
                                    class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500 ease-out"
                                    loading="lazy"
                                >
                                
                                <!-- Dark Vignette Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#020721] via-transparent to-black/40 opacity-80 group-hover:opacity-60 transition-opacity"></div>

                                <!-- Top Badges: Content Rating / Format & Star Rating -->
                                <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between gap-1 z-10 pointer-events-none">
                                    @if($similar->content_rating)
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-black uppercase tracking-wider bg-black/60 backdrop-blur-md text-slate-200 border border-white/15">
                                            {{ $similar->content_rating }}
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-black/60 backdrop-blur-md text-slate-300 border border-white/15">
                                            {{ $similar->type === 'tv_series' ? 'TV' : 'Movie' }}
                                        </span>
                                    @endif

                                    @if($simRating > 0)
                                        <span class="px-2 py-0.5 rounded-md text-[11px] font-black bg-amber-500/90 text-slate-950 backdrop-blur-md flex items-center gap-1 shadow-sm">
                                            <span>★</span>
                                            <span>{{ number_format($simRating, 1) }}</span>
                                        </span>
                                    @endif
                                </div>

                                <!-- Subtle Hover Action Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-slate-950/40 backdrop-blur-xs">
                                    <span class="px-3 py-1.5 rounded-xl bg-amber-500 text-slate-950 text-xs font-black shadow-lg transform scale-90 group-hover:scale-100 transition-transform">
                                        View Details
                                    </span>
                                </div>
                            </div>

                            <!-- Card Details Footer -->
                            <div class="p-3.5 flex flex-col flex-1 justify-between gap-2">
                                <div>
                                    <!-- Connection Badge / Match Reason -->
                                    @if(!empty($similar->match_reason))
                                        <div class="mb-1.5">
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-amber-300/90 bg-amber-400/10 border border-amber-400/20 px-2 py-0.5 rounded-md truncate max-w-full">
                                                <svg class="w-2.5 h-2.5 fill-current shrink-0" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                                <span class="truncate">{{ $similar->match_reason }}</span>
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Title Name -->
                                    <h3 class="text-xs sm:text-sm font-bold text-white group-hover:text-amber-400 transition-colors line-clamp-1 leading-snug" title="{{ $similar->title }}">
                                        {{ $similar->title }}
                                    </h3>
                                </div>

                                <!-- Metadata Row: Year, Duration / Country, Genre -->
                                <div class="pt-2 border-t border-white/5 flex items-center justify-between text-[11px] text-slate-400">
                                    <div class="flex items-center gap-1.5 truncate">
                                        <span>{{ $similar->release_year ?? 'Cinema' }}</span>
                                        @if($primaryGenre)
                                            <span>•</span>
                                            <span class="text-slate-300 truncate">{{ $primaryGenre->name }}</span>
                                        @endif
                                    </div>

                                    @if(!empty($similar->original_language))
                                        <span class="uppercase text-[10px] px-1.5 py-0.2 rounded bg-white/5 text-slate-400 font-semibold shrink-0">
                                            {{ substr($similar->original_language, 0, 3) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 9. Genre Interlinking Section (Rule 9: Contextual Internal Linking) -->
    @if(!empty($allGenres) && $allGenres->isNotEmpty())
        <section class="py-16 bg-white border-t border-slate-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-amber-500 block mb-1">Browse by Theme</span>
                        <h2 class="text-2xl font-extrabold text-slate-950">Explore Cinema by Genre</h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">Discover curated filmographies and top-rated titles across every genre category.</p>
                    </div>

                    <a href="{{ route('genre.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                        <span>All Genres</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-5 gap-4">
                    @foreach($allGenres as $g)
                        @php
                            $isTitleGenre = $title->genres->contains('id', $g->id);
                        @endphp
                        <a 
                            href="{{ route('genre.show', $g->slug) }}" 
                            class="aspect-[4/3] rounded-2xl p-3 flex flex-col justify-end items-center relative overflow-hidden group shadow-xs hover:shadow-xl transition-all card-shadow-hover border {{ $isTitleGenre ? 'ring-2 ring-amber-400 border-amber-400' : 'border-slate-200/80' }}"
                        >
                            <img 
                                src="{{ $g->image_url }}" 
                                alt="{{ $g->name }} movies & series" 
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>

                            <div class="z-10 text-center w-full">
                                @if($isTitleGenre)
                                    <span class="text-[9px] uppercase font-black tracking-wider text-amber-400 block mb-0.5">Title Genre</span>
                                @endif
                                <span class="text-xs font-black {{ $isTitleGenre ? 'text-amber-300' : 'text-white' }} group-hover:text-amber-400 block tracking-wide truncate">
                                    {{ $g->name }}
                                </span>
                                <span class="text-[10px] text-slate-300 font-medium block mt-0.5">
                                    {{ $g->titles_count }} titles
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.app>
