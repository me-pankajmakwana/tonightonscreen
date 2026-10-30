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
        $titles = Title::query()
            ->where(function ($query) use ($subject, $sanitized) {
                $query->where('title', 'like', "%{$subject}%")
                    ->orWhere('title', 'like', "%{$sanitized}%")
                    ->orWhere('tagline', 'like', "%{$subject}%");
            })
            ->select(['id', 'title', 'slug', 'type', 'poster_path', 'release_date', 'rating'])
            ->orderByDesc('rating')
            ->take($titleLimit)
            ->get()
            ->map(function ($t) use ($anchor, $intentLabel, $parsedIntent, $isPersonQuery) {
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
        $people = Person::query()
            ->where('name', 'like', "%{$subject}%")
            ->orWhere('name', 'like', "%{$sanitized}%")
            ->select(['id', 'name', 'slug', 'known_for_department', 'gender', 'photo_path'])
            ->take($peopleLimit)
            ->get()
            ->map(function ($p) use ($anchor, $intentLabel, $isPersonQuery) {
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

        // 3. Matching Studios / Production Companies
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
            'discovery' => $discovery,
            'titles' => $titles,
            'people' => $people,
            'companies' => $companies,
            'total' => count($discovery) + $titles->count() + $people->count() + $companies->count(),
        ]);
    }
}
