<?php

namespace App\Filament\Resources\People\Tables;

use App\Enums\Department;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PeopleTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo_path')
                    ->label('Photo')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('https://ui-avatars.com/api/?background=3b82f6&color=fff&name=Artist')),

                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->stage_name ? "aka {$record->stage_name}" : null),

                TextColumn::make('known_for_department')
                    ->label('Primary Role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Acting' => 'success',
                        'Directing' => 'warning',
                        'Writing' => 'info',
                        'Production' => 'danger',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('birth_date')
                    ->label('Birth Date / Age')
                    ->date()
                    ->sortable()
                    ->description(fn ($record) => $record->age ? "{$record->age} years old" : null),

                TextColumn::make('birth_place')
                    ->label('Origin')
                    ->limit(25)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        default => 'danger',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status'),

                SelectFilter::make('known_for_department')
                    ->label('Department')
                    ->options(collect(Department::cases())->mapWithKeys(fn ($dept) => [$dept->value => $dept->label()])),

                SelectFilter::make('gender')
                    ->options([
                        'Female' => 'Female',
                        'Male' => 'Male',
                        'Non-Binary' => 'Non-Binary',
                    ]),

                TernaryFilter::make('is_featured')
                    ->label('Featured Talent'),
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
