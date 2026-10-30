<?php

namespace App\Filament\Resources\Titles\Tables;

use App\Enums\ReleaseStatus;
use App\Enums\TitleType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TitlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster_path')
                    ->label('Poster')
                    ->disk('public')
                    ->height(65)
                    ->width(45),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->release_year ? "({$record->release_year})" . ($record->formatted_runtime ? " • {$record->formatted_runtime}" : '') : null),

                TextColumn::make('type')
                    ->label('Format')
                    ->badge()
                    ->color(fn ($state): string => match ($state instanceof TitleType ? $state->value : $state) {
                        'movie' => 'info',
                        'tv_series' => 'success',
                        'documentary' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => $state instanceof TitleType ? $state->label() : ucfirst((string) $state))
                    ->sortable(),

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
                        'canceled' => 'danger',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn ($state) => $state instanceof ReleaseStatus ? $state->label() : ucfirst((string) $state))
                    ->sortable(),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(fn ($state) => "★ {$state}")
                    ->sortable(),

                TextColumn::make('content_rating')
                    ->label('Cert.')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_trending')
                    ->label('Trending')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('release_date')
                    ->label('Release Date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status'),

                SelectFilter::make('type')
                    ->options(collect(TitleType::cases())->mapWithKeys(fn ($type) => [$type->value => $type->label()])),

                SelectFilter::make('status')
                    ->options(collect(ReleaseStatus::cases())->mapWithKeys(fn ($status) => [$status->value => $status->label()])),

                SelectFilter::make('genres')
                    ->relationship('genres', 'name')
                    ->preload(),

                TernaryFilter::make('is_featured')
                    ->label('Featured Only'),

                TernaryFilter::make('is_trending')
                    ->label('Trending Only'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
