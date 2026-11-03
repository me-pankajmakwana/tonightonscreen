<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    <!-- 1. Hero Header -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#040c3d] to-[#010629] text-white py-16 sm:py-20 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-[#FFA500] text-xs font-bold uppercase tracking-wider mb-6 shadow-sm">
                <span>✦</span>
                <span>The TonightOnScreen Smart Recommender</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-3xl mx-auto leading-tight mb-4">
                What Should You Watch <span class="text-[#FFA500] italic font-serif">Tonight?</span>
            </h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Stop scrolling endlessly. Tell us your current mood, how much time you have, and your streaming subscription — we'll pick the perfect match.
            </p>
        </div>
    </div>

    <!-- 2. Interactive Discovery Hub (Alpine.js) -->
    <div 
        x-data="{
            mood: '{{ $selectedMood }}',
            duration: '{{ $selectedDuration }}',
            platform: '{{ $selectedPlatform }}',
            type: '{{ $selectedType }}',
            isLoading: false,
            recommendations: @js($recommendations->map(fn($t) => [
                'id' => $t->id,
                'title' => $t->title,
                'slug' => $t->slug,
                'url' => route('title.show', $t->slug),
                'poster' => $t->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                'year' => $t->release_date?->format('Y') ?: $t->release_year,
                'rating' => $t->rating ? number_format((float) $t->rating, 1) : null,
                'runtime_formatted' => $t->runtime ? $t->runtime . ' min' : null,
                'type_label' => ($t->type instanceof \App\Enums\TitleType ? $t->type === \App\Enums\TitleType::TV_SERIES : str_contains((string) $t->type, 'series')) ? 'TV Series' : 'Movie',
                'overview' => \App\Support\SeoHelper::cleanMetaDescription($t->overview ?: $t->tagline, 140),
                'genres' => $t->genres->pluck('name')->take(2)->values(),
                'platform' => $t->streamingPlatforms->first() ? [
                    'name' => $t->streamingPlatforms->first()->name,
                    'watch_url' => $t->streamingPlatforms->first()->pivot->watch_url ?: route('title.show', $t->slug),
                    'access' => $t->streamingPlatforms->first()->pivot->access_type ?: 'Streaming',
                ] : null,
            ])),
            async updateRecommendations() {
                this.isLoading = true;
                try {
                    const params = new URLSearchParams({
                        mood: this.mood,
                        duration: this.duration,
                        platform: this.platform,
                        type: this.type,
                    });
                    const res = await fetch(`/api/what-to-watch/recommend?${params.toString()}`);
                    if (res.ok) {
                        const data = await res.json();
                        this.recommendations = data.recommendations;
                    }
                } catch (e) {
                    console.error('Error fetching recommendations:', e);
                } finally {
                    this.isLoading = false;
                }
            }
        }"
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10"
    >
        <!-- Filter Controls Container -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-200/80 -mt-16 sm:-mt-20 relative z-20 space-y-6">
            
            <!-- Step 1: Mood Selector -->
            <div>
                <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-3">
                    1. Select Your Current Vibe / Mood
                </label>
                <div class="flex flex-wrap gap-2.5">
                    @php
                        $moods = [
                            'action' => ['label' => '💥 High-Octane Action', 'desc' => 'Adrenaline, stunts & spectacles'],
                            'thriller' => ['label' => '🕵️ Mind-Bending Thriller', 'desc' => 'Twists, suspense & crime'],
                            'comedy' => ['label' => '😂 Laugh-Out-Loud Comedy', 'desc' => 'Fun, witty & lighthearted'],
                            'drama' => ['label' => '🎭 Emotionally Deep Drama', 'desc' => 'Powerful performances & tearjerkers'],
                            'scifi' => ['label' => '🚀 Sci-Fi & Epic Fantasy', 'desc' => 'Future worlds & cosmos'],
                            'horror' => ['label' => '😱 Spine-Chilling Horror', 'desc' => 'Hauntings, slashers & jump scares'],
                            'romance' => ['label' => '❤️ Heartwarming Romance', 'desc' => 'Love stories & rom-coms'],
                            'feelgood' => ['label' => '✨ Feel-Good & Family', 'desc' => 'Warm stories for all ages'],
                        ];
                    @endphp
                    @foreach($moods as $key => $meta)
                        <button 
                            type="button" 
                            @click="mood = '{{ $key }}'; updateRecommendations()"
                            :class="mood === '{{ $key }}' ? 'bg-[#010629] text-[#FFA500] border-[#010629] shadow-md ring-2 ring-[#FFA500]/30' : 'bg-slate-50 text-slate-700 hover:bg-slate-100 border-slate-200'"
                            class="px-4 py-2.5 rounded-2xl border text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer"
                        >
                            {{ $meta['label'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Step 2: Time Budget & Format -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                <!-- Time Budget -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-2.5">
                        2. How Much Time Do You Have?
                    </label>
                    <div class="grid grid-cols-4 gap-2">
                        <button 
                            type="button" 
                            @click="duration = 'any'; updateRecommendations()"
                            :class="duration === 'any' ? 'bg-amber-500 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                            class="py-2 px-3 rounded-xl text-xs transition-colors text-center cursor-pointer"
                        >
                            Any Time
                        </button>
                        <button 
                            type="button" 
                            @click="duration = 'quick'; updateRecommendations()"
                            :class="duration === 'quick' ? 'bg-amber-500 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                            class="py-2 px-3 rounded-xl text-xs transition-colors text-center cursor-pointer"
                        >
                            &lt; 100 min
                        </button>
                        <button 
                            type="button" 
                            @click="duration = 'medium'; updateRecommendations()"
                            :class="duration === 'medium' ? 'bg-amber-500 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                            class="py-2 px-3 rounded-xl text-xs transition-colors text-center cursor-pointer"
                        >
                            ~2 Hours
                        </button>
                        <button 
                            type="button" 
                            @click="duration = 'epic'; updateRecommendations()"
                            :class="duration === 'epic' ? 'bg-amber-500 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                            class="py-2 px-3 rounded-xl text-xs transition-colors text-center cursor-pointer"
                        >
                            Epic (&gt;2.5h)
                        </button>
                    </div>
                </div>

                <!-- Platform Filter -->
                <div>
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-2.5">
                        3. Where Do You Want to Watch?
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <button 
                            type="button" 
                            @click="platform = 'all'; updateRecommendations()"
                            :class="platform === 'all' ? 'bg-[#010629] text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                            class="py-2 px-3 rounded-xl text-xs transition-colors cursor-pointer"
                        >
                            Any Platform
                        </button>
                        @foreach($platforms->take(6) as $p)
                            <button 
                                type="button" 
                                @click="platform = '{{ $p->slug }}'; updateRecommendations()"
                                :class="platform === '{{ $p->slug }}' ? 'bg-[#010629] text-[#FFA500] font-bold ring-1 ring-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-medium'"
                                class="py-2 px-3 rounded-xl text-xs transition-colors cursor-pointer flex items-center gap-1.5"
                            >
                                {{ $p->name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommendation Grid Results -->
        <div class="mt-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#010629] flex items-center gap-2">
                        <span>Top Recommendations for You</span>
                        <span x-show="isLoading" class="text-xs text-amber-500 font-normal animate-pulse">(Updating...)</span>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Curated match score based on critical acclaim, audience rating & streaming availability</p>
                </div>
                <div class="text-xs font-bold text-slate-500">
                    <span x-text="recommendations.length"></span> Matches Found
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="item in recommendations" :key="item.id">
                    <article class="bg-white rounded-3xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col group">
                        <div class="relative aspect-16/9 bg-slate-900 overflow-hidden">
                            <img :src="item.poster" :alt="item.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex items-center gap-1.5">
                                <span class="px-2 py-0.5 rounded-md bg-black/70 backdrop-blur-xs text-[10px] font-bold text-white uppercase tracking-wider" x-text="item.type_label"></span>
                                <template x-if="item.runtime_formatted">
                                    <span class="px-2 py-0.5 rounded-md bg-black/70 backdrop-blur-xs text-[10px] font-bold text-slate-300" x-text="item.runtime_formatted"></span>
                                </template>
                            </div>

                            <template x-if="item.rating">
                                <div class="absolute top-3 right-3 px-2 py-0.5 rounded-lg bg-black/85 text-[#FFA500] backdrop-blur-xs font-black text-xs border border-white/10 flex items-center gap-1 shadow-md">
                                    <span>★</span>
                                    <span class="text-white" x-text="item.rating"></span>
                                </div>
                            </template>

                            <div class="absolute bottom-3 left-3 right-3">
                                <h3 class="text-base font-extrabold text-white truncate drop-shadow-sm">
                                    <a :href="item.url" class="hover:text-[#FFA500] transition-colors" x-text="item.title"></a>
                                </h3>
                                <div class="flex items-center gap-2 text-[11px] text-slate-300 mt-0.5">
                                    <span x-text="item.year"></span>
                                    <span>•</span>
                                    <span x-text="item.genres.join(', ')"></span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col flex-grow justify-between">
                            <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed mb-4" x-text="item.overview"></p>

                            <!-- Direct Watch Action -->
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                <template x-if="item.platform">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                        <span class="text-[11px] font-bold text-slate-700">
                                            Stream on <strong class="text-[#010629]" x-text="item.platform.name"></strong>
                                        </span>
                                    </div>
                                </template>
                                <template x-if="!item.platform">
                                    <span class="text-[11px] text-slate-400 font-medium">TonightOnScreen Guide</span>
                                </template>

                                <a 
                                    :href="item.platform ? item.platform.watch_url : item.url" 
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="px-3.5 py-1.5 rounded-xl bg-[#010629] hover:bg-[#FFA500] hover:text-[#010629] text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-xs"
                                >
                                    <span>Watch Now</span>
                                    <span>↗</span>
                                </a>
                            </div>
                        </div>
                    </article>
                </template>
            </div>

            <!-- Empty State -->
            <template x-if="recommendations.length === 0 && !isLoading">
                <div class="text-center py-16 bg-white rounded-3xl border border-slate-200">
                    <div class="text-4xl mb-3">🎬</div>
                    <h3 class="text-base font-bold text-slate-800">No exact matches for this combo</h3>
                    <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Try switching to "Any Platform" or "Any Time" to unlock all matching cinematic gems.</p>
                </div>
            </template>
        </div>
    </div>
</x-layouts.app>

