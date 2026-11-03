{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($companies as $company)
        <url>
            <loc>{{ route('company.show', $company->slug) }}</loc>
            <lastmod>{{ $company->updated_at?->toAtomString() ?? $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.60</priority>
        </url>
    @endforeach
</urlset>

