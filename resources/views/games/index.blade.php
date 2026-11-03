<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    @push('head')
        <x-seo.json-ld :data="$hubSchema" />
        @if(!empty($faqSchema))
            <x-seo.json-ld :data="$faqSchema" />
        @endif
    @endpush

    <!-- 1. Hero Header -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#040c3d] to-[#010629] text-white py-16 sm:py-20 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-[#FFA500] text-xs font-bold uppercase tracking-wider mb-5 shadow-sm">
                <span>🎮</span>
                <span>The TonightOnScreen Cinema Arcade</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-4xl mx-auto leading-tight mb-4">
                Play Free <span class="text-[#FFA500] italic font-serif">Cinema Games</span> & Daily Trivia
            </h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Test your movie intuition! Play our daily mystery movie challenge, or battle through the addictive Box Office Higher or Lower clash. Free, fast & no signup needed.
            </p>
        </div>
    </div>

    <!-- 2. Games Showcase Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Game 1: Daily Cinele -->
            <article class="bg-gradient-to-br from-slate-900 via-[#010629] to-slate-900 rounded-3xl border border-amber-500/30 overflow-hidden shadow-2xl p-8 flex flex-col justify-between group hover:border-[#FFA500] transition-all relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="px-3 py-1 rounded-full bg-amber-500/20 text-[#FFA500] border border-amber-500/40 text-xs font-black uppercase tracking-wider">
                            🔥 Daily Challenge
                        </span>
                        <span class="text-xs text-slate-400 font-semibold">Resets Every Midnight</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight group-hover:text-[#FFA500] transition-colors mb-3">
                        Daily Cinele
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed mb-6">
                        Can you guess today's mystery movie in 5 attempts? Each incorrect guess unlocks a progressive clue: Release Year & Genre, Acclaimed Director, Box Office Verdict, Star Cast, and Plot Tagline!
                    </p>

                    <!-- Feature Badges -->
                    <div class="grid grid-cols-2 gap-2 text-xs text-slate-300 mb-8">
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>🎯</span>
                            <span>5 Progressive Clues</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>🔥</span>
                            <span>Daily Streak Tracking</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>📲</span>
                            <span>Shareable Scorecard</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>🇮🇳 🌍</span>
                            <span>Indian & Global Hits</span>
                        </div>
                    </div>
                </div>

                <a 
                    href="{{ route('games.cinele') }}" 
                    class="w-full py-4 rounded-2xl bg-[#FFA500] hover:bg-amber-400 text-[#010629] font-black text-sm text-center transition-all shadow-lg hover:shadow-amber-500/20 active:scale-98 flex items-center justify-center gap-2"
                >
                    <span>Play Today's Cinele Puzzle</span>
                    <span>→</span>
                </a>
            </article>

            <!-- Game 2: Box Office Higher or Lower -->
            <article class="bg-gradient-to-br from-slate-900 via-[#010629] to-slate-900 rounded-3xl border border-emerald-500/30 overflow-hidden shadow-2xl p-8 flex flex-col justify-between group hover:border-emerald-400 transition-all relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-black uppercase tracking-wider">
                            ⚡ Endless Arcade Mode
                        </span>
                        <span class="text-xs text-slate-400 font-semibold">Unlimited Plays</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight group-hover:text-emerald-400 transition-colors mb-3">
                        Box Office Clash
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed mb-6">
                        Did <em>Jawan</em> collect more worldwide than <em>Kalki 2898 AD</em>? Put your box office instinct to the test. Guess whether the next movie made Higher or Lower ticket sales to build an unbroken streak!
                    </p>

                    <!-- Feature Badges -->
                    <div class="grid grid-cols-2 gap-2 text-xs text-slate-300 mb-8">
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>💰</span>
                            <span>Verified Box Office</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>🏆</span>
                            <span>High Score Streaks</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>⚡</span>
                            <span>Zero-Latency Gameplay</span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-3 border border-white/5 flex items-center gap-2">
                            <span>🎬</span>
                            <span>Blockbusters & Hits</span>
                        </div>
                    </div>
                </div>

                <a 
                    href="{{ route('games.higher-lower') }}" 
                    class="w-full py-4 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm text-center transition-all shadow-lg hover:shadow-emerald-500/20 active:scale-98 flex items-center justify-center gap-2"
                >
                    <span>Play Box Office Higher or Lower</span>
                    <span>→</span>
                </a>
            </article>

        </div>
    </div>

    <!-- 3. Semantic Content & SEO Knowledge Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-8 sm:p-12 shadow-xs space-y-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-[#010629] mb-4">
                    Why Cinema Fans Love Playing Movie Trivia on TonightOnScreen
                </h2>
                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                    Cinema is more than just entertainment — it is a shared global passion. From debating whether <em>Baahubali 2</em> remains the undisputed box office monarch to recalling the exact breakout movie of superstar actors like Vijay Sethupathi or Shah Rukh Khan, movie enthusiasts thrive on film trivia.
                </p>
                <p class="text-sm text-slate-600 leading-relaxed">
                    TonightOnScreen combines our verified cinema catalog with gamified mechanics. Unlike generic quiz sites, our games are directly powered by official production budgets, theatrical box office grosses, and complete filmographies. Whether you are challenging your morning commute with our <strong>Daily Cinele</strong> or competing with friends on the <strong>Box Office Clash</strong> leaderboard, you are engaging with the rich world of cinema storytelling.
                </p>
            </div>

            <!-- Rules Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-slate-100">
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl mb-2 block">1️⃣</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Zero Signup Friction</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Jump straight into the games without creating accounts or downloading apps. Streaks are saved safely in your local browser.</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl mb-2 block">2️⃣</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Verified Film Catalog</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">All answers, collections, and credits are synchronized with verified theatrical records and industry databases.</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl mb-2 block">3️⃣</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Viral Score Sharing</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Share spoiler-free emoji grids with your cinema group chats on WhatsApp, X/Twitter, and Instagram in one tap.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Frequently Asked Questions (FAQ) with Schema.org Accordion -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <h2 class="text-xl sm:text-2xl font-black text-[#010629] text-center mb-8">
            Frequently Asked Questions
        </h2>
        <div class="space-y-4" x-data="{ activeFaq: null }">
            @foreach($faqs as $idx => $faq)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
                    <button 
                        type="button" 
                        @click="activeFaq = activeFaq === {{ $idx }} ? null : {{ $idx }}"
                        class="w-full p-5 text-left font-bold text-slate-900 text-sm flex items-center justify-between gap-4 cursor-pointer hover:bg-slate-50 transition-colors"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <span class="text-amber-500 text-lg" x-text="activeFaq === {{ $idx }} ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeFaq === {{ $idx }}" x-cloak class="px-5 pb-5 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts.app>

