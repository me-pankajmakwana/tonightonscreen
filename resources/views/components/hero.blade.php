<section class="relative pt-10 pb-16 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Copy & Search Controls -->
            <div class="lg:col-span-6 z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-slate-200/80 text-[11px] font-bold tracking-wider text-slate-700 uppercase mb-6 shadow-xs">
                    <img src="{{ asset('Tonight OnScreen Logo Icon.png') }}" alt="TonightOnScreen" class="w-4 h-4 rounded-xs object-contain">
                    <span>Your Ultimate Entertainment Guide</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-[56px] font-black text-[#010629] tracking-tight leading-[1.12] mb-6">
                    Discover Movies,<br>
                    TV Shows & Talent<br>
                    <span class="font-serif italic font-normal text-[#FFA500]">All in One Place</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl mb-9">
                    Explore the world of entertainment — from blockbuster movies to binge-worthy series, talented actors, visionary directors and more.
                </p>

                <!-- Big Search Pill -->
                <form action="#trending" method="GET" class="relative max-w-xl flex items-center bg-white rounded-full p-2 border border-slate-200/90 shadow-[0_8px_30px_rgb(1,6,41,0.06)] focus-within:border-[#FFA500] focus-within:ring-2 focus-within:ring-[#FFA500]/20 transition-all mb-6">
                    <div class="pl-4 text-slate-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="q"
                        placeholder="Search for movies, series, actors, directors..." 
                        class="w-full bg-transparent px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:outline-none"
                    >
                    <button 
                        type="submit" 
                        class="px-7 py-3 bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold rounded-full transition-all shadow-sm active:scale-95 cursor-pointer"
                    >
                        Search
                    </button>
                </form>

                <!-- Popular Search Tags -->
                <div class="flex flex-wrap items-center gap-2 text-xs">
                    <span class="text-slate-500 font-medium">Popular searches:</span>
                    <a href="#trending" class="px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FFA500]/10 hover:text-[#010629] hover:border-[#FFA500]/40 text-slate-700 border border-slate-200/80 transition-colors font-medium">
                        Dune 2
                    </a>
                    <a href="#trending" class="px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FFA500]/10 hover:text-[#010629] hover:border-[#FFA500]/40 text-slate-700 border border-slate-200/80 transition-colors font-medium">
                        Breaking Bad
                    </a>
                    <a href="#talents" class="px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FFA500]/10 hover:text-[#010629] hover:border-[#FFA500]/40 text-slate-700 border border-slate-200/80 transition-colors font-medium">
                        Tom Hanks
                    </a>
                    <a href="#trending" class="px-3.5 py-1.5 rounded-full bg-white hover:bg-[#FFA500]/10 hover:text-[#010629] hover:border-[#FFA500]/40 text-slate-700 border border-slate-200/80 transition-colors font-medium">
                        Marvel
                    </a>
                </div>
            </div>

            <!-- Right Column: Artistic Double Exposure Visual -->
            <div class="lg:col-span-6 relative flex justify-center lg:justify-end">
                <div class="relative w-full max-w-[500px]">
                    <!-- Handwritten Quote -->
                    <div class="absolute -top-4 right-2 sm:right-6 z-20 transform rotate-[-6deg] select-none pointer-events-none">
                        <span class="font-script text-2xl sm:text-3xl text-slate-400 font-medium tracking-wide">
                            Great stories<br>live forever
                        </span>
                        <div class="text-[#FFA500] text-xs inline-block ml-1">✦</div>
                    </div>

                    <!-- Double Exposure Main Art -->
                    <div class="relative rounded-[32px] overflow-hidden bg-gradient-to-b from-orange-50/40 to-transparent p-2">
                        <img 
                            src="{{ asset('images/hero_cinema_collage.jpg') }}" 
                            alt="TonightOnScreen Cinema Collage" 
                            class="w-full h-auto object-cover rounded-[28px] shadow-[0_20px_50px_rgba(0,0,0,0.06)]"
                            loading="eager"
                        >
                    </div>

                    <!-- Slider Arrow Buttons (Mockup Style) -->
                    <div class="absolute -bottom-4 right-6 flex items-center gap-2 z-20">
                        <button class="w-10 h-10 rounded-full bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 shadow-sm flex items-center justify-center transition-transform active:scale-95" aria-label="Previous slide">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 shadow-sm flex items-center justify-center transition-transform active:scale-95" aria-label="Next slide">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
