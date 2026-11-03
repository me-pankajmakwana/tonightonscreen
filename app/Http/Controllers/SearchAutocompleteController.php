<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\Title;
use App\Support\SearchIntentHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchAutocompleteController extends Controller
{
    /**
     * Provide instant JSON autocomplete results across Titles, Talents, Studios and Intents.
     * Parses natural language patterns (e.g. "cast of X", "who directed X", "where to watch X").
     */
    public function __invoke(Request $request): JsonResponse
    {
        $q = trim((string) $request->input('q', ''));

        if (mb_strlen($q) < 2) {
            return response()->json([
                'query' => $q,
                'intent' => null,
                'discovery' => [],
                'titles' => [],
                'people' => [],
                'companies' => [],
                'total' => 0,
            ]);
        }

        $sanitized = substr($q, 0, 60);
        $parsedIntent = SearchIntentHelper::parse($sanitized);
        $subject = $parsedIntent['subject'] ?: $sanitized;
        $anchor = $parsedIntent['anchor'] ?? '';
        $intentLabel = $parsedIntent['intent_label'] ?? null;

        $discovery = [];

        // Check Pattern F: Genre Discovery ("best adventure movies", "top thriller movies")
        if ($parsedIntent['is_genre'] && !empty($subject)) {
            $matchingGenre = Genre::where('name', 'like', "%{$subject}%")->first();
            if ($matchingGenre) {
                $discovery[] = [
                    'label' => "Explore Best {$matchingGenre->name} Movies & Series",
                    'type' => 'genre',
                    'badge' => 'Curated Guide',
                    'url' => route('genre.show', $matchingGenre->slug),
                ];
            }
        }

        $isPersonQuery = !empty($parsedIntent['is_person']);
        $titleLimit = $isPersonQuery ? 4 : 5;
        $peopleLimit = $isPersonQuery ? 4 : 3;

        // 1. Matching Titles (searching both original query and stripped subject)
        $rawTitles = Title::query()
            ->with(['streamingPlatforms', 'genres'])
            ->where(function ($query) use ($subject, $sanitized) {
                $query->where('title', 'like', "%{$subject}%")
                    ->orWhere('title', 'like', "%{$sanitized}%")
                    ->orWhere('tagline', 'like', "%{$subject}%");
            })
            ->orderByDesc('rating')
            ->take($titleLimit)
            ->get();

        $titles = $rawTitles->map(function ($t) use ($anchor, $intentLabel, $parsedIntent, $isPersonQuery) {
            $isSeries = ($t->type instanceof TitleType ? $t->type === TitleType::TV_SERIES : str_contains((string) $t->type, 'series'));

            return [
                'title' => $t->title,
                'slug' => $t->slug,
                'type_label' => $isSeries ? 'TV Series' : 'Movie',
                'is_series' => $isSeries,
                'year' => $t->release_date ? $t->release_date->format('Y') : null,
                'rating' => $t->rating ? number_format((float) $t->rating, 1) : null,
                'poster' => $t->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                'url' => route('title.show', $t->slug) . ($isPersonQuery ? '' : $anchor),
                'intent' => $parsedIntent['intent'],
                'intent_badge' => $isPersonQuery ? null : $intentLabel,
            ];
        });

        // 2. Matching Talents (Actors, Directors, Producers)
        $rawPeople = Person::query()
            ->where('name', 'like', "%{$subject}%")
            ->orWhere('name', 'like', "%{$sanitized}%")
            ->take($peopleLimit)
            ->get();

        $people = $rawPeople->map(function ($p) use ($anchor, $intentLabel, $isPersonQuery) {
            $roleName = match($p->known_for_department) {
                'Acting' => ($p->gender === 'Female' ? 'Actress' : 'Actor'),
                'Directing' => 'Director',
                'Production' => 'Producer',
                'Writing' => 'Screenwriter',
                default => $p->known_for_department ?: 'Artist',
            };

            return [
                'name' => $p->name,
                'slug' => $p->slug,
                'role' => $roleName,
                'photo' => $p->photo_url ?: null,
                'url' => route('person.show', $p->slug) . ($isPersonQuery ? $anchor : ''),
                'intent_badge' => $isPersonQuery ? $intentLabel : null,
            ];
        });

        // 3. Instant Answer Fact Card (Zero-click knowledge panel)
        $instantCard = $this->buildInstantCard(
            $parsedIntent,
            $isPersonQuery ? $rawPeople->first() : null,
            !$isPersonQuery ? $rawTitles->first() : null
        );

        // 4. Matching Studios / Production Companies
        $companies = ProductionCompany::query()
            ->where('name', 'like', "%{$subject}%")
            ->orWhere('name', 'like', "%{$sanitized}%")
            ->select(['id', 'name', 'slug', 'headquarters'])
            ->take(2)
            ->get()
            ->map(function ($c) {
                return [
                    'name' => $c->name,
                    'slug' => $c->slug,
                    'headquarters' => $c->headquarters,
                    'url' => route('company.show', $c->slug),
                ];
            });

        return response()->json([
            'query' => $sanitized,
            'intent' => $parsedIntent['intent'] !== 'general' ? $parsedIntent : null,
            'is_person' => $isPersonQuery,
            'instant_card' => $instantCard,
            'discovery' => $discovery,
            'titles' => $titles,
            'people' => $people,
            'companies' => $companies,
            'total' => ($instantCard ? 1 : 0) + count($discovery) + $titles->count() + $people->count() + $companies->count(),
        ]);
    }

    /**
     * Build a rich Instant Answer / Fact card when an intent query is detected.
     */
    protected function buildInstantCard(array $parsedIntent, ?Person $person, ?Title $title): ?array
    {
        $intent = $parsedIntent['intent'] ?? 'general';

        if ($intent === 'general') {
            return null;
        }

        // Talent Specific Instant Cards
        if ($person) {
            if ($intent === 'person_age') {
                $age = $person->age;
                $dob = $person->birth_date?->format('F d, Y');
                $place = $person->birth_place ?: $person->hometown;

                return [
                    'type' => 'person_age',
                    'badge' => 'Age & Birthday',
                    'badge_class' => 'bg-amber-500/20 text-amber-300 border-amber-500/40',
                    'title' => "{$person->name}'s Age & Birth Date",
                    'main_stat' => [
                        'value' => $age ? "{$age} Years Old" : ($dob ?: 'Biography'),
                        'label' => 'Current Age',
                    ],
                    'details' => [
                        ['label' => 'Born On', 'value' => $dob ?: 'Date cataloged'],
                        ['label' => 'Hometown / Place', 'value' => $place ?: 'India'],
                    ],
                    'image' => $person->photo_url,
                    'url' => route('person.show', $person->slug) . '#faq',
                    'cta_label' => "Explore {$person->name}'s Bio & FAQs →",
                ];
            }

            if ($intent === 'person_first_movie') {
                $credits = $person->credits()->with('creditable')->get()
                    ->filter(fn($c) => $c->creditable && $c->creditable->release_date)
                    ->sortBy(fn($c) => $c->creditable->release_date);
                $debutCredit = $credits->first();
                $debutTitle = $debutCredit?->creditable;

                return [
                    'type' => 'person_first_movie',
                    'badge' => 'Debut Film',
                    'badge_class' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40',
                    'title' => "{$person->name}'s First Movie (Debut)",
                    'main_stat' => [
                        'value' => $debutTitle ? $debutTitle->title : 'Official Debut',
                        'label' => '1st Movie Name',
                    ],
                    'details' => [
                        ['label' => 'Release Year', 'value' => $debutTitle?->release_date?->format('Y') ?: 'Cataloged'],
                        ['label' => 'Role / Job', 'value' => $debutCredit?->character_name ?: $debutCredit?->job ?: $person->known_for_department ?: 'Actor'],
                    ],
                    'image' => $debutTitle?->poster_url ?: $person->photo_url,
                    'url' => route('person.show', $person->slug) . '#debut',
                    'cta_label' => "Explore Full Career Debut Timeline →",
                ];
            }

            if ($intent === 'person_native_place') {
                $place = $person->hometown ?: $person->birth_place ?: $person->residence;

                return [
                    'type' => 'person_native_place',
                    'badge' => 'Native Place & Origin',
                    'badge_class' => 'bg-sky-500/20 text-sky-300 border-sky-500/40',
                    'title' => "Where is {$person->name} From?",
                    'main_stat' => [
                        'value' => $place ?: 'India',
                        'label' => 'Native Place / Hometown',
                    ],
                    'details' => [
                        ['label' => 'Mother Tongue / Languages', 'value' => $person->languages ?: 'Cataloged'],
                        ['label' => 'Nationality', 'value' => $person->nationality ?: 'Indian'],
                    ],
                    'image' => $person->photo_url,
                    'url' => route('person.show', $person->slug) . '#personal-info',
                    'cta_label' => "View Background & Personal Info →",
                ];
            }

            if ($intent === 'person_total_movies' || $intent === 'person_filmography') {
                $count = $person->credits()->distinct()->count('creditable_id');

                return [
                    'type' => 'person_total_movies',
                    'badge' => 'Filmography Count',
                    'badge_class' => 'bg-purple-500/20 text-purple-300 border-purple-500/40',
                    'title' => "How Many Movies Has {$person->name} Done?",
                    'main_stat' => [
                        'value' => $count > 0 ? "{$count}+ Titles" : 'Full Filmography',
                        'label' => 'Total Movies Acted / Directed',
                    ],
                    'details' => [
                        ['label' => 'Primary Department', 'value' => $person->known_for_department ?: 'Acting'],
                        ['label' => 'Status', 'value' => ucfirst($person->status ?? 'Active')],
                    ],
                    'image' => $person->photo_url,
                    'url' => route('person.show', $person->slug) . '#filmography',
                    'cta_label' => "Browse Complete Filmography Breakdown →",
                ];
            }
        }

        // Title Specific Instant Cards
        if ($title) {
            if ($intent === 'budget_boxoffice' || $intent === 'hit_flop') {
                $budget = $title->formatted_budget;
                $gross = $title->formatted_box_office;
                $verdict = $title->box_office_verdict ?: 'Theatrical Release';

                return [
                    'type' => 'budget_boxoffice',
                    'badge' => $verdict,
                    'badge_class' => $title->box_office_verdict_class,
                    'title' => "{$title->title} Box Office & Budget",
                    'main_stat' => [
                        'value' => $gross ?: ($budget ?: 'Worldwide Collection'),
                        'label' => 'Worldwide Box Office Gross',
                    ],
                    'details' => [
                        ['label' => 'Estimated Budget', 'value' => $budget ?: 'Undisclosed'],
                        ['label' => 'Multiplier / ROI', 'value' => $title->box_office_multiplier ?: 'Official Numbers'],
                    ],
                    'image' => $title->poster_url,
                    'url' => route('title.show', $title->slug) . '#financials',
                    'cta_label' => "View Full Worldwide Box Office Breakdown →",
                ];
            }

            if ($intent === 'ott_release') {
                $platformNames = $title->streamingPlatforms->pluck('name')->join(', ');

                return [
                    'type' => 'ott_release',
                    'badge' => 'Streaming Platform',
                    'badge_class' => 'bg-rose-500/20 text-rose-300 border-rose-500/40',
                    'title' => "{$title->title} OTT Release & Streaming",
                    'main_stat' => [
                        'value' => $platformNames ?: 'OTT Streaming Guide',
                        'label' => 'Where to Watch Online',
                    ],
                    'details' => [
                        ['label' => 'Release Year', 'value' => $title->release_date?->format('Y') ?: 'N/A'],
                        ['label' => 'Rating', 'value' => $title->rating ? "★ " . number_format((float) $title->rating, 1) : 'Cataloged'],
                    ],
                    'image' => $title->poster_url,
                    'url' => route('title.show', $title->slug) . '#where-to-watch',
                    'cta_label' => "Stream {$title->title} Online Right Now →",
                ];
            }

            if ($intent === 'cast') {
                $stars = $title->cast()->with('person')->take(3)->get()->map(fn($c) => $c->person?->name)->filter()->join(', ');

                return [
                    'type' => 'cast',
                    'badge' => 'Star Cast',
                    'badge_class' => 'bg-indigo-500/20 text-indigo-300 border-indigo-500/40',
                    'title' => "Cast of {$title->title}",
                    'main_stat' => [
                        'value' => $stars ?: 'Ensemble Cast',
                        'label' => 'Lead Stars',
                    ],
                    'details' => [
                        ['label' => 'Release Year', 'value' => $title->release_date?->format('Y') ?: 'N/A'],
                        ['label' => 'Director', 'value' => $title->directors->first()?->person?->name ?: 'Acclaimed Director'],
                    ],
                    'image' => $title->poster_url,
                    'url' => route('title.show', $title->slug) . '#cast',
                    'cta_label' => "View Full Cast & Crew Credits →",
                ];
            }
        }

        return null;
    }
}
