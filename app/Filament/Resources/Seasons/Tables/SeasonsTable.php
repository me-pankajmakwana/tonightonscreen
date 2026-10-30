<?php

namespace App\Filament\Resources\Seasons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SeasonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster_path')
                    ->label('Poster')
                    ->disk('public')
                    ->height(60)
                    ->width(40),

                TextColumn::make('title.title')
                    ->label('Web Series')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('season_number')
                    ->label('Season')
                    ->formatStateUsing(fn ($state) => "Season {$state}")
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Season Title')
                    ->searchable(),

                TextColumn::make('episodes_count')
                    ->counts('episodes')
                    ->label('Episodes')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('air_date')
                    ->label('Air Date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('title_id')
                    ->relationship('title', 'title')
                    ->label('Filter by Web Series')
                    ->searchable()
                    ->preload(),
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
