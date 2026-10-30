<?php

namespace App\Filament\Resources\Titles\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeasonsRelationManager extends RelationManager
{
    protected static string $relationship = 'seasons';

    protected static ?string $title = 'Web Series Seasons';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        TextInput::make('season_number')
                            ->label('Season Number')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        TextInput::make('name')
                            ->label('Season Name')
                            ->placeholder('e.g. Season 1, Volume 1')
                            ->required(),
                    ]),

                Grid::make(2)
                    ->schema([
                        DatePicker::make('air_date')
                            ->label('Season Premiere Date')
                            ->native(false),

                        TextInput::make('trailer_url')
                            ->label('Season Trailer URL')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...'),
                    ]),

                FileUpload::make('poster_path')
                    ->label('Season Poster')
                    ->image()
                    ->disk('public')
                    ->directory('titles/seasons')
                    ->imageEditor(),

                Textarea::make('overview')
                    ->label('Season Overview / Synopsis')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('season_number', 'asc')
            ->columns([
                ImageColumn::make('poster_path')
                    ->label('Poster')
                    ->disk('public')
                    ->height(60)
                    ->width(40),

                TextColumn::make('season_number')
                    ->label('Season')
                    ->formatStateUsing(fn ($state) => "Season {$state}")
                    ->weight('bold')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Title')
                    ->searchable(),

                TextColumn::make('episodes_count')
                    ->counts('episodes')
                    ->label('Episodes')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('air_date')
                    ->label('Premiere Date')
                    ->date()
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Add New Season'),
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
