<?php

namespace App\Filament\Resources\Seasons\Schemas;

use App\Enums\TitleType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SeasonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Season Information')
                    ->schema([
                        Select::make('title_id')
                            ->relationship('title', 'title', fn ($query) => $query->where('type', TitleType::TV_SERIES))
                            ->label('Web Series / TV Show')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('season_number')
                                    ->label('Season Number')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),

                                TextInput::make('name')
                                    ->label('Season Name')
                                    ->placeholder('e.g. Season 1, Final Season, Volume 2')
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
                            ->imageEditor()
                            ->columnSpanFull(),

                        Textarea::make('overview')
                            ->label('Season Overview')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
