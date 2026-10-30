<x-layouts.app 
    title="Stars & Talent Directory — Hollywood & Global Cinema Legends | TonightOnScreen"
    description="Explore popular Hollywood, Bollywood, and global cinema actors, directors, screenwriters, and talents on TonightOnScreen. Discover biographies, filmographies, and award-winning careers."
>
    <!-- Hero Banner with Midnight & Gold Theme -->
    <div class="relative bg-[#010629] text-white overflow-hidden py-12 sm:py-16 border-b border-[#0d163f]">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#FFA500]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#00184C]/40 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/90 to-[#010629]/70"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Talent Directory']]" />

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#FFA500]/10 border border-[#FFA500]/30 text-[#FFA500] text-xs font-bold uppercase tracking-wider mb-3">
                        <span class="w-2 h-2 rounded-full bg-[#FFA500] animate-pulse"></span>
                        Global Talent Directory
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                        Cinema Stars & Legends
                    </h1>
                    <p class="text-sm sm:text-base text-slate-300 mt-2 max-w-2xl">
                        Discover top Hollywood actors, celebrated Bollywood icons, and acclaimed directors with verified profiles, high-resolution headshots, and complete career filmographies.
                    </p>
                </div>

                <!-- Stats summary badges -->
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-2.5 shrink-0">
                    <div class="bg-[#071038] border border-[#0d163f] rounded-2xl px-3.5 py-2.5 text-center">
                        <span class="block text-lg font-black text-[#FFA500]">{{ $stats['total'] }}</span>
                        <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">All Talents</span>
                    </div>
                    <div class="bg-[#071038] border border-[#0d163f] rounded-2xl px-3.5 py-2.5 text-center">
                        <span class="block text-lg font-black text-white">{{ $stats['actors'] }}</span>
                        <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Actors</span>
                    </div>
                    <div class="bg-[#071038] border border-[#0d163f] rounded-2xl px-3.5 py-2.5 text-center">
                        <span class="block text-lg font-black text-[#FFA500]">{{ $stats['directors'] }}</span>
                        <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Directors</span>
                    </div>
                    <div class="bg-[#071038] border border-[#0d163f] rounded-2xl px-3.5 py-2.5 text-center">
                        <span class="block text-lg font-black text-white">{{ $stats['producers'] }}</span>
                        <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Producers</span>
                    </div>
                    <div class="bg-[#071038] border border-[#0d163f] rounded-2xl px-3.5 py-2.5 text-center col-span-2 sm:col-span-1">
                        <span class="block text-lg font-black text-emerald-400">{{ $stats['bollywood'] }} <span class="text-xs text-slate-500 font-normal">/</span> {{ $stats['hollywood'] }}</span>
                        <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">IND / US</span>
                    </div>
                </div>
            </div>

            <!-- Search & Filter Controls -->
            <div class="mt-8 pt-6 border-t border-[#0d163f] space-y-4">
                <form action="{{ route('person.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-stretch md:items-center">
                    @if(request('industry'))
                        <input type="hidden" name="industry" value="{{ request('industry') }}">
                    @endif
                    @if(request('department'))
                        <input type="hidden" name="department" value="{{ request('department') }}">
                    @endif

                    <!-- Search Input -->
                    <div class="relative flex-1">
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ request('q') }}" 
                            placeholder="Search actors, directors, or producers by name..." 
                            class="w-full bg-[#071038] border border-[#0d163f] focus:border-[#FFA500] focus:ring-2 focus:ring-[#FFA500]/20 rounded-xl px-4 py-3 pl-11 text-sm text-white placeholder-slate-400 transition-all outline-hidden"
                        >
                        <svg class="w-4 h-4 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        @if(request('q'))
                            <a href="{{ route('person.index', request()->except('q')) }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 hover:text-white px-2 py-1">
                                Clear
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="px-6 py-3 rounded-xl bg-[#FFA500] hover:bg-[#FFB41F] text-[#010629] text-xs font-bold transition-all shadow-xs shrink-0 cursor-pointer">
                        Search
                    </button>
                </form>

                <!-- Filter Pills: Role (Department) and Industry -->
                <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
                    <!-- Role / Department Filter Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider mr-1 hidden sm:inline">Role:</span>
                        <a 
                            href="{{ route('person.index', request()->except(['department', 'page'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ !request('department') ? 'bg-[#FFA500] text-[#010629] shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            All Roles
                        </a>
                        <a 
                            href="{{ route('person.index', array_merge(request()->except('page'), ['department' => 'Acting'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ request('department') === 'Acting' ? 'bg-[#FFA500] text-[#010629] shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            🎭 Actors
                        </a>
                        <a 
                            href="{{ route('person.index', array_merge(request()->except('page'), ['department' => 'Directing'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ request('department') === 'Directing' ? 'bg-[#FFA500] text-[#010629] shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            🎬 Directors
                        </a>
                        <a 
                            href="{{ route('person.index', array_merge(request()->except('page'), ['department' => 'Production'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ request('department') === 'Production' ? 'bg-[#FFA500] text-[#010629] shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            💼 Producers
                        </a>
                    </div>

                    <!-- Industry Filter Pills -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider mr-1 hidden sm:inline">Region:</span>
                        <a 
                            href="{{ route('person.index', request()->except(['industry', 'page'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ !request('industry') ? 'bg-white/20 text-white border border-white/30' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            Worldwide
                        </a>
                        <a 
                            href="{{ route('person.index', array_merge(request()->except('page'), ['industry' => 'hollywood'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ request('industry') === 'hollywood' ? 'bg-indigo-600 text-white shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            Hollywood
                        </a>
                        <a 
                            href="{{ route('person.index', array_merge(request()->except('page'), ['industry' => 'bollywood'])) }}" 
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shrink-0 {{ request('industry') === 'bollywood' ? 'bg-amber-500 text-slate-950 font-black shadow-xs' : 'bg-[#071038] text-slate-300 hover:text-white border border-[#0d163f]' }}"
                        >
                            Bollywood
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($people->isEmpty())
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200/80 shadow-xs max-w-lg mx-auto">
                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#010629] mb-1">No Stars Found</h3>
                <p class="text-xs text-slate-500 mb-6">We couldn't find any talents matching your current filter criteria.</p>
                <a href="{{ route('person.index') }}" class="inline-flex px-5 py-2.5 rounded-full bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold transition-all">
                    Reset Filters
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
                @foreach($people as $person)
                    @php
                        $roleName = match($person->known_for_department) {
                            'Acting' => ($person->gender === 'Female' ? 'Actress' : 'Actor'),
                            'Directing' => 'Director',
                            'Production' => 'Producer',
                            'Writing' => 'Writer',
                            default => $person->known_for_department ?: 'Artist',
                        };

                        $isBollywood = Str::contains($person->birth_place ?? '', ['India', 'New Delhi', 'Mumbai', 'Indore', 'Prayagraj', 'Jamshedpur', 'Hyderabad', 'Madras', 'Chennai', 'Bangalore', 'Kolkata', 'Nagpur', 'Jaipur', 'Warangal']) 
                            || in_array($person->name, [
                                'Shah Rukh Khan', 'Deepika Padukone', 'Amitabh Bachchan', 'Priyanka Chopra Jonas',
                                'Aamir Khan', 'Alia Bhatt', 'Hrithik Roshan', 'Ranbir Kapoor', 'Salman Khan', 'Kareena Kapoor Khan',
                                'S. S. Rajamouli', 'Sanjay Leela Bhansali', 'Rajkumar Hirani', 'Karan Johar', 'Siddharth Anand',
                                'Atlee', 'Aditya Chopra', 'Zoya Akhtar', 'Nitesh Tiwari', 'Sandeep Reddy Vanga', 'Gauri Khan'
                            ]);
                    @endphp

                    <a 
                        href="{{ route('person.show', $person->slug) }}" 
                        class="group bg-white rounded-2xl border border-slate-200/80 hover:border-[#FFA500]/60 card-shadow-hover transition-all flex flex-col justify-between overflow-hidden"
                    >
                        <!-- Top Headshot Container with Aspect Ratio -->
                        <div class="aspect-[4/5] w-full overflow-hidden bg-slate-900 relative">
                            @if($person->photo_url)
                                <img 
                                    src="{{ $person->photo_url }}" 
                                    alt="{{ $person->name }}" 
                                    class="w-full h-full object-cover group-hover:scale-106 transition-transform duration-500"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#010629] to-[#071038] text-white p-4">
                                    <span class="text-2xl font-black text-[#FFA500] mb-1">{{ substr($person->name, 0, 2) }}</span>
                                    <span class="text-[10px] text-slate-400">TonightOnScreen</span>
                                </div>
                            @endif

                            <!-- Gradient Vignette -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>

                            <!-- Industry Badge -->
                            <div class="absolute top-2.5 left-2.5">
                                <span class="text-[9px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full backdrop-blur-md {{ $isBollywood ? 'bg-amber-500/90 text-slate-950' : 'bg-indigo-600/90 text-white' }}">
                                    {{ $isBollywood ? 'Bollywood' : 'Hollywood' }}
                                </span>
                            </div>

                            @if($person->age)
                                <div class="absolute top-2.5 right-2.5">
                                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-black/60 text-white backdrop-blur-xs">
                                        {{ $person->age }} yrs
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-3.5 text-center flex flex-col items-center justify-between flex-1">
                            <div>
                                <h2 class="text-xs sm:text-sm font-bold text-[#010629] group-hover:text-[#FFA500] transition-colors line-clamp-1">
                                    {{ $person->name }}
                                </h2>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">
                                    {{ $roleName }}
                                </p>
                            </div>

                            <div class="mt-3 pt-2 border-t border-slate-100 w-full flex items-center justify-between text-[10px] text-slate-400">
                                <span>{{ $person->credits_count }} {{ Str::plural('Credit', $person->credits_count) }}</span>
                                <span class="text-[#FFA500] font-bold group-hover:translate-x-0.5 transition-transform">Bio &rarr;</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $people->links() }}
            </div>
        @endif
    </main>
</x-layouts.app>
