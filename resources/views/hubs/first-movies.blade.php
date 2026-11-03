<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    @push('head')
        <x-seo.json-ld :data="$debutSchema" />
    @endpush

    <!-- Hero Header -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#050e38] to-[#010629] text-white py-14 sm:py-18 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-emerald-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider mb-5 shadow-sm">
                <span>🌟</span>
                <span>The Origins of Cinema Greats</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-4xl mx-auto leading-tight mb-4">
                First Movies & <span class="text-[#FFA500] italic font-serif">Career Debuts</span> Directory
            </h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Ever wondered what your favorite star's first film was? Explore the official debut projects, release years, and breakout roles that launched legends.
            </p>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white border-b border-slate-200 sticky top-18 sm:top-20 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-0.5">
                <a 
                    href="{{ route('first-movies') }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $role === 'all' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    All Celebrities
                </a>
                <a 
                    href="{{ route('first-movies', ['role' => 'actor']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $role === 'actor' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    🎭 Leading Actors & Actresses
                </a>
                <a 
                    href="{{ route('first-movies', ['role' => 'director']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $role === 'director' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    🎬 Visionary Directors (Directorial Debuts)
                </a>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-xl sm:text-2xl font-black text-[#010629]">
                    Cataloged Debut Films & Timelines
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Verified debut release years and roles across world cinema</p>
            </div>
            <div class="text-xs font-bold text-slate-500">
                Showing {{ $people->total() }} Talents
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($debutList as $item)
                @php
                    $person = $item->person;
                    $debutTitle = $item->debut_title;
                @endphp
                <article class="bg-white rounded-3xl border border-slate-200/90 overflow-hidden shadow-xs hover:shadow-xl hover:border-emerald-400/60 transition-all duration-300 flex flex-col group p-5">
                    
                    <!-- Top: Celebrity Identity -->
                    <div class="flex items-center gap-3.5 pb-4 border-b border-slate-100">
                        <div class="w-14 h-14 rounded-2xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200 shadow-xs">
                            @if($person->photo_url)
                                <img src="{{ $person->photo_url }}" alt="{{ $person->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold text-lg">
                                    {{ substr($person->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="min-w-0 flex-grow">
                            <span class="px-2 py-0.5 rounded text-[9px] font-black uppercase tracking-wider bg-slate-100 text-slate-600">
                                {{ $person->known_for_department ?: 'Cinema Artist' }}
                            </span>
                            <h3 class="font-extrabold text-slate-900 text-sm truncate mt-1 group-hover:text-amber-600 transition-colors">
                                <a href="{{ route('person.show', $person->slug) }}">{{ $person->name }}</a>
                            </h3>
                            <div class="text-[11px] text-slate-400 mt-0.5">
                                {{ $person->birth_place ?: $person->hometown ?: 'Celebrity Profile' }}
                            </div>
                        </div>
                    </div>

                    <!-- Bottom: Debut Film Spotlight -->
                    <div class="pt-4 flex flex-col flex-grow justify-between">
                        @if($debutTitle)
                            <div class="flex items-center gap-3.5 bg-slate-50/80 rounded-2xl p-3 border border-slate-100">
                                <img src="{{ $debutTitle->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $debutTitle->title }}" class="w-12 h-16 object-cover rounded-xl shadow-xs shrink-0">
                                <div class="min-w-0 flex-grow">
                                    <div class="flex items-center gap-1.5 mb-0.5">
                                        <span class="text-[9px] font-black uppercase px-1.5 py-0.2 rounded bg-emerald-100 text-emerald-800">
                                            1st Movie
                                        </span>
                                        @if($item->debut_year)
                                            <span class="text-[10px] font-bold text-slate-500">({{ $item->debut_year }})</span>
                                        @endif
                                    </div>
                                    <h4 class="font-bold text-xs text-slate-900 truncate">
                                        <a href="{{ route('title.show', $debutTitle->slug) }}" class="hover:text-emerald-700 transition-colors">
                                            {{ $debutTitle->title }}
                                        </a>
                                    </h4>
                                    <p class="text-[10px] text-slate-500 truncate mt-0.5">
                                        Role: <strong class="text-slate-700">{{ $item->role_text ?: 'Debut Role' }}</strong>
                                    </p>
                                    @if($item->debut_age)
                                        <p class="text-[9px] text-slate-400 mt-0.5">Age at debut: {{ $item->debut_age }} years old</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="p-3 bg-slate-50 rounded-2xl text-[11px] text-slate-500 text-center">
                                Debut project details cataloged on profile page
                            </div>
                        @endif

                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <a href="{{ route('person.show', $person->slug) }}#faq" class="text-[#010629] font-bold hover:text-amber-600 transition-colors">
                                View Debut FAQs & Timeline →
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                    <div class="text-4xl mb-3">🎬</div>
                    <h3 class="text-base font-bold text-slate-800">No celebrities listed under this filter</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $people->links() }}
        </div>
    </div>
</x-layouts.app>

