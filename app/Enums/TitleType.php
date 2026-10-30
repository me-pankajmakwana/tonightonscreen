<?php

namespace App\Enums;

enum TitleType: string
{
    case MOVIE = 'movie';
    case TV_SERIES = 'tv_series';
    case DOCUMENTARY = 'documentary';
    case SHORT_FILM = 'short_film';
    case TV_SPECIAL = 'tv_special';

    public function label(): string
    {
        return match ($this) {
            self::MOVIE => 'Movie',
            self::TV_SERIES => 'Web Series / TV Show',
            self::DOCUMENTARY => 'Documentary',
            self::SHORT_FILM => 'Short Film',
            self::TV_SPECIAL => 'TV Special',
        };
    }
}
