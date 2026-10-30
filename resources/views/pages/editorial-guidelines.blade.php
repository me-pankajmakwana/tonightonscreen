<x-layouts.app 
    title="Editorial Guidelines & Rating Methodology — TonightOnScreen"
    description="Learn how TonightOnScreen reviews and scores movies and TV series. Transparent 1-10 rating scale, spoiler policies, and critic vs community standards."
>
    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Editorial Guidelines']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Review Quality & Standards
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Editorial Guidelines & <span class="text-[#FFA500]">Scoring System</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    At TonightOnScreen, we believe that entertainment journalism demands uncompromising integrity. Here is an open look into how our 1–10 scoring works, how we moderate reviews, and our commitment to authenticity.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        <!-- 1. The 1 to 10 Scale Explained -->
        <section>
            <div class="border-b border-slate-200 pb-4 mb-8">
                <span class="text-xs font-bold tracking-wider text-[#FFA500] uppercase">Methodology</span>
                <h2 class="text-2xl font-bold text-slate-900 mt-1">The TonightOnScreen 1–10 Rating Scale</h2>
                <p class="text-xs text-slate-500 mt-1">Every score represents a carefully considered balance of screenplay, direction, cinematography, performances, and emotional resonance.</p>
            </div>

            <div class="grid gap-3">
                <div class="p-4 rounded-xl bg-white border border-slate-200/80 flex items-start gap-4">
                    <span class="px-3 py-1 rounded-lg bg-emerald-500 text-white font-black text-sm shrink-0">9.0 – 10.0</span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Masterpiece / Essential Cinema</h3>
                        <p class="text-xs text-slate-600 mt-0.5">A genre-defining triumph of filmmaking. Unforgettable storytelling, flawless execution, and enduring cultural impact.</p>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white border border-slate-200/80 flex items-start gap-4">
                    <span class="px-3 py-1 rounded-lg bg-teal-500 text-white font-black text-sm shrink-0">8.0 – 8.9</span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Exceptional / Highly Recommended</h3>
                        <p class="text-xs text-slate-600 mt-0.5">Stellar cinema that excels across technical craft and narrative depth. Required viewing for fans of the genre.</p>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white border border-slate-200/80 flex items-start gap-4">
                    <span class="px-3 py-1 rounded-lg bg-blue-500 text-white font-black text-sm shrink-0">7.0 – 7.9</span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Good / Strongly Entertaining</h3>
                        <p class="text-xs text-slate-600 mt-0.5">Thoroughly rewarding watch with memorable moments, solid character work, and engaging pacing despite minor flaws.</p>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white border border-slate-200/80 flex items-start gap-4">
                    <span class="px-3 py-1 rounded-lg bg-amber-500 text-white font-black text-sm shrink-0">5.0 – 6.9</span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Average / Mixed</h3>
                        <p class="text-xs text-slate-600 mt-0.5">Serviceable entertainment with flashes of brilliance undermined by inconsistent pacing, dialogue, or derivative plots.</p>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white border border-slate-200/80 flex items-start gap-4">
                    <span class="px-3 py-1 rounded-lg bg-rose-500 text-white font-black text-sm shrink-0">1.0 – 4.9</span>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Subpar / Not Recommended</h3>
                        <p class="text-xs text-slate-600 mt-0.5">Plagued by critical shortcomings in storytelling, character motivation, or production values.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Dual Rating Transparency -->
        <section class="p-8 rounded-3xl bg-[#010629] text-white">
            <h2 class="text-xl font-bold text-white">Critic Score vs. Community Audience Score</h2>
            <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                We believe both viewpoints are vital. Critical evaluations examine cinema through film history, auteur intention, and craft; while community audience sentiment reflects visceral entertainment value and repeat watchability.
            </p>
            <div class="grid sm:grid-cols-2 gap-4 mt-6">
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                    <span class="text-xs font-bold text-[#FFA500] uppercase tracking-wide">Verified Critic Consensus</span>
                    <p class="text-xs text-slate-300 mt-1">Aggregated from credited film journalists, festival correspondents, and staff evaluations.</p>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                    <span class="text-xs font-bold text-blue-400 uppercase tracking-wide">Community Audience Score</span>
                    <p class="text-xs text-slate-300 mt-1">Filtered from registered moviegoers with bot-detection and anti-review-bombing algorithms.</p>
                </div>
            </div>
        </section>

        <!-- 3. Review Bombing & Spoilers Policy -->
        <section class="space-y-6">
            <h2 class="text-xl font-bold text-slate-900">Combatting Review Bombing & Spoilers</h2>
            <div class="grid md:grid-cols-2 gap-6 text-xs text-slate-600 leading-relaxed">
                <div class="p-5 rounded-2xl bg-white border border-slate-200">
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Zero Tolerance for Coordinated Brigading</h3>
                    <p>
                        We actively monitor unusual spikes in 1-star or 10-star distributions that occur in short timeframes unlinked to theatrical release dates. Coordinated non-authentic reviews are quarantined and reviewed manually.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-white border border-slate-200">
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Strict Spoiler Warnings</h3>
                    <p>
                        Reviewers must tag major narrative twists, climax revelations, and surprise cameos. Unflagged spoiler submissions are subject to editorial redaction to safeguard discovery for new viewers.
                    </p>
                </div>
            </div>
        </section>

        <!-- 4. Corrections and Updates -->
        <section class="p-6 rounded-2xl bg-slate-100 border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900">Noticed a Factual Inaccuracy?</h3>
                <p class="text-xs text-slate-500 mt-0.5">We correct confirmed title metadata, runtime, or cast errors within 24 hours.</p>
            </div>
            <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-xl bg-[#010629] text-white font-bold text-xs shrink-0 hover:bg-[#071038] transition-colors">
                Submit Correction →
            </a>
        </section>
    </div>
</x-layouts.app>
