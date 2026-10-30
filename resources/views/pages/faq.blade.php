@php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'What is TonightOnScreen?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'TonightOnScreen is a premier entertainment discovery platform designed to help movie lovers and TV enthusiasts decide what to watch tonight. We aggregate movies, TV series, cast filmographies, critical ratings, and streaming availability across major services like Netflix, Disney+, Prime Video, and Apple TV+ in one unified place.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How does TonightOnScreen calculate movie and TV series ratings?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'TonightOnScreen uses a calibrated 1–10 scoring scale that balances verified critic consensus with authentic community audience ratings. Our weighted algorithm minimizes review-bombing and gives greater weight to established cinema reviewers.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How do I find out where a movie is currently streaming?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'On every movie or TV series detail page, look for the \'Where to Watch\' section. We display active streaming platforms (such as Netflix, Prime Video, Disney+, Apple TV+) along with direct links to stream or rent the title.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How does the TonightOnScreen Watchlist work?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'You can add any title to your personal Watchlist by clicking the bookmark or \'Add to Watchlist\' button on any movie card or title page. Your watchlist is preserved so you always have a curated queue ready for movie night.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Can I submit my own review or rating?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Yes! We encourage authentic viewer perspectives. On any title\'s page, scroll to the Community Reviews section, select your rating from 1 to 10 stars, write a headline and your review body, and submit.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How often is streaming availability and title data updated?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Our entertainment catalogs and streaming platform distribution feeds are updated continuously to reflect daily new arrivals, departures, and theatrical release schedules.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How can I report an error or suggest a missing film or actor?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'You can report metadata discrepancies or suggest new titles directly through our Contact page. Our editorial team investigates and verifies corrections against production records within 24–48 hours.',
                ],
            ],
        ],
    ];
@endphp

<x-layouts.app 
    title="Frequently Asked Questions (FAQ) & Help — TonightOnScreen"
    description="Frequently asked questions about TonightOnScreen. Learn how to discover movies, use watchlists, find streaming platforms, submit reviews, and report title corrections."
>
    @push('head')
        <!-- Google FAQPage Schema.org JSON-LD for Rich Snippets in SERPs -->
        <script type="application/ld+json">
        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Frequently Asked Questions']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Knowledge Base & Help Desk
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Frequently Asked <span class="text-[#FFA500]">Questions</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Everything you need to know about using TonightOnScreen, discovering movies and series, tracking streaming availability, and contributing reviews.
                </p>
            </div>
        </div>
    </div>

    <!-- FAQ Accordion Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ active: null }">
        <div class="space-y-4">
            
            <!-- Item 1 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 1 ? null : 1)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>What is TonightOnScreen?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    TonightOnScreen is a premier entertainment discovery platform designed to help movie lovers and TV enthusiasts decide what to watch tonight. We aggregate movies, TV series, cast filmographies, critical ratings, and streaming availability across major services like Netflix, Disney+, Prime Video, and Apple TV+ in one unified place.
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 2 ? null : 2)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>How does TonightOnScreen calculate movie and TV series ratings?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    TonightOnScreen uses a calibrated 1–10 scoring scale that balances verified critic consensus with authentic community audience ratings. Our weighted algorithm minimizes review-bombing and gives greater weight to established cinema reviewers. Read our full <a href="{{ route('editorial-guidelines') }}" class="text-[#FFA500] font-bold hover:underline">Editorial Guidelines</a> to learn more.
                </div>
            </div>

            <!-- Item 3 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 3 ? null : 3)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>How do I find out where a movie is currently streaming?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 3" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    On every movie or TV series detail page, look for the 'Where to Watch' section. We display active streaming platforms (such as Netflix, Prime Video, Disney+, Apple TV+) along with direct links to stream or rent the title. You can also explore our dedicated <a href="{{ route('platforms.index') }}" class="text-[#FFA500] font-bold hover:underline">Streaming Platforms Guide</a>.
                </div>
            </div>

            <!-- Item 4 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 4 ? null : 4)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>How does the TonightOnScreen Watchlist work?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 4" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    You can add any title to your personal Watchlist by clicking the bookmark button on any movie card or title page. Your watchlist is preserved so you always have a curated queue ready. View your queue at any time in the <a href="{{ route('watchlist.index') }}" class="text-[#FFA500] font-bold hover:underline">Watchlist Hub</a>.
                </div>
            </div>

            <!-- Item 5 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 5 ? null : 5)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>Can I submit my own review or rating?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 5" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Yes! We encourage authentic viewer perspectives. On any title's page, scroll to the Community Reviews section, select your rating from 1 to 10 stars, write a headline and your review body, and submit. All user reviews adhere to our spoiler and content moderation guidelines.
                </div>
            </div>

            <!-- Item 6 -->
            <div class="border border-slate-200 rounded-2xl bg-white overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 6 ? null : 6)"
                    class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:bg-slate-50 transition-colors"
                >
                    <span>How can I report an error or suggest a missing film or actor?</span>
                    <svg class="w-5 h-5 text-slate-500 transition-transform duration-200 shrink-0" :class="{ 'rotate-180 text-[#FFA500]': active === 6 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 6" x-collapse x-cloak class="px-6 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    You can report metadata discrepancies or suggest new titles directly through our <a href="{{ route('contact') }}" class="text-[#FFA500] font-bold hover:underline">Contact page</a>. Our editorial desk investigates and verifies corrections against production records within 24–48 hours.
                </div>
            </div>

        </div>

        <!-- Help Desk CTA -->
        <div class="mt-12 p-8 rounded-3xl bg-[#010629] text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-md">
            <div>
                <h3 class="text-base font-bold text-white">Have a question not listed here?</h3>
                <p class="text-xs text-slate-300 mt-1">Our customer support and editorial desk are ready to assist you.</p>
            </div>
            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl bg-[#FFA500] hover:bg-[#e69500] text-[#010629] font-bold text-xs uppercase tracking-wider shrink-0 transition-colors">
                Contact Help Desk →
            </a>
        </div>
    </div>
</x-layouts.app>
