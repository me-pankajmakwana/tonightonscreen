@php
    $aboutSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'AboutPage',
        'name' => 'About TonightOnScreen',
        'description' => 'TonightOnScreen is an independent entertainment discovery platform and movie database dedicated to guiding film lovers and television fans.',
        'url' => route('about'),
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => 'TonightOnScreen',
            'url' => url('/'),
            'logo' => asset('Tonight OnScreen Logo Icon.png'),
            'foundingDate' => '2024',
            'knowsAbout' => ['Cinema', 'Movies', 'Television Series', 'Film Criticism', 'Streaming Guides'],
        ],
    ];
@endphp

<x-layouts.app 
    title="About TonightOnScreen — Cinema & Television Editorial Mission"
    description="Learn about TonightOnScreen, our passion for cinema, verified film catalog, critic & audience scoring methodology, and our commitment to discovering what to watch tonight."
>
    @push('head')
        <script type="application/ld+json">
        {!! json_encode($aboutSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <!-- Hero Header -->
    <div class="relative bg-[#010629] text-white pt-12 pb-20 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#FFA500]/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'About Us']]" />

            <div class="mt-8 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Editorial Mission & Philosophy
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4 leading-tight">
                    Every Great Night Begins With The <span class="text-[#FFA500]">Right Story</span>.
                </h1>
                <p class="mt-4 text-base sm:text-lg text-slate-300 leading-relaxed">
                    TonightOnScreen was born out of a simple universal dilemma: spending 45 minutes endlessly scrolling through streaming catalogues just to find something worth watching. We built an intelligent, cinephile-crafted platform to bring blockbusters, indie gems, and binge-worthy television together in one luminous place.
                </p>
            </div>

            <!-- Fast Stat Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-12 pt-8 border-t border-[#0d163f]">
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xs">
                    <div class="text-3xl font-black text-white">{{ number_format($stats['titles']) }}+</div>
                    <div class="text-xs text-slate-400 font-medium mt-1">Curated Titles</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xs">
                    <div class="text-3xl font-black text-[#FFA500]">{{ number_format($stats['people']) }}+</div>
                    <div class="text-xs text-slate-400 font-medium mt-1">Filmmakers & Actors</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xs">
                    <div class="text-3xl font-black text-white">{{ number_format($stats['genres']) }}</div>
                    <div class="text-xs text-slate-400 font-medium mt-1">Distinct Genre Hubs</div>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xs">
                    <div class="text-3xl font-black text-emerald-400">100%</div>
                    <div class="text-xs text-slate-400 font-medium mt-1">Editorial Independence</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Editorial Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        <!-- 1. What We Stand For -->
        <section class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-1">
                <span class="text-xs font-bold tracking-wider text-[#FFA500] uppercase">Core Pillars</span>
                <h2 class="text-2xl font-bold text-[#010629] mt-1">What Guides Our Curation</h2>
            </div>
            <div class="md:col-span-2 space-y-6 text-slate-600 text-sm leading-relaxed">
                <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs hover:border-[#FFA500]/50 transition-colors">
                    <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-[#FFA500]/15 text-[#FFA500] flex items-center justify-center font-black text-sm">1</span>
                        Unbiased, Community-Driven Ratings
                    </h3>
                    <p class="mt-2 text-slate-600">
                        Our review algorithm pairs verified critical consensus with authentic viewer reviews. We do not accept sponsored ranking placements or artificially inflate scores for studio partners.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs hover:border-[#FFA500]/50 transition-colors">
                    <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-[#FFA500]/15 text-[#FFA500] flex items-center justify-center font-black text-sm">2</span>
                        Deep Filmography & Talent Recognition
                    </h3>
                    <p class="mt-2 text-slate-600">
                        Cinema is an art forged by thousands of visionaries behind and in front of the lens. We catalog comprehensive credits spanning directors, screenwriters, producers, and cast members so you can explore an auteur's complete body of work.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs hover:border-[#FFA500]/50 transition-colors">
                    <h3 class="font-bold text-slate-900 text-base flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-[#FFA500]/15 text-[#FFA500] flex items-center justify-center font-black text-sm">3</span>
                        Instant Streaming Availability
                    </h3>
                    <p class="mt-2 text-slate-600">
                        Knowing a movie is great doesn't help if you don't know where to stream it. We track streaming distribution across Netflix, Prime Video, Disney+, Apple TV+, and theatrical releases to get you from discovery to watching in seconds.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. E-E-A-T Quality Commitment -->
        <section class="bg-gradient-to-br from-[#010629] to-[#0a1244] text-white p-8 sm:p-12 rounded-3xl relative overflow-hidden shadow-xl">
            <div class="relative z-10 max-w-3xl">
                <span class="text-[#FFA500] text-xs font-bold uppercase tracking-wider">Expertise & Quality Standards</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-2">
                    Our Film Intelligence & Editorial Standards
                </h2>
                <p class="mt-4 text-slate-300 text-sm sm:text-base leading-relaxed">
                    TonightOnScreen is staffed by lifelong film critics, culture writers, and software engineers who believe cinematic art deserves rigorous respect. Every title entry undergoes multi-point metadata verification against historical production records, release calendars, and festival records.
                </p>
                <div class="mt-6 flex flex-wrap gap-4">
                    <a href="{{ route('editorial-guidelines') }}" class="px-5 py-2.5 rounded-xl bg-[#FFA500] hover:bg-[#e69500] text-[#010629] font-bold text-xs transition-colors">
                        Read Our Editorial Guidelines →
                    </a>
                    <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs border border-white/20 transition-colors">
                        Suggest a Correction or Title
                    </a>
                </div>
            </div>
        </section>

        <!-- 3. Explore Hub Links -->
        <section class="border-t border-slate-200 pt-12">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-xl font-bold text-[#010629]">Ready to Find Your Next Favorite Watch?</h2>
                <p class="text-xs text-slate-500 mt-2">Explore our specialized entertainment hubs curated for every mood and format.</p>
                <div class="flex flex-wrap justify-center gap-3 mt-6">
                    <a href="{{ route('top-rated') }}" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-semibold hover:bg-[#FFA500] hover:text-[#010629] transition-colors">
                        Top Rated of All Time
                    </a>
                    <a href="{{ route('trending') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-800 text-xs font-semibold hover:bg-slate-200 transition-colors">
                        Trending Tonight
                    </a>
                    <a href="{{ route('genre.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-800 text-xs font-semibold hover:bg-slate-200 transition-colors">
                        Browse by Genre
                    </a>
                    <a href="{{ route('platforms.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-800 text-xs font-semibold hover:bg-slate-200 transition-colors">
                        Streaming Platforms
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
