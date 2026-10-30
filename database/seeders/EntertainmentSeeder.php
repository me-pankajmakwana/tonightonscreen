<?php

namespace Database\Seeders;

use App\Enums\Department;
use App\Enums\ReleaseStatus;
use App\Enums\TitleType;
use App\Models\Credit;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\Season;
use App\Models\StreamingPlatform;
use App\Models\Title;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EntertainmentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'admin@tonightonscreen.com'],
            [
                'name' => 'Tonight Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Genres
        $genres = [
            ['name' => 'Action', 'description' => 'High energy, stunts, and physical challenges.'],
            ['name' => 'Comedy', 'description' => 'Humorous entertainment intended to make audiences laugh.'],
            ['name' => 'Sci-Fi', 'description' => 'Speculative fiction dealing with imaginative concepts.'],
            ['name' => 'Horror', 'description' => 'Suspenseful and terrifying cinematic experiences.'],
            ['name' => 'Romance', 'description' => 'Passionate and emotional stories of love and connection.'],
            ['name' => 'Drama', 'description' => 'Narrative fiction with in-depth character development.'],
            ['name' => 'Thriller', 'description' => 'Fast-paced, suspenseful narratives.'],
            ['name' => 'Adventure', 'description' => 'Exciting journeys and quests in uncharted territories.'],
            ['name' => 'Mystery', 'description' => 'Intriguing enigmas and investigative puzzles.'],
        ];

        $genreModels = [];
        foreach ($genres as $genreData) {
            $genreModels[$genreData['name']] = Genre::firstOrCreate(
                ['slug' => Str::slug($genreData['name'])],
                $genreData
            );
        }

        // 3. Streaming Platforms
        $platforms = [
            ['name' => 'Netflix', 'slug' => 'netflix', 'website' => 'https://www.netflix.com', 'display_priority' => 1],
            ['name' => 'Prime Video', 'slug' => 'prime-video', 'website' => 'https://www.primevideo.com', 'display_priority' => 2],
            ['name' => 'Apple TV+', 'slug' => 'apple-tv-plus', 'website' => 'https://tv.apple.com', 'display_priority' => 3],
            ['name' => 'Disney+', 'slug' => 'disney-plus', 'website' => 'https://www.disneyplus.com', 'display_priority' => 4],
        ];

        $platformModels = [];
        foreach ($platforms as $p) {
            $platformModels[$p['slug']] = StreamingPlatform::firstOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }

        // 4. Production Companies
        $companies = [
            [
                'name' => 'Warner Bros. Pictures',
                'slug' => 'warner-bros-pictures',
                'headquarters' => 'Burbank, California, USA',
                'website' => 'https://www.warnerbros.com',
                'description' => 'Founded in 1923, Warner Bros. Pictures is an American film production and distribution powerhouse celebrated worldwide for pioneering Hollywood cinema, iconic franchises, and groundbreaking blockbuster epics.',
            ],
            [
                'name' => 'Legendary Entertainment',
                'slug' => 'legendary-entertainment',
                'headquarters' => 'Burbank, California, USA',
                'website' => 'https://www.legendary.com',
                'description' => 'A premier entertainment company with film and digital properties dedicated to bringing large-scale visionary storytelling and mythical universes to global audiences.',
            ],
            [
                'name' => 'HBO Entertainment',
                'slug' => 'hbo-entertainment',
                'headquarters' => 'New York, USA',
                'website' => 'https://www.hbo.com',
                'description' => 'Home to premium, prestige episodic television and cinematic narratives. Renowned for award-winning screenplays, visionary production craft, and culturally defining multi-season series.',
            ],
            [
                'name' => 'Syncopy',
                'slug' => 'syncopy',
                'headquarters' => 'London, England, UK',
                'website' => 'https://www.syncopy.com',
                'description' => 'British production powerhouse founded by Christopher Nolan and Emma Thomas, celebrated for producing intellectually ambitious, visually revolutionary cinematic achievements.',
            ],
            [
                'name' => 'Hello Sunshine',
                'slug' => 'hello-sunshine',
                'headquarters' => 'Los Angeles, California, USA',
                'website' => 'https://hello-sunshine.com',
                'description' => 'A multi-platform media company founded by Reese Witherspoon, dedicated to putting women at the center of rich literary adaptations, prestige series, and inspiring cultural narratives.',
            ],
        ];

        $companyModels = [];
        foreach ($companies as $comp) {
            $companyModels[$comp['slug']] = ProductionCompany::updateOrCreate(
                ['slug' => $comp['slug']],
                $comp
            );
        }

        // 5. Featured Talents from Mockup
        $talents = [
            [
                'name' => 'Tom Hanks',
                'gender' => 'Male',
                'known_for_department' => 'Acting',
                'birth_date' => '1956-07-09',
                'birth_place' => 'Concord, California, USA',
                'biography' => 'Two-time Academy Award-winning American cultural icon celebrated for dramatic and comedic roles.',
                'photo_path' => 'images/talent_tom_hanks.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Emma Watson',
                'gender' => 'Female',
                'known_for_department' => 'Acting',
                'birth_date' => '1990-04-15',
                'birth_place' => 'Paris, France',
                'biography' => 'Acclaimed English actress, model and activist known for her iconic portrayal of Hermione Granger and diverse roles.',
                'photo_path' => 'images/talent_emma_watson.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Christopher Nolan',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1970-07-30',
                'birth_place' => 'London, England, UK',
                'biography' => 'Visionary auteur celebrated for non-linear storytelling, practical film crafts, and blockbuster epics.',
                'photo_path' => 'images/talent_christopher_nolan.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Reese Witherspoon',
                'gender' => 'Female',
                'known_for_department' => 'Production',
                'birth_date' => '1976-03-22',
                'birth_place' => 'New Orleans, Louisiana, USA',
                'biography' => 'Oscar-winning producer and actress championing women-led literary adaptations through Hello Sunshine.',
                'photo_path' => 'images/talent_reese_witherspoon.png',
                'is_featured' => true,
            ],
        ];

        $personModels = [];
        foreach ($talents as $talent) {
            $personModels[$talent['name']] = Person::updateOrCreate(
                ['slug' => Str::slug($talent['name'])],
                array_merge($talent, ['status' => 'active'])
            );
        }

        // 6. Titles
        $trendingTitles = [
            [
                'title' => 'The Last Horizon',
                'type' => TitleType::MOVIE,
                'release_date' => '2025-03-15',
                'rating' => 8.4,
                'runtime_minutes' => 148,
                'content_rating' => 'PG-13',
                'budget' => 165000000,
                'box_office' => 724500000,
                'trailer_url' => 'https://www.youtube.com/watch?v=uYPbbksJxIg',
                'genre' => 'Adventure',
                'poster_path' => 'images/movie_the_last_horizon.jpg',
                'backdrop_path' => 'images/movie_the_last_horizon.jpg',
                'overview' => 'A lone explorer embarks across an uncharted desert expanse to uncover the remnants of a forgotten civilization, facing severe natural perils and shifting alliances along the journey.',
                'tagline' => 'Beyond the sands lies the truth.',
            ],
            [
                'title' => 'Shadow Protocol',
                'type' => TitleType::TV_SERIES,
                'release_date' => '2025-01-10',
                'rating' => 8.7,
                'runtime_minutes' => 55,
                'content_rating' => 'TV-MA',
                'budget' => 85000000,
                'trailer_url' => 'https://www.youtube.com/watch?v=Way9Dexny3w',
                'genre' => 'Thriller',
                'poster_path' => 'images/movie_shadow_protocol.jpg',
                'backdrop_path' => 'images/movie_shadow_protocol.jpg',
                'overview' => 'In a neon-drenched metropolis shrouded in fog, an elite undercover operative untangles a multi-layered conspiracy threatening global telecommunications infrastructure.',
                'tagline' => 'Trust no shadow.',
            ],
            [
                'title' => 'Broken Dreams',
                'type' => TitleType::MOVIE,
                'release_date' => '2024-11-20',
                'rating' => 7.9,
                'runtime_minutes' => 124,
                'content_rating' => 'R',
                'budget' => 35000000,
                'box_office' => 89000000,
                'genre' => 'Drama',
                'poster_path' => 'images/movie_the_last_horizon.jpg',
                'backdrop_path' => 'images/movie_the_last_horizon.jpg',
                'overview' => 'An emotional examination of two estranged artists reuniting at the twilight of their creative careers to produce one final masterpiece in rural Provence.',
                'tagline' => 'Some bonds endure against all odds.',
            ],
            [
                'title' => 'The Silent Path',
                'type' => TitleType::TV_SERIES,
                'release_date' => '2025-02-05',
                'rating' => 8.2,
                'runtime_minutes' => 50,
                'content_rating' => 'TV-14',
                'budget' => 45000000,
                'genre' => 'Mystery',
                'poster_path' => 'images/movie_shadow_protocol.jpg',
                'backdrop_path' => 'images/movie_shadow_protocol.jpg',
                'overview' => 'Detectives investigate unexplained disappearances along a secluded mountain trail where town secrets and generational feuds remain fiercely guarded.',
                'tagline' => 'Silence speaks loudest.',
            ],
            [
                'title' => 'Beyond the Sky',
                'type' => TitleType::MOVIE,
                'release_date' => '2024-10-18',
                'rating' => 8.6,
                'runtime_minutes' => 162,
                'content_rating' => 'PG-13',
                'budget' => 195000000,
                'box_office' => 682000000,
                'genre' => 'Sci-Fi',
                'poster_path' => 'images/movie_the_last_horizon.jpg',
                'backdrop_path' => 'images/movie_the_last_horizon.jpg',
                'overview' => 'A team of deep space astronauts discovers an anomalous spatial rift near Saturn that alters their perception of time, memory, and reality.',
                'tagline' => 'Look up. Everything has changed.',
            ],
            [
                'title' => 'The Gilded Crown',
                'type' => TitleType::TV_SERIES,
                'release_date' => '2023-09-14',
                'rating' => 9.1,
                'runtime_minutes' => 58,
                'content_rating' => 'TV-MA',
                'budget' => 120000000,
                'genre' => 'Drama',
                'poster_path' => 'images/movie_shadow_protocol.jpg',
                'backdrop_path' => 'images/movie_shadow_protocol.jpg',
                'overview' => 'An opulent, cutthroat chronicle of a royal dynasty navigating political rebellion and palace betrayal in 19th-century Europe.',
                'tagline' => 'Heavy is the head.',
            ],
            [
                'title' => 'Midnight Symphony',
                'type' => TitleType::MOVIE,
                'release_date' => '2023-12-25',
                'rating' => 8.1,
                'runtime_minutes' => 135,
                'content_rating' => 'PG-13',
                'budget' => 40000000,
                'box_office' => 165000000,
                'genre' => 'Romance',
                'poster_path' => 'images/movie_the_last_horizon.jpg',
                'backdrop_path' => 'images/movie_the_last_horizon.jpg',
                'overview' => 'Two classical musicians from rival academies meet under the arches of Vienna to compose an unforgettable orchestral score.',
                'tagline' => 'When words fail, music speaks.',
            ],
            [
                'title' => 'Neon Nights',
                'type' => TitleType::MOVIE,
                'release_date' => '2024-06-08',
                'rating' => 8.5,
                'runtime_minutes' => 118,
                'content_rating' => 'R',
                'budget' => 70000000,
                'box_office' => 240000000,
                'genre' => 'Action',
                'poster_path' => 'images/movie_shadow_protocol.jpg',
                'backdrop_path' => 'images/movie_shadow_protocol.jpg',
                'overview' => 'A high-octane heist operative must pull off one final impossible score through the rain-soaked highways of Chicago.',
                'tagline' => 'The city never sleeps. Neither do they.',
            ],
            [
                'title' => 'Echoes of Silence',
                'type' => TitleType::MOVIE,
                'release_date' => '2024-04-12',
                'rating' => 7.8,
                'runtime_minutes' => 105,
                'content_rating' => 'R',
                'budget' => 18000000,
                'box_office' => 82000000,
                'genre' => 'Horror',
                'poster_path' => 'images/movie_shadow_protocol.jpg',
                'backdrop_path' => 'images/movie_shadow_protocol.jpg',
                'overview' => 'In a remote lakeside cabin, an audio engineer begins recording auditory anomalies that precede devastating paranormal events.',
                'tagline' => 'Listen closely.',
            ],
            [
                'title' => 'Cosmic Comedy',
                'type' => TitleType::MOVIE,
                'release_date' => '2025-02-14',
                'rating' => 7.7,
                'runtime_minutes' => 102,
                'content_rating' => 'PG-13',
                'budget' => 50000000,
                'box_office' => 145000000,
                'genre' => 'Comedy',
                'poster_path' => 'images/movie_the_last_horizon.jpg',
                'backdrop_path' => 'images/movie_the_last_horizon.jpg',
                'overview' => 'A dysfunctional family accidentally hijacks an experimental sub-orbital space liner on what was supposed to be a routine weekend cruise.',
                'tagline' => 'In space, everyone can hear you laugh.',
            ],
        ];

        $createdTitles = [];
        foreach ($trendingTitles as $item) {
            $genreName = $item['genre'];
            unset($item['genre']);

            $slug = Str::slug($item['title'] . '-' . date('Y', strtotime($item['release_date'])));

            $title = Title::updateOrCreate(
                ['slug' => $slug],
                array_merge($item, [
                    'status' => ReleaseStatus::RELEASED,
                    'is_trending' => true,
                    'is_featured' => true,
                    'original_language' => 'English',
                ])
            );

            if (isset($genreModels[$genreName])) {
                $title->genres()->syncWithoutDetaching([$genreModels[$genreName]->id]);
            }

            $createdTitles[$item['title']] = $title;
        }

        // 7. Enrich "The Last Horizon" (Movie)
        if (isset($createdTitles['The Last Horizon'])) {
            $movie = $createdTitles['The Last Horizon'];

            // Companies
            if (isset($companyModels['warner-bros-pictures'], $companyModels['legendary-entertainment'])) {
                $movie->productionCompanies()->syncWithoutDetaching([
                    $companyModels['warner-bros-pictures']->id => ['role' => 'Production & Distribution'],
                    $companyModels['legendary-entertainment']->id => ['role' => 'Co-Financing'],
                ]);
            }

            // Streaming Platforms
            if (isset($platformModels['prime-video'], $platformModels['apple-tv-plus'])) {
                $movie->streamingPlatforms()->syncWithoutDetaching([
                    $platformModels['prime-video']->id => ['access_type' => 'subscription', 'watch_url' => 'https://www.primevideo.com', 'quality' => '4K UHD'],
                    $platformModels['apple-tv-plus']->id => ['access_type' => 'rent', 'watch_url' => 'https://tv.apple.com', 'quality' => '4K UHD HDR'],
                ]);
            }

            // Credits
            $credits = [
                ['person' => 'Christopher Nolan', 'department' => 'Directing', 'job' => 'Director', 'billing_order' => 1],
                ['person' => 'Christopher Nolan', 'department' => 'Writing', 'job' => 'Screenplay', 'billing_order' => 2],
                ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'Dr. Arthur Vance', 'billing_order' => 1],
                ['person' => 'Emma Watson', 'department' => 'Acting', 'job' => 'Actress', 'character_name' => 'Elena Rostova', 'billing_order' => 2],
                ['person' => 'Reese Witherspoon', 'department' => 'Production', 'job' => 'Producer', 'billing_order' => 1],
            ];

            foreach ($credits as $c) {
                if (isset($personModels[$c['person']])) {
                    Credit::updateOrCreate(
                        [
                            'creditable_type' => Title::class,
                            'creditable_id' => $movie->id,
                            'person_id' => $personModels[$c['person']]->id,
                            'department' => $c['department'],
                            'job' => $c['job'],
                        ],
                        [
                            'character_name' => $c['character_name'] ?? null,
                            'billing_order' => $c['billing_order'],
                            'is_featured' => true,
                        ]
                    );
                }
            }
        }

        // 8. Enrich "Shadow Protocol" (TV Series with Seasons & Episodes)
        if (isset($createdTitles['Shadow Protocol'])) {
            $series = $createdTitles['Shadow Protocol'];

            // Companies
            if (isset($companyModels['hbo-entertainment'], $companyModels['syncopy'])) {
                $series->productionCompanies()->syncWithoutDetaching([
                    $companyModels['hbo-entertainment']->id => ['role' => 'Production & Network'],
                    $companyModels['syncopy']->id => ['role' => 'Co-Production'],
                ]);
            }

            // Streaming Platforms
            if (isset($platformModels['netflix'], $platformModels['prime-video'])) {
                $series->streamingPlatforms()->syncWithoutDetaching([
                    $platformModels['netflix']->id => ['access_type' => 'subscription', 'watch_url' => 'https://www.netflix.com', 'quality' => '4K UHD Dolby Vision'],
                    $platformModels['prime-video']->id => ['access_type' => 'buy', 'watch_url' => 'https://www.primevideo.com', 'quality' => '1080p HD'],
                ]);
            }

            // Credits
            $seriesCredits = [
                ['person' => 'Christopher Nolan', 'department' => 'Directing', 'job' => 'Creator & Director', 'billing_order' => 1],
                ['person' => 'Emma Watson', 'department' => 'Acting', 'job' => 'Actress', 'character_name' => 'Agent Maya Hayes', 'billing_order' => 1],
                ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'Director Marcus Kane', 'billing_order' => 2],
                ['person' => 'Reese Witherspoon', 'department' => 'Production', 'job' => 'Executive Producer', 'billing_order' => 1],
            ];

            foreach ($seriesCredits as $c) {
                if (isset($personModels[$c['person']])) {
                    Credit::updateOrCreate(
                        [
                            'creditable_type' => Title::class,
                            'creditable_id' => $series->id,
                            'person_id' => $personModels[$c['person']]->id,
                            'department' => $c['department'],
                            'job' => $c['job'],
                        ],
                        [
                            'character_name' => $c['character_name'] ?? null,
                            'billing_order' => $c['billing_order'],
                            'is_featured' => true,
                        ]
                    );
                }
            }

            // Seasons & Episodes
            // Season 1
            $s1 = Season::updateOrCreate(
                ['title_id' => $series->id, 'season_number' => 1],
                [
                    'name' => 'Season 1: Infiltration',
                    'overview' => 'An elite undercover operative untangles a global network of cyber weapons and corrupted intelligence chiefs.',
                    'air_date' => '2024-01-15',
                ]
            );

            $s1Episodes = [
                [
                    'episode_number' => 1,
                    'name' => 'The Ghost Transmission',
                    'overview' => 'A clandestine encrypted code leaks across defense networks, pulling an estranged operative back into active service.',
                    'runtime_minutes' => 58,
                    'air_date' => '2024-01-15',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'episode_number' => 2,
                    'name' => 'Neon Labyrinth',
                    'overview' => 'Navigating the rainy underbelly of Tokyo, Maya and her team identify a rogue corporate syndicate linked to orbital satellites.',
                    'runtime_minutes' => 54,
                    'air_date' => '2024-01-22',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'episode_number' => 3,
                    'name' => 'Blackout Protocol',
                    'overview' => 'A coordinated power grid attack cripples major transit hubs while an extraction team fights for survival in Geneva.',
                    'runtime_minutes' => 56,
                    'air_date' => '2024-01-29',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'episode_number' => 4,
                    'name' => 'Zero Sum',
                    'overview' => 'In a heart-stopping season finale, Maya confronts the mastermind inside an automated server bunker at the North Pole.',
                    'runtime_minutes' => 62,
                    'air_date' => '2024-02-05',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
            ];

            foreach ($s1Episodes as $ep) {
                Episode::updateOrCreate(
                    ['season_id' => $s1->id, 'episode_number' => $ep['episode_number']],
                    array_merge($ep, ['title_id' => $series->id])
                );
            }

            // Season 2
            $s2 = Season::updateOrCreate(
                ['title_id' => $series->id, 'season_number' => 2],
                [
                    'name' => 'Season 2: Retribution',
                    'overview' => 'Repercussions of the global grid attack plunge the agency into an undeclared clandestine conflict.',
                    'air_date' => '2025-01-10',
                ]
            );

            $s2Episodes = [
                [
                    'episode_number' => 1,
                    'name' => 'Fractured Loyalties',
                    'overview' => 'Congressional hearings trigger deep state infighting as new cyber threats surface in the Baltic states.',
                    'runtime_minutes' => 52,
                    'air_date' => '2025-01-10',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'episode_number' => 2,
                    'name' => 'Shadow War',
                    'overview' => 'Undercover units clash across Berlin in an escalating race to recover a stolen quantum cryptography key.',
                    'runtime_minutes' => 55,
                    'air_date' => '2025-01-17',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'episode_number' => 3,
                    'name' => 'Checkmate',
                    'overview' => 'The ultimate gambit puts both Maya and Kane directly in the line of crossfire at the world economic summit.',
                    'runtime_minutes' => 59,
                    'air_date' => '2025-01-24',
                    'still_path' => 'images/movie_shadow_protocol.jpg',
                ],
            ];

            foreach ($s2Episodes as $ep) {
                Episode::updateOrCreate(
                    ['season_id' => $s2->id, 'episode_number' => $ep['episode_number']],
                    array_merge($ep, ['title_id' => $series->id])
                );
            }
        }

        // 9. Extra Credits & Platforms for Added Titles
        $extraTitlesConfig = [
            'The Gilded Crown' => [
                'companies' => ['hbo-entertainment' => 'Production & Network', 'hello-sunshine' => 'Co-Production'],
                'platforms' => ['netflix' => ['access_type' => 'subscription', 'quality' => '4K UHD']],
                'credits' => [
                    ['person' => 'Emma Watson', 'department' => 'Acting', 'job' => 'Actress', 'character_name' => 'Princess Beatrice', 'billing_order' => 1],
                    ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'King Henry VII', 'billing_order' => 2],
                    ['person' => 'Reese Witherspoon', 'department' => 'Production', 'job' => 'Executive Producer', 'billing_order' => 1],
                ],
            ],
            'Midnight Symphony' => [
                'companies' => ['warner-bros-pictures' => 'Production', 'syncopy' => 'Co-Production'],
                'platforms' => ['prime-video' => ['access_type' => 'subscription', 'quality' => '4K UHD']],
                'credits' => [
                    ['person' => 'Christopher Nolan', 'department' => 'Directing', 'job' => 'Director', 'billing_order' => 1],
                    ['person' => 'Christopher Nolan', 'department' => 'Writing', 'job' => 'Original Screenplay', 'billing_order' => 2],
                    ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'Jonathan Vance', 'billing_order' => 1],
                    ['person' => 'Emma Watson', 'department' => 'Acting', 'job' => 'Actress', 'character_name' => 'Clara Schumann', 'billing_order' => 2],
                ],
            ],
            'Neon Nights' => [
                'companies' => ['legendary-entertainment' => 'Production', 'hello-sunshine' => 'Co-Production'],
                'platforms' => ['apple-tv-plus' => ['access_type' => 'rent', 'quality' => '4K UHD HDR']],
                'credits' => [
                    ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'Det. Miller', 'billing_order' => 1],
                    ['person' => 'Reese Witherspoon', 'department' => 'Production', 'job' => 'Producer', 'billing_order' => 1],
                ],
            ],
            'Cosmic Comedy' => [
                'companies' => ['warner-bros-pictures' => 'Distribution'],
                'platforms' => ['prime-video' => ['access_type' => 'subscription', 'quality' => '1080p HD']],
                'credits' => [
                    ['person' => 'Emma Watson', 'department' => 'Acting', 'job' => 'Actress', 'character_name' => 'Dr. Chloe Adams', 'billing_order' => 1],
                    ['person' => 'Tom Hanks', 'department' => 'Acting', 'job' => 'Actor', 'character_name' => 'Capt. Bob Hanson', 'billing_order' => 2],
                ],
            ],
            'Echoes of Silence' => [
                'companies' => ['legendary-entertainment' => 'Production'],
                'platforms' => ['disney-plus' => ['access_type' => 'subscription', 'quality' => '4K UHD']],
                'credits' => [
                    ['person' => 'Christopher Nolan', 'department' => 'Production', 'job' => 'Executive Producer', 'billing_order' => 1],
                ],
            ],
        ];

        foreach ($extraTitlesConfig as $titleName => $config) {
            if (isset($createdTitles[$titleName])) {
                $t = $createdTitles[$titleName];

                // Companies
                if (!empty($config['companies'])) {
                    foreach ($config['companies'] as $compSlug => $compRole) {
                        if (isset($companyModels[$compSlug])) {
                            $t->productionCompanies()->syncWithoutDetaching([
                                $companyModels[$compSlug]->id => ['role' => $compRole],
                            ]);
                        }
                    }
                }

                // Platforms
                foreach ($config['platforms'] as $pSlug => $pData) {
                    if (isset($platformModels[$pSlug])) {
                        $t->streamingPlatforms()->syncWithoutDetaching([
                            $platformModels[$pSlug]->id => $pData,
                        ]);
                    }
                }

                // Credits
                foreach ($config['credits'] as $c) {
                    if (isset($personModels[$c['person']])) {
                        Credit::updateOrCreate(
                            [
                                'creditable_type' => Title::class,
                                'creditable_id' => $t->id,
                                'person_id' => $personModels[$c['person']]->id,
                                'department' => $c['department'],
                                'job' => $c['job'],
                            ],
                            [
                                'character_name' => $c['character_name'] ?? null,
                                'billing_order' => $c['billing_order'],
                                'is_featured' => true,
                            ]
                        );
                    }
                }
            }
        }
    }
}

