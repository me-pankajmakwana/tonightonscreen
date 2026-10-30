@props(['articles'])

<section class="py-16 bg-white/70 border-t border-slate-200/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Side: Latest Articles (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <span class="text-[11px] font-bold tracking-widest text-slate-400 uppercase block mb-1.5">
                            Latest Articles
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 tracking-tight">
                            Entertainment News & Insights
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            Stay updated with the latest trends, reviews and industry news.
                        </p>
                    </div>

                    <a href="#" class="group flex items-center gap-1 text-xs font-semibold text-slate-700 hover:text-slate-950 transition-colors">
                        <span>View All Articles</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- 4 Articles Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @foreach($articles as $article)
                        <article class="group cursor-pointer">
                            <div class="aspect-[16/10] rounded-xl overflow-hidden bg-slate-900 mb-3 relative shadow-sm group-hover:shadow-md transition-shadow">
                                <img 
                                    src="{{ asset($article['image']) }}" 
                                    alt="{{ $article['title'] }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-colors"></div>
                                
                                <!-- Play / Article Icon Badge -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-7 h-7 rounded-full bg-slate-950/40 backdrop-blur-sm text-white flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-3.5 h-3.5 fill-current ml-0.5" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-xs font-bold text-slate-900 leading-snug line-clamp-2 group-hover:text-slate-950 transition-colors mb-1.5">
                                {{ $article['title'] }}
                            </h3>

                            <p class="text-[11px] text-slate-400">
                                <span>{{ $article['date'] }}</span>
                                <span class="mx-1">•</span>
                                <span>{{ $article['category'] }}</span>
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>

            <!-- Right Side: Newsletter Banner Card (5 Cols) -->
            <div class="lg:col-span-5 h-full">
                <div class="relative rounded-3xl overflow-hidden bg-[#010629] text-white p-7 sm:p-9 shadow-lg flex flex-col justify-between min-h-[300px] border border-[#0d163f]">
                    <!-- Background Photography with Cinematic Overlay -->
                    <img 
                        src="{{ asset('images/newsletter_bg.jpg') }}" 
                        alt="Film crew silhouette" 
                        class="absolute inset-0 w-full h-full object-cover opacity-35 mix-blend-luminosity"
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#010629] via-[#010629]/70 to-[#010629]/40"></div>

                    <div class="relative z-10">
                        <span class="text-[10px] font-bold tracking-widest text-[#FFA500] uppercase block mb-1.5">
                            Join Our Community
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-black tracking-tight text-white mb-2">
                            Stay Updated
                        </h3>
                        <p class="text-xs text-slate-300 leading-relaxed max-w-sm mb-6">
                            Get the latest updates, new releases and exclusive content delivered to your inbox.
                        </p>
                    </div>

                    <!-- Email Input Pill -->
                    <form onsubmit="event.preventDefault(); alert('Thank you for subscribing to TonightOnScreen!');" class="relative z-10">
                        <div class="relative flex items-center bg-white/10 backdrop-blur-md rounded-full p-1.5 border border-white/20 focus-within:border-[#FFA500]/70 transition-colors">
                            <div class="pl-3.5 text-slate-300">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                required
                                placeholder="Enter your email address" 
                                class="w-full bg-transparent px-3 py-2 text-xs text-white placeholder-slate-400 focus:outline-none"
                            >
                            <button 
                                type="submit" 
                                class="w-9 h-9 rounded-full bg-[#FFA500] hover:bg-[#FFB41F] text-[#010629] flex items-center justify-center shrink-0 transition-transform active:scale-95 cursor-pointer shadow-sm font-bold"
                                aria-label="Subscribe"
                            >
                                <svg class="w-4 h-4 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
