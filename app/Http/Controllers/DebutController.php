<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DebutController extends Controller
{
    /**
     * Display the First Movies & Debuts Hub for Actors and Directors.
     */
    public function index(Request $request): View
    {
        $role = (string) $request->input('role', 'all'); // all, actor, director
        $region = (string) $request->input('region', 'all'); // all, indian, international

        $peopleQuery = Person::query()
            ->where('is_active', true)
            ->where('status', 'active')
            ->whereHas('credits.creditable');

        if ($role === 'actor') {
            $peopleQuery->where('known_for_department', 'Acting');
        } elseif ($role === 'director') {
            $peopleQuery->where('known_for_department', 'Directing');
        }

        if ($region === 'indian') {
            $peopleQuery->where(function ($q) {
                $q->where('nationality', 'like', '%India%')
                  ->orWhere('birth_place', 'like', '%India%')
                  ->orWhere('hometown', 'like', '%India%');
            });
        } elseif ($region === 'international') {
            $peopleQuery->where(function ($q) {
                $q->where('nationality', 'not like', '%India%')
                  ->orWhereNull('nationality');
            });
        }

        $people = $peopleQuery->with(['credits.creditable'])
            ->orderBy('name')
            ->paginate(24)
            ->withQueryString();

        // Process debut details for each person
        $debutList = $people->through(function (Person $person) {
            $allCredits = $person->credits
                ->filter(fn($c) => $c->creditable && $c->creditable->release_date)
                ->sortBy(fn($c) => $c->creditable->release_date);

            $debutCredit = $allCredits->first();
            $debutTitle = $debutCredit?->creditable;

            $debutYear = $debutTitle?->release_date?->format('Y');
            $debutAge = null;
            if ($person->birth_date && $debutTitle?->release_date) {
                $debutAge = (int) $person->birth_date->diffInYears($debutTitle->release_date);
            }

            return (object) [
                'person' => $person,
                'debut_title' => $debutTitle,
                'debut_year' => $debutYear,
                'debut_age' => $debutAge,
                'role_text' => $debutCredit?->character_name ?: ($debutCredit?->job ?: $person->known_for_department),
            ];
        });

        // Schema.org Structured Data
        $debutSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'First Movies & Career Debuts of Cinema Stars & Directors',
            'description' => 'Official debut films, first movie release years, breakout roles, and career launch timelines of legendary actors and directors.',
            'url' => route('first-movies'),
            'numberOfItems' => $people->total(),
            'itemListElement' => $people->take(10)->map(fn($p, $idx) => [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'url' => route('person.show', $p->slug) . '#faq',
                'name' => "{$p->name} First Movie (Debut)",
            ])->values()->all(),
        ];

        $seoTitle = "First Movies & Career Debuts — Where Top Cinema Stars Started";
        $seoDescription = "Discover the official first movie (debut film) of your favorite actors and visionary directors. Explore their first release year, age at debut, and breakout roles.";
        $seoKeywords = [
            'first movie',
            'debut movie',
            'first film of actors',
            'what was first movie',
            'actor first movie name',
            'director debut film',
            'celebrity first movie',
            'first movie release date',
        ];

        return view('hubs.first-movies', [
            'debutList' => $debutList,
            'people' => $people,
            'role' => $role,
            'region' => $region,
            'debutSchema' => $debutSchema,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'seoKeywords' => $seoKeywords,
        ]);
    }
}

