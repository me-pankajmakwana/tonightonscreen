<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    @push('head')
        <x-seo.json-ld :data="$gameSchema" />
        @if(!empty($faqSchema))
            <x-seo.json-ld :data="$faqSchema" />
        @endif
    @endpush

    <!-- Header Section -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#040c3d] to-[#010629] text-white py-12 sm:py-16 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10 text-center">
            
            <div class="flex items-center justify-center gap-3 mb-4">
                <a href="{{ route('games.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
                    <span>←</span>
                    <span>Arcade Hub</span>
                </a>
                <span class="text-slate-600">•</span>
                <span class="px-3 py-1 rounded-full bg-amber-500/20 text-[#FFA500] border border-amber-500/30 text-xs font-black uppercase tracking-wider">
                    Daily Challenge #{{ $dayNumber }}
                </span>
            </div>

            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white mb-2">
                Daily <span class="text-[#FFA500] italic font-serif">Cinele</span>
            </h1>
            <p class="text-xs sm:text-sm text-slate-300 max-w-lg mx-auto">
                Guess today's mystery movie in 5 attempts. Each incorrect guess unlocks a new clue!
            </p>
        </div>
    </div>

    <!-- Interactive Game Board Container (Alpine.js) -->
    <div 
        x-data="{
            todayDate: '{{ $todayDate }}',
            dayNumber: {{ $dayNumber }},
            maxGuesses: 5,
            guesses: [],
            gameStatus: 'in_progress', // in_progress, won, lost
            query: '',
            searchResults: [],
            isSearching: false,
            clues: @js($clues),
            streak: parseInt(localStorage.getItem('tos_cinele_streak') || '0'),

            init() {
                // Restore today's game from localStorage if available
                const savedDate = localStorage.getItem('tos_cinele_saved_date');
                if (savedDate === this.todayDate) {
                    const savedGuesses = localStorage.getItem('tos_cinele_guesses');
                    const savedStatus = localStorage.getItem('tos_cinele_status');
                    if (savedGuesses) this.guesses = JSON.parse(savedGuesses);
                    if (savedStatus) this.gameStatus = savedStatus;
                } else {
                    // New day, reset daily state
                    localStorage.setItem('tos_cinele_saved_date', this.todayDate);
                    localStorage.setItem('tos_cinele_guesses', JSON.stringify([]));
                    localStorage.setItem('tos_cinele_status', 'in_progress');
                }
            },

            async searchMovies() {
                if (this.query.trim().length < 2) {
                    this.searchResults = [];
                    return;
                }
                this.isSearching = true;
                try {
                    const res = await fetch(`/search/autocomplete?q=${encodeURIComponent(this.query)}`);
                    if (res.ok) {
                        const data = await res.json();
                        this.searchResults = data.titles || [];
                    }
                } catch(e) {
                    console.error(e);
                } finally {
                    this.isSearching = false;
                }
            },

            async submitGuess(title) {
                if (this.gameStatus !== 'in_progress') return;
                this.query = '';
                this.searchResults = [];

                try {
                    const res = await fetch(`/api/games/cinele/guess?guess_slug=${encodeURIComponent(title.slug)}`);
                    if (res.ok) {
                        const result = await res.json();
                        this.guesses.push({
                            title: result.guessed_title,
                            year: result.guessed_year,
                            poster: result.guessed_poster,
                            is_correct: result.is_correct
                        });

                        // Persist guesses
                        localStorage.setItem('tos_cinele_guesses', JSON.stringify(this.guesses));

                        if (result.is_correct) {
                            this.gameStatus = 'won';
                            this.streak++;
                            localStorage.setItem('tos_cinele_streak', this.streak.toString());
                            localStorage.setItem('tos_cinele_status', 'won');
                        } else if (this.guesses.length >= this.maxGuesses) {
                            this.gameStatus = 'lost';
                            this.streak = 0;
                            localStorage.setItem('tos_cinele_streak', '0');
                            localStorage.setItem('tos_cinele_status', 'lost');
                        }
                    }
                } catch(e) {
                    console.error('Error submitting guess:', e);
                }
            },

            generateShareText() {
                let emojis = '';
                for (let i = 0; i < this.maxGuesses; i++) {
                    if (i < this.guesses.length) {
                        emojis += this.guesses[i].is_correct ? '🟩 ' : '🟥 ';
                    } else {
                        emojis += '⬛ ';
                    }
                }
                const scoreText = this.gameStatus === 'won' ? `${this.guesses.length}/${this.maxGuesses}` : 'X/5';
                return `🎬 TonightOnScreen Daily Cinele #${this.dayNumber}\n${scoreText} Guesses\n\n${emojis.trim()}\n🔥 Streak: ${this.streak} Days\n\nPlay: ${window.location.href}`;
            },

            copyShareCard() {
                const text = this.generateShareText();
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(text);
                    alert('Scorecard copied to clipboard! Share it in WhatsApp or Twitter.');
                }
            }
        }"
        class="max-w-3xl mx-auto px-4 sm:px-6 py-10"
    >
        <!-- Progressive Clues List -->
        <div class="space-y-4 mb-8">
            <template x-for="i in 5" :key="i">
                @php
                    // Map clue metadata
                @endphp
                <div 
                    class="rounded-2xl border p-4 sm:p-5 transition-all shadow-xs"
                    :class="{
                        'bg-white border-amber-400/80 shadow-md ring-2 ring-amber-400/20': guesses.length >= (i - 1),
                        'bg-slate-50/60 border-slate-200 opacity-60': guesses.length < (i - 1)
                    }"
                >
                    <div class="flex items-center justify-between mb-1.5">
                        <span 
                            class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider"
                            :class="guesses.length >= (i - 1) ? 'bg-amber-100 text-amber-900 border border-amber-300' : 'bg-slate-200 text-slate-500'"
                            x-text="clues[i].badge"
                        ></span>

                        <span class="text-xs font-bold" :class="guesses.length >= (i - 1) ? 'text-amber-600' : 'text-slate-400'" x-text="guesses.length >= (i - 1) ? clues[i].type : 'Locked'"></span>
                    </div>

                    <!-- Unlocked Clue Content -->
                    <template x-if="guesses.length >= (i - 1)">
                        <div class="mt-2">
                            <h3 class="font-extrabold text-sm sm:text-base text-slate-900" x-text="clues[i].title"></h3>
                            <p class="text-xs text-slate-500 mt-0.5" x-text="clues[i].subtitle"></p>
                        </div>
                    </template>

                    <!-- Locked Placeholder -->
                    <template x-if="guesses.length < (i - 1)">
                        <div class="mt-2 flex items-center gap-2 text-xs text-slate-400 font-medium">
                            <span>🔒</span>
                            <span x-text="'Unlocks on attempt ' + i"></span>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <!-- Guess Input Box (Active when in_progress) -->
        <template x-if="gameStatus === 'in_progress'">
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xl relative z-20 mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label class="text-xs font-extrabold uppercase tracking-wider text-slate-500">
                        Enter Your Guess (<span x-text="guesses.length + 1"></span> of 5)
                    </label>
                    <span class="text-xs text-amber-600 font-bold" x-text="(maxGuesses - guesses.length) + ' attempts remaining'"></span>
                </div>

                <div class="relative">
                    <input 
                        type="text" 
                        x-model="query"
                        @input.debounce.250ms="searchMovies()"
                        placeholder="Type movie title (e.g. Baahubali, KGF, Interstellar)..."
                        autocomplete="off"
                        class="w-full bg-slate-50 focus:bg-white text-sm text-slate-900 placeholder-slate-400 px-4 py-3.5 rounded-2xl border border-slate-200 focus:border-amber-400 focus:outline-none transition-all shadow-inner"
                    >

                    <!-- Dropdown Matches -->
                    <div 
                        x-show="searchResults.length > 0 && query.trim().length >= 2" 
                        x-cloak 
                        class="absolute left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-slate-200 divide-y divide-slate-100 overflow-hidden z-30 max-h-64 overflow-y-auto"
                    >
                        <template x-for="item in searchResults" :key="item.slug">
                            <button 
                                type="button" 
                                @click="submitGuess(item)"
                                class="w-full p-3 text-left hover:bg-amber-50 flex items-center gap-3 transition-colors cursor-pointer"
                            >
                                <img :src="item.poster" :alt="item.title" class="w-8 h-11 object-cover rounded shadow-xs shrink-0">
                                <div class="min-w-0 flex-grow">
                                    <h4 class="font-bold text-xs text-slate-900 truncate" x-text="item.title"></h4>
                                    <span class="text-[10px] text-slate-400" x-text="item.year || 'Cinema'"></span>
                                </div>
                                <span class="px-2 py-1 rounded bg-slate-100 text-[10px] font-bold text-slate-700">Submit →</span>
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </template>

        <!-- Previous Guesses Timeline -->
        <template x-if="guesses.length > 0">
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs mb-8">
                <h3 class="text-xs font-black uppercase tracking-wider text-slate-400 mb-4">
                    Your Previous Guesses
                </h3>
                <div class="space-y-2.5">
                    <template x-for="(g, idx) in guesses" :key="idx">
                        <div 
                            class="flex items-center justify-between p-3 rounded-2xl border text-xs"
                            :class="g.is_correct ? 'bg-emerald-50 border-emerald-300 text-emerald-900' : 'bg-rose-50 border-rose-200 text-rose-900'"
                        >
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="text-base" x-text="g.is_correct ? '🎉' : '❌'"></span>
                                <div class="truncate">
                                    <strong class="font-bold text-slate-900" x-text="g.title"></strong>
                                    <span class="text-slate-500" x-text="' (' + (g.year || '') + ')'"></span>
                                </div>
                            </div>
                            <span 
                                class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider shrink-0"
                                :class="g.is_correct ? 'bg-emerald-200 text-emerald-900' : 'bg-rose-200 text-rose-900'"
                                x-text="g.is_correct ? 'Correct Match!' : 'Incorrect'"
                            ></span>
                        </div>
                    </template>
                </div>
            </div>
        </template>

        <!-- End of Game Result Card (Won / Lost) -->
        <template x-if="gameStatus !== 'in_progress'">
            <div 
                class="rounded-3xl p-8 text-center shadow-xl border mb-8"
                :class="gameStatus === 'won' ? 'bg-gradient-to-br from-emerald-900 to-slate-950 text-white border-emerald-500/40' : 'bg-gradient-to-br from-slate-900 to-slate-950 text-white border-rose-500/40'"
            >
                <div class="text-5xl mb-3" x-text="gameStatus === 'won' ? '🏆' : '🎬'"></div>
                <h3 class="text-2xl font-black mb-1" x-text="gameStatus === 'won' ? 'Spectacular Deduction!' : 'Nice Attempt!'"></h3>
                <p class="text-xs text-slate-300 mb-6">
                    Today's mystery movie was: <strong class="text-[#FFA500] text-sm">{{ $dailyTitle->title }} ({{ $dailyTitle->release_date?->format('Y') ?: $dailyTitle->release_year }})</strong>
                </p>

                <!-- Emoji Grid Preview -->
                <div class="inline-block p-4 rounded-2xl bg-black/50 border border-white/10 mb-6 font-mono text-lg tracking-widest">
                    <template x-for="i in maxGuesses" :key="'emoji-' + i">
                        <span x-text="(i - 1) < guesses.length ? (guesses[i - 1].is_correct ? '🟩 ' : '🟥 ') : '⬛ '"></span>
                    </template>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <button 
                        type="button" 
                        @click="copyShareCard()"
                        class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-[#FFA500] hover:bg-amber-400 text-[#010629] font-black text-xs uppercase tracking-wider transition-all shadow-md active:scale-95 cursor-pointer flex items-center justify-center gap-2"
                    >
                        <span>📋</span>
                        <span>Copy Share Score</span>
                    </button>
                    <a 
                        href="{{ route('title.show', $dailyTitle->slug) }}" 
                        class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider transition-all border border-white/10"
                    >
                        Explore {{ $dailyTitle->title }} Profile →
                    </a>
                </div>

                <div class="mt-6 text-[11px] text-slate-400">
                    A brand new Cinele puzzle unlocks tonight at midnight!
                </div>
            </div>
        </template>
    </div>

    <!-- Semantic SEO & Rules Section -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 pb-16">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-8 sm:p-10 shadow-xs space-y-6 text-slate-700">
            <div>
                <h2 class="text-xl font-black text-[#010629] mb-2">
                    How Daily Cinele Works
                </h2>
                <p class="text-xs sm:text-sm leading-relaxed mb-4">
                    Daily Cinele is an everyday cinema guessing game where film buffs test their deduction skills against a mystery movie title. Powered by TonightOnScreen's comprehensive film database, each clue provides vital context:
                </p>
                <ul class="text-xs space-y-2 text-slate-600 list-disc list-inside">
                    <li><strong>Clue 1:</strong> Release year, official genres, and runtime.</li>
                    <li><strong>Clue 2:</strong> Director name and country of origin.</li>
                    <li><strong>Clue 3:</strong> Theatrical box office verdict and production budget.</li>
                    <li><strong>Clue 4:</strong> Primary lead actors and character roles.</li>
                    <li><strong>Clue 5:</strong> Official movie tagline and plot synopsis hook.</li>
                </ul>
            </div>

            <!-- FAQ Accordion -->
            <div class="pt-6 border-t border-slate-100">
                <h3 class="text-base font-black text-[#010629] mb-4">Frequently Asked Questions</h3>
                <div class="space-y-3" x-data="{ activeIdx: null }">
                    @foreach($faqs as $i => $faq)
                        <div class="border border-slate-200 rounded-2xl overflow-hidden">
                            <button 
                                type="button" 
                                @click="activeIdx = activeIdx === {{ $i }} ? null : {{ $i }}"
                                class="w-full p-4 text-left font-bold text-xs sm:text-sm text-slate-900 flex items-center justify-between hover:bg-slate-50 transition-colors cursor-pointer"
                            >
                                <span>{{ $faq['question'] }}</span>
                                <span class="text-amber-500 font-bold" x-text="activeIdx === {{ $i }} ? '−' : '+'"></span>
                            </button>
                            <div x-show="activeIdx === {{ $i }}" x-cloak class="p-4 pt-0 text-xs text-slate-600 leading-relaxed">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

