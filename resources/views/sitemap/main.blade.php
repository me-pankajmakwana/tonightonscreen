{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Primary Entertainment Hubs -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('what-to-watch') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('ott.releases') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('box-office') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('first-movies') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ route('games.index') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('games.cinele') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('games.higher-lower') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ route('top-rated') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('trending') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('explore') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('platforms.index') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('genre.index') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('person.index') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Genres -->
    @foreach($genres as $genre)
        <url>
            <loc>{{ route('genre.show', $genre->slug) }}</loc>
            <lastmod>{{ $genre->updated_at?->toAtomString() ?? $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- Streaming Platforms -->
    @foreach($platforms as $platform)
        <url>
            <loc>{{ route('platforms.show', $platform->slug) }}</loc>
            <lastmod>{{ $platform->updated_at?->toAtomString() ?? $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.85</priority>
        </url>
    @endforeach

    <!-- Quality, E-E-A-T & Legal Pages -->
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('editorial-guidelines') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('faq') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ route('privacy') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('terms') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('sitemap.directory') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
</urlset>

