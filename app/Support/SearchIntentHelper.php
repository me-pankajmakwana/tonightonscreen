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

        // F. Discovery / Recommendations ("best {genre} movies", "top {genre} movies", "best new {genre} films")
        if (preg_match('/^(?:best|top|nice|new)\s+(?:new\s+)?([a-z0-9\-]+)\s+(?:movies|films)/i', $q, $m)) {
            $genreName = ucfirst(trim($m[1]));
            return [
                'intent' => 'genre',
                'intent_label' => "Best {$genreName} Movies",
                'subject' => trim($m[1]),
                'anchor' => null,
                'is_genre' => true,
                'is_person' => false,
            ];
        }

        // 2A. People: Who is {person_name}
        if (preg_match('/^(?:who\s+is)\s+(.+)$/i', $q, $m)) {
            $intent = 'person_bio';
            $intentLabel = 'Biography & Overview';
            $anchor = '#bio';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B/C/D. People Prefixes: "actor {person}", "actress {person}", "director {person}", "producer {person}"
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
        // 1B. Cast & Actors (Movie pattern: "cast of {X}", "who stars in {X}", "who was in {X}", "actors in {X}")
        elseif (preg_match('/^(?:cast\s+of|actors\s+in|who\s+stars\s+in|who\s+was\s+in)\s+(.+)$/i', $q, $m)) {
            $intent = 'cast';
            $intentLabel = 'Cast & Characters';
            $anchor = '#cast';
            $clean = $m[1];
        }
        // 1D. OTT & Streaming ("where to watch {X}")
        elseif (preg_match('/^(?:where\s+to\s+watch)\s+(.+)$/i', $q, $m)) {
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
        // 2A. People: Biography, details, age, height, dob, birthplace, native place
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
        // 2B/C/D. People: Debut / First movie / Debut
        elseif (preg_match('/^(.+?)\s+(?:debut\s+movie|first\s+movie|debut)$/i', $q, $m)) {
            $intent = 'person_debut';
            $intentLabel = 'Debut Movie';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B. People: Achievements / Awards
        elseif (preg_match('/^(.+?)\s+(?:achievements|awards)$/i', $q, $m)) {
            $intent = 'person_achievements';
            $intentLabel = 'Achievements & Awards';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B. People: Total movies count
        elseif (preg_match('/^(.+?)\s+(?:total\s+movies\s+count|total\s+movies|movie\s+count)$/i', $q, $m)) {
            $intent = 'person_count';
            $intentLabel = 'Total Movies Count';
            $anchor = '#fast-facts';
            $clean = $m[1];
            $isPerson = true;
        }
        // 2B/C/D. People: Filmography / Movies and TV Shows
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
        // 2C. Director specific patterns
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
        // 2D. Producer specific: Production company
        elseif (preg_match('/^(.+?)\s+(?:production\s+company|production\s+house|banner)$/i', $q, $m)) {
            $intent = 'person_production_company';
            $intentLabel = 'Production Company';
            $anchor = '#faqs';
            $clean = $m[1];
            $isPerson = true;
        }
        // Suffix: "{person} actor", "{person} actress", "{person} director", "{person} producer"
        elseif (preg_match('/^(.+?)\s+(?:actor|actress)$/i', $q, $m)) {
            $intent = 'person_actor';
            $intentLabel = 'Actor Profile';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        } elseif (preg_match('/^(.+?)\s+(?:director)$/i', $q, $m)) {
            // Can be "{person} director" or "{movie} director"
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
        // "{person_name} movies" or "{person_name} films" (plural - filmography)
        elseif (preg_match('/^(.+?)\s+(?:movies|films)$/i', $q, $m)) {
            $intent = 'person_movies';
            $intentLabel = 'Filmography & Movies';
            $anchor = '#filmography';
            $clean = $m[1];
            $isPerson = true;
        }
        // 1B. Cast & Characters (movie: "{X} cast", "{X} actors", "{X} characters")
        elseif (preg_match('/^(.+?)\s+(?:cast\s+list|character\s+names|movie\s+actors|film\s+cast\s+list|cast|actors|characters)$/i', $q, $m)) {
            $intent = 'cast';
            $intentLabel = 'Cast & Characters';
            $anchor = '#cast';
            $clean = $m[1];
        }
        // 1C. Budget & Box Office ("{X} budget and collection", "{X} box office collection", "{X} hit or flop")
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
        // 1A. Movie Information & Runtime ("when did {X} come out", "{X} runtime", "{X} release date")
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

        // Clean any remaining standalone noise words like "movie" or "film"
        $clean = preg_replace('/\b(?:movie|film)\b/i', '', $clean);
        $clean = trim($clean, " \t\n\r\0\x0B:?");

        return [
            'intent' => $intent,
            'intent_label' => $intentLabel,
            'subject' => $clean ?: $q,
            'anchor' => $anchor,
            'is_genre' => false,
            'is_person' => $isPerson,
        ];
    }
}

