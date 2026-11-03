@php
    $contactSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ContactPage',
        'name' => 'Contact TonightOnScreen',
        'description' => 'Contact TonightOnScreen editorial team, press, and data corrections desk.',
        'url' => route('contact'),
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => 'TonightOnScreen',
            'url' => url('/'),
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'contactType' => 'editorial support',
                    'email' => 'editorial@tonightonscreen.com',
                    'availableLanguage' => 'English',
                ],
                [
                    '@type' => 'ContactPoint',
                    'contactType' => 'copyright & DMCA inquiries',
                    'email' => 'dmca@tonightonscreen.com',
                    'availableLanguage' => 'English',
                ],
            ],
        ],
    ];
@endphp

<x-layouts.app 
    title="Contact TonightOnScreen — Editorial Support & Inquiries"
    description="Get in touch with TonightOnScreen editors, report metadata corrections, request film partnerships, press inquiries or support."
>
    @push('head')
        <x-seo.json-ld :data="$contactSchema" />
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Contact']]" />

            <div class="mt-6 max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Editorial & Support Desk
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Get In Touch With <span class="text-[#FFA500]">Our Team</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Have a question, feedback, metadata correction, or press inquiry? We are eager to hear from fellow cinephiles, filmmakers, and industry partners.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-12 gap-12">
            <!-- Left Info Cards (5 Cols) -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Direct Inquiries</h2>
                    <p class="text-xs text-slate-500 mt-1">Select the most relevant department for faster response times.</p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#010629] text-[#FFA500] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Editorial & Corrections</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Found a missing cast member or incorrect release date?</p>
                            <a href="mailto:editorial@tonightonscreen.com" class="text-xs text-[#FFA500] font-semibold hover:underline mt-1 inline-block">
                                editorial@tonightonscreen.com
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Copyright & DMCA Notice</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Intellectual property claims and takedown requests.</p>
                            <a href="mailto:dmca@tonightonscreen.com" class="text-xs text-slate-700 font-semibold hover:underline mt-1 inline-block">
                                dmca@tonightonscreen.com
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0 1 12 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2m4 6h.01M5 20h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Partnerships & Studio Relations</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Film festivals, streaming platforms, and screen promotions.</p>
                            <a href="mailto:partners@tonightonscreen.com" class="text-xs text-slate-700 font-semibold hover:underline mt-1 inline-block">
                                partners@tonightonscreen.com
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-amber-500/10 border border-amber-500/20">
                    <h3 class="text-sm font-bold text-amber-900">Looking for Instant Answers?</h3>
                    <p class="text-xs text-amber-800 mt-1">
                        Check out our FAQ guide to find quick answers regarding movie reviews, watchlist functionality, and streaming platform updates.
                    </p>
                    <a href="{{ route('faq') }}" class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold text-amber-900 hover:text-amber-950 underline">
                        Explore FAQ Knowledge Base →
                    </a>
                </div>
            </div>

            <!-- Right Form (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm">
                    <h2 class="text-2xl font-bold text-slate-900">Send an Inquiry</h2>
                    <p class="text-xs text-slate-500 mt-1">We typically reply within 24–48 business hours.</p>

                    @if(session('success'))
                        <div class="mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <div>
                                <strong class="font-bold">Message Delivered!</strong>
                                <p class="mt-0.5">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (isset($errors) && $errors->any())
                        <div class="mt-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                            <strong class="font-bold block mb-1">Please correct the following:</strong>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="mt-6 space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Your Full Name *</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    required 
                                    value="{{ old('name') }}"
                                    placeholder="e.g. Christopher Nolan"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#010629] focus:border-transparent outline-none"
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email Address *</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    required 
                                    value="{{ old('email') }}"
                                    placeholder="you@domain.com"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#010629] focus:border-transparent outline-none"
                                >
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="category" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Inquiry Type *</label>
                                <select 
                                    name="category" 
                                    id="category" 
                                    required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#010629] focus:border-transparent outline-none bg-white"
                                >
                                    <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General Question</option>
                                    <option value="editorial_correction" {{ old('category') == 'editorial_correction' ? 'selected' : '' }}>Metadata Correction (Title/Cast)</option>
                                    <option value="press" {{ old('category') == 'press' ? 'selected' : '' }}>Press / Media Inquiry</option>
                                    <option value="partnership" {{ old('category') == 'partnership' ? 'selected' : '' }}>Partnership / Promotion</option>
                                    <option value="copyright" {{ old('category') == 'copyright' ? 'selected' : '' }}>Copyright / DMCA Request</option>
                                </select>
                            </div>
                            <div>
                                <label for="subject" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Subject *</label>
                                <input 
                                    type="text" 
                                    name="subject" 
                                    id="subject" 
                                    required 
                                    value="{{ old('subject') }}"
                                    placeholder="Brief summary of inquiry"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#010629] focus:border-transparent outline-none"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Your Message *</label>
                            <textarea 
                                name="message" 
                                id="message" 
                                rows="5" 
                                required
                                placeholder="Please provide specific details, including title URL or cast names if submitting a correction..."
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#010629] focus:border-transparent outline-none leading-relaxed"
                            >{{ old('message') }}</textarea>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full sm:w-auto px-8 py-3 rounded-xl bg-[#010629] hover:bg-[#071038] text-white font-bold text-xs uppercase tracking-wider transition-colors shadow-md hover:shadow-lg flex items-center justify-center gap-2"
                        >
                            <span>Transmit Inquiry</span>
                            <svg class="w-4 h-4 text-[#FFA500]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
