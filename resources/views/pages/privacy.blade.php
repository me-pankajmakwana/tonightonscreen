<x-layouts.app 
    title="Privacy Policy — TonightOnScreen"
    description="TonightOnScreen Privacy Policy. Learn how we handle information, cookies, user review data, and your rights under GDPR and CCPA."
>
    <!-- Header Banner -->
    <div class="relative bg-[#010629] text-white pt-12 pb-16 border-b border-[#0d163f]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-breadcrumbs :items="[['name' => 'Privacy Policy']]" />

            <div class="mt-6 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFA500]/15 text-[#FFA500] border border-[#FFA500]/30 tracking-wide uppercase">
                    Legal & Compliance
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mt-4">
                    Privacy <span class="text-[#FFA500]">Policy</span>
                </h1>
                <p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Last updated: {{ date('F Y') }}. Your privacy and trust are paramount to us. This policy details how TonightOnScreen collects, uses, and safeguards your data.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="prose prose-slate max-w-none text-slate-600 text-xs sm:text-sm space-y-8 leading-relaxed">
            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">1. Overview and Scope</h2>
                <p>
                    TonightOnScreen ("we", "our", or "us") operates an entertainment discovery platform at <a href="{{ url('/') }}" class="text-[#FFA500] font-semibold">{{ url('/') }}</a>. This Privacy Policy explains our practices regarding the collection, storage, and processing of personal data when you browse movies, create watchlists, read reviews, or submit feedback.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">2. Information We Collect</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li><strong>Directly Provided Data:</strong> Name, email address, inquiry text, or review comments when you voluntarily submit reviews, contact us, or participate in community discussions.</li>
                    <li><strong>Watchlist & Preferences:</strong> The movies and series you save to your watchlist and your preferred genres.</li>
                    <li><strong>Technical Device & Log Data:</strong> Internet Protocol (IP) address, browser type, referral URLs, operating system, and timestamp data gathered automatically for performance monitoring and security.</li>
                </ul>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">3. Cookies and Tracking Technologies</h2>
                <p>
                    We use session cookies and local storage tokens strictly necessary for site functionality (such as keeping your watchlist active across sessions, remembering user preferences, and preventing CSRF attacks). We do not sell your personal information or browsing history to third-party data brokers.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">4. How We Use Collected Data</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>To provide, personalize, and optimize your movie discovery experience.</li>
                    <li>To combat automated bots, spam reviews, and malicious activity.</li>
                    <li>To deliver customer support and investigate user feedback or reported metadata errors.</li>
                    <li>To calculate aggregate ratings and platform engagement trends.</li>
                </ul>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">5. GDPR & CCPA Consumer Rights</h2>
                <p>
                    Depending on your jurisdiction (including the European Economic Area, UK, and California), you possess statutory rights regarding your personal data:
                </p>
                <ul class="list-disc list-inside space-y-1 mt-2">
                    <li>The right to request access to any personal data we maintain about you.</li>
                    <li>The right to request rectification or deletion of your submitted reviews or contact entries.</li>
                    <li>The right to opt-out of data processing or file inquiries with your local data protection authority.</li>
                </ul>
                <p class="mt-3">
                    To exercise any of these rights, please email us directly at <a href="mailto:privacy@tonightonscreen.com" class="text-[#FFA500] font-semibold underline">privacy@tonightonscreen.com</a>.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">6. Security and Data Retention</h2>
                <p>
                    We employ modern encryption (TLS/HTTPS), firewalls, and strict server hardening to safeguard stored data against unauthorized access, loss, or alteration.
                </p>
            </section>

            <section class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-xs">
                <h2 class="text-lg font-bold text-slate-900 mb-2">7. Contact the Data Protection Desk</h2>
                <p>
                    If you have questions about this policy or our data practices, reach our privacy officers at <a href="mailto:privacy@tonightonscreen.com" class="text-[#FFA500] font-semibold">privacy@tonightonscreen.com</a> or via our <a href="{{ route('contact') }}" class="text-[#FFA500] font-semibold underline">Contact page</a>.
                </p>
            </section>
        </div>
    </div>
</x-layouts.app>
