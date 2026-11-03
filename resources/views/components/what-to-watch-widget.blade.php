<section class="py-14 bg-gradient-to-br from-[#010629] via-[#050e38] to-[#010629] text-white relative overflow-hidden border-y border-[#0d163f]">
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-[#FFA500] text-[11px] font-bold uppercase tracking-wider mb-2">
                    <span>✦</span>
                    <span>Interactive Streaming Selector</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                    What Should You Watch <span class="text-[#FFA500] font-serif italic">Tonight?</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                    Choose your vibe. We instantly filter hundreds of streaming titles into tonight's top recommendations.
                </p>
            </div>
            <div>
                <a href="{{ route('what-to-watch') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-[#FFA500] hover:text-[#010629] text-white text-xs font-bold transition-all border border-white/15">
                    <span>Open Full Recommender</span>
                    <span>→</span>
                </a>
            </div>
        </div>

        <!-- Interactive Mood Buttons -->
        <div 
            x-data="{
                activeMood: 'thriller',
                isLoading: false,
                titles: [],
                async loadMood(mood) {
                    this.activeMood = mood;
                    this.isLoading = true;
                    try {
                        const res = await fetch(`/api/what-to-watch/recommend?mood=${mood}&duration=any&platform=all`);
                        if (res.ok) {
                            const data = await res.json();
                            this.titles = data.recommendations.slice(0, 4);
                        }
                    } catch(e) {
                        console.error(e);
                    } finally {
                        this.isLoading = false;
                    }
                }
            }"
            x-init="loadMood('thriller')"
        >
            <div class="flex flex-wrap gap-2 mb-8">
                <button 
                    type="button" 
                    @click="loadMood('action')"
                    :class="activeMood === 'action' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    💥 Adrenaline Action
                </button>
                <button 
                    type="button" 
                    @click="loadMood('thriller')"
                    :class="activeMood === 'thriller' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    🕵️ Mind-Bending Mystery
                </button>
                <button 
                    type="button" 
                    @click="loadMood('comedy')"
                    :class="activeMood === 'comedy' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    😂 Laugh-Out-Loud Comedy
                </button>
                <button 
                    type="button" 
                    @click="loadMood('drama')"
                    :class="activeMood === 'drama' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    🎭 Deep Drama
                </button>
                <button 
                    type="button" 
                    @click="loadMood('scifi')"
                    :class="activeMood === 'scifi' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    🚀 Sci-Fi & Universe
                </button>
                <button 
                    type="button" 
                    @click="loadMood('horror')"
                    :class="activeMood === 'horror' ? 'bg-[#FFA500] text-[#010629] font-black' : 'bg-white/10 text-white hover:bg-white/15 font-semibold'"
                    class="px-4 py-2 rounded-xl text-xs transition-colors cursor-pointer"
                >
                    😱 Late-Night Horror
                </button>
            </div>

            <!-- Result Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                <template x-for="item in titles" :key="item.id">
                    <article class="bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden hover:border-[#FFA500]/60 transition-all flex flex-col group">
                        <div class="relative aspect-2/3 bg-slate-900 overflow-hidden">
                            <img :src="item.poster" :alt="item.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            
                            <template x-if="item.rating">
                                <div class="absolute top-2 right-2 px-2 py-0.5 rounded-lg bg-black/85 text-[#FFA500] text-[11px] font-black border border-white/10 flex items-center gap-1 shadow-md">
                                    <span>★</span>
                                    <span class="text-white" x-text="item.rating"></span>
                                </div>
                            </template>

                            <div class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-black/70 text-[9px] font-bold text-slate-300" x-text="item.type_label"></div>
                        </div>

                        <div class="p-3.5 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="font-bold text-white text-xs sm:text-sm truncate group-hover:text-[#FFA500] transition-colors">
                                    <a :href="item.url" x-text="item.title"></a>
                                </h3>
                                <div class="text-[10px] text-slate-400 mt-0.5" x-text="item.year + ' • ' + (item.runtime_formatted || 'Featured')"></div>
                            </div>

                            <a 
                                :href="item.platform ? item.platform.watch_url : item.url" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-3 block text-center py-1.5 rounded-xl bg-white/10 hover:bg-[#FFA500] hover:text-[#010629] text-white font-bold text-[11px] transition-all"
                            >
                                <span x-text="item.platform ? 'Watch on ' + item.platform.name : 'Stream Guide →'"></span>
                            </a>
                        </div>
                    </article>
                </template>
            </div>
        </div>
    </div>
</section>

