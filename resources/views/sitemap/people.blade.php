{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($people as $person)
        <url>
            <loc>{{ route('person.show', $person->slug) }}</loc>
            <lastmod>{{ $person->updated_at?->toAtomString() ?? $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>

