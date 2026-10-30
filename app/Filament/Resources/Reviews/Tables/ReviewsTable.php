<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title.title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->title?->release_year ? "({$record->title->release_year})" : null),

                TextColumn::make('rating')
                    ->label('Score')
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state >= 8 => 'success',
                        $state >= 6 => 'warning',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn ($state) => "★ {$state}/10")
                    ->sortable(),

                TextColumn::make('headline')
                    ->label('Headline')
                    ->searchable()
                    ->limit(45)
                    ->weight('semibold')
                    ->description(fn ($record) => substr($record->content, 0, 75) . '...'),

                TextColumn::make('author_name')
                    ->label('Author')
                    ->searchable()
                    ->description(fn ($record) => $record->user_id ? 'Registered User' : 'Guest'),

                IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('contains_spoilers')
                    ->label('Spoilers')
                    ->boolean()
                    ->color(fn ($state) => $state ? 'warning' : 'gray'),

                TextColumn::make('helpful_votes')
                    ->label('Helpful')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Approval Status'),
                TernaryFilter::make('contains_spoilers')
                    ->label('Contains Spoilers'),
                SelectFilter::make('rating')
                    ->label('Rating Score')
                    ->options([
                        '10' => '10 - Masterpiece',
                        '9' => '9 - Outstanding',
                        '8' => '8 - Great',
                        '7' => '7 - Good',
                        '6' => '6 - Decent',
                        '5' => '5 - Average',
                        '4' => '4 - Mediocre',
                    ]),
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
