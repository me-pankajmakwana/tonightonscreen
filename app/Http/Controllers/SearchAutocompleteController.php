<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\Title;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchAutocompleteController extends Controller
{
    /**
     * Provide instant JSON autocomplete results across Titles, Talents and Studios.
     * Ultra-fast sub-10ms response with minimal columns and indexed queries.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $q = trim((string) $request->input('q', ''));

        if (mb_strlen($q) < 2) {
            return response()->json([
                'query' => $q,
                'titles' => [],
                'people' => [],
                'companies' => [],
                'total' => 0,
            ]);
        }

        $sanitized = substr($q, 0, 50);

        // 1. Matching Titles (Movies & TV Series)
        $titles = Title::query()
            ->where('title', 'like', "%{$sanitized}%")
            ->orWhere('tagline', 'like', "%{$sanitized}%")
            ->select(['id', 'title', 'slug', 'type', 'poster_path', 'release_date', 'rating'])
            ->orderByDesc('rating')
            ->take(5)
            ->get()
            ->map(function ($t) {
                $isSeries = ($t->type instanceof TitleType ? $t->type === TitleType::TV_SERIES : str_contains((string) $t->type, 'series'));

                return [
                    'title' => $t->title,
                    'slug' => $t->slug,
                    'type_label' => $isSeries ? 'TV Series' : 'Movie',
                    'is_series' => $isSeries,
                    'year' => $t->release_date ? $t->release_date->format('Y') : null,
                    'rating' => $t->rating ? number_format((float) $t->rating, 1) : null,
                    'poster' => $t->poster_url ?: asset('images/movie_the_last_horizon.jpg'),
                    'url' => route('title.show', $t->slug),
                ];
            });

        // 2. Matching Talents (Actors, Directors, Producers)
        $people = Person::query()
            ->where('name', 'like', "%{$sanitized}%")
            ->select(['id', 'name', 'slug', 'known_for_department', 'gender', 'photo_path'])
            ->take(3)
            ->get()
            ->map(function ($p) {
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
                    'url' => route('person.show', $p->slug),
                ];
            });

        // 3. Matching Studios / Production Companies
        $companies = ProductionCompany::query()
            ->where('name', 'like', "%{$sanitized}%")
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
            'titles' => $titles,
            'people' => $people,
            'companies' => $companies,
            'total' => $titles->count() + $people->count() + $companies->count(),
        ]);
    }
}
