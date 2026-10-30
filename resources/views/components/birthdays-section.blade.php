@props(['todayBirthdays', 'upcomingBirthdays'])

@php
    $hasTodayBirthdays = $todayBirthdays->isNotEmpty();
    $todayCount = $todayBirthdays->count();
    $upcomingCount = $upcomingBirthdays->count();
    $defaultTab = $hasTodayBirthdays ? 'today' : 'upcoming';
@endphp

<section id="birthdays" class="py-16 bg-gradient-to-b from-slate-900 via-[#071038] to-[#010629] text-white relative overflow-hidden" x-data="{ activeTab: '{{ $defaultTab }}' }">
    <!-- Subtle festive ambient background light -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/15 border border-amber-400/30 text-amber-300 text-[11px] font-bold uppercase tracking-wider mb-2.5">
                    <span class="text-sm">🎂</span>
                    <span>Celebrity Spotlight</span>
                    <span class="w-1 h-1 rounded-full bg-amber-400"></span>
                    <span class="text-amber-200 font-semibold">{{ now()->format('F j') }}</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-3">
                    <span>Today's Celebrity Birthdays</span>
                    @if($hasTodayBirthdays)
                        <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-black bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 shadow-sm animate-bounce">
                            {{ $todayCount }} Celebrating Today
                        </span>
                    @endif
                </h2>
                <p class="text-xs sm:text-sm text-slate-300/80 mt-1 max-w-2xl">
                    Wish happy birthday to screen legends, award-winning performers, and visionary filmmakers born on this day.
                </p>
            </div>

            <!-- Tabs & Directory Link -->
            <div class="flex items-center gap-3">
                <div class="inline-flex p-1 bg-white/10 backdrop-blur-md rounded-xl border border-white/10 text-xs font-semibold">
                    <button 
                        @click="activeTab = 'today'" 
                        :class="activeTab === 'today' ? 'bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-bold shadow-md' : 'text-slate-300 hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5"
                    >
                        <span>🎉 Born Today</span>
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $hasTodayBirthdays ? 'bg-slate-950/20 text-slate-950 font-black' : 'bg-white/10 text-slate-300' }}">{{ $todayCount }}</span>
                    </button>

                    <button 
                        @click="activeTab = 'upcoming'" 
                        :class="activeTab === 'upcoming' ? 'bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-bold shadow-md' : 'text-slate-300 hover:text-white'"
                        class="px-3.5 py-1.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5"
                    >
                        <span>📅 Upcoming</span>
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] bg-white/10">{{ $upcomingCount }}</span>
                    </button>
                </div>

                <a 
                    href="{{ route('person.index') }}" 
                    class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/15 text-xs font-bold transition-all shrink-0"
                >
                    <span>All Celebrities</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- TAB 1: TODAY'S BIRTHDAYS -->
        <div x-show="activeTab === 'today'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            @if($hasTodayBirthdays)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach($todayBirthdays as $person)
                        @php
                            $roleName = match($person->known_for_department) {
                                'Acting' => ($person->gender === 'Female' ? 'Actress' : 'Actor'),
                                'Directing' => 'Director',
                                'Production' => 'Producer',
                                'Writing' => 'Writer',
                                default => $person->known_for_department ?: 'Artist',
                            };
                            $age = $person->birth_date ? $person->birth_date->age : null;
                        @endphp

                        <a 
                            href="{{ route('person.show', $person->slug) }}" 
                            class="group relative bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-amber-400/30 hover:border-amber-400 transition-all duration-300 shadow-lg hover:shadow-amber-500/20 flex flex-col items-center text-center overflow-hidden"
                        >
                            <!-- Festive Ribbon Badge -->
                            <div class="w-full flex justify-between items-center mb-4">
                                <span class="inline-flex items-center gap-1 text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-full bg-amber-400 text-slate-950 shadow-xs">
                                    <span>🎂</span>
                                    <span>Today!</span>
                                </span>
                                @if($age)
                                    <span class="text-xs font-extrabold text-amber-300 bg-amber-400/10 border border-amber-400/20 px-2 py-0.5 rounded-md">
                                        Turning {{ $age }}
                                    </span>
                                @endif
                            </div>

                            <!-- Photo Container with animated ring -->
                            <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-full overflow-hidden p-1 bg-gradient-to-tr from-amber-400 via-amber-200 to-amber-500 ring-4 ring-amber-400/20 group-hover:ring-amber-400/60 transition-all duration-500 mb-4 shadow-xl relative">
                                <div class="w-full h-full rounded-full overflow-hidden bg-slate-900">
                                    @if($person->photo_url)
                                        <img 
                                            src="{{ $person->photo_url }}" 
                                            alt="{{ $person->name }}" 
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-tr from-[#010629] to-[#071038] text-white">
                                            <span class="text-xl font-black text-amber-400">{{ substr($person->name, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Name & Meta -->
                            <div class="w-full">
                                <h3 class="text-base sm:text-lg font-bold text-white group-hover:text-amber-300 transition-colors line-clamp-1 mb-1">
                                    {{ $person->name }}
                                </h3>

                                <div class="flex items-center justify-center gap-2 text-xs text-slate-300/80 mb-2">
                                    <span class="px-2 py-0.5 rounded bg-white/10 text-slate-200 font-medium">
                                        {{ $roleName }}
                                    </span>
                                    @if($person->birth_date)
                                        <span>•</span>
                                        <span>{{ $person->birth_date->format('M j, Y') }}</span>
                                    @endif
                                </div>

                                @if($person->birth_place)
                                    <p class="text-[11px] text-slate-400 line-clamp-1 mb-4 flex items-center justify-center gap-1">
                                        <svg class="w-3 h-3 text-amber-400/80 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>{{ $person->birth_place }}</span>
                                    </p>
                                @endif

                                <!-- Filmography CTA -->
                                <div class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-300 group-hover:text-amber-200 transition-colors pt-3 border-t border-white/10 w-full justify-center">
                                    <span>Explore Filmography</span>
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <!-- Graceful Fallback if today has 0 birthdays -->
                <div class="bg-white/5 border border-white/10 rounded-2xl p-8 text-center max-w-xl mx-auto">
                    <span class="text-3xl mb-3 block">🎂</span>
                    <h3 class="text-lg font-bold text-white mb-2">No Birthdays Logged for Today</h3>
                    <p class="text-xs text-slate-300 mb-5">Check out the upcoming celebrity birthdays this week below or browse our full talent directory.</p>
                    <button @click="activeTab = 'upcoming'" class="px-5 py-2 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold text-xs transition-all shadow-md">
                        View Upcoming Birthdays
                    </button>
                </div>
            @endif
        </div>

        <!-- TAB 2: UPCOMING BIRTHDAYS (Next 30 Days) -->
        <div x-show="activeTab === 'upcoming'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($upcomingBirthdays as $person)
                    @php
                        $roleName = match($person->known_for_department) {
                            'Acting' => ($person->gender === 'Female' ? 'Actress' : 'Actor'),
                            'Directing' => 'Director',
                            default => $person->known_for_department ?: 'Artist',
                        };
                    @endphp

                    <a 
                        href="{{ route('person.show', $person->slug) }}" 
                        class="group bg-white/5 hover:bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 hover:border-amber-400/50 transition-all duration-300 flex flex-col items-center text-center"
                    >
                        <!-- Days countdown badge -->
                        <div class="w-full flex justify-center mb-3">
                            <span class="text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-400/15 border border-amber-400/30 text-amber-300">
                                @if($person->days_until_birthday === 1)
                                    Tomorrow!
                                @else
                                    In {{ $person->days_until_birthday }} Days
                                @endif
                            </span>
                        </div>

                        <!-- Portrait -->
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden mb-3 ring-2 ring-white/10 group-hover:ring-amber-400/60 transition-all bg-slate-900 shadow-md">
                            @if($person->photo_url)
                                <img 
                                    src="{{ $person->photo_url }}" 
                                    alt="{{ $person->name }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                    decoding="async"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-800 text-amber-400 font-bold">
                                    {{ substr($person->name, 0, 2) }}
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <h4 class="text-xs sm:text-sm font-bold text-white group-hover:text-amber-300 transition-colors line-clamp-1 mb-1">
                            {{ $person->name }}
                        </h4>

                        <p class="text-[10px] text-amber-300/90 font-medium mb-1">
                            {{ $person->birth_date->format('M j') }} • Turning {{ $person->turning_age }}
                        </p>

                        <p class="text-[10px] text-slate-400 line-clamp-1">
                            {{ $roleName }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>
