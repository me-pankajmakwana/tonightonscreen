<?php

namespace App\Filament\Resources\Titles\RelationManagers;

use App\Enums\Department;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CreditsRelationManager extends RelationManager
{
    protected static string $relationship = 'credits';

    protected static ?string $title = 'Cast & Crew Credits';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('person_id')
                    ->relationship('person', 'name')
                    ->label('Talent / Artist')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),

                Grid::make(2)
                    ->schema([
                        Select::make('department')
                            ->options(collect(Department::cases())->mapWithKeys(fn ($d) => [$d->value => $d->label()]))
                            ->default(Department::ACTING->value)
                            ->native(false)
                            ->required(),

                        TextInput::make('job')
                            ->label('Role / Job Title')
                            ->placeholder('e.g. Director, Executive Producer, Lead Actor')
                            ->default('Actor')
                            ->required(),
                    ]),

                Grid::make(2)
                    ->schema([
                        TextInput::make('character_name')
                            ->label('Character Name (for Cast)')
                            ->placeholder('e.g. Bruce Wayne / Batman'),

                        TextInput::make('billing_order')
                            ->label('Billing / Credit Order')
                            ->helperText('1 = Top billed star, 2, 3...')
                            ->numeric()
                            ->default(1)
                            ->required(),
                    ]),

                Toggle::make('is_featured')
                    ->label('Feature on Main Poster / Top Billed')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('character_name')
            ->defaultSort('billing_order', 'asc')
            ->columns([
                ImageColumn::make('person.photo_path')
                    ->label('Photo')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('https://ui-avatars.com/api/?background=3b82f6&color=fff&name=Artist')),

                TextColumn::make('person.name')
                    ->label('Talent')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('department')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Acting' => 'success',
                        'Directing' => 'warning',
                        'Writing' => 'info',
                        'Production' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('job')
                    ->label('Credit Role')
                    ->searchable(),

                TextColumn::make('character_name')
                    ->label('Character Played')
                    ->placeholder('-')
                    ->searchable(),

                TextColumn::make('billing_order')
                    ->label('Order')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Starred')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('department')
                    ->options(collect(Department::cases())->mapWithKeys(fn ($d) => [$d->value => $d->label()])),
            ])
            ->headerActions([
                CreateAction::make()->label('Add Credit / Cast Member'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
