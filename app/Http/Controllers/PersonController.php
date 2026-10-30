<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonController extends Controller
{
    /**
     * Display the comprehensive directory of actors, directors, and cinema talents.
     */
    public function index(Request $request)
    {
        $query = Person::query()->where('status', 'active');

        // Search query
        if ($search = $request->input('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Industry filter: Hollywood vs Bollywood
        if ($industry = $request->input('industry')) {
            $bollywoodNames = [
                'Shah Rukh Khan', 'Deepika Padukone', 'Amitabh Bachchan', 'Priyanka Chopra Jonas',
                'Aamir Khan', 'Alia Bhatt', 'Hrithik Roshan', 'Ranbir Kapoor', 'Salman Khan', 'Kareena Kapoor Khan',
                'S. S. Rajamouli', 'Sanjay Leela Bhansali', 'Rajkumar Hirani', 'Karan Johar', 'Siddharth Anand',
                'Atlee', 'Aditya Chopra', 'Zoya Akhtar', 'Nitesh Tiwari', 'Sandeep Reddy Vanga', 'Gauri Khan'
            ];

            if ($industry === 'bollywood') {
                $query->where(function ($q) use ($bollywoodNames) {
                    $q->where('birth_place', 'like', '%India%')
                      ->orWhere('birth_place', 'like', '%Mumbai%')
                      ->orWhere('birth_place', 'like', '%Delhi%')
                      ->orWhereIn('name', $bollywoodNames);
                });
            } elseif ($industry === 'hollywood') {
                $query->where(function ($q) use ($bollywoodNames) {
                    $q->where(function ($sub) {
                        $sub->where('birth_place', 'not like', '%India%')
                            ->orWhereNull('birth_place');
                    })->whereNotIn('name', $bollywoodNames);
                });
            }
        }

        // Department filter
        if ($dept = $request->input('department')) {
            $query->where('known_for_department', $dept);
        }

        $people = $query
            ->withCount('credits')
            ->orderByRaw("FIELD(name, 'Christopher Nolan', 'Shah Rukh Khan', 'Leonardo DiCaprio', 'Steven Spielberg', 'Deepika Padukone', 'Martin Scorsese', 'Cillian Murphy', 'S. S. Rajamouli', 'Robert Downey Jr.', 'Sanjay Leela Bhansali', 'Greta Gerwig', 'Amitabh Bachchan', 'Quentin Tarantino', 'Scarlett Johansson', 'Rajkumar Hirani', 'James Cameron', 'Priyanka Chopra Jonas', 'Denis Villeneuve', 'Margot Robbie', 'Atlee', 'Aamir Khan', 'Tom Cruise', 'Alia Bhatt', 'Christian Bale', 'Siddharth Anand', 'David Fincher', 'Emma Thomas', 'Hrithik Roshan', 'Kevin Feige', 'Zendaya', 'Aditya Chopra', 'Ranbir Kapoor', 'Karan Johar', 'Salman Khan', 'Zoya Akhtar', 'Nitesh Tiwari', 'Kareena Kapoor Khan', 'Sandeep Reddy Vanga', 'Gauri Khan', 'Brad Pitt', 'Florence Pugh', 'Vince Gilligan', 'Reese Witherspoon') DESC")
            ->orderByDesc('is_featured')
            ->orderBy('name')
            ->paginate(24)
            ->withQueryString();

        $stats = [
            'total' => Person::where('status', 'active')->count(),
            'actors' => Person::where('status', 'active')->where('known_for_department', 'Acting')->count(),
            'directors' => Person::where('status', 'active')->where('known_for_department', 'Directing')->count(),
            'producers' => Person::where('status', 'active')->where('known_for_department', 'Production')->count(),
            'hollywood' => Person::where('status', 'active')->where('birth_place', 'not like', '%India%')->count(),
            'bollywood' => Person::where('status', 'active')->where('birth_place', 'like', '%India%')->count(),
        ];

        return view('people.index', compact('people', 'stats'));
    }

    /**
     * Display the specified talent/person profile with interactive filmography timeline.
     * High performance: single query eager loads credits and titles, fully cached for speed.
     */
    public function show(string $slug)
    {
        $cacheKey = "person_profile_v4_{$slug}";

        $data = Cache::remember($cacheKey, now()->addHours(24), function () use ($slug) {
            $person = Person::query()
                ->where('slug', $slug)
                ->with([
                    'credits' => fn($q) => $q->orderBy('billing_order'),
                    'credits.creditable' => function ($morphTo) {
                        $morphTo->morphWith([
                            Title::class => ['genres:id,name,slug'],
                        ]);
                    },
                ])
                ->firstOrFail();

            // Extract Title Credits only (ignoring null or detached items)
            $titleCredits = $person->credits
                ->filter(fn($c) => $c->creditable instanceof Title)
                ->values();

            // Department categorizations
            $acting = $titleCredits->filter(fn($c) => $c->department === 'Acting')->values();
            $directing = $titleCredits->filter(fn($c) => $c->department === 'Directing')->values();
            $writing = $titleCredits->filter(fn($c) => $c->department === 'Writing')->values();
            $producing = $titleCredits->filter(fn($c) => $c->department === 'Production')->values();

            // Unique titles
            $uniqueTitles = $titleCredits->map(fn($c) => $c->creditable)->unique('id')->values();

            // Count of movies vs series
            $totalMoviesCount = $uniqueTitles->filter(function ($t) {
                $val = $t->type instanceof \App\Enums\TitleType ? $t->type->value : (string)$t->type;
                return $val === 'movie';
            })->count();

            $totalSeriesCount = $uniqueTitles->filter(function ($t) {
                $val = $t->type instanceof \App\Enums\TitleType ? $t->type->value : (string)$t->type;
                return $val === 'tv_series';
            })->count();

            // Known For: Top rated distinct titles
            $knownFor = $uniqueTitles->sortByDesc('rating')->take(4)->values();

            // Hit Movies: Standout high-rated titles (rating >= 7.8 or top rated)
            $hitMovies = $uniqueTitles->filter(fn($t) => (float)$t->rating >= 7.8)
                ->sortByDesc('rating')
                ->take(6)
                ->values();
            if ($hitMovies->isEmpty()) {
                $hitMovies = $uniqueTitles->sortByDesc('rating')->take(4)->values();
            }

            // Highest Rated Project & Earliest Project (Debut / First Movie)
            $highestRatedTitle = $uniqueTitles->sortByDesc('rating')->first();
            $earliestTitle = $uniqueTitles->filter(fn($t) => $t->release_date !== null)->sortBy('release_date')->first();
            $highestGrossing = $uniqueTitles->filter(fn($t) => $t->box_office > 0)->sortByDesc('box_office')->first();

            // Total Cumulative Box Office
            $totalBoxOffice = $uniqueTitles->sum(fn($t) => (int) $t->box_office);

            // Key Career Statistics
            $allGenres = $uniqueTitles->flatMap(fn($t) => $t->genres->pluck('name'));
            $topGenre = $allGenres->countBy()->sortDesc()->keys()->first() ?? 'Cinema';
            $avgRating = $uniqueTitles->avg('rating') ? number_format((float) $uniqueTitles->avg('rating'), 1) : '8.2';

            $earliestYear = $uniqueTitles->min(fn($t) => $t->release_date?->format('Y')) ?? '2020';
            $latestYear = $uniqueTitles->max(fn($t) => $t->release_date?->format('Y')) ?? 'Present';
            $yearsCount = (is_numeric($earliestYear) && is_numeric($latestYear)) ? ((int)$latestYear - (int)$earliestYear + 1) : null;
            $careerSpan = $earliestYear === $latestYear ? $earliestYear : "{$earliestYear} — {$latestYear}" . ($yearsCount ? " ({$yearsCount} yrs)" : '');

            // First Credit / Debut Details
            $debutCredit = null;
            if ($earliestTitle) {
                $debutCredit = $titleCredits->first(fn($c) => $c->creditable_id === $earliestTitle->id);
            }

            $stats = [
                'totalCredits' => $uniqueTitles->count(),
                'totalMoviesCount' => $totalMoviesCount,
                'totalSeriesCount' => $totalSeriesCount,
                'topGenre' => $topGenre,
                'avgRating' => $avgRating,
                'careerSpan' => $careerSpan,
                'totalBoxOffice' => $totalBoxOffice,
                'highestRatedTitle' => $highestRatedTitle,
                'highestGrossing' => $highestGrossing,
                'debutTitle' => $earliestTitle,
                'debutJob' => $debutCredit?->job ?: ($debutCredit?->department ?: 'Debut Work'),
                'hitMovies' => $hitMovies,
            ];

            // Format timeline items sorted newest first
            $timelineItems = $titleCredits
                ->sortByDesc(fn($c) => $c->creditable->release_date?->timestamp ?? 0)
                ->map(function ($credit) use ($highestRatedTitle, $earliestTitle) {
                    $title = $credit->creditable;
                    $year = $title->release_date ? (int) $title->release_date->format('Y') : 2025;
                    $decade = floor($year / 10) * 10 . 's';

                    $isDebut = $earliestTitle && $earliestTitle->id === $title->id;
                    $isHighestRated = $highestRatedTitle && $highestRatedTitle->id === $title->id && (float)$title->rating >= 8.5;
                    $isBlockbuster = $title->box_office && $title->box_office >= 500000000;

                    return [
                        'id' => $credit->id,
                        'title_id' => $title->id,
                        'title' => $title->title,
                        'slug' => $title->slug,
                        'type' => $title->type instanceof \App\Enums\TitleType ? $title->type->value : (string) $title->type,
                        'type_label' => $title->type instanceof \App\Enums\TitleType ? $title->type->label() : ucfirst((string) $title->type),
                        'poster_path' => $title->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                        'rating' => (float) $title->rating,
                        'release_date' => $title->release_date?->format('M d, Y'),
                        'year' => $year,
                        'decade' => $decade,
                        'department' => $credit->department,
                        'job' => $credit->job,
                        'character_name' => $credit->character_name,
                        'box_office' => $title->box_office,
                        'runtime_minutes' => $title->runtime_minutes,
                        'genres' => $title->genres->pluck('name')->toArray(),
                        'is_debut' => $isDebut,
                        'is_highest_rated' => $isHighestRated,
                        'is_blockbuster' => $isBlockbuster,
                    ];
                })
                ->values();

            // Unique Decades present
            $decades = $timelineItems->pluck('decade')->unique()->values();

            // Generate programmatic SEO FAQs matching Google search queries
            $faqs = $this->generatePersonFaqs(
                $person,
                $stats,
                $knownFor,
                $acting,
                $directing,
                $writing,
                $producing
            );

            // SEO Meta Information targeting exact search keywords (Clusters A, B, C, D)
            $debutName = $earliestTitle ? $earliestTitle->title : 'first project';
            $birthPlace = $person->birth_place ?: 'Cinema';
            $seoTitle = "{$person->name} Movies List, Biography, Debut & Hit Films, Birth Place | TonightOnScreen";
            $seoDescription = "Explore {$person->name}'s biography, birth place ({$birthPlace}), debut movie ({$debutName}), hit movies list, total movie count, and full filmography on TonightOnScreen.";

            $roleKeywords = [];
            if ($person->known_for_department === 'Directing' || $directing->isNotEmpty()) {
                $roleKeywords[] = "{$person->name} director";
                $roleKeywords[] = "director {$person->name}";
                $roleKeywords[] = "{$person->name} directed movies";
                $roleKeywords[] = "{$person->name} assistant director";
                $roleKeywords[] = "{$person->name} which industry director";
            }
            if ($person->known_for_department === 'Production' || $producing->isNotEmpty()) {
                $roleKeywords[] = "{$person->name} producer";
                $roleKeywords[] = "{$person->name} production company";
                $roleKeywords[] = "{$person->name} debut";
            }
            if ($person->known_for_department === 'Acting' || $acting->isNotEmpty()) {
                $roleTerm = $person->gender === 'Female' ? 'actress' : 'actor';
                $roleKeywords[] = "{$person->name} {$roleTerm}";
                $roleKeywords[] = "{$roleTerm} {$person->name}";
            }

            $kwList = array_merge([
                $person->name,
                "{$person->name} biography",
                "who is {$person->name}",
                "{$person->name} details",
                "{$person->name} age",
                "{$person->name} height",
                "{$person->name} date of birth",
                "{$person->name} birthplace",
                "{$person->name} native place",
                "{$person->name} movies",
                "{$person->name} TV shows",
                "{$person->name} movies and TV shows",
                "{$person->name} filmography",
                "{$person->name} debut movie",
                "{$person->name} first movie",
                "{$person->name} achievements",
                "{$person->name} total movies count",
                "{$person->name} hit movies",
            ], $roleKeywords);

            $seoKeywords = implode(', ', array_unique($kwList));

            return [
                'person' => $person,
                'acting' => $acting,
                'directing' => $directing,
                'writing' => $writing,
                'producing' => $producing,
                'knownFor' => $knownFor,
                'hitMovies' => $hitMovies,
                'stats' => $stats,
                'timelineItems' => $timelineItems,
                'decades' => $decades,
                'faqs' => $faqs,
                'seoTitle' => $seoTitle,
                'seoDescription' => $seoDescription,
                'seoKeywords' => $seoKeywords,
            ];
        });

        return view('people.show', $data);
    }

    /**
     * Generate programmatic, keyword-optimized FAQs for talent profiles.
     * Matches exact user queries: birth place, biography, debut movie, hit movies, total movies, movies list.
     */
    protected function generatePersonFaqs(
        Person $person,
        array $stats,
        $knownFor,
        $acting,
        $directing,
        $writing,
        $producing
    ): array {
        $primaryRole = match ($person->known_for_department) {
            'Acting' => ($person->gender === 'Female' ? 'actress' : 'actor'),
            'Directing' => 'director',
            'Production' => 'producer',
            'Writing' => 'screenwriter',
            default => strtolower($person->known_for_department ?: 'artist'),
        };

        $faqs = [];

        // Q1: Biography, Details & Overview (Cluster A: {person} biography, who is {person}, {person} details)
        $topTitlesText = $knownFor->isNotEmpty()
            ? "landmark projects including " . $knownFor->pluck('title')->implode(', ')
            : "their distinguished creative filmography";

        $bioSnippet = '';
        if ($person->biography) {
            $sentences = preg_split('/(?<=[.?!])\s+/', strip_tags($person->biography), 2);
            if (!empty($sentences[0])) {
                $bioSnippet = ' ' . trim($sentences[0]);
            }
        }

        $faqs[] = [
            'question' => "Who is {$person->name}? ({$person->name} Biography, Details & Overview)",
            'answer' => "{$person->name} is a celebrated {$primaryRole} renowned for {$topTitlesText}.{$bioSnippet} On TonightOnScreen, {$person->name} maintains an average critical rating of {$stats['avgRating']}/10 across their filmography.",
        ];

        // Q2: Age, Date of Birth, Birthplace & Native Place (Cluster A: age, height, dob, birthplace, native place)
        if ($person->birth_place || $person->birth_date) {
            $dateText = $person->birth_date ? " on " . $person->birth_date->format('F d, Y') : "";
            $ageText = "";
            if ($person->birth_date) {
                if ($person->death_date) {
                    $ageText = " (passed away at age {$person->age})";
                } else {
                    $ageText = " (currently {$person->age} years old)";
                }
            }
            $placeText = $person->birth_place ?: "the international cinema industry";

            $faqs[] = [
                'question' => "What is {$person->name}'s age, date of birth, and birthplace / native place?",
                'answer' => "{$person->name} was born in {$placeText}{$dateText}{$ageText}. Fans searching for {$person->name}'s native place and origin can trace their beginnings to {$placeText}, which formed the foundation of their career spanning {$stats['careerSpan']}.",
            ];
        }

        // Q3: Debut Movie / First Movie (Cluster B/C/D: debut movie, first movie, debut)
        if ($stats['debutTitle']) {
            $yearStr = $stats['debutTitle']->release_date ? " in " . $stats['debutTitle']->release_date->format('Y') : "";
            $debutRoleText = !empty($stats['debutJob']) ? " as {$stats['debutJob']}" : "";
            $faqs[] = [
                'question' => "What was {$person->name}'s debut movie (first movie)?",
                'answer' => "{$person->name}'s official debut movie (first cataloged project) is {$stats['debutTitle']->title}, released{$yearStr}{$debutRoleText}. This project launched their career timeline in the film industry.",
            ];
        }

        // Q4: Achievements, Awards & Hit Movies (Cluster B: achievements, awards, hit movies)
        if ($stats['highestRatedTitle']) {
            $hitList = $stats['hitMovies']->map(fn($t) => "{$t->title} (" . number_format((float)$t->rating, 1) . "★)")->implode(', ');
            $faqs[] = [
                'question' => "What are {$person->name}'s career achievements, awards, and biggest hit movies?",
                'answer' => "{$person->name}'s highest-rated project on TonightOnScreen is {$stats['highestRatedTitle']->title} with a stellar rating of " . number_format((float)$stats['highestRatedTitle']->rating, 1) . "/10. Other blockbuster hit movies and critically acclaimed achievements include {$hitList}.",
            ];
        }

        // Q5: Total Movies Count & Movies/TV Shows (Cluster B: total movies count, movies and tv shows)
        $breakdown = [];
        if ($acting->isNotEmpty()) $breakdown[] = $acting->count() . " acting";
        if ($directing->isNotEmpty()) $breakdown[] = $directing->count() . " directing";
        if ($writing->isNotEmpty()) $breakdown[] = $writing->count() . " writing";
        if ($producing->isNotEmpty()) $breakdown[] = $producing->count() . " production";
        $breakdownStr = !empty($breakdown) ? " (" . implode(', ', $breakdown) . ")" : "";

        $faqs[] = [
            'question' => "How many total movies and TV shows has {$person->name} done? ({$person->name} Total Movies Count)",
            'answer' => "{$person->name} has worked on {$stats['totalCredits']} total cataloged titles on TonightOnScreen spanning {$stats['careerSpan']}, featuring {$stats['totalMoviesCount']} feature movies and {$stats['totalSeriesCount']} TV shows/series{$breakdownStr}. Their most frequent genre is {$stats['topGenre']}.",
        ];

        // Q6: Movies List & Complete Filmography (Cluster B/C/D: {person} movies, filmography)
        $faqs[] = [
            'question' => "Where can I find {$person->name}'s complete movies list and filmography?",
            'answer' => "You can explore {$person->name}'s complete movies list and filmography on TonightOnScreen. The interactive career timeline allows fans to filter their film roster by decade, view character roles, and inspect curator ratings.",
        ];

        // Q7: Director Specific FAQ (Cluster C: director {person}, {person} directed movies, which industry director)
        if ($directing->isNotEmpty() || $person->known_for_department === 'Directing') {
            $directedTitles = $directing->map(fn($c) => $c->creditable?->title)->filter()->unique()->take(4)->implode(', ');
            $industryName = $person->isIndian() ? "Indian cinema" : "international cinema";

            $faqs[] = [
                'question' => "Which industry does director {$person->name} work in and what movies have they directed?",
                'answer' => "Director {$person->name} is a renowned filmmaker prominent in {$industryName}" . ($directedTitles ? ", having directed acclaimed titles including {$directedTitles}" : "") . ". They maintain an active directorial timeline cataloged on TonightOnScreen.",
            ];
        }

        // Q8: Producer Specific FAQ (Cluster D: {person} producer, production company, debut)
        if ($producing->isNotEmpty() || $person->known_for_department === 'Production') {
            $producedTitles = $producing->map(fn($c) => $c->creditable?->title)->filter()->unique()->take(3)->implode(', ');
            $faqs[] = [
                'question' => "What films has {$person->name} produced as a producer or banner?",
                'answer' => "As a film producer, {$person->name} has backed major cinematic projects" . ($producedTitles ? " including {$producedTitles}" : "") . ". Fans can explore their production portfolio and creative partnerships on TonightOnScreen.",
            ];
        }

        // Q9: Box Office Collection / Gross
        if ($stats['totalBoxOffice'] > 10000000) {
            $isIndianTalent = $person->isIndian() || ($stats['highestGrossing'] && $stats['highestGrossing']->isIndian());

            if ($isIndianTalent) {
                $crores = number_format($stats['totalBoxOffice'] / 10000000, 0);
                $highestGrossingText = $stats['highestGrossing']
                    ? ", led by the blockbuster success of {$stats['highestGrossing']->title} ({$stats['highestGrossing']->formatted_box_office})"
                    : "";
                $faqs[] = [
                    'question' => "What is {$person->name}'s total box office collection?",
                    'answer' => "Theatrical releases featuring {$person->name} have generated over Rs. {$crores} crore in lifetime box office collections{$highestGrossingText}.",
                ];
            } else {
                $boxOfficeM = number_format($stats['totalBoxOffice'] / 1000000, 1);
                $highestGrossingText = $stats['highestGrossing']
                    ? ", led by the worldwide blockbuster success of {$stats['highestGrossing']->title} ($" . number_format($stats['highestGrossing']->box_office / 1000000, 1) . "M)"
                    : "";
                $faqs[] = [
                    'question' => "What is {$person->name}'s total box office gross?",
                    'answer' => "Theatrical releases featuring {$person->name} have generated over \${$boxOfficeM} million at the global box office{$highestGrossingText}.",
                ];
            }
        }

        return $faqs;
    }
}
