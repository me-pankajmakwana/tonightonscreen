{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- 1. Core Primary Entertainment Hubs -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
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

    <!-- 2. Quality, E-E-A-T & Legal Pages -->
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
        <loc>{{ route('sitemap.directory') }}</loc>
        <lastmod>{{ $latestUpdate->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
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

    <!-- 3. Entertainment Titles (Movies & TV Series) -->
    @foreach($titles as $title)
        <url>
            <loc>{{ route('title.show', $title->slug) }}</loc>
            <lastmod>{{ $title->updated_at ? $title->updated_at->toAtomString() : $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    <!-- 4. Streaming Platform Guides -->
    @foreach($platforms as $platform)
        <url>
            <loc>{{ route('platforms.show', $platform->slug) }}</loc>
            <lastmod>{{ $platform->updated_at ? $platform->updated_at->toAtomString() : $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- 5. Genre Landing Showcase Pages -->
    @foreach($genres as $genre)
        <url>
            <loc>{{ route('genre.show', $genre->slug) }}</loc>
            <lastmod>{{ $genre->updated_at ? $genre->updated_at->toAtomString() : $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- 6. Talent Profiles (Actors, Directors, Writers) -->
    @foreach($people as $person)
        <url>
            <loc>{{ route('person.show', $person->slug) }}</loc>
            <lastmod>{{ $person->updated_at ? $person->updated_at->toAtomString() : $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- 7. Production Companies & Studios -->
    @foreach($companies as $company)
        <url>
            <loc>{{ route('company.show', $company->slug) }}</loc>
            <lastmod>{{ $company->updated_at ? $company->updated_at->toAtomString() : $latestUpdate->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
