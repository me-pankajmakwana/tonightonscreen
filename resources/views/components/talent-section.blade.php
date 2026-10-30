@props(['talents'])

<section id="talents" class="py-16 bg-white/70 border-t border-slate-200/50" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Category Pills -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#FFA500]/10 border border-[#FFA500]/30 text-[#010629] text-[11px] font-bold uppercase tracking-wider mb-2.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#FFA500] animate-pulse"></span>
                    Global Cinema Icons
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#010629] tracking-tight">
                    Meet the Stars
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-xl">
                    Discover celebrated Hollywood legends and Bollywood superstars — their filmographies, award-winning roles, and career milestones.
                </p>
            </div>

            <!-- Filter Tabs & All Stars Link -->
            <div class="flex items-center gap-3">
                <div class="inline-flex p-1 bg-slate-100 rounded-xl border border-slate-200/80 text-xs font-semibold">
                    <button 
                        @click="activeTab = 'all'" 
                        :class="activeTab === 'all' ? 'bg-[#010629] text-white shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-1.5 rounded-lg transition-all cursor-pointer"
                    >
                        All Stars
                    </button>
                    <button 
                        @click="activeTab = 'hollywood'" 
                        :class="activeTab === 'hollywood' ? 'bg-[#010629] text-white shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-1.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5"
                    >
                        <span>🎬 Hollywood</span>
                    </button>
                    <button 
                        @click="activeTab = 'bollywood'" 
                        :class="activeTab === 'bollywood' ? 'bg-[#010629] text-white shadow-xs' : 'text-slate-600 hover:text-slate-950'"
                        class="px-3.5 py-1.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5"
                    >
                        <span>✨ Bollywood</span>
                    </button>
                </div>

                <a 
                    href="{{ route('person.index') }}" 
                    class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold transition-all shadow-xs shrink-0"
                >
                    <span>Full Directory</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Talent Cards Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-5">
            @foreach($talents as $person)
                @php
                    $roleName = match($person->known_for_department) {
                        'Acting' => ($person->gender === 'Female' ? 'Actress' : 'Actor'),
                        'Directing' => 'Director',
                        'Production' => 'Producer',
                        'Writing' => 'Writer',
                        default => $person->known_for_department ?: 'Artist',
                    };

                    $isBollywood = Str::contains($person->birth_place ?? '', ['India', 'New Delhi', 'Mumbai', 'Indore', 'Prayagraj', 'Jamshedpur']) 
                        || in_array($person->name, ['Shah Rukh Khan', 'Deepika Padukone', 'Amitabh Bachchan', 'Priyanka Chopra Jonas', 'Aamir Khan', 'Alia Bhatt', 'Hrithik Roshan', 'Ranbir Kapoor', 'Salman Khan', 'Kareena Kapoor Khan']);
                    
                    $industry = $isBollywood ? 'bollywood' : 'hollywood';
                @endphp

                <a 
                    href="{{ route('person.show', $person->slug) }}" 
                    x-show="activeTab === 'all' || activeTab === '{{ $industry }}'"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-[#FFA500]/60 card-shadow-hover transition-all text-center flex flex-col items-center justify-between relative overflow-hidden"
                >
                    <!-- Top Industry Badge -->
                    <div class="w-full flex justify-between items-center mb-3">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $isBollywood ? 'bg-amber-500/10 text-amber-700 border border-amber-500/20' : 'bg-indigo-500/10 text-indigo-700 border border-indigo-500/20' }}">
                            {{ $isBollywood ? 'Bollywood' : 'Hollywood' }}
                        </span>
                        <span class="text-[10px] text-slate-400 font-medium">
                            {{ $roleName }}
                        </span>
                    </div>

                    <!-- Photo Headshot Container -->
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden shadow-md ring-3 ring-slate-100 group-hover:ring-[#FFA500]/50 transition-all duration-300 mb-3 bg-slate-900 relative">
                        @if($person->photo_url)
                            <img 
                                src="{{ $person->photo_url }}" 
                                alt="{{ $person->name }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-tr from-[#010629] to-[#071038] text-white">
                                <span class="text-sm font-black text-[#FFA500]">{{ substr($person->name, 0, 2) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Person Details -->
                    <div class="w-full">
                        <h3 class="text-xs sm:text-sm font-bold text-[#010629] group-hover:text-[#FFA500] transition-colors line-clamp-1 mb-1">
                            {{ $person->name }}
                        </h3>

                        @if($person->birth_place)
                            <p class="text-[10px] text-slate-400 truncate mb-2.5">
                                {{ Str::afterLast($person->birth_place, ',') ?: $person->birth_place }}
                            </p>
                        @endif

                        <div class="inline-flex items-center gap-1 text-[10px] font-bold text-slate-500 group-hover:text-[#010629] transition-colors pt-2 border-t border-slate-100 w-full justify-center">
                            <span>View Filmography</span>
                            <svg class="w-3 h-3 transition-transform group-hover:translate-x-0.5 text-[#FFA500]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Mobile View Full Directory Button -->
        <div class="mt-8 text-center sm:hidden">
            <a 
                href="{{ route('person.index') }}" 
                class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold transition-all shadow-xs"
            >
                <span>View Full Talent Directory</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>
