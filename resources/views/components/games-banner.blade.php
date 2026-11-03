<section class="py-12 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-[#010629] via-[#040e38] to-[#010629] rounded-3xl p-8 sm:p-12 text-white border border-amber-500/30 relative overflow-hidden shadow-2xl">
            <!-- Glows -->
            <div class="absolute -top-24 -right-24 w-80 h-80 bg-amber-500/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/20 text-[#FFA500] border border-amber-500/40 text-[11px] font-black uppercase tracking-wider mb-4">
                        <span>🎮</span>
                        <span>Cinema Arcade</span>
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight leading-tight mb-3">
                        Test Your Movie Intuition in Our <span class="text-[#FFA500] italic font-serif">Daily Games</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Guess today's mystery movie in 5 progressive clues with <strong>Daily Cinele</strong>, or test your box office instinct in the <strong>Box Office Clash</strong> Higher or Lower game.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3.5 shrink-0">
                    <a 
                        href="{{ route('games.cinele') }}" 
                        class="w-full sm:w-auto px-6 py-3.5 rounded-2xl bg-[#FFA500] hover:bg-amber-400 text-[#010629] font-black text-xs uppercase tracking-wider transition-all shadow-lg hover:shadow-amber-500/20 active:scale-95 text-center flex items-center justify-center gap-2"
                    >
                        <span>🎬</span>
                        <span>Play Daily Cinele</span>
                    </a>
                    <a 
                        href="{{ route('games.higher-lower') }}" 
                        class="w-full sm:w-auto px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-emerald-500 hover:text-slate-950 text-white font-black text-xs uppercase tracking-wider transition-all border border-white/15 active:scale-95 text-center flex items-center justify-center gap-2"
                    >
                        <span>⚡</span>
                        <span>Box Office Clash</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

