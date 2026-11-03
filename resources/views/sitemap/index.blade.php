{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/sitemap-main.xml') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/sitemap-titles.xml') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/sitemap-people.xml') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ url('/sitemap-companies.xml') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>

