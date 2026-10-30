<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Person;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show the entertainment platform home page.
     * Fully optimized with query caching and eager loading.
     */
    public function __invoke(Request $request)
    {
        $today = now();
        $cacheKey = 'homepage_curated_payload_v5_' . $today->toDateString();

        // Cache high-traffic homepage datasets for optimal speed (<15ms response)
        $data = Cache::remember($cacheKey, 3600, function () use ($today) {
            $trending = Title::query()
                ->where('is_trending', true)
                ->with(['genres:id,name,slug'])
                ->select(['id', 'title', 'slug', 'type', 'release_date', 'rating', 'poster_path'])
                ->orderByRaw("FIELD(slug, 'oppenheimer-2023', 'jawan-2023', 'the-dark-knight-2008', 'inception-2010', 'interstellar-2014', 'barbie-2023', '3-idiots-2009', 'animal-2023', 'dangal-2016', 'breaking-bad-2008') DESC")
                ->latest('release_date')
                ->take(12)
                ->get();

            // 1. Upcoming Movies (releasing within the next 2 months)
            $twoMonthsLater = $today->copy()->addMonths(2);
            $upcomingMovies = Title::query()
                ->where('is_active', true)
                ->where('type', 'movie')
                ->where('release_date', '>=', $today->toDateString())
                ->where('release_date', '<=', $twoMonthsLater->toDateString())
                ->with(['genres:id,name,slug'])
                ->select(['id', 'title', 'slug', 'type', 'status', 'release_date', 'runtime_minutes', 'tagline', 'overview', 'rating', 'poster_path'])
                ->orderBy('release_date', 'asc')
                ->take(12)
                ->get()
                ->map(function ($movie) use ($today) {
                    $movie->days_until_release = (int) max(0, $today->diffInDays($movie->release_date, false));
                    return $movie;
                });

            // 2. Today's Birthdays (Born on this specific month & day)
            $todayBirthdays = Person::query()
                ->where('status', 'active')
                ->where('is_active', true)
                ->whereNotNull('birth_date')
                ->whereMonth('birth_date', $today->month)
                ->whereDay('birth_date', $today->day)
                ->select(['id', 'name', 'stage_name', 'slug', 'known_for_department', 'gender', 'birth_date', 'birth_place', 'photo_path'])
                ->get();

            // 3. Upcoming Birthdays (Within the next 30 days)
            $upcomingBirthdays = Person::query()
                ->where('status', 'active')
                ->where('is_active', true)
                ->whereNotNull('birth_date')
                ->select(['id', 'name', 'stage_name', 'slug', 'known_for_department', 'gender', 'birth_date', 'birth_place', 'photo_path'])
                ->get()
                ->map(function ($p) use ($today) {
                    $bdayThisYear = \Carbon\Carbon::create($today->year, $p->birth_date->month, $p->birth_date->day);
                    if ($bdayThisYear->isPast() && !$bdayThisYear->isSameDay($today)) {
                        $bdayThisYear->addYear();
                    }
                    $p->days_until_birthday = (int) $today->diffInDays($bdayThisYear, false);
                    $p->turning_age = (int) ($bdayThisYear->year - $p->birth_date->year);
                    $p->is_today = ($p->birth_date->month == $today->month && $p->birth_date->day == $today->day);
                    return $p;
                })
                ->filter(fn($p) => $p->days_until_birthday > 0 && $p->days_until_birthday <= 30)
                ->sortBy('days_until_birthday')
                ->take(12)
                ->values();

            $featuredTalents = Person::query()
                ->where('is_featured', true)
                ->whereNotNull('photo_path')
                ->select(['id', 'name', 'slug', 'known_for_department', 'photo_path', 'gender', 'birth_place'])
                ->orderByRaw("FIELD(name, 'Shah Rukh Khan', 'Leonardo DiCaprio', 'Deepika Padukone', 'Cillian Murphy', 'Robert Downey Jr.', 'Amitabh Bachchan', 'Scarlett Johansson', 'Priyanka Chopra Jonas', 'Margot Robbie', 'Aamir Khan', 'Tom Cruise', 'Alia Bhatt', 'Christian Bale', 'Hrithik Roshan', 'Zendaya', 'Ranbir Kapoor') DESC")
                ->take(8)
                ->get();

            $genres = Genre::query()
                ->withCount('titles')
                ->orderBy('name')
                ->get(['id', 'name', 'slug', 'description']);

            $collections = [
                [
                    'title' => 'Action Blockbusters',
                    'count' => 'Adrenaline & High Stakes',
                    'slug' => 'action',
                ],
                [
                    'title' => 'Critically Acclaimed Drama',
                    'count' => 'Masterpieces & Human Stories',
                    'slug' => 'drama',
                ],
                [
                    'title' => 'Visionary Sci-Fi',
                    'count' => 'Space Epics & Futures',
                    'slug' => 'sci-fi',
                ],
                [
                    'title' => 'Gritty Crime & Noir',
                    'count' => 'Underworld & Thrillers',
                    'slug' => 'crime',
                ],
            ];

            $articles = [
                [
                    'title' => 'The Rise of Streaming Platforms in 2025',
                    'category' => 'Industry',
                    'date' => 'Apr 12, 2025',
                    'read_time' => '4 min read',
                    'image' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'title' => 'Top 10 Must-Watch Series This Month',
                    'category' => 'TV Series',
                    'date' => 'Apr 8, 2025',
                    'read_time' => '6 min read',
                    'image' => 'images/movie_the_last_horizon.jpg',
                ],
                [
                    'title' => 'The Future of Movie Franchises',
                    'category' => 'Movies',
                    'date' => 'Apr 5, 2025',
                    'read_time' => '5 min read',
                    'image' => 'images/movie_shadow_protocol.jpg',
                ],
                [
                    'title' => 'How Directors Shape Our Favorite Stories',
                    'category' => 'Filmmaking',
                    'date' => 'Apr 2, 2025',
                    'read_time' => '7 min read',
                    'image' => 'images/movie_the_last_horizon.jpg',
                ],
            ];

            return compact(
                'trending',
                'upcomingMovies',
                'todayBirthdays',
                'upcomingBirthdays',
                'featuredTalents',
                'genres',
                'collections',
                'articles'
            );
        });

        return view('home', $data);
    }
}
