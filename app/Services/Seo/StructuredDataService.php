<?php

namespace App\Services\Seo;

use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\Title;
use App\Support\SeoHelper;

class StructuredDataService
{
    /**
     * Build Schema.org structured data for a Title (Movie or TVSeries).
     */
    public function forTitle(Title $title): array
    {
        $isSeries = ($title->type?->value ?? $title->type) === 'tv_series';
        $type = $isSeries ? 'TVSeries' : 'Movie';

        $typeWord = $isSeries ? 'TV Series' : 'Film';
        $yearStr = $title->release_year ? "({$title->release_year}) " : '';

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $title->title,
            'headline' => "{$title->title} {$yearStr}{$typeWord} — Cast, Budget, Box Office & Reviews",
            'url' => route('title.show', $title->slug),
        ];

        // High-intent search keywords for Google/Bing knowledge graph matching
        $keywords = [
            "{$title->title} movie",
            "{$title->title} film",
            "{$title->title} release date",
            "when did {$title->title} come out",
            "when was {$title->title} released",
            "{$title->title} runtime",
            "{$title->title} run time",
            "{$title->title} characters",
            "cast of {$title->title}",
            "{$title->title} cast",
            "{$title->title} actors",
            "{$title->title} movie cast",
            "who stars in {$title->title}",
            "who is in {$title->title}",
            "{$title->title} budget",
            "{$title->title} collection",
            "{$title->title} budget and collection",
            "{$title->title} budget and collection worldwide",
            "{$title->title} box office collection",
            "{$title->title} worldwide collection",
            "{$title->title} movie budget and collection",
            "{$title->title} movie budget",
            "budget of {$title->title}",
            "{$title->title} cost",
            "{$title->title} hit or flop",
            "is {$title->title} hit or flop",
            "was {$title->title} a flop",
            "where to watch {$title->title}",
            "{$title->title} OTT",
            "{$title->title} OTT platform",
            "{$title->title} ott release date",
            "{$title->title} digital release date",
            "{$title->title} in which ott",
            "{$title->title} ott rights",
            "who directed {$title->title}",
            "{$title->title} director",
            "{$title->title} director name",
            "{$title->title} movie director",
            "{$title->title} rating",
            "{$title->title} age rating",
            "{$title->title} content rating",
            "what is {$title->title} about",
            "{$title->title} plot",
            "{$title->title} synopsis",
            "{$title->title} storyline",
            "{$title->title} sequel",
            "{$title->title} franchise",
            "{$title->title} production company",
            "{$title->title} country of origin",
            "is {$title->title} worth watching",
            "how to watch {$title->title}",
        ];
        if ($title->content_rating) {
            $keywords[] = "{$title->title} {$title->content_rating} rating";
        }
        if ($title->relationLoaded('genres') && $title->genres->isNotEmpty()) {
            foreach ($title->genres->pluck('name') as $gName) {
                $keywords[] = "best {$gName} movies";
                $keywords[] = "{$gName} movie";
                $keywords[] = "best {$gName} movies to stream";
                $keywords[] = "{$gName} movies on demand";
            }
        }
        $schema['keywords'] = implode(', ', array_unique($keywords));

        // Description / Overview
        $desc = $title->overview ?: $title->tagline ?: $title->description;
        if (!empty($desc)) {
            $schema['description'] = SeoHelper::cleanMetaDescription($desc, 300);
        }

        // Poster image
        if ($title->poster_url) {
            $schema['image'] = $title->poster_url;
        }

        // Release Date & Creation
        if ($title->release_date) {
            $schema['datePublished'] = $title->release_date->format('Y-m-d');
            $schema['dateCreated']   = $title->release_date->format('Y-m-d');
        }

        // Content Rating — enables age-rating rich results in Google / Bing
        // Queries: "{movie} age rating", "scarface rating age", "{movie} certificate"
        if ($title->content_rating) {
            $schema['contentRating'] = $title->content_rating;
        }

        // ISO 8601 Runtime Duration (e.g. PT180M)
        if ($title->runtime_minutes && (int) $title->runtime_minutes > 0) {
            $schema['duration'] = "PT{$title->runtime_minutes}M";
        }

        // Country of Origin & Language
        if (!empty($title->origin_country)) {
            $schema['countryOfOrigin'] = [
                '@type' => 'Country',
                'name' => $title->origin_country,
            ];
        }

        if (!empty($title->original_language)) {
            $schema['inLanguage'] = $title->original_language;
        }

        // Genres
        if ($title->relationLoaded('genres') && $title->genres->isNotEmpty()) {
            $schema['genre'] = $title->genres->pluck('name')->values()->all();
        }

        // Directors
        if ($title->relationLoaded('credits')) {
            $directors = $title->credits
                ->where('department', 'Directing')
                ->map(function ($credit) {
                    if (!$credit->person) {
                        return null;
                    }
                    return [
                        '@type' => 'Person',
                        'name' => $credit->person->name,
                        'url' => route('person.show', $credit->person->slug),
                    ];
                })
                ->filter()
                ->values()
                ->all();

            if (!empty($directors)) {
                $schema['director'] = count($directors) === 1 ? $directors[0] : $directors;
            }

            // Lead Actors / Cast
            $actors = $title->credits
                ->where('department', 'Acting')
                ->filter(fn($credit) => !empty($credit->person))
                ->unique('person_id')
                ->take(10)
                ->map(function ($credit) {
                    return [
                        '@type' => 'Person',
                        'name' => $credit->person->name,
                        'url' => route('person.show', $credit->person->slug),
                    ];
                })
                ->values()
                ->all();

            if (!empty($actors)) {
                $schema['actor'] = $actors;
            }
        }

        // Production Companies
        if ($title->relationLoaded('productionCompanies') && $title->productionCompanies->isNotEmpty()) {
            $companies = $title->productionCompanies->map(fn($c) => [
                '@type' => 'Organization',
                'name' => $c->name,
                'url' => route('company.show', $c->slug),
            ])->values()->all();

            $schema['productionCompany'] = count($companies) === 1 ? $companies[0] : $companies;
        }

        // Aggregate Rating (ONLY if genuine rating > 0)
        if (!empty($title->rating) && (float) $title->rating > 0) {
            $schema['aggregateRating'] = [
                '@type' => 'AggregateRating',
                'ratingValue' => number_format((float) $title->rating, 1, '.', ''),
                'bestRating' => '10',
                'worstRating' => '1',
                'ratingCount' => max(1, (int) ($title->reviews_count ?? 1)),
            ];
        }

        // Trailer Video Object (if available)
        if (!empty($title->trailer_url)) {
            $schema['trailer'] = [
                '@type'        => 'VideoObject',
                'name'         => "{$title->title} Official Trailer",
                'embedUrl'     => $title->trailer_url,
                'thumbnailUrl' => $title->backdrop_url ?: $title->poster_url ?: asset('Tonight OnScreen Logo.png'),
                'description'  => "Official trailer for {$title->title}",
                'uploadDate'   => ($title->release_date ?? now())->format('Y-m-d'),
            ];
        }

        return $schema;
    }

    /**
     * Build Schema.org HowTo structured data for the streaming watch guide.
     * Targets: "how to watch {movie}", "how to stream {movie} online", "best way to watch {franchise} in order"
     */
    public function forWatchGuide(Title $title): ?array
    {
        if (!$title->relationLoaded('streamingPlatforms') || $title->streamingPlatforms->isEmpty()) {
            return null;
        }

        $steps = $title->streamingPlatforms->map(fn($p) => [
            '@type' => 'HowToStep',
            'name'  => "Watch {$title->title} on {$p->name}",
            'text'  => "Open {$p->name} and search for \"{$title->title}\" to start watching instantly" .
                       (!empty($p->pivot->quality) ? " in {$p->pivot->quality}" : '') . '.',
            'url'   => !empty($p->pivot->watch_url) ? $p->pivot->watch_url
                       : (!empty($p->website) ? $p->website : route('platforms.show', $p->slug)),
        ])->values()->all();

        if (empty($steps)) {
            return null;
        }

        return [
            '@context'    => 'https://schema.org',
            '@type'       => 'HowTo',
            'name'        => "How to Watch {$title->title} Online — Streaming Guide",
            'description' => "Step-by-step guide to streaming {$title->title} on all available OTT platforms right now.",
            'totalTime'   => 'PT2M',
            'step'        => $steps,
        ];
    }

    /**
     * Build Schema.org structured data for a Person (Talent / Director / Actor).
     */
    public function forPerson(Person $person, $recentTitles = []): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $person->name,
            'url' => route('person.show', $person->slug),
        ];

        if (!empty($person->stage_name) && $person->stage_name !== $person->name) {
            $schema['alternateName'] = $person->stage_name;
        }

        if ($person->photo_url) {
            $schema['image'] = $person->photo_url;
        }

        if (!empty($person->known_for_department)) {
            $schema['jobTitle'] = $person->known_for_department;
        }

        if (!empty($person->biography)) {
            $schema['description'] = SeoHelper::cleanMetaDescription($person->biography, 300);
        }

        if ($person->birth_date) {
            $schema['birthDate'] = $person->birth_date->format('Y-m-d');
        }

        if ($person->death_date) {
            $schema['deathDate'] = $person->death_date->format('Y-m-d');
        }

        if (!empty($person->birth_place)) {
            $schema['birthPlace'] = [
                '@type' => 'Place',
                'name' => $person->birth_place,
            ];
        }

        // Social Links / SameAs
        $sameAs = [];
        if (!empty($person->website)) {
            $sameAs[] = $person->website;
        }
        if (is_array($person->social_links)) {
            foreach ($person->social_links as $link) {
                if (is_string($link) && filter_var($link, FILTER_VALIDATE_URL)) {
                    $sameAs[] = $link;
                }
            }
        }
        if (!empty($sameAs)) {
            $schema['sameAs'] = array_values(array_unique($sameAs));
        }

        // Keywords mapping for Google Knowledge Graph & SERP pattern matching
        $roleName = match($person->known_for_department) {
            'Acting' => ($person->gender === 'Female' ? 'actress' : 'actor'),
            'Directing' => 'director',
            'Production' => 'producer',
            'Writing' => 'screenwriter',
            default => strtolower($person->known_for_department ?: 'artist'),
        };

        $kw = [
            $person->name,
            "{$person->name} biography",
            "who is {$person->name}",
            "{$person->name} details",
            "{$person->name} age",
            "how old is {$person->name}",
            "{$person->name} date of birth",
            "{$person->name} birthday",
            "when was {$person->name} born",
            "{$person->name} birthplace",
            "{$person->name} birth place",
            "{$person->name} native place",
            "{$person->name} born place",
            "{$person->name} hometown",
            "where is {$person->name} from",
            "{$person->name} is from which state",
            "{$person->name} origin",
            "{$person->name} mother tongue",
            "{$person->name} religion",
            "{$person->name} {$roleName}",
            "{$roleName} {$person->name}",
            "{$person->name} movies",
            "{$person->name} movies list",
            "{$person->name} all movies list",
            "{$person->name} films",
            "{$person->name} hit movies",
            "{$person->name} hits and flops",
            "{$person->name} TV shows",
            "{$person->name} movies and TV shows",
            "{$person->name} filmography",
            "{$person->name} debut movie",
            "{$person->name} debut film",
            "{$person->name} first movie",
            "{$person->name} 1st movie",
            "{$person->name} first movie name",
            "{$person->name} 1st movie name",
            "first movie of {$person->name}",
            "what was {$person->name}'s first movie",
            "{$person->name} first film",
            "{$person->name} 1st movie as hero",
            "{$person->name} achievements",
            "how many movies {$person->name} acted",
            "how many films has {$person->name} acted",
            "how many movies has {$person->name} done",
            "how many films has {$person->name} done",
            "{$person->name} total movies count",
            "{$person->name} total number of movies",
            "{$person->name} how many movies",
            "{$person->name} total movies",
            "{$person->name} career history",
            "{$person->name} acting career",
            "{$person->name} first hit movie",
            "{$person->name} breakthrough role",
            "{$person->name} ethnicity",
            "{$person->name} background",
            "{$person->name} nationality",
        ];

        if ($person->known_for_department === 'Directing') {
            $kw[] = "{$person->name} director";
            $kw[] = "director {$person->name}";
            $kw[] = "{$person->name} directed movies";
            $kw[] = "director {$person->name} movies list";
            $kw[] = "director {$person->name} movies";
            $kw[] = "{$person->name} directed movies list";
            $kw[] = "{$person->name} first movie as director";
            $kw[] = "{$person->name} assistant director";
            $kw[] = "{$person->name} which industry director";
            $kw[] = "{$person->name} director age";
        } elseif ($person->known_for_department === 'Production') {
            $kw[] = "{$person->name} producer";
            $kw[] = "{$person->name} production company";
            $kw[] = "{$person->name} debut";
        }

        $schema['keywords'] = implode(', ', array_unique($kw));

        // hasOccupation — richer semantic signal than jobTitle for Knowledge Graph matching
        $schema['hasOccupation'] = [
            '@type'                 => 'Occupation',
            'name'                  => ucfirst($roleName),
            'occupationalCategory'  => 'Arts, Design, Entertainment, Sports, and Media Occupations',
        ];

        // nationality / birthPlace geographic signal — helps with "{person} ethnicity" and "{person} nationality" queries
        if (!empty($person->birth_place)) {
            $schema['nationality'] = [
                '@type' => 'Country',
                'name'  => $person->birth_place,
            ];
        }

        // gender — semantic disambiguation between "actor" and "actress" queries
        if (!empty($person->gender)) {
            $schema['gender'] = $person->gender;
        }

        return $schema;
    }

    /**
     * Build Schema.org structured data for a Production Company (Organization).
     */
    public function forCompany(ProductionCompany $company): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $company->name,
            'url' => route('company.show', $company->slug),
        ];

        if ($company->logo_url) {
            $schema['logo'] = $company->logo_url;
            $schema['image'] = $company->logo_url;
        }

        if (!empty($company->description)) {
            $schema['description'] = SeoHelper::cleanMetaDescription($company->description, 300);
        }

        if (!empty($company->headquarters)) {
            $schema['address'] = [
                '@type' => 'PostalAddress',
                'addressLocality' => $company->headquarters,
            ];
        }

        if (!empty($company->website)) {
            $schema['sameAs'] = [$company->website];
        }

        return $schema;
    }

    /**
     * Build Schema.org structured data for a Genre / Category collection (ItemList).
     */
    public function forCollection(string $name, string $url, $items): array
    {
        $list = [];
        $pos = 1;
        foreach ($items as $item) {
            if ($item instanceof Title) {
                $list[] = [
                    '@type' => 'ListItem',
                    'position' => $pos++,
                    'url' => route('title.show', $item->slug),
                    'name' => $item->title,
                ];
            }
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => $name,
            'url' => $url,
            'numberOfItems' => count($list),
            'itemListElement' => $list,
        ];
    }

    /**
     * Build Schema.org FAQPage structured data.
     */
    public function forFaqs(array $faqs): ?array
    {
        return SeoHelper::buildFaqSchema($faqs);
    }

    /**
     * Build Schema.org BreadcrumbList structured data.
     */
    public function forBreadcrumbs(array $items): array
    {
        return SeoHelper::buildBreadcrumbSchema($items);
    }

    /**
     * Build Schema.org WebSite structured data with SearchAction.
     */
    public function forWebSite(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => SeoHelper::SITE_NAME,
            'url' => SeoHelper::SITE_URL,
            'description' => 'Discover Movies, TV Shows & Talent All in One Place',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => url('/explore') . '?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    /**
     * Build Schema.org Organization structured data for TonightOnScreen.
     */
    public function forOrganization(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => SeoHelper::SITE_NAME,
            'url' => SeoHelper::SITE_URL,
            'logo' => asset('Tonight OnScreen Logo Icon.png'),
            'description' => 'Your ultimate cinema & television entertainment discovery platform.',
            'sameAs' => [
                'https://twitter.com/TonightOnScreen',
                'https://facebook.com/TonightOnScreen',
                'https://instagram.com/TonightOnScreen',
            ],
        ];
    }
}
