<x-layouts.app 
    title="Terms of Service & Copyright Policy — TonightOnScreen"
    description="TonightOnScreen Terms of Service. User review standards, intellectual property, DMCA takedown procedures, and platform usage guidelines."
>
    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Terms of Service']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Platform Legal Terms
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Terms of <span class="text-[#FFA500]">Service</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Last updated: {{ date('F Y') }}. Please read these terms carefully before accessing TonightOnScreen. By browsing or submitting reviews, you agree to these conditions.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="prose prose-slate max-w-none text-slate-600 text-xs sm:text-sm space-y-8 leading-relaxed">
            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">1. Acceptance of Agreement</h2>
                <p>
                    By accessing or using TonightOnScreen (the "Service"), you agree to be bound by these Terms of Service and all applicable federal and international laws. If you do not agree with any portion of these terms, your sole remedy is to cease using the platform.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">2. Intellectual Property & Fair Use</h2>
                <p>
                    Movie posters, backdrops, studio logos, and promotional character imagery displayed on TonightOnScreen remain the exclusive copyrighted property of their respective production studios, distributors, and copyright holders. Such promotional media is displayed under the principles of fair use and transformative commentary for identification, educational critique, and news reporting.
                </p>
                <p class="mt-2">
                    Original editorial write-ups, curated rating lists, custom UI components, and software code are the intellectual property of TonightOnScreen.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">3. DMCA Copyright Notice & Takedown Protocol</h2>
                <p>
                    We respect intellectual property rights. If you are a copyright owner or authorized representative and believe content on our platform infringes your copyright, submit a formal notice to our designated agent at <a href="mailto:dmca@tonightonscreen.com" class="text-[#FFA500] font-semibold">dmca@tonightonscreen.com</a> with:
                </p>
                <ul class="list-disc list-inside space-y-1 mt-2">
                    <li>Identification of the copyrighted work claimed to have been infringed.</li>
                    <li>The specific URL on TonightOnScreen containing the disputed material.</li>
                    <li>Your full legal name, company name, address, telephone number, and email.</li>
                    <li>A statement affirming your good-faith belief that the disputed use is unauthorized.</li>
                    <li>A statement made under penalty of perjury that the information in your notification is accurate.</li>
                </ul>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">4. User Reviews and Community Standards</h2>
                <p>
                    Users submitting ratings and reviews agree not to post:
                </p>
                <ul class="list-disc list-inside space-y-1 mt-2">
                    <li>Hate speech, defamation, harassment, obscenity, or illegal threats.</li>
                    <li>Automated bot submissions, review bombing, or fraudulent commercial endorsements.</li>
                    <li>Unmarked plot spoilers that ruin crucial twists for fellow viewers.</li>
                </ul>
                <p class="mt-3">
                    TonightOnScreen reserves the right to moderate, hide, or remove any user-generated submission that violates these principles without notice.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">5. Disclaimer of Warranties & External Links</h2>
                <p>
                    TonightOnScreen provides entertainment information, streaming availability, and critical ratings on an "AS IS" and "AS AVAILABLE" basis. While we strive for absolute accuracy, streaming platform licenses and catalog availability may shift without prior notification. Links to external streaming services (e.g. Netflix, Disney+, Prime Video) are subject to their respective terms and subscription requirements.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">6. Inquiries and Legal Notice</h2>
                <p>
                    Direct any legal or terms inquiries to <a href="mailto:legal@tonightonscreen.com" class="text-[#FFA500] font-semibold">legal@tonightonscreen.com</a> or via our <a href="{{ route('contact') }}" class="text-[#FFA500] font-semibold underline">Contact desk</a>.
                </p>
            </section>
        </div>
    </div>
</x-layouts.app>
