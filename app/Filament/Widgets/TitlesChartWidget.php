<?php

namespace App\Filament\Widgets;

use App\Models\Genre;
use Filament\Widgets\ChartWidget;

class TitlesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Catalog Titles by Genre';

    protected static ?int $sort = 2;

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $genres = Genre::withCount('titles')->get();

        $labels = $genres->pluck('name')->toArray();
        $counts = $genres->pluck('titles_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Titles in Genre',
                    'data' => $counts,
                    'backgroundColor' => [
                        '#f59e0b', // amber
                        '#3b82f6', // blue
                        '#10b981', // emerald
                        '#8b5cf6', // purple
                        '#ec4899', // pink
                        '#06b6d4', // cyan
                        '#ef4444', // red
                        '#84cc16', // lime
                    ],
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
