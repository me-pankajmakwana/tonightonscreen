<?php

namespace App\Filament\Widgets;

use App\Enums\ReleaseStatus;
use App\Enums\TitleType;
use App\Filament\Resources\Titles\TitleResource;
use App\Models\Title;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestTitlesWidget extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Recently Cataloged Movies & Series';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Title::query()->latest())
            ->columns([
                ImageColumn::make('poster_path')
                    ->label('Poster')
                    ->disk('public')
                    ->height(55)
                    ->width(38),

                TextColumn::make('title')
                    ->label('Title')
                    ->weight('bold')
                    ->description(fn ($record) => $record->release_year ? "({$record->release_year})" . ($record->formatted_runtime ? " • {$record->formatted_runtime}" : '') : null),

                TextColumn::make('type')
                    ->label('Format')
                    ->badge()
                    ->color(fn ($state): string => match ($state instanceof TitleType ? $state->value : $state) {
                        'movie' => 'info',
                        'tv_series' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => $state instanceof TitleType ? $state->label() : ucfirst((string) $state)),

                TextColumn::make('genres.name')
                    ->label('Genres')
                    ->badge()
                    ->color('gray')
                    ->limitList(2),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state): string => match ($state instanceof ReleaseStatus ? $state->value : $state) {
                        'released' => 'success',
                        'in_production', 'post_production' => 'warning',
                        'ended' => 'gray',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn ($state) => $state instanceof ReleaseStatus ? $state->label() : ucfirst((string) $state)),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(fn ($state) => "★ {$state}"),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                IconColumn::make('is_trending')
                    ->label('Trending')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Added')
                    ->since(),
            ])
            ->recordActions([
                EditAction::make()
                    ->url(fn (Title $record): string => TitleResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
