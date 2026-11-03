<x-layouts.app 
    :title="$seoTitle"
    :description="$seoDescription"
    :keywords="$seoKeywords"
>
    @push('head')
        <x-seo.json-ld :data="$boxOfficeSchema" />
    @endpush

    <!-- Hero Header -->
    <div class="relative bg-gradient-to-b from-[#010629] via-[#050e38] to-[#010629] text-white py-14 sm:py-18 border-b border-[#0d163f] overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-[#FFA500] text-xs font-bold uppercase tracking-wider mb-5 shadow-sm">
                <span>💰</span>
                <span>Financial Analysis & Commercial Verdicts</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-4xl mx-auto leading-tight mb-4">
                Worldwide <span class="text-[#FFA500] italic font-serif">Box Office</span> & Budget Leaderboard
            </h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Explore official production costs, worldwide ticket sales, return on investment (ROI) multipliers, and final commercial verdicts.
            </p>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white border-b border-slate-200 sticky top-18 sm:top-20 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-0.5">
                <a 
                    href="{{ route('box-office', ['filter' => 'highest_grossing']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $filter === 'highest_grossing' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    👑 Highest Grossing All-Time
                </a>
                <a 
                    href="{{ route('box-office', ['filter' => 'roi']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $filter === 'roi' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    🚀 Highest ROI & Multipliers
                </a>
                <a 
                    href="{{ route('box-office', ['filter' => 'biggest_budget']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $filter === 'biggest_budget' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    🎬 Most Expensive Movies (Budgets)
                </a>
                <a 
                    href="{{ route('box-office', ['filter' => 'blockbusters']) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold shrink-0 transition-colors {{ $filter === 'blockbusters' ? 'bg-[#010629] text-[#FFA500]' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"
                >
                    💎 All-Time Blockbusters Only
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Top 3 Podium Cards (If Highest Grossing) -->
        @if($filter === 'highest_grossing' && $highestGrossing->count() >= 3)
            <div class="mb-12">
                <h2 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-4">
                    Top 3 Worldwide Box Office Giants
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($highestGrossing->take(3) as $idx => $top)
                        @php
                            $medal = match($idx) { 0 => '🥇', 1 => '🥈', 2 => '🥉' };
                            $podiumBorder = match($idx) { 0 => 'border-amber-400 bg-amber-50/20', 1 => 'border-slate-300 bg-slate-50/40', 2 => 'border-amber-700/30 bg-amber-900/5' };
                        @endphp
                        <article class="p-5 rounded-3xl border {{ $podiumBorder }} shadow-sm flex items-center gap-4 group hover:shadow-lg transition-all">
                            <span class="text-3xl shrink-0">{{ $medal }}</span>
                            <img src="{{ $top->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $top->title }}" class="w-16 h-22 object-cover rounded-xl shadow-md shrink-0">
                            <div class="min-w-0 flex-grow">
                                <h3 class="font-extrabold text-slate-900 text-sm truncate group-hover:text-amber-600 transition-colors">
                                    <a href="{{ route('title.show', $top->slug) }}">{{ $top->title }}</a>
                                </h3>
                                <div class="text-xs text-slate-400 mt-0.5">{{ $top->release_date?->format('Y') ?: $top->release_year }}</div>
                                <div class="mt-2 flex items-baseline gap-1.5">
                                    <span class="text-base font-black text-[#010629]">{{ $top->formatted_box_office }}</span>
                                    <span class="text-[10px] text-slate-500 font-bold uppercase">Worldwide</span>
                                </div>
                                @if($top->box_office_verdict)
                                    <div class="mt-1">
                                        <span class="px-2 py-0.5 rounded-md text-[9px] font-black uppercase tracking-wider border {{ $top->box_office_verdict_class }}">
                                            {{ $top->box_office_verdict }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Main Financial Table -->
        <div class="bg-white rounded-3xl border border-slate-200/90 overflow-hidden shadow-xs">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-black text-[#010629]">
                        Box Office Leaderboard Table
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Verified budgets and gross collections formatted in local currency & USD</p>
                </div>
                <div class="text-xs font-bold text-slate-500">
                    Showing {{ $titles->total() }} Tracked Titles
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 text-slate-400 font-extrabold uppercase text-[10px] tracking-wider border-b border-slate-100">
                            <th class="py-3.5 px-4 text-center w-12">#</th>
                            <th class="py-3.5 px-4">Movie Title</th>
                            <th class="py-3.5 px-4">Year</th>
                            <th class="py-3.5 px-4">Production Budget</th>
                            <th class="py-3.5 px-4">Worldwide Collection</th>
                            <th class="py-3.5 px-4">ROI / Multiplier</th>
                            <th class="py-3.5 px-4 text-right">Verdict</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($titles as $idx => $t)
                            @php
                                $rank = ($titles->currentPage() - 1) * $titles->perPage() + $idx + 1;
                            @endphp
                            <tr class="hover:bg-amber-50/30 transition-colors group">
                                <td class="py-3.5 px-4 text-center font-bold text-slate-400 text-xs">
                                    {{ $rank }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $t->poster_url ?: asset('images/movie_the_last_horizon.jpg') }}" alt="{{ $t->title }}" class="w-8 h-11 object-cover rounded shadow-xs shrink-0">
                                        <div class="min-w-0">
                                            <a href="{{ route('title.show', $t->slug) }}" class="font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors line-clamp-1">
                                                {{ $t->title }}
                                            </a>
                                            <div class="text-[10px] text-slate-400 mt-0.5">
                                                {{ $t->directors->first()?->person?->name ? 'Dir: ' . $t->directors->first()->person->name : ($t->genres->first()?->name ?? 'Cinema') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 font-semibold text-slate-600">
                                    {{ $t->release_date?->format('Y') ?: $t->release_year ?: 'N/A' }}
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-700">
                                    {{ $t->formatted_budget ?: 'Undisclosed' }}
                                </td>
                                <td class="py-3.5 px-4 font-black text-slate-900 text-sm">
                                    {{ $t->formatted_box_office ?: 'N/A' }}
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($t->box_office_multiplier)
                                        <span class="inline-flex items-center gap-1 font-extrabold text-emerald-600">
                                            <span>{{ $t->box_office_multiplier }}</span>
                                            <span class="text-[9px] text-slate-400 font-normal">({{ $t->box_office_roi_percentage }})</span>
                                        </span>
                                    @else
                                        <span class="text-slate-400 text-[10px]">—</span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    @if($t->box_office_verdict)
                                        <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border {{ $t->box_office_verdict_class }}">
                                            {{ $t->box_office_verdict }}
                                        </span>
                                    @else
                                        <span class="text-slate-400 text-[10px]">Theatrical Release</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-slate-500 font-medium">
                                    No financial records match this filter criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-slate-100">
                {{ $titles->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>

