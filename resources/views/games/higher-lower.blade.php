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

    <!-- Game Arena Container -->
    <div 
        x-data="{
            score: 0,
            bestScore: parseInt(localStorage.getItem('tos_hol_best') || '0'),
            state: 'playing', // playing, revealing, gameover
            currentMovie: @js($initialPair['first']),
            challengerMovie: @js($initialPair['second']),
            lastGuessWasCorrect: null,
            isFetchingNext: false,

            async guess(direction) {
                if (this.state !== 'playing' || this.isFetchingNext) return;

                this.state = 'revealing';
                const isHigher = this.challengerMovie.box_office_raw >= this.currentMovie.box_office_raw;
                const isCorrect = (direction === 'higher' && isHigher) || (direction === 'lower' && !isHigher);
                this.lastGuessWasCorrect = isCorrect;

                if (isCorrect) {
                    this.score++;
                    if (this.score > this.bestScore) {
                        this.bestScore = this.score;
                        localStorage.setItem('tos_hol_best', this.bestScore.toString());
                    }

                    // Wait 1.4s to reveal number, then transition to next round
                    setTimeout(async () => {
                        this.currentMovie = this.challengerMovie;
                        await this.fetchNextChallenger();
                        this.state = 'playing';
                    }, 1400);
                } else {
                    setTimeout(() => {
                        this.state = 'gameover';
                    }, 1400);
                }
            },

            async fetchNextChallenger() {
                this.isFetchingNext = true;
                try {
                    const res = await fetch(`/api/games/higher-lower/next?exclude_id=${this.currentMovie.id}`);
                    if (res.ok) {
                        this.challengerMovie = await res.json();
                    }
                } catch(e) {
                    console.error('Failed to fetch next movie:', e);
                } finally {
                    this.isFetchingNext = false;
                }
            },

            restartGame() {
                this.score = 0;
                this.state = 'playing';
                this.lastGuessWasCorrect = null;
                this.fetchNextChallenger();
            },

            shareScore() {
                const text = `🎬 Box Office Clash on TonightOnScreen!\n🔥 I reached a streak of ${this.score} (Best: ${this.bestScore})!\n\nCan you beat my score? Play free at:\n${window.location.href}`;
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(text);
                    alert('Score copied to clipboard! Share it on WhatsApp or Twitter.');
                }
            }
        }"
        class="bg-[#010629] text-white min-h-[85vh] flex flex-col justify-between relative overflow-hidden"
    >
        <!-- Background Ambient Glow -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        </div>

        <!-- Top Score Bar -->
        <header class="relative z-20 border-b border-white/10 px-4 sm:px-8 py-4 backdrop-blur-md bg-black/30">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ route('games.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors flex items-center gap-1">
                        <span>←</span>
                        <span>Arcade Hub</span>
                    </a>
                    <span class="text-slate-600">|</span>
                    <h1 class="text-xs sm:text-sm font-black uppercase tracking-wider text-amber-400">
                        Box Office Clash
                    </h1>
                </div>

                <!-- Live Score Counters -->
                <div class="flex items-center gap-4 text-xs font-black">
                    <div class="px-3 py-1.5 rounded-xl bg-white/10 border border-white/10 flex items-center gap-2">
                        <span class="text-slate-400 uppercase text-[10px]">Streak</span>
                        <span class="text-emerald-400 text-sm" x-text="score"></span>
                    </div>
                    <div class="px-3 py-1.5 rounded-xl bg-white/10 border border-white/10 flex items-center gap-2">
                        <span class="text-slate-400 uppercase text-[10px]">Best</span>
                        <span class="text-amber-400 text-sm" x-text="bestScore"></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Arena Grid (Two Cards) -->
        <main class="relative z-10 flex-grow grid grid-cols-1 md:grid-cols-2 max-w-7xl mx-auto w-full p-4 sm:p-8 gap-6 sm:gap-8 items-center">
            
            <!-- Card 1: Left / Known Movie -->
            <div class="relative bg-slate-900/90 rounded-3xl border border-white/15 overflow-hidden shadow-2xl flex flex-col justify-between h-[420px] sm:h-[480px] p-6 sm:p-8 group">
                <div class="absolute inset-0 z-0">
                    <img :src="currentMovie.poster" :alt="currentMovie.title" class="w-full h-full object-cover opacity-25 filter blur-xs group-hover:scale-102 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent"></div>
                </div>

                <div class="relative z-10 flex items-center justify-between">
                    <span class="px-3 py-1 rounded-full bg-white/10 text-slate-300 text-[10px] font-black uppercase tracking-wider">
                        Current Anchor
                    </span>
                    <span class="text-xs text-slate-400 font-semibold" x-text="currentMovie.year"></span>
                </div>

                <div class="relative z-10 text-center my-auto">
                    <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight mb-2" x-text="currentMovie.title"></h2>
                    <p class="text-xs text-slate-400 mb-6" x-text="'Dir: ' + currentMovie.director"></p>

                    <div class="inline-block p-4 sm:p-5 rounded-2xl bg-black/60 border border-white/10 backdrop-blur-md shadow-xl">
                        <div class="text-[10px] uppercase font-extrabold tracking-widest text-slate-400 mb-1">Worldwide Collection</div>
                        <div class="text-3xl sm:text-4xl font-black text-[#FFA500]" x-text="currentMovie.box_office_formatted"></div>
                    </div>
                </div>

                <div class="relative z-10 text-center text-[11px] text-slate-500 font-medium">
                    Verified Theatrical Ticket Sales
                </div>
            </div>

            <!-- Card 2: Right / Challenger Movie -->
            <div 
                class="relative bg-slate-900/90 rounded-3xl border border-white/15 overflow-hidden shadow-2xl flex flex-col justify-between h-[420px] sm:h-[480px] p-6 sm:p-8 group"
                :class="{
                    'ring-4 ring-emerald-500': state === 'revealing' && lastGuessWasCorrect === true,
                    'ring-4 ring-rose-500': state === 'revealing' && lastGuessWasCorrect === false
                }"
            >
                <div class="absolute inset-0 z-0">
                    <img :src="challengerMovie.poster" :alt="challengerMovie.title" class="w-full h-full object-cover opacity-25 filter blur-xs group-hover:scale-102 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent"></div>
                </div>

                <div class="relative z-10 flex items-center justify-between">
                    <span class="px-3 py-1 rounded-full bg-amber-500/20 text-[#FFA500] border border-amber-500/30 text-[10px] font-black uppercase tracking-wider">
                        Challenger
                    </span>
                    <span class="text-xs text-slate-400 font-semibold" x-text="challengerMovie.year"></span>
                </div>

                <div class="relative z-10 text-center my-auto">
                    <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight mb-2" x-text="challengerMovie.title"></h2>
                    <p class="text-xs text-slate-400 mb-6" x-text="'Dir: ' + challengerMovie.director"></p>

                    <!-- Hidden Box Office until guess -->
                    <template x-if="state === 'playing'">
                        <div class="space-y-3 max-w-xs mx-auto">
                            <p class="text-xs font-bold text-slate-300">Has Worldwide Box Office</p>
                            <div class="grid grid-cols-2 gap-3">
                                <button 
                                    type="button" 
                                    @click="guess('higher')"
                                    class="py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs uppercase tracking-wider transition-all shadow-lg hover:shadow-emerald-500/20 active:scale-95 cursor-pointer flex items-center justify-center gap-1.5"
                                >
                                    <span>▲</span>
                                    <span>Higher</span>
                                </button>
                                <button 
                                    type="button" 
                                    @click="guess('lower')"
                                    class="py-3 px-4 rounded-xl bg-rose-500 hover:bg-rose-400 text-white font-black text-xs uppercase tracking-wider transition-all shadow-lg hover:shadow-rose-500/20 active:scale-95 cursor-pointer flex items-center justify-center gap-1.5"
                                >
                                    <span>▼</span>
                                    <span>Lower</span>
                                </button>
                            </div>
                        </div>
                    </template>

                    <!-- Revealed Box Office -->
                    <template x-if="state !== 'playing'">
                        <div 
                            class="inline-block p-4 sm:p-5 rounded-2xl bg-black/70 border backdrop-blur-md shadow-xl animate-bounce"
                            :class="lastGuessWasCorrect ? 'border-emerald-500/60' : 'border-rose-500/60'"
                        >
                            <div class="text-[10px] uppercase font-extrabold tracking-widest text-slate-400 mb-1" x-text="lastGuessWasCorrect ? '🎉 Correct!' : '❌ Incorrect!'"></div>
                            <div class="text-3xl sm:text-4xl font-black" :class="lastGuessWasCorrect ? 'text-emerald-400' : 'text-rose-400'" x-text="challengerMovie.box_office_formatted"></div>
                        </div>
                    </template>
                </div>

                <div class="relative z-10 text-center text-[11px] text-slate-500 font-medium">
                    Than <span class="text-slate-300 font-bold" x-text="currentMovie.title"></span>?
                </div>
            </div>

        </main>

        <!-- Game Over Modal Overlay -->
        <div 
            x-show="state === 'gameover'" 
            x-cloak 
            class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-4"
        >
            <div class="bg-slate-900 border border-white/20 rounded-3xl p-8 max-w-md w-full text-center shadow-2xl">
                <div class="text-5xl mb-4">💥</div>
                <h3 class="text-2xl font-black text-white mb-2">Game Over!</h3>
                <p class="text-sm text-slate-400 mb-6">
                    <strong class="text-white" x-text="challengerMovie.title"></strong> had a worldwide collection of <strong class="text-amber-400" x-text="challengerMovie.box_office_formatted"></strong>.
                </p>

                <!-- Stats Ticker -->
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <div class="bg-white/5 rounded-2xl p-4 border border-white/5">
                        <div class="text-[10px] text-slate-400 uppercase font-bold">Your Streak</div>
                        <div class="text-3xl font-black text-emerald-400 mt-1" x-text="score"></div>
                    </div>
                    <div class="bg-white/5 rounded-2xl p-4 border border-white/5">
                        <div class="text-[10px] text-slate-400 uppercase font-bold">All-Time Best</div>
                        <div class="text-3xl font-black text-amber-400 mt-1" x-text="bestScore"></div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="space-y-3">
                    <button 
                        type="button" 
                        @click="restartGame()"
                        class="w-full py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs uppercase tracking-wider transition-all shadow-lg active:scale-95 cursor-pointer"
                    >
                        🔄 Play Again
                    </button>
                    <button 
                        type="button" 
                        @click="shareScore()"
                        class="w-full py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-black text-xs uppercase tracking-wider transition-all border border-white/10 active:scale-95 cursor-pointer flex items-center justify-center gap-2"
                    >
                        <span>📲</span>
                        <span>Share Score Card</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer Trivia & Breadcrumb -->
        <footer class="relative z-20 py-4 px-4 text-center text-xs text-slate-500 border-t border-white/10">
            Compare Indian & international cinema grosses • Sourced from official theatrical distributor reports
        </footer>
    </div>

    <!-- Semantic SEO & Rules Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-8 sm:p-12 shadow-xs space-y-8 text-slate-700">
            <div>
                <h2 class="text-2xl font-black text-[#010629] mb-3">
                    About Box Office Clash: The Cinema Higher or Lower Game
                </h2>
                <p class="text-xs sm:text-sm leading-relaxed mb-4">
                    Box Office Clash is an interactive movie trivia game testing your intuition of theatrical ticket sales across Indian and global cinema. From massive Pan-Indian spectacles like <em>Baahubali 2</em>, <em>RRR</em>, and <em>KGF: Chapter 2</em> to Hollywood blockbusters like <em>Avatar</em> and <em>Interstellar</em>, every match pairs two commercial heavyweights.
                </p>
                <p class="text-xs sm:text-sm leading-relaxed">
                    Your objective is simple: guess whether the challenger movie grossed <strong>HIGHER</strong> or <strong>LOWER</strong> worldwide compared to the current benchmark. Build an unbroken winning streak, challenge your friends on WhatsApp, and climb the personal high-score leaderboard!
                </p>
            </div>

            <!-- FAQ Accordion -->
            <div class="pt-6 border-t border-slate-100">
                <h3 class="text-lg font-black text-[#010629] mb-4">Frequently Asked Questions</h3>
                <div class="space-y-3" x-data="{ openFaq: null }">
                    @foreach($faqs as $i => $faq)
                        <div class="border border-slate-200 rounded-2xl overflow-hidden">
                            <button 
                                type="button" 
                                @click="openFaq = openFaq === {{ $i }} ? null : {{ $i }}"
                                class="w-full p-4 text-left font-bold text-xs sm:text-sm text-slate-900 flex items-center justify-between hover:bg-slate-50 transition-colors cursor-pointer"
                            >
                                <span>{{ $faq['question'] }}</span>
                                <span class="text-amber-500 font-bold" x-text="openFaq === {{ $i }} ? '−' : '+'"></span>
                            </button>
                            <div x-show="openFaq === {{ $i }}" x-cloak class="p-4 pt-0 text-xs text-slate-600 leading-relaxed">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>

