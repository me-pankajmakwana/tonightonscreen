<?php

namespace App\Filament\Widgets;

use App\Enums\TitleType;
use App\Models\Episode;
use App\Models\Person;
use App\Models\Season;
use App\Models\StreamingPlatform;
use App\Models\Title;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EntertainmentStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalTitles = Title::count();
        $movieCount = Title::where('type', TitleType::MOVIE)->count();
        $seriesCount = Title::where('type', TitleType::TV_SERIES)->count();

        $totalTalents = Person::count();
        $actorsCount = Person::where('known_for_department', 'Acting')->count();
        $directorsCount = Person::where('known_for_department', 'Directing')->count();

        $totalSeasons = Season::count();
        $totalEpisodes = Episode::count();

        $activePlatforms = StreamingPlatform::where('is_active', true)->count();
        $featuredCount = Title::where('is_featured', true)->count();

        return [
            Stat::make('Catalog Titles', $totalTitles)
                ->description("{$movieCount} Movies • {$seriesCount} Web Series")
                ->descriptionIcon('heroicon-m-film')
                ->chart([$movieCount, $seriesCount, $totalTitles])
                ->color('amber'),

            Stat::make('Industry Talents', $totalTalents)
                ->description("{$actorsCount} Actors • {$directorsCount} Directors")
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([$actorsCount, $directorsCount, $totalTalents])
                ->color('success'),

            Stat::make('Episodes Cataloged', $totalEpisodes)
                ->description("Across {$totalSeasons} Series Seasons")
                ->descriptionIcon('heroicon-m-queue-list')
                ->chart([$totalSeasons, $totalEpisodes])
                ->color('info'),

            Stat::make('OTT Platforms', $activePlatforms)
                ->description("{$featuredCount} Featured Spotlight Titles")
                ->descriptionIcon('heroicon-m-tv')
                ->color('warning'),
        ];
    }
}
