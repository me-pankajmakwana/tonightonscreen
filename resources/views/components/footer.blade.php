<footer class="bg-[#00041d] text-slate-400 text-xs border-t border-[#0d163f]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <div class="grid grid-cols-2 md:grid-cols-12 gap-8 lg:gap-10 pb-12 border-b border-[#0d163f]/80">
            
            <!-- Col 1: Brand & Socials (3 Cols) -->
            <div class="col-span-2 md:col-span-3 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group inline-flex" title="TonightOnScreen">
                    <img 
                        src="{{ asset('Tonight OnScreen Logo Icon.png') }}" 
                        alt="TonightOnScreen" 
                        class="w-8 h-8 rounded-xl object-contain shadow-sm group-hover:scale-105 transition-transform"
                    >
                    <span class="text-xl font-bold tracking-tight text-white">
                        Tonight<span class="font-normal text-[#FFA500]">OnScreen</span>
                    </span>
                </a>

                <p class="text-slate-400 text-xs leading-relaxed max-w-xs">
                    Movies. Series. Talent. Streaming Guides. All in One Place.
                </p>

                <!-- Social Icons -->
                <div class="flex items-center gap-2.5 pt-1">
                    <a href="https://facebook.com/TonightOnScreen" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="w-8 h-8 rounded-full bg-[#071038] hover:bg-[#FFA500] text-slate-300 hover:text-[#010629] flex items-center justify-center transition-colors">
                        <span class="text-xs font-bold">f</span>
                    </a>
                    <a href="https://twitter.com/TonightOnScreen" target="_blank" rel="noopener noreferrer" aria-label="Twitter / X" class="w-8 h-8 rounded-full bg-[#071038] hover:bg-[#FFA500] text-slate-300 hover:text-[#010629] flex items-center justify-center transition-colors">
                        <span class="text-xs font-bold">𝕏</span>
                    </a>
                    <a href="https://instagram.com/TonightOnScreen" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="w-8 h-8 rounded-full bg-[#071038] hover:bg-[#FFA500] text-slate-300 hover:text-[#010629] flex items-center justify-center transition-colors">
                        <span class="text-xs font-bold">in</span>
                    </a>
                    <a href="https://youtube.com/@TonightOnScreen" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="w-8 h-8 rounded-full bg-[#071038] hover:bg-[#FFA500] text-slate-300 hover:text-[#010629] flex items-center justify-center transition-colors">
                        <span class="text-xs font-bold">▶</span>
                    </a>
                </div>
            </div>

            <!-- Col 2: Discovery Hubs (3 Cols) -->
            <div class="col-span-1 md:col-span-3 space-y-3">
                <h4 class="text-white text-xs font-bold tracking-wider uppercase">Entertainment Hubs</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-[#FFA500] transition-colors">Home Discovery</a></li>
                    <li><a href="{{ route('what-to-watch') }}" class="hover:text-[#FFA500] transition-colors font-bold text-amber-400">✦ What to Watch Tonight</a></li>
                    <li><a href="{{ route('ott.releases') }}" class="hover:text-[#FFA500] transition-colors font-bold text-rose-400">🔴 OTT Releases Calendar</a></li>
                    <li><a href="{{ route('box-office') }}" class="hover:text-[#FFA500] transition-colors font-bold text-emerald-400">💰 Box Office & Budgets</a></li>
                    <li><a href="{{ route('first-movies') }}" class="hover:text-[#FFA500] transition-colors">🌟 First Movies & Debuts</a></li>
                    <li><a href="{{ route('top-rated') }}" class="hover:text-[#FFA500] transition-colors">Top Rated All Time</a></li>
                    <li><a href="{{ route('trending') }}" class="hover:text-[#FFA500] transition-colors">Trending Tonight</a></li>
                    <li><a href="{{ route('platforms.index') }}" class="hover:text-[#FFA500] transition-colors">Streaming Platforms Guide</a></li>
                    <li><a href="{{ route('person.index') }}" class="hover:text-[#FFA500] transition-colors">Actors & Filmmakers</a></li>
                    <li><a href="{{ route('watchlist.index') }}" class="hover:text-[#FFA500] transition-colors">Your Watchlist</a></li>
                </ul>
            </div>

            <!-- Col 3: Categories & Genres (2 Cols) -->
            <div class="col-span-1 md:col-span-2 space-y-3">
                <h4 class="text-white text-xs font-bold tracking-wider uppercase">Browse Genres</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('genre.show', 'action') }}" class="hover:text-white transition-colors">Action & Adventure</a></li>
                    <li><a href="{{ route('genre.show', 'comedy') }}" class="hover:text-white transition-colors">Comedy</a></li>
                    <li><a href="{{ route('genre.show', 'drama') }}" class="hover:text-white transition-colors">Drama</a></li>
                    <li><a href="{{ route('genre.show', 'sci-fi') }}" class="hover:text-white transition-colors">Sci-Fi & Fantasy</a></li>
                    <li><a href="{{ route('genre.show', 'horror') }}" class="hover:text-white transition-colors">Horror & Thriller</a></li>
                    <li><a href="{{ route('genre.show', 'romance') }}" class="hover:text-white transition-colors">Romance</a></li>
                    <li><a href="{{ route('genre.index') }}" class="text-[#FFA500] hover:underline transition-colors font-semibold">All 10+ Genres →</a></li>
                </ul>
            </div>

            <!-- Col 4: Trust, E-E-A-T & Legal (2 Cols) -->
            <div class="col-span-1 md:col-span-2 space-y-3">
                <h4 class="text-white text-xs font-bold tracking-wider uppercase">Editorial & Trust</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('editorial-guidelines') }}" class="hover:text-white transition-colors">Editorial Guidelines</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact & Corrections</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors">Help & FAQ</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="{{ route('sitemap.directory') }}" class="hover:text-white transition-colors">HTML Site Directory</a></li>
                </ul>
            </div>

            <!-- Col 5: Quote & Clapper (2 Cols) -->
            <div class="col-span-1 md:col-span-2 flex flex-col justify-center items-start space-y-3">
                <div class="w-12 h-12 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-300">
                    <svg class="w-6 h-6 stroke-current stroke-1.5 fill-none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 4 16 4m-16-4v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8M4 4l3 6M11 6l3 6M17 7.5l3 6"/>
                    </svg>
                </div>
                <p class="text-slate-300 text-xs italic font-serif leading-snug">
                    "Great stories bring people together."
                </p>
                <div class="w-8 h-0.5 bg-slate-800"></div>
                <a href="{{ route('sitemap') }}" target="_blank" class="text-[11px] text-slate-500 hover:text-slate-400">
                    XML Sitemap
                </a>
            </div>

        </div>

        <!-- Bottom Copyright Bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-slate-500">
            <p>© {{ date('Y') }} TonightOnScreen. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="{{ route('privacy') }}" class="hover:text-slate-400">Privacy</a>
                <span>•</span>
                <a href="{{ route('terms') }}" class="hover:text-slate-400">Terms</a>
                <span>•</span>
                <a href="{{ route('sitemap.directory') }}" class="hover:text-slate-400">Sitemap</a>
            </div>
            <p class="flex items-center gap-1">
                <span>Built for entertainment lovers</span>
                <span class="text-rose-500">❤️</span>
            </p>
        </div>
    </div>
</footer>
