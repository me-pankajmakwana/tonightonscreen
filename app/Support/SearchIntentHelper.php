<?php

namespace App\Support;

class SearchIntentHelper
{
    /**
     * Parse natural language search queries based on target movie and people pattern keywords.
     * Extracts search intent, anchor link, visual badge label, whether query targets a person, and the clean name.
     *
     * 1. Movie Patterns:
     * A. Movie Information: {movie_name} movie/film, release date, runtime, genre, characters
     * B. Cast & Actors: cast of {X}, {X} cast/actors, who stars in {X}, character names
     * C. Budget & Box Office: {X} budget, collection, budget and collection, hit or flop
     * D. OTT & Streaming: where to watch {X}, {X} OTT, {X} on Netflix
     * E. Director & Crew: who directed {X}, {X} director/producer/writer
     * F. Discovery & Recommendations: best {genre} movies, top {genre} movies
     *
     * 2. People Patterns:
     * A. Person Information: {person} biography, who is {person}, {person} details/age/height/date of birth/birthplace/native place
     * B. Actor & Actress: actor {person}, {person} actor/actress, movies, tv shows, filmography, debut movie, first movie, achievements, total movies count
     * C. Director: director {person}, {person} director, directed movies, assistant director, which industry director
     * D. Producer: {person} producer, production company, debut, first movie, filmography
     */
    public static function parse(string $raw): array
    {
        $q = trim($raw);
        $intent = 'general';
        $intentLabel = null;
        $anchor = null;
        $clean = $q;
        $isPerson = false;

        // ── Discovery / Trending / Streaming shortcuts (return early) ──────────

        // "trending movies right now", "trending movies and shows", "what's trending"
        if (preg_match('/trending\s+(?:movies|shows|series|tv)/i', $q)) {
            return [
                'intent'       => 'discovery_trending',
                'intent_label' => 'Trending Right Now',
                'subject'      => 'trending',
                'anchor'       => null,
                'is_genre'     => false,
                'is_person'    => false,
            ];
        }

        // "best movies on netflix", "netflix listings", "netflix catalogue", "movies on prime"
        if (preg_match('/^(?:best\s+movies\s+on|movies\s+on|(.+?)\s+(?:listings|catalogue|catalog))$/i', $q)) {
            return [
                'intent'       => 'streaming_platform',
                'intent_label' => 'Platform Catalogue',
                'subject'      => $q,
                'anchor'       => null,
                'is_genre'     => false,
                'is_person'    => false,
            ];
        }

        // F. Discovery / Recommendations ("best {genre} movies", "top {genre} movies", "{genre} movies on demand", "{genre} on demand")
        if (preg_match('/^(?:best|top|nice|new)\s+(?:new\s+)?([a-z0-9\-]+)\s+(?:movies|films)/i', $q, $m)) {
            $genreName = ucfirst(trim($m[1]));
            return [
                'intent'       => 'genre',
                'intent_label' => "Best {$genreName} Movies",
                'subject'      => trim($m[1]),
                'anchor'       => null,
                'is_genre'     => true,
                'is_person'    => false,
            ];
        }
        if (preg_match('/^([a-z0-9\-]+)\s+(?:movies\s+on\s+demand|on\s+demand|streaming|to\s+stream)$/i', $q, $m)) {
            return [
                'intent'       => 'genre',
                'intent_label' => ucfirst($m[1]) . ' Movies On Demand',
                'subject'      => trim($m[1]),
                'anchor'       => null,
                'is_genre'     => true,
                'is_person'    => false,
            ];
        }

        // ── People Prefix patterns ─────────────────────────────────────────────

        // 2A. Who is {person}
        if (preg_match('/^(?:who\s+is)\s+(.+)$/i', $q, $m)) {
            $intent = 'person_bio';
            $intentLabel = 'Biography & Overview';
            $anchor = '#bio';
            $clean = $m[1];
            $isPerson = true;
        }
        // "what is {show/movie} about" — title intent (before person prefixes)
        elseif (preg_match('/^(?:what\s+is)\s+(.+?)\s+(?:about|show\s+about|movie\s+about|film\s+about)$/i', $q, $m)) {
            $intent = 'title_about';
            $intentLabel = 'Plot & What It\'s About';
            $anchor = '#faqs';
            $clean = $m[1];
        }
        // 2B/C/D. People Prefixes
        elseif (preg_match('/^(?:actor|actress)\s+(.+)$/i', $q, $m)) {
            $intent = 'person_actor';
            $intentLabel = 'Actor Portfolio';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(?:director)\s+(.+)$/i', $q, $m)) {
            $intent = 'person_director';
            $intentLabel = 'Director Profile';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(?:producer)\s+(.+)$/i', $q, $m)) {
            $intent = 'person_producer';
            $intentLabel = 'Producer Profile';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        }
        // 1B. Cast & Actors (Movie: "cast of {X}", "who stars in {X}")
        elseif (preg_match('/^(?:cast\s+of|actors\s+in|who\s+stars\s+in|who\s+was\s+in)\s+(.+)$/i', $q, $m)) {
            $intent = 'cast';
            $intentLabel = 'Cast & Characters';
            $anchor = '#cast';
            $clean = $m[1];
        }
        // 1D. OTT ("where to watch {X}", "how to watch {X}", "how to stream {X}")
        elseif (preg_match('/^(?:where\s+to\s+watch|how\s+to\s+watch|how\s+to\s+stream)\s+(.+)$/i', $q, $m)) {
            $intent = 'streaming';
            $intentLabel = 'Where to Watch OTT';
            $anchor = '#where-to-watch';
            $clean = $m[1];
        }
        // 1E. Director of Movie ("who directed {X}", "director of {X}")
        elseif (preg_match('/^(?:who\s+directed|director\s+of)\s+(.+)$/i', $q, $m)) {
            $intent = 'director';
            $intentLabel = 'Director & Crew';
            $anchor = '#crew';
            $clean = $m[1];
        }
        // ── People Suffix patterns ─────────────────────────────────────────────

        // 2A. Biography, details, age, height, dob, birthplace
        elseif (preg_match('/^(.+?)\s+(?:biography|bio)$/i', $q, $m)) {
            $intent = 'person_bio';
            $intentLabel = 'Biography';
            $anchor = '#bio';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:details)$/i', $q, $m)) {
            $intent = 'person_info';
            $intentLabel = 'Profile & Facts';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:age)$/i', $q, $m)) {
            $intent = 'person_age';
            $intentLabel = 'Age & DOB';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:height)$/i', $q, $m)) {
            $intent = 'person_height';
            $intentLabel = 'Height & Details';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:date\s+of\s+birth|birthday|dob)$/i', $q, $m)) {
            $intent = 'person_dob';
            $intentLabel = 'Date of Birth';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:birthplace|native\s+place|birth\s+place|born\s+place)$/i', $q, $m)) {
            $intent = 'person_birthplace';
            $intentLabel = 'Birthplace & Origin';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // NEW: Ethnicity / Background / Nationality ("{person} ethnicity", "{person} ethnicity and race")
        elseif (preg_match('/^(.+?)\s+(?:ethnicity(?:\s+and\s+race)?|cultural\s+background|nationality|background)$/i', $q, $m)) {
            $intent = 'person_ethnicity';
            $intentLabel = 'Ethnicity & Background';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B/C/D. Debut / First movie
        elseif (preg_match('/^(.+?)\s+(?:debut\s+movie|first\s+movie|debut)$/i', $q, $m)) {
            $intent = 'person_debut';
            $intentLabel = 'Debut Movie';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // NEW: First hit movie / breakthrough role
        elseif (preg_match('/^(.+?)\s+(?:first\s+hit\s+movie|first\s+hit|breakthrough\s+role)$/i', $q, $m)) {
            $intent = 'person_first_hit';
            $intentLabel = 'First Hit Movie';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // NEW: Career history / acting career
        elseif (preg_match('/^(.+?)\s+(?:acting\s+career|career\s+history|career)$/i', $q, $m)) {
            $intent = 'person_career';
            $intentLabel = 'Career History';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B. Achievements / Awards
        elseif (preg_match('/^(.+?)\s+(?:achievements|awards)$/i', $q, $m)) {
            $intent = 'person_achievements';
            $intentLabel = 'Achievements & Awards';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B. Total movies count
        elseif (preg_match('/^(.+?)\s+(?:total\s+movies\s+count|total\s+movies|movie\s+count)$/i', $q, $m)) {
            $intent = 'person_count';
            $intentLabel = 'Total Movies Count';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B/C/D. Filmography / Movies and TV Shows
        elseif (preg_match('/^(.+?)\s+(?:filmography)$/i', $q, $m)) {
            $intent = 'person_filmography';
            $intentLabel = 'Complete Filmography';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:movies\s+and\s+tv\s+shows|movies\s+and\s+shows)$/i', $q, $m)) {
            $intent = 'person_movies_shows';
            $intentLabel = 'Movies & TV Shows';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:tv\s+shows|web\s+series|shows)$/i', $q, $m)) {
            $intent = 'person_series';
            $intentLabel = 'TV Shows';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2C. Director specific
        elseif (preg_match('/^(.+?)\s+(?:directed\s+movies|directorial\s+movies)$/i', $q, $m)) {
            $intent = 'person_directed_movies';
            $intentLabel = 'Directed Movies';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:assistant\s+director)$/i', $q, $m)) {
            $intent = 'person_assistant_director';
            $intentLabel = 'Assistant Director';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:which\s+industry\s+director|director\s+industry)$/i', $q, $m)) {
            $intent = 'person_industry';
            $intentLabel = 'Director Industry';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2D. Production company
        elseif (preg_match('/^(.+?)\s+(?:production\s+company|production\s+house|banner)$/i', $q, $m)) {
            $intent = 'person_production_company';
            $intentLabel = 'Production Company';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // Suffix: "{person} actor/actress/director/producer"
        elseif (preg_match('/^(.+?)\s+(?:actor|actress)$/i', $q, $m)) {
            $intent = 'person_actor';
            $intentLabel = 'Actor Profile';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:director)$/i', $q, $m)) {
            $intent = 'director';
            $intentLabel = 'Director';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:producer)$/i', $q, $m)) {
            $intent = 'producer';
            $intentLabel = 'Producer';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        }
        // "{person} movies" / "{person} films"
        elseif (preg_match('/^(.+?)\s+(?:movies|films)$/i', $q, $m)) {
            $intent = 'person_movies';
            $intentLabel = 'Filmography & Movies';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        }

        // ── Movie / Title patterns ─────────────────────────────────────────────

        // 1B. Cast & Characters ("{X} cast", "{X} actors", "{X} characters")
        elseif (preg_match('/^(.+?)\s+(?:cast\s+list|character\s+names|movie\s+actors|film\s+cast\s+list|cast|actors|characters)$/i', $q, $m)) {
            $intent = 'cast';
            $intentLabel = 'Cast & Characters';
            $anchor = '#cast';
            $clean = $m[1];
        }
        // NEW: "{movie} plot" / "{movie} synopsis" / "{movie} storyline"
        elseif (preg_match('/^(.+?)\s+(?:plot|synopsis|storyline|story)$/i', $q, $m)) {
            $intent = 'title_plot';
            $intentLabel = 'Plot & Storyline';
            $anchor = '#faqs';
            $clean = $m[1];
        }
        // NEW: "{movie} rating" / "{movie} age rating" / "{movie} imdb rating"
        elseif (preg_match('/^(.+?)\s+(?:age\s+rating|content\s+rating|imdb\s+rating|ott\s+rating|rating)$/i', $q, $m)) {
            $intent = 'title_rating';
            $intentLabel = 'Rating & Classification';
            $anchor = '#faqs';
            $clean = $m[1];
        }
        // NEW: "is {movie} worth watching" / "should i watch {movie}"
        elseif (preg_match('/^(?:is\s+(.+?)\s+worth\s+watching|should\s+i\s+watch\s+(.+?))$/i', $q, $m)) {
            $intent = 'title_recommendation';
            $intentLabel = 'Worth Watching?';
            $anchor = '#faqs';
            $clean = $m[1] ?: $m[2];
        }
        // NEW: "{movie} sequel" / "{movie} franchise" / "{movie} franchise order"
        elseif (preg_match('/^(.+?)\s+(?:sequel|franchise|franchise\s+order|part\s+\d+|viewing\s+order)$/i', $q, $m)) {
            $intent = 'title_sequel';
            $intentLabel = 'Sequel & Franchise Order';
            $anchor = '#faqs';
            $clean = $m[1];
        }
        // NEW: "{movie} meaning" / "{movie} title meaning"
        elseif (preg_match('/^(.+?)\s+(?:meaning|title\s+meaning|name\s+meaning)$/i', $q, $m)) {
            $intent = 'title_meaning';
            $intentLabel = 'Title Meaning';
            $anchor = '#faqs';
            $clean = $m[1];
        }
        // 1C. Budget & Box Office
        elseif (preg_match('/^(.+?)\s+(?:budget\s+and\s+collection|box\s+office\s+collection|worldwide\s+collection|production\s+budget|hit\s+or\s+flop|budget|collection)$/i', $q, $m)) {
            $intent = 'box_office';
            $intentLabel = 'Budget & Collection';
            $anchor = '#budget-collection';
            $clean = $m[1];
        }
        // 1D. OTT & Streaming ("{X} OTT", "{X} on Netflix")
        elseif (preg_match('/^(.+?)\s+(?:ott\s+release\s+date|ott\s+platform|ott|on\s+netflix)$/i', $q, $m)) {
            $intent = 'streaming';
            $intentLabel = 'Where to Watch OTT';
            $anchor = '#where-to-watch';
            $clean = $m[1];
        }
        // 1A. Movie Information & Runtime
        elseif (preg_match('/^(?:when\s+did)\s+(.+?)\s+(?:come\s+out)$/i', $q, $m)) {
            $intent = 'release_date';
            $intentLabel = 'Release Date';
            $anchor = '#faqs';
            $clean = $m[1];
        } elseif (preg_match('/^(.+?)\s+(?:release\s+date|runtime|run\s+time|genre)$/i', $q, $m)) {
            $intent = 'info';
            $intentLabel = 'Info & Runtime';
            $anchor = '#faqs';
            $clean = $m[1];
        } elseif (preg_match('/^(.+?)\s+(?:movie|film)$/i', $q, $m)) {
            $clean = $m[1];
        }

        // Clean any remaining standalone noise words
        $clean = preg_replace('/\b(?:movie|film)\b/i', '', $clean);
        $clean = trim($clean, " \t\n\r\0\x0B:?");

        return [
            'intent'       => $intent,
            'intent_label' => $intentLabel,
            'subject'      => $clean ?: $q,
            'anchor'       => $anchor,
            'is_genre'     => false,
            'is_person'    => $isPerson,
        ];
    }
}


