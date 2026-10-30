<?php

namespace App\Enums;

enum ReleaseStatus: string
{
    case ANNOUNCED = 'announced';
    case IN_PRODUCTION = 'in_production';
    case POST_PRODUCTION = 'post_production';
    case RELEASED = 'released';
    case RETURNING_SERIES = 'returning_series';
    case ENDED = 'ended';
    case CANCELED = 'canceled';

    public function label(): string
    {
        return match ($this) {
            self::ANNOUNCED => 'Announced',
            self::IN_PRODUCTION => 'In Production',
            self::POST_PRODUCTION => 'Post Production',
            self::RELEASED => 'Released',
            self::RETURNING_SERIES => 'Returning Series (Ongoing)',
            self::ENDED => 'Ended',
            self::CANCELED => 'Canceled',
        };
    }
}
