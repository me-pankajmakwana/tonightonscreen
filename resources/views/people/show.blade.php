@php
    $primaryRole = match($person->known_for_department) {
        'Acting' => ($person->gender === 'Female' ? 'Actress' : 'Actor'),
        'Directing' => 'Director',
        'Production' => 'Producer',
        'Writing' => 'Screenwriter',
        default => $person->known_for_department ?: 'Artist',
    };

    // Determine default active tab
    $defaultTab = 'acting';
    if ($acting->isEmpty()) {
        if ($directing->isNotEmpty()) $defaultTab = 'directing';
        elseif ($producing->isNotEmpty()) $defaultTab = 'producing';
        elseif ($writing->isNotEmpty()) $defaultTab = 'writing';
    }

    $personSeoDesc = $seoDescription ?? \Illuminate\Support\Str::limit(strip_tags($person->biography ?: "Explore {$person->name} biography, birth place, debut movie, hit movies list, total movie count, and career filmography on TonightOnScreen."), 160);

    $personSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => $person->name,
        'url' => route('person.show', $person->slug),
    ];
    if ($person->photo_url) {
        $personSchema['image'] = $person->photo_url;
    }
    if ($person->known_for_department) {
        $personSchema['jobTitle'] = $person->known_for_department;
    }
    if ($person->birth_date) {
        $personSchema['birthDate'] = $person->birth_date->format('Y-m-d');
    }
    if ($person->birth_place) {
        $personSchema['birthPlace'] = [
            '@type' => 'Place',
            'name' => $person->birth_place,
        ];
    }
    if ($person->biography) {
        $personSchema['description'] = strip_tags($person->biography);
    }
    if (!empty($stats['hitMovies'])) {
        $personSchema['knowsAbout'] = $stats['hitMovies']->pluck('title')->toArray();
    }
    if (!empty($seoKeywords)) {
        $personSchema['keywords'] = $seoKeywords;
    }

    $faqSchema = null;
    if (!empty($faqs)) {
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn($f) => [
                '@type' => 'Question',
                'name' => $f['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $f['answer'],
                ],
            ], $faqs),
        ];
    }
@endphp

<x-layouts.app 
    :title="$seoTitle ?? ($person->name . ' Movies List, Biography, Debut, Hit Films & Birth Place | TonightOnScreen')"
    :description="$personSeoDesc"
    :ogImage="$person->photo_url ?: asset('Tonight OnScreen Logo.png')"
>
    @push('head')
        @if(!empty($seoKeywords))
            <meta name="keywords" content="{{ $seoKeywords }}">
        @endif
        <!-- Schema.org Person JSON-LD for Search Engine SEO -->
        <x-seo.json-ld :data="$personSchema" />
        
        <!-- Schema.org FAQPage JSON-LD for Google Rich Snippets in SERPs -->
        @if(!empty($faqSchema))
            <x-seo.json-ld :data="$faqSchema" />
        @endif
    @endpush

    <!-- 1. Talent Hero & Bio Banner -->
    <div class="relative bg-[#010629] text-white overflow-hidden pb-12 sm:pb-16 border-b border-[#0d163f]">
        <!-- Ambient Backdrop Lighting -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/90 to-[#010629]/60"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-8">
            <!-- Breadcrumbs -->
            <x-breadcrumbs :items="[
                ['name' => 'People', 'url' => route('person.index')],
                ['name' => $person->name]
            ]" />

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Left: Headshot & Personal Metadata (4 Cols) -->
                <div class="md:col-span-4 lg:col-span-3">
                    <div class="aspect-[3/4] w-full rounded-2xl overflow-hidden shadow-2xl border border-white/10 relative group bg-slate-900">
                        @if($person->photo_url)
                            <img 
                                src="{{ $person->photo_url }}" 
                                alt="{{ $person->name }}" 
                                class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500"
                            >
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 text-slate-500">
                                <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" class="w-16 h-16 opacity-30 mb-3 object-contain" alt="TonightOnScreen">
                                <span class="text-xs font-semibold text-slate-400">TonightOnScreen Profile</span>
                            </div>
                        @endif

                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2.5 py-1 rounded-md text-[11px] font-bold bg-slate-950/80 backdrop-blur-md text-amber-400 border border-amber-400/20 shadow-xs">
                                {{ $primaryRole }}
                            </span>
                        </div>
                    </div>

                    <!-- Personal Information Quick Card -->
                    <div class="mt-5 sm:mt-6 bg-white/5 backdrop-blur-md rounded-2xl p-4 sm:p-5 border border-white/10 space-y-3.5 text-xs">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block pb-1 border-b border-white/10">Personal Dossier</span>

                        @if($person->birth_date)
                            <div>
                                <span class="text-[11px] text-slate-400 block mb-0.5 font-medium">Born</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm">
                                    {{ $person->birth_date->format('F d, Y') }}
                                    @if($person->age)
                                        <span class="text-slate-400 font-normal">({{ $person->age }} years old)</span>
                                    @endif
                                </span>
                            </div>
                        @endif

                        @if($person->birth_place)
                            <div>
                                <span class="text-[11px] text-slate-400 block mb-0.5 font-medium">Birthplace</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm">{{ $person->birth_place }}</span>
                            </div>
                        @endif

                        @if($person->gender)
                            <div>
                                <span class="text-[11px] text-slate-400 block mb-0.5 font-medium">Gender</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm">{{ $person->gender }}</span>
                            </div>
                        @endif

                        <div>
                            <span class="text-[11px] text-slate-400 block mb-0.5 font-medium">Primary Focus</span>
                            <span class="text-amber-400 font-semibold text-xs sm:text-sm">{{ $person->known_for_department ?: 'Cinematic Production' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Bio, Metrics & Known For (8-9 Cols) -->
                <div class="md:col-span-8 lg:col-span-9 space-y-6 sm:space-y-8">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-slate-300 text-xs font-semibold mb-3 border border-white/10">
                            <span>Entertainment Industry Veteran</span>
                            <span class="text-slate-500">•</span>
                            <span class="text-amber-400 font-bold">{{ $stats['careerSpan'] }}</span>
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                            {{ $person->name }}
                        </h1>

                        <p class="text-sm sm:text-base font-medium text-amber-300/90 mt-1.5">
                            Celebrated for {{ $primaryRole }} & Distinctive Filmmaking
                        </p>
                    </div>

                    <!-- Career Metrics Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                        <div class="bg-white/5 border border-white/10 p-4 rounded-2xl">
                            <span class="text-[11px] text-slate-400 block font-medium mb-1">Total Titles</span>
                            <span class="text-xl sm:text-2xl font-black text-white">{{ $stats['totalCredits'] }}</span>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-4 rounded-2xl">
                            <span class="text-[11px] text-slate-400 block font-medium mb-1">Avg Rating</span>
                            <span class="text-xl sm:text-2xl font-black text-amber-400">★ {{ $stats['avgRating'] }}</span>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-4 rounded-2xl">
                            <span class="text-[11px] text-slate-400 block font-medium mb-1">Lead Genre</span>
                            <span class="text-xl sm:text-2xl font-black text-white truncate block">{{ $stats['topGenre'] }}</span>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-4 rounded-2xl">
                            <span class="text-[11px] text-slate-400 block font-medium mb-1">Career Span</span>
                            <span class="text-base sm:text-lg font-bold text-slate-200 block truncate mt-1">{{ $stats['careerSpan'] }}</span>
                        </div>
                    </div>

                    <!-- Biography Narrative -->
                    <div id="bio" class="space-y-2.5 scroll-mt-8">
                        <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400">{{ $person->name }} Biography & Career Overview</h2>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-3xl">
                            {{ $person->biography ?: $person->name . ' is an accomplished artist in the global entertainment industry with distinguished contributions across multiple premier titles.' }}
                        </p>
                    </div>

                    <!-- "Known For" Spotlight Titles -->
                    @if($knownFor->isNotEmpty())
                        <div class="pt-6 border-t border-white/10">
                            <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Known For Highlights</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                                @foreach($knownFor as $kTitle)
                                    <a 
                                        href="{{ route('title.show', $kTitle->slug) }}" 
                                        class="group rounded-2xl overflow-hidden bg-white/5 border border-white/10 hover:border-amber-400/40 transition-all card-shadow-hover flex flex-col"
                                    >
                                        <div class="aspect-[2/3] w-full bg-slate-900 overflow-hidden relative">
                                            <img 
                                                src="{{ $kTitle->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" 
                                                alt="{{ $kTitle->title }}" 
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                loading="lazy"
                                            >
                                        </div>
                                        <div class="p-3">
                                            <h4 class="text-xs sm:text-sm font-bold text-white group-hover:text-amber-400 transition-colors truncate">
                                                {{ $kTitle->title }}
                                            </h4>
                                            <div class="flex items-center justify-between text-[11px] text-slate-400 mt-1">
                                                <span>{{ $kTitle->release_year ?? 'Cinema' }}</span>
                                                <span class="text-amber-400 font-bold">★ {{ number_format((float) $kTitle->rating, 1) }}</span>
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

    <!-- 2. Programmatic Fast Facts & Quick Answers (Google SERP Snippets: Birth Place, Debut Movie, Hit Movies, Total Movies) -->
    <section id="fast-facts" class="py-10 sm:py-12 bg-white border-b border-slate-200/80 scroll-mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-end justify-between gap-3">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-widest text-amber-600 block mb-1">
                        Fast Facts & Search Insights
                    </span>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-950 tracking-tight">
                        {{ $person->name }} at a Glance
                    </h2>
                </div>
                <p class="text-xs text-slate-500 sm:text-right max-w-md">
                    Instant answers for {{ $person->name }}'s place of birth, debut movie, hit movies list, and total movie count.
                </p>
            </div>

            <!-- Programmatic Knowledge Grid: 4 Responsive SEO Answer Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Card 1: Place of Birth / Born Place -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-xs hover:border-amber-400/50 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-3.5">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">
                            Birth Place & Origin
                        </span>
                        <h3 class="text-sm font-extrabold text-slate-900 leading-snug">
                            {{ $person->birth_place ?: 'International Cinema' }}
                        </h3>
                    </div>
                    <p class="text-xs text-slate-600 mt-3 pt-3 border-t border-slate-200/70 leading-relaxed">
                        Where was {{ $person->name }} born? Born in <strong class="text-slate-900">{{ $person->birth_place ?: 'the global cinema community' }}</strong>{{ $person->birth_date ? ' on ' . $person->birth_date->format('F d, Y') : '' }}.
                    </p>
                </div>

                <!-- Card 2: Debut Movie / First Movie -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-xs hover:border-amber-400/50 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-600 flex items-center justify-center mb-3.5">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">
                            Debut Movie (First Project)
                        </span>
                        <h3 class="text-sm font-extrabold text-slate-900 leading-snug truncate">
                            @if($stats['debutTitle'])
                                <a href="{{ route('title.show', $stats['debutTitle']->slug) }}" class="hover:text-amber-600 transition-colors">
                                    {{ $stats['debutTitle']->title }}
                                </a>
                            @else
                                Signature Debut
                            @endif
                        </h3>
                    </div>
                    <p class="text-xs text-slate-600 mt-3 pt-3 border-t border-slate-200/70 leading-relaxed">
                        What was {{ $person->name }}'s debut movie? Their earliest cataloged film was <strong class="text-slate-900">{{ $stats['debutTitle']?->title ?? 'their breakthrough title' }}</strong>{{ $stats['debutTitle']?->release_date ? ' (' . $stats['debutTitle']->release_date->format('Y') . ')' : '' }}.
                    </p>
                </div>

                <!-- Card 3: Hit Movies & Top Rated Work -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-xs hover:border-amber-400/50 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-3.5">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">
                            Hit Movies & Top Works
                        </span>
                        <h3 class="text-sm font-extrabold text-slate-900 leading-snug truncate">
                            {{ $stats['highestRatedTitle']?->title ?? 'Cinema Classic' }}
                        </h3>
                    </div>
                    <p class="text-xs text-slate-600 mt-3 pt-3 border-t border-slate-200/70 leading-relaxed">
                        What are {{ $person->name }}'s hit movies? Top-rated masterpieces include <strong class="text-slate-900">{{ $stats['hitMovies']->take(3)->pluck('title')->implode(', ') }}</strong>.
                    </p>
                </div>

                <!-- Card 4: Total Movies Count & Catalog Span -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-xs hover:border-amber-400/50 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center mb-3.5">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1">
                            Total Movies Count
                        </span>
                        <h3 class="text-sm font-extrabold text-slate-900 leading-snug">
                            {{ $stats['totalCredits'] }} Total Credits
                        </h3>
                    </div>
                    <p class="text-xs text-slate-600 mt-3 pt-3 border-t border-slate-200/70 leading-relaxed">
                        How many total movies has {{ $person->name }} done? Catalog contains <strong class="text-slate-900">{{ $stats['totalMoviesCount'] }} movies</strong> and <strong class="text-slate-900">{{ $stats['totalSeriesCount'] }} series</strong> spanning {{ $stats['careerSpan'] }}.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. Filmography Explorer & Visual Career Timeline -->
    <section 
        id="filmography" 
        class="py-12 sm:py-16 bg-[#f8fafc] min-h-[600px] border-t border-slate-200/80 scroll-mt-6 relative" 
        x-data="{
            activeDepartment: 'all',
            activeDecade: 'all',
            sortOrder: 'desc', // 'desc' (newest first) or 'asc' (oldest first)
            viewMode: 'timeline', // 'timeline', 'grid', 'compact'
            rawItems: {{ Js::from($timelineItems) }},
            get filteredItems() {
                let items = this.rawItems.filter(item => {
                    const matchDept = (this.activeDepartment === 'all' || item.department.toLowerCase() === this.activeDepartment.toLowerCase());
                    const matchDecade = (this.activeDecade === 'all' || item.decade === this.activeDecade);
                    return matchDept && matchDecade;
                });

                return items.sort((a, b) => {
                    return this.sortOrder === 'desc' ? (b.year - a.year) : (a.year - b.year);
                });
            },
            get groupedByYear() {
                const groups = {};
                this.filteredItems.forEach(item => {
                    if (!groups[item.year]) {
                        groups[item.year] = [];
                    }
                    groups[item.year].push(item);
                });
                return groups;
            },
            get yearKeys() {
                const keys = Object.keys(this.groupedByYear).map(Number);
                return this.sortOrder === 'desc' ? keys.sort((a, b) => b - a) : keys.sort((a, b) => a - b);
            }
        }"
    >
        <div id="timeline" class="absolute -top-12"></div>
        <div id="filmography-timeline" class="absolute -top-12"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 sm:mb-10 pb-6 border-b border-slate-200/80">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-700 text-xs font-bold mb-2">
                        <svg class="w-3.5 h-3.5 fill-current text-amber-500" viewBox="0 0 24 24">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                        </svg>
                        <span>Chronological Archive</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-950 tracking-tight">
                        {{ $person->name }} Movies List & Filmography Timeline
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-xl">
                        Complete movies list, hit titles, and career trajectory of {{ $person->name }} arranged chronologically across all credited departments.
                    </p>
                </div>

                <!-- View Switcher (Timeline, Grid, Compact) -->
                <div class="flex items-center gap-1 bg-slate-200/80 p-1 rounded-2xl shrink-0 self-start md:self-auto border border-slate-300/40">
                    <button 
                        type="button"
                        @click="viewMode = 'timeline'"
                        :class="viewMode === 'timeline' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer"
                        title="Interactive Timeline"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Timeline</span>
                    </button>

                    <button 
                        type="button"
                        @click="viewMode = 'grid'"
                        :class="viewMode === 'grid' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer"
                        title="Poster Grid Showcase"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>Grid</span>
                    </button>

                    <button 
                        type="button"
                        @click="viewMode = 'compact'"
                        :class="viewMode === 'compact' ? 'bg-white text-slate-950 shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer"
                        title="Compact Roster"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span>List</span>
                    </button>
                </div>
            </div>

            <!-- Career Analytics & Milestones Bar -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-8 sm:mb-10">
                <!-- Milestone 1: Career Span -->
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs flex items-center gap-3.5 sm:gap-4">
                    <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 border border-amber-200/60">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] sm:text-[11px] uppercase font-bold text-slate-400 tracking-wider block mb-0.5">Career Span</span>
                        <h4 class="text-sm sm:text-base font-black text-slate-900 truncate">{{ $stats['careerSpan'] }}</h4>
                        <span class="text-[11px] font-medium text-slate-500 block truncate mt-0.5">Longevity Timeline</span>
                    </div>
                </div>

                <!-- Milestone 2: Highest Rated Title -->
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs flex items-center gap-3.5 sm:gap-4">
                    <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 border border-purple-200/60">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] sm:text-[11px] uppercase font-bold text-slate-400 tracking-wider block mb-0.5">Highest Rated</span>
                        <h4 class="text-sm sm:text-base font-black text-slate-900 truncate">{{ $stats['highestRatedTitle']?->title ?? 'Premier Title' }}</h4>
                        <span class="text-[11px] font-bold text-amber-500 block truncate mt-0.5">
                            @if($stats['highestRatedTitle'])
                                ★ {{ number_format((float) $stats['highestRatedTitle']->rating, 1) }} / 10 Masterpiece
                            @else
                                Top Scored
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Milestone 3: Total Box Office Gross -->
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs flex items-center gap-3.5 sm:gap-4">
                    <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-200/60">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        @php
                            $isIndianTalent = $person->isIndian() || ($stats['highestGrossing'] && $stats['highestGrossing']->isIndian());
                        @endphp
                        <span class="text-[10px] sm:text-[11px] uppercase font-bold text-slate-400 tracking-wider block mb-0.5">{{ $isIndianTalent ? 'Total Collection' : 'Cumulative Gross' }}</span>
                        <h4 class="text-sm sm:text-base font-black text-emerald-600 truncate font-mono">
                            @if($isIndianTalent)
                                @if($stats['totalBoxOffice'] >= 10000000)
                                    Rs. {{ number_format($stats['totalBoxOffice'] / 10000000, 0) }} Cr
                                @elseif($stats['totalBoxOffice'] > 0)
                                    Rs. {{ number_format($stats['totalBoxOffice'] / 100000, 0) }} L
                                @else
                                    Box Office Record
                                @endif
                            @else
                                @if($stats['totalBoxOffice'] >= 1000000000)
                                    ${{ number_format($stats['totalBoxOffice'] / 1000000000, 2) }}B
                                @elseif($stats['totalBoxOffice'] > 0)
                                    ${{ number_format($stats['totalBoxOffice'] / 1000000, 0) }}M
                                @else
                                    Box Office Record
                                @endif
                            @endif
                        </h4>
                        <span class="text-[11px] font-medium text-slate-500 block truncate mt-0.5">Lifetime Worldwide</span>
                    </div>
                </div>

                <!-- Milestone 4: Total Verified Credits -->
                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs flex items-center gap-3.5 sm:gap-4">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-200/60">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] sm:text-[11px] uppercase font-bold text-slate-400 tracking-wider block mb-0.5">Archive Scope</span>
                        <h4 class="text-sm sm:text-base font-black text-slate-900 truncate">{{ $timelineItems->count() }} Verified Works</h4>
                        <span class="text-[11px] font-medium text-slate-500 block truncate mt-0.5">Across All Credits</span>
                    </div>
                </div>
            </div>

            <!-- Filter Controls Toolbar -->
            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/80 mb-8 sm:mb-10 shadow-xs space-y-4">
                <!-- Row 1: Department Filter Pills & Sort Direction -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 text-xs">
                        <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px] shrink-0 mr-1">Department:</span>
                        
                        <button 
                            type="button"
                            @click="activeDepartment = 'all'"
                            :class="activeDepartment === 'all' ? 'bg-slate-950 text-white font-bold shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                            class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer flex items-center gap-1.5 text-xs font-semibold shrink-0"
                        >
                            <span>All Roles</span>
                            <span class="px-1.5 py-0.5 rounded-md text-[10px] font-bold bg-white/20 text-current">{{ $timelineItems->count() }}</span>
                        </button>

                        @if($directing->isNotEmpty())
                            <button 
                                type="button"
                                @click="activeDepartment = 'Directing'"
                                :class="activeDepartment === 'Directing' ? 'bg-purple-600 text-white font-bold shadow-xs' : 'bg-purple-50 text-purple-700 hover:bg-purple-100 border border-purple-200/60'"
                                class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer flex items-center gap-1.5 text-xs font-semibold shrink-0"
                            >
                                <span>Directing</span>
                                <span class="px-1.5 py-0.5 rounded-md text-[10px] font-bold bg-purple-900/20 text-current">{{ $directing->count() }}</span>
                            </button>
                        @endif

                        @if($acting->isNotEmpty())
                            <button 
                                type="button"
                                @click="activeDepartment = 'Acting'"
                                :class="activeDepartment === 'Acting' ? 'bg-blue-600 text-white font-bold shadow-xs' : 'bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200/60'"
                                class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer flex items-center gap-1.5 text-xs font-semibold shrink-0"
                            >
                                <span>Acting</span>
                                <span class="px-1.5 py-0.5 rounded-md text-[10px] font-bold bg-blue-900/20 text-current">{{ $acting->count() }}</span>
                            </button>
                        @endif

                        @if($writing->isNotEmpty())
                            <button 
                                type="button"
                                @click="activeDepartment = 'Writing'"
                                :class="activeDepartment === 'Writing' ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200/60'"
                                class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer flex items-center gap-1.5 text-xs font-semibold shrink-0"
                            >
                                <span>Writing</span>
                                <span class="px-1.5 py-0.5 rounded-md text-[10px] font-bold bg-emerald-900/20 text-current">{{ $writing->count() }}</span>
                            </button>
                        @endif

                        @if($producing->isNotEmpty())
                            <button 
                                type="button"
                                @click="activeDepartment = 'Production'"
                                :class="activeDepartment === 'Production' ? 'bg-amber-600 text-white font-bold shadow-xs' : 'bg-amber-50 text-amber-700 hover:bg-amber-100 border border-amber-200/60'"
                                class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer flex items-center gap-1.5 text-xs font-semibold shrink-0"
                            >
                                <span>Production</span>
                                <span class="px-1.5 py-0.5 rounded-md text-[10px] font-bold bg-amber-900/20 text-current">{{ $producing->count() }}</span>
                            </button>
                        @endif
                    </div>

                    <!-- Chronological Sort Toggle -->
                    <button 
                        type="button"
                        @click="sortOrder = (sortOrder === 'desc' ? 'asc' : 'desc')"
                        class="text-xs font-bold text-slate-700 hover:text-slate-950 flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200/80 cursor-pointer shrink-0 self-start sm:self-auto transition-colors"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                        <span x-text="sortOrder === 'desc' ? 'Newest First' : 'Oldest First'"></span>
                    </button>
                </div>

                <!-- Row 2: Decade Era Selector -->
                @if($decades->count() > 1)
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2 overflow-x-auto no-scrollbar text-xs">
                        <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px] shrink-0 mr-1">Decade Era:</span>
                        <button 
                            type="button"
                            @click="activeDecade = 'all'"
                            :class="activeDecade === 'all' ? 'bg-amber-400 text-slate-950 font-bold shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer shrink-0 text-xs"
                        >
                            All Decades
                        </button>
                        @foreach($decades as $dec)
                            <button 
                                type="button"
                                @click="activeDecade = '{{ $dec }}'"
                                :class="activeDecade === '{{ $dec }}' ? 'bg-amber-400 text-slate-950 font-bold shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                                class="px-3.5 py-1.5 rounded-xl transition-all cursor-pointer shrink-0 text-xs"
                            >
                                {{ $dec }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Empty Filter Results -->
            <div x-show="filteredItems.length === 0" x-cloak class="bg-white rounded-3xl p-12 text-center max-w-md mx-auto border border-slate-200/80 my-8">
                <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h4 class="text-sm font-bold text-slate-900 mb-1">No credits in this selection</h4>
                <p class="text-xs text-slate-500 mb-4">Try clearing department or decade filters to see more entries.</p>
                <button 
                    type="button" 
                    @click="activeDepartment = 'all'; activeDecade = 'all'" 
                    class="px-4 py-2 rounded-xl bg-slate-950 text-white text-xs font-bold hover:bg-slate-800 transition-colors cursor-pointer"
                >
                    Reset Filters
                </button>
            </div>

            <!-- 1. VIEW MODE: Interactive Visual Timeline -->
            <div x-show="viewMode === 'timeline' && filteredItems.length > 0" class="max-w-4xl mx-auto px-2 sm:px-6">
                <div class="relative pl-10 sm:pl-14">
                    <!-- Vertical Stem Line with Glow (Centered mathematically on nodes) -->
                    <div class="absolute left-[17px] sm:left-[23px] top-3 bottom-6 w-[2px] bg-gradient-to-b from-amber-400 via-amber-300 to-slate-200"></div>

                    <!-- Year Groupings -->
                    <template x-for="year in yearKeys" :key="year">
                        <div class="relative mb-10 sm:mb-12">
                            <!-- Year Node Indicator -->
                            <div class="flex items-center gap-3.5 mb-5 -ml-10 sm:-ml-14">
                                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-slate-950 text-amber-400 font-black text-xs sm:text-sm flex items-center justify-center border-2 border-amber-400 shadow-md shrink-0 z-10">
                                    <span x-text="year"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs sm:text-sm font-black text-slate-900" x-text="year"></span>
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider" x-text="'• ' + groupedByYear[year].length + (groupedByYear[year].length === 1 ? ' Release' : ' Releases')"></span>
                                </div>
                            </div>

                            <!-- Timeline Project Cards for this Year -->
                            <div class="space-y-4">
                            <template x-for="item in groupedByYear[year]" :key="item.id">
                                <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 group relative">
                                    <!-- Left Section: Poster & Title Info -->
                                    <div class="flex items-center gap-4 min-w-0">
                                        <!-- Poster Thumbnail -->
                                        <a :href="'/title/' + item.slug" class="w-14 sm:w-16 h-20 sm:h-24 rounded-xl bg-slate-950 overflow-hidden shrink-0 shadow-xs block group-hover:scale-105 transition-transform duration-300">
                                            <img :src="item.poster_path" :alt="item.title" class="w-full h-full object-cover" loading="lazy">
                                        </a>

                                        <div class="min-w-0">
                                            <!-- Milestones / Badges Row -->
                                            <div class="flex flex-wrap items-center gap-1.5 mb-1.5">
                                                <!-- Department Badge -->
                                                <span 
                                                    class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold"
                                                    :class="{
                                                        'bg-purple-100 text-purple-800 border border-purple-200': item.department === 'Directing',
                                                        'bg-blue-100 text-blue-800 border border-blue-200': item.department === 'Acting',
                                                        'bg-emerald-100 text-emerald-800 border border-emerald-200': item.department === 'Writing',
                                                        'bg-amber-100 text-amber-800 border border-amber-200': item.department === 'Production'
                                                    }"
                                                    x-text="item.department"
                                                ></span>

                                                <!-- Format Pill -->
                                                <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-slate-100 text-slate-600" x-text="item.type_label"></span>

                                                <!-- Highest Rated Milestone -->
                                                <template x-if="item.is_highest_rated">
                                                    <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-amber-400 text-slate-950 flex items-center gap-1 shadow-xs">
                                                        <span>👑</span>
                                                        <span>Career Peak</span>
                                                    </span>
                                                </template>

                                                <!-- Career Debut Milestone -->
                                                <template x-if="item.is_debut">
                                                    <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-emerald-500 text-white flex items-center gap-1 shadow-xs">
                                                        <span>🚀</span>
                                                        <span>Debut Work</span>
                                                    </span>
                                                </template>

                                                <!-- Blockbuster Milestone -->
                                                <template x-if="item.is_blockbuster">
                                                    <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-cyan-100 text-cyan-800 border border-cyan-200">
                                                        <span>💰</span>
                                                        <span>Blockbuster</span>
                                                    </span>
                                                </template>
                                            </div>

                                            <!-- Title Name -->
                                            <h3 class="text-base sm:text-lg font-black text-slate-900 group-hover:text-amber-600 transition-colors line-clamp-1">
                                                <a :href="'/title/' + item.slug" x-text="item.title"></a>
                                            </h3>

                                            <!-- Role Description -->
                                            <p class="text-xs text-slate-500 mt-1 flex flex-wrap items-center gap-1.5">
                                                <template x-if="item.character_name">
                                                    <span>as <strong class="text-slate-800 font-bold" x-text="item.character_name"></strong></span>
                                                </template>
                                                <template x-if="!item.character_name">
                                                    <span class="font-medium text-slate-700" x-text="item.job || item.department"></span>
                                                </template>
                                                <template x-if="item.genres && item.genres.length > 0">
                                                    <span>• <span class="text-slate-400" x-text="item.genres.slice(0, 2).join(', ')"></span></span>
                                                </template>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Right Section: Rating & View Button -->
                                    <div class="flex items-center gap-3 sm:gap-4 self-end sm:self-center shrink-0">
                                        <div class="text-right">
                                            <div class="inline-flex items-center gap-1 text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1.5 rounded-xl border border-amber-200/60 shadow-xs">
                                                <span>★</span>
                                                <span x-text="item.rating.toFixed(1)"></span>
                                            </div>
                                            <span class="text-[10px] text-slate-400 block mt-1 font-medium" x-text="item.release_date || item.year"></span>
                                        </div>

                                        <a 
                                            :href="'/title/' + item.slug" 
                                            class="py-2 px-4 rounded-xl bg-slate-950 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-xs shrink-0 cursor-pointer"
                                        >
                                            View Title
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- 2. VIEW MODE: Poster Grid -->
            <div x-show="viewMode === 'grid' && filteredItems.length > 0" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                <template x-for="item in filteredItems" :key="'grid-' + item.id">
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:border-slate-300 card-shadow-hover transition-all flex flex-col group">
                        <div class="aspect-[2/3] w-full bg-slate-950 relative overflow-hidden">
                            <a :href="'/title/' + item.slug" class="block w-full h-full">
                                <img :src="item.poster_path" :alt="item.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            </a>

                            <div class="absolute top-2.5 left-2.5">
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-950/80 text-white backdrop-blur-md" x-text="item.year"></span>
                            </div>

                            <div class="absolute top-2.5 right-2.5">
                                <div class="flex items-center gap-1 px-2 py-0.5 rounded-md bg-slate-950/80 backdrop-blur-md text-amber-400 text-[11px] font-bold border border-white/10 shadow-xs">
                                    <span>★</span>
                                    <span x-text="item.rating.toFixed(1)"></span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 flex-grow flex flex-col justify-between space-y-3">
                            <div>
                                <div class="flex items-center gap-1.5 mb-1.5 flex-wrap">
                                    <span 
                                        class="px-2 py-0.5 rounded-md text-[10px] font-bold"
                                        :class="{
                                            'bg-purple-100 text-purple-800': item.department === 'Directing',
                                            'bg-blue-100 text-blue-800': item.department === 'Acting',
                                            'bg-emerald-100 text-emerald-800': item.department === 'Writing',
                                            'bg-amber-100 text-amber-800': item.department === 'Production'
                                        }"
                                        x-text="item.department"
                                    ></span>
                                    <span class="px-1.5 py-0.5 rounded text-[10px] font-semibold bg-slate-100 text-slate-600" x-text="item.type_label"></span>
                                </div>

                                <h3 class="text-sm font-bold text-slate-900 group-hover:text-amber-600 transition-colors line-clamp-1">
                                    <a :href="'/title/' + item.slug" x-text="item.title"></a>
                                </h3>
                                <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">
                                    <span x-text="item.character_name ? 'as ' + item.character_name : (item.job || item.department)"></span>
                                </p>
                            </div>

                            <div class="pt-2.5 border-t border-slate-100">
                                <a :href="'/title/' + item.slug" class="w-full py-2 px-3 rounded-xl bg-slate-950 hover:bg-slate-800 text-white text-xs font-bold text-center block transition-colors shadow-xs">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- 3. VIEW MODE: Compact Roster List -->
            <div x-show="viewMode === 'compact' && filteredItems.length > 0" class="space-y-3">
                <template x-for="item in filteredItems" :key="'compact-' + item.id">
                    <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between gap-4 hover:border-slate-300 card-shadow-hover transition-all">
                        <div class="flex items-center gap-3.5 sm:gap-4 min-w-0">
                            <span class="w-12 font-black text-slate-900 text-sm sm:text-base shrink-0 font-mono" x-text="item.year"></span>
                            <div class="min-w-0">
                                <a :href="'/title/' + item.slug" class="text-sm font-bold text-slate-900 hover:text-amber-600 transition-colors truncate block" x-text="item.title"></a>
                                <div class="flex items-center gap-1.5 text-xs text-slate-500 truncate mt-0.5">
                                    <span x-text="item.character_name ? 'as ' + item.character_name : (item.job || item.department)"></span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-slate-400" x-text="item.type_label"></span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 sm:gap-4 shrink-0">
                            <span 
                                class="px-2.5 py-1 rounded-lg text-[10px] font-bold hidden sm:inline-block"
                                :class="{
                                    'bg-purple-100 text-purple-800 border border-purple-200': item.department === 'Directing',
                                    'bg-blue-100 text-blue-800 border border-blue-200': item.department === 'Acting',
                                    'bg-emerald-100 text-emerald-800 border border-emerald-200': item.department === 'Writing',
                                    'bg-amber-100 text-amber-800 border border-amber-200': item.department === 'Production'
                                }"
                                x-text="item.department"
                            ></span>
                            <div class="flex items-center gap-1 text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-xl border border-amber-200/60 shadow-xs">
                                <span>★</span>
                                <span x-text="item.rating.toFixed(1)"></span>
                            </div>
                            <a :href="'/title/' + item.slug" class="hidden md:inline-flex py-1.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                                Details
                            </a>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 4. Frequently Asked Questions (FAQ) Section -->
    @if(!empty($faqs))
        <section id="faqs" class="py-16 bg-[#f8fafc] border-t border-slate-200/80 scroll-mt-6">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-widest uppercase">
                        Frequently Asked Questions
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#010629] mt-3 tracking-tight">
                        Frequently Asked Questions: <span class="text-[#FFA500]">{{ $person->name }}</span>
                    </h2>
                    <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Instant answers for {{ $person->name }}'s place of birth, debut movie, biography, hit movies list, and total movie count.
                    </p>
                </div>

                <!-- FAQ Accordion List -->
                <div class="space-y-3.5 max-w-3xl mx-auto" x-data="{ activeFaq: 0 }">
                    @foreach($faqs as $index => $faq)
                        <div class="border border-slate-200/90 rounded-2xl bg-white overflow-hidden shadow-xs hover:border-[#FFA500]/50 transition-all">
                            <button 
                                @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                class="w-full px-5 sm:px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50/80 transition-colors"
                            >
                                <span class="flex items-center gap-3">
                                    <span class="w-6 h-6 rounded-lg bg-amber-500/10 text-[#FFA500] font-black text-xs flex items-center justify-center shrink-0">
                                        {{ $index + 1 }}
                                    </span>
                                    <span>{{ $faq['question'] }}</span>
                                </span>
                                <svg class="w-5 h-5 text-slate-400 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': activeFaq === {{ $index }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div 
                                x-show="activeFaq === {{ $index }}" 
                                x-cloak 
                                class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3.5 bg-slate-50/40"
                            >
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.app>
