<section class="py-8 border-y border-slate-200/50 bg-white/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            
            <!-- 1. Movies -->
            <a href="{{ route('explore', ['type' => 'movie']) }}" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-orange-600 transition-colors">Movies</h3>
                    <p class="text-[11px] text-slate-400">Blockbusters & classics</p>
                </div>
            </a>

            <!-- 2. TV Series -->
            <a href="{{ route('explore', ['type' => 'tv_series']) }}" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <rect width="20" height="15" x="2" y="7" rx="2" ry="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m17 2-5 5-5-5"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-purple-600 transition-colors">TV Series</h3>
                    <p class="text-[11px] text-slate-400">Binge-worthy shows</p>
                </div>
            </a>

            <!-- 3. Actors -->
            <a href="{{ route('home') }}#talents" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">Actors</h3>
                    <p class="text-[11px] text-slate-400">Star cast & talent</p>
                </div>
            </a>

            <!-- 4. Directors -->
            <a href="{{ route('home') }}#talents" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-sky-600 transition-colors">Directors</h3>
                    <p class="text-[11px] text-slate-400">Visionaries & creators</p>
                </div>
            </a>

            <!-- 5. Producers -->
            <a href="{{ route('home') }}#talents" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-amber-600 transition-colors">Producers</h3>
                    <p class="text-[11px] text-slate-400">Behind the scenes</p>
                </div>
            </a>

            <!-- 6. Genres -->
            <a href="{{ route('genre.index') }}" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-white border border-slate-200/70 hover:border-slate-300 card-shadow-hover transition-all group">
                <div class="w-11 h-11 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-slate-900 group-hover:text-rose-600 transition-colors">Genres</h3>
                    <p class="text-[11px] text-slate-400">Find your favorite</p>
                </div>
            </a>

        </div>
    </div>
</section>
