<?php

namespace App\Enums;

enum WatchProviderType: string
{
    case SUBSCRIPTION = 'subscription';
    case RENT = 'rent';
    case BUY = 'buy';
    case FREE = 'free';
    case CINEMA = 'cinema';

    public function label(): string
    {
        return match ($this) {
            self::SUBSCRIPTION => 'Streaming (Subscription)',
            self::RENT => 'Rent',
            self::BUY => 'Buy',
            self::FREE => 'Free',
            self::CINEMA => 'Theatrical / Cinema',
        };
    }
}
