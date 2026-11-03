{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($titles as $title)
        <url>
            <loc>{{ route('title.show', $title->slug) }}</loc>
            <lastmod>{{ $title->updated_at?->toAtomString() ?? $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.85</priority>
        </url>
    @endforeach
</urlset>

