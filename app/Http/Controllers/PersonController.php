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
        $cacheKey = "person_profile_v6_{$slug}";

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

            // Frequent Collaborators & Co-Stars (High-Impact Internal SEO Linking)
            $titleIds = $uniqueTitles->pluck('id');
            $collaboratorCredits = \App\Models\Credit::query()
                ->where('creditable_type', 'App\Models\Title')
                ->whereIn('creditable_id', $titleIds)
                ->where('person_id', '!=', $person->id)
                ->selectRaw('person_id, count(distinct creditable_id) as shared_count')
                ->groupBy('person_id')
                ->orderByDesc('shared_count')
                ->take(6)
                ->get();

            $collaborators = collect();
            if ($collaboratorCredits->isNotEmpty()) {
                $collaboratorPeople = Person::whereIn('id', $collaboratorCredits->pluck('person_id'))
                    ->get()
                    ->keyBy('id');

                foreach ($collaboratorCredits as $c) {
                    if (isset($collaboratorPeople[$c->person_id])) {
                        $p = $collaboratorPeople[$c->person_id];
                        $p->shared_count = $c->shared_count;
                        $collaborators->push($p);
                    }
                }
            }

            // Fallback to top featured talents in same department/industry if fewer than 4 direct collaborators
            if ($collaborators->count() < 4) {
                $fallbackNeeded = 6 - $collaborators->count();
                $existingIds = $collaborators->pluck('id')->push($person->id)->toArray();
                $fallbacks = Person::query()
                    ->whereNotIn('id', $existingIds)
                    ->where('status', 'active')
                    ->where('known_for_department', $person->known_for_department ?: 'Acting')
                    ->orderByDesc('is_featured')
                    ->take($fallbackNeeded)
                    ->get();
                foreach ($fallbacks as $fb) {
                    $fb->shared_count = 0;
                    $collaborators->push($fb);
                }
            }

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

            // SEO Meta Information targeting exact Search Console query formats:
            // "{name} age", "{name} first movie", "{name} 1st movie", "{name} native place", "{name} movies list", "how many movies {name} acted"
            $isDirector = $person->known_for_department === 'Directing' || $directing->isNotEmpty();
            $debutName = $earliestTitle ? $earliestTitle->title : null;
            $birthPlace = $person->birth_place ?: ($person->hometown ?: null);
            $roleLabel = $isDirector ? 'Director' : ($person->gender === 'Female' ? 'Actress' : 'Actor');

            if ($isDirector) {
                // Director query formats: "{name} director", "{name} age", "{name} movies list", "{name} first movie", "{name} native place"
                $seoTitle = "{$person->name} (Director) — Age, Native Place, First Movie, Movies List & Hit Films | TonightOnScreen";
            } else {
                // Actor/Actress query formats: "{name} age", "{name} first movie", "{name} 1st movie", "{name} native place", "{name} total movies"
                $seoTitle = "{$person->name} ({$roleLabel}) — Age, Native Place, First Movie (Debut), Movies List & Total Film Count | TonightOnScreen";
            }

            // High-CTR Meta Description containing exact Search Console intent keywords
            $descParts = [];
            $descParts[] = "Explore {$person->name}'s verified profile:";
            if ($person->age) {
                $dobText = $person->birth_date ? " ({$person->birth_date->format('M d, Y')})" : "";
                $descParts[] = "Age: {$person->age}{$dobText},";
            }
            if ($birthPlace) {
                $descParts[] = "Native Place: {$birthPlace},";
            }
            if ($debutName) {
                $descParts[] = "First Movie (Debut): {$debutName},";
            }
            if ($stats['totalCredits'] > 0) {
                $descParts[] = "Total Movies Count: {$stats['totalCredits']},";
            }
            if ($isDirector) {
                $descParts[] = "directed movies list, hit films, and complete career filmography on TonightOnScreen.";
            } else {
                $descParts[] = "hit movies list, box office collections, and full filmography on TonightOnScreen.";
            }
            $seoDescription = implode(' ', $descParts);

            $roleKeywords = [];
            if ($isDirector) {
                $roleKeywords[] = "{$person->name} director";
                $roleKeywords[] = "director {$person->name}";
                $roleKeywords[] = "{$person->name} directed movies";
                $roleKeywords[] = "director {$person->name} movies list";
                $roleKeywords[] = "director {$person->name} movies";
                $roleKeywords[] = "{$person->name} directed movies list";
                $roleKeywords[] = "{$person->name} first movie as director";
                $roleKeywords[] = "{$person->name} assistant director";
                $roleKeywords[] = "{$person->name} which industry director";
                $roleKeywords[] = "{$person->name} director age";
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
                // First movie & debut search patterns (high impressions)
                "{$person->name} first movie",
                "{$person->name} 1st movie",
                "{$person->name} debut movie",
                "{$person->name} debut film",
                "{$person->name} first movie name",
                "{$person->name} 1st movie name",
                "first movie of {$person->name}",
                "what was {$person->name}'s first movie",
                "{$person->name} first film",
                "{$person->name} debut",
                "{$person->name} 1st movie as hero",
                // Age & birthday search patterns
                "{$person->name} age",
                "how old is {$person->name}",
                "{$person->name} birthday",
                "{$person->name} date of birth",
                "when was {$person->name} born",
                "{$person->name} born",
                // Birthplace & native place search patterns
                "{$person->name} native place",
                "{$person->name} birth place",
                "{$person->name} birthplace",
                "{$person->name} born place",
                "{$person->name} hometown",
                "where is {$person->name} from",
                "{$person->name} is from which state",
                "{$person->name} origin",
                "{$person->name} mother tongue",
                "{$person->name} religion",
                // Total movies count search patterns
                "how many movies {$person->name} acted",
                "how many films has {$person->name} acted",
                "how many movies has {$person->name} done",
                "how many films has {$person->name} done",
                "{$person->name} total movies count",
                "{$person->name} total number of movies",
                "{$person->name} how many movies",
                "{$person->name} total movies",
                // Filmography & hit movies search patterns
                "{$person->name} movies",
                "{$person->name} movies list",
                "{$person->name} all movies list",
                "{$person->name} filmography",
                "{$person->name} films",
                "{$person->name} hit movies",
                "{$person->name} hits and flops",
                "{$person->name} first hit movie",
                "{$person->name} breakthrough role",
                "{$person->name} career history",
                "{$person->name} acting career",
                "who is {$person->name}",
                "{$person->name} biography",
                "{$person->name} details",
                "{$person->name} full name",
                "{$person->name} real name",
                "{$person->name} height",
                "{$person->name} zodiac sign",
                "{$person->name} residence",
                "{$person->name} education",
                "{$person->name} qualification",
                "{$person->name} nationality",
                "{$person->name} languages",
                "{$person->name} TV shows",
                "{$person->name} movies and TV shows",
                "{$person->name} achievements",
                "{$person->name} ethnicity",
                "{$person->name} background",
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
                'collaborators' => $collaborators,
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

        // Q2a: Age, Date of Birth & Birthday (GSC: "{person} age", "how old is {person}", "{person} date of birth", "{person} birthday")
        if ($person->birth_date || $person->age) {
            $dateText = $person->birth_date ? " on " . $person->birth_date->format('F d, Y') : "";
            $ageText = "";
            if ($person->birth_date) {
                if ($person->death_date) {
                    $ageText = "passed away at age {$person->age}";
                } else {
                    $ageText = "is currently {$person->age} years old";
                }
            } elseif ($person->age) {
                $ageText = "is {$person->age} years old";
            }

            $faqs[] = [
                'question' => "How old is {$person->name} and when was {$person->name} born? ({$person->name} Age & Date of Birth)",
                'answer'   => "{$person->name} {$ageText}{$dateText}. Fans searching for {$person->name}'s age, birthday, and birth timeline can find verified talent details and life milestones on TonightOnScreen.",
            ];
        }

        // Q2b: Birthplace, Native Place & Hometown (GSC: "{person} native place", "{person} birth place", "{person} hometown", "where is {person} from")
        if ($person->birth_place || $person->hometown || $person->residence) {
            $birthPlace = $person->birth_place ?: 'their home region';
            $hometown = $person->hometown ? ", with ancestral roots in native hometown of {$person->hometown}" : "";
            $residence = $person->residence ? ", and currently resides in {$person->residence}" : "";
            $langStr = $person->languages ? " Their native/spoken languages include {$person->languages}." : "";
            $religionStr = $person->religion ? " Their recorded religious background is {$person->religion}." : "";

            $faqs[] = [
                'question' => "Where is {$person->name} from and what is {$person->name}'s native place? ({$person->name} Birthplace, Hometown & Origin)",
                'answer'   => "{$person->name}'s birthplace and native place is {$birthPlace}{$hometown}{$residence}.{$langStr}{$religionStr} Their cultural roots formed the foundation of their career spanning {$stats['careerSpan']}.",
            ];

            // Q2c. Ethnicity & Cultural Background ("{person} ethnicity", "{person} ethnicity and race", "{person} background")
            $ethnicOrigin = $person->isIndian() ? 'South Asian / Indian cinema' : 'international cinema';
            $faqs[] = [
                'question' => "What is {$person->name}'s ethnicity and cultural background?",
                'answer'   => "{$person->name} was born in {$birthPlace} and is associated with {$ethnicOrigin}. " .
                              "Their career spans {$stats['careerSpan']} with credits across {$stats['totalMoviesCount']} movies and {$stats['totalSeriesCount']} TV shows, " .
                              "reflecting a rich cross-cultural body of work cataloged on TonightOnScreen.",
            ];
        }

        // Q2c: Full Legal / Real Name & Stage Moniker
        if ($person->full_name || $person->stage_name) {
            $realNameText = $person->full_name ?: $person->name;
            $stageText = $person->stage_name ? " under the popular stage moniker or screen name '{$person->stage_name}'" : "";
            $faqs[] = [
                'question' => "What is {$person->name}'s real full name and stage name?",
                'answer' => "{$person->name}'s official full legal name is {$realNameText}{$stageText}. In industry credits and global databases, they are documented across their catalog under these recognized identities.",
            ];
        }

        // Q2d: Height, Physical Stats & Zodiac Sign
        if ($person->height || $person->zodiac_sign) {
            $heightText = $person->height ? " stands at a height of {$person->height}" : "";
            $zodiacText = $person->zodiac_sign ? "with the astrological zodiac sign of {$person->zodiac_sign}" : "";
            $connector = ($person->height && $person->zodiac_sign) ? " and is associated " : ($person->height ? "" : "is associated ");
            $faqs[] = [
                'question' => "What is {$person->name}'s height and zodiac sign?",
                'answer' => "{$person->name}{$heightText}{$connector}{$zodiacText}. Their documented physical profile and astrological attributes are part of their verified talent dossier on TonightOnScreen.",
            ];
        }

        // Q2e: Education, College & Academic Qualifications
        if ($person->education || $person->qualification) {
            $eduText = $person->education ? " attended {$person->education}" : "";
            $qualText = $person->qualification ? " where they pursued {$person->qualification}" : "";
            $faqs[] = [
                'question' => "Where was {$person->name} educated and what are their qualifications?",
                'answer' => "{$person->name}{$eduText}{$qualText}. This academic and dramatic formation helped shape their professional craft across cinema and television.",
            ];
        }

        // Q2f: Current Residence & Hometown
        if ($person->residence || $person->hometown) {
            $resText = $person->residence ? " currently resides in {$person->residence}" : "";
            $homeText = $person->hometown ? ", having grown up in their native hometown of {$person->hometown}" : "";
            $faqs[] = [
                'question' => "Where does {$person->name} live and what is their hometown?",
                'answer' => "{$person->name}{$resText}{$homeText}. Their geographic roots continue to connect with audiences worldwide through their acclaimed performances.",
            ];
        }

        // Q2g: Spoken Languages, Hobbies & Polymath Talents
        if ($person->languages || $person->hobbies || $person->other_talents) {
            $langText = $person->languages ? " is multilingual, speaking {$person->languages}" : "";
            $hobbyText = $person->hobbies ? ". In their personal time, their hobbies include {$person->hobbies}" : "";
            $talentText = $person->other_talents ? ", complemented by creative talents in {$person->other_talents}" : "";
            $faqs[] = [
                'question' => "What languages does {$person->name} speak, and what are their hobbies and other talents?",
                'answer' => "{$person->name}{$langText}{$talentText}{$hobbyText}.",
            ];
        }

        // Q3: First Movie / 1st Movie Name & Debut Film (GSC: "{person} first movie", "{person} 1st movie", "{person} debut movie", "first movie of {person}", "what was {person}'s first movie")
        if ($stats['debutTitle']) {
            $yearStr = $stats['debutTitle']->release_date ? " in " . $stats['debutTitle']->release_date->format('Y') : "";
            $debutRoleText = !empty($stats['debutJob']) ? " as {$stats['debutJob']}" : "";
            $faqs[] = [
                'question' => "What was {$person->name}'s first movie (debut film)? ({$person->name} 1st Movie Name & Year)",
                'answer' => "{$person->name}'s official first movie (debut film) is {$stats['debutTitle']->title}, released{$yearStr}{$debutRoleText}. This landmark project launched their career timeline in the film industry.",
            ];

            // Q3b. First Hit Movie / Breakthrough Role ("{person} first hit movie", "{person} breakthrough role")
            $firstHit = $stats['hitMovies']->sortBy('release_date')->first();
            if ($firstHit && $firstHit->id !== $stats['debutTitle']->id) {
                $hitYear       = $firstHit->release_date?->format('Y');
                $hitRating     = number_format((float) $firstHit->rating, 1);
                $faqs[] = [
                    'question' => "What was {$person->name}'s first hit movie and breakthrough role?",
                    'answer'   => "{$person->name}'s first major commercial and critical hit is {$firstHit->title}" .
                                  ($hitYear ? " ({$hitYear})" : '') .
                                  ", rated {$hitRating}/10 on TonightOnScreen. " .
                                  "This {$primaryRole} role established {$person->name} as a prominent name in the industry, " .
                                  "paving the way for their celebrated career spanning {$stats['careerSpan']}.",
                ];
            }
        }

        // Q4: Achievements, Awards & Hit Movies (GSC: "{person} hit movies", "{person} hits and flops", "{person} achievements")
        if ($stats['highestRatedTitle']) {
            $hitList = $stats['hitMovies']->map(fn($t) => "{$t->title} (" . number_format((float)$t->rating, 1) . "★)")->implode(', ');
            $faqs[] = [
                'question' => "What are {$person->name}'s career achievements, awards, and biggest hit movies?",
                'answer' => "{$person->name}'s highest-rated project on TonightOnScreen is {$stats['highestRatedTitle']->title} with a stellar rating of " . number_format((float)$stats['highestRatedTitle']->rating, 1) . "/10. Other blockbuster hit movies and critically acclaimed achievements include {$hitList}.",
            ];
        }

        // Q5: Total Movies Count & Movies/TV Shows (GSC: "how many movies {person} acted", "{person} total movies count", "{person} total number of movies", "how many films has {person} done")
        $breakdown = [];
        if ($acting->isNotEmpty()) $breakdown[] = $acting->count() . " acting";
        if ($directing->isNotEmpty()) $breakdown[] = $directing->count() . " directing";
        if ($writing->isNotEmpty()) $breakdown[] = $writing->count() . " writing";
        if ($producing->isNotEmpty()) $breakdown[] = $producing->count() . " production";
        $breakdownStr = !empty($breakdown) ? " (" . implode(', ', $breakdown) . ")" : "";
        $roleVerb = ($person->known_for_department === 'Directing' || $directing->isNotEmpty()) ? 'directed and made' : 'acted in';

        $faqs[] = [
            'question' => "How many movies has {$person->name} {$roleVerb}? ({$person->name} Total Movies Count & Filmography Breakdown)",
            'answer' => "{$person->name} has worked on {$stats['totalCredits']} total cataloged titles on TonightOnScreen spanning {$stats['careerSpan']}, featuring {$stats['totalMoviesCount']} feature movies and {$stats['totalSeriesCount']} TV shows/series{$breakdownStr}. Their most frequent genre is {$stats['topGenre']}.",
        ];

        // Q5b. Career History Narrative ("{person} acting career", "{person} career history", "{person} acting career history")
        if ($stats['totalCredits'] > 0) {
            $debutPart  = $stats['debutTitle'] ? "Their career began with {$stats['debutTitle']->title}" : 'Their career commenced';
            $peakPart   = $stats['highestRatedTitle']
                ? " and includes acclaimed work in {$stats['highestRatedTitle']->title} (" . number_format((float) $stats['highestRatedTitle']->rating, 1) . "/10)"
                : '';
            $faqs[] = [
                'question' => "What is {$person->name}'s acting career history and timeline?",
                'answer'   => "{$person->name}'s career as a {$primaryRole} spans {$stats['careerSpan']}, " .
                              "with {$stats['totalCredits']} credited titles across {$stats['totalMoviesCount']} movies and {$stats['totalSeriesCount']} TV shows. " .
                              "{$debutPart}{$peakPart}. " .
                              "The complete interactive career timeline, filterable by decade and genre, is available on TonightOnScreen.",
            ];
        }

        // Q6: Movies List & Complete Filmography (GSC: "{person} movies", "{person} movies list", "{person} all movies list", "{person} filmography")
        $faqs[] = [
            'question' => "What is {$person->name}'s complete movies list and filmography? (Where to Watch Full Movies List)",
            'answer' => "You can explore {$person->name}'s complete movies list and filmography on TonightOnScreen. The interactive career timeline allows fans to filter their film roster by decade, view character roles, and inspect curator ratings.",
        ];

        // Q7: Director Specific FAQ (GSC: "director {person}", "{person} director", "{person} directed movies", "director {person} movies list", "aavesham director")
        if ($directing->isNotEmpty() || $person->known_for_department === 'Directing') {
            $directedTitles = $directing->map(fn($c) => $c->creditable?->title)->filter()->unique()->take(4)->implode(', ');
            $industryName = $person->isIndian() ? "Indian cinema" : "international cinema";

            $faqs[] = [
                'question' => "What movies has director {$person->name} directed? (Director {$person->name} Movies List & Directorial Career)",
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
