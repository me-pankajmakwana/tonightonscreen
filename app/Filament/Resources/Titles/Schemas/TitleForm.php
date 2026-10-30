<?php

namespace App\Filament\Resources\Titles\Schemas;

use App\Enums\ReleaseStatus;
use App\Enums\TitleType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TitleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Tabs::make('Title Details')
                            ->tabs([
                                Tab::make('Core Information')
                                    ->icon('heroicon-o-information-circle')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                Select::make('type')
                                                    ->label('Media Type')
                                                    ->options(collect(TitleType::cases())->mapWithKeys(fn ($type) => [$type->value => $type->label()]))
                                                    ->default(TitleType::MOVIE->value)
                                                    ->native(false)
                                                    ->required()
                                                    ->live(),

                                                TextInput::make('title')
                                                    ->label('Main Title')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(function (string $operation, ?string $state, callable $set) {
                                                        if ($operation === 'create') {
                                                            $set('slug', Str::slug($state));
                                                        }
                                                    }),

                                                TextInput::make('slug')
                                                    ->required()
                                                    ->unique(ignoreRecord: true)
                                                    ->maxLength(255),
                                            ]),

                                        TextInput::make('tagline')
                                            ->label('Tagline / Catchphrase')
                                            ->placeholder('e.g. Welcome to the day after tomorrow.')
                                            ->maxLength(500),

                                        Textarea::make('overview')
                                            ->label('Synopsis / Storyline')
                                            ->rows(6)
                                            ->placeholder('Full plot synopsis...'),

                                        Grid::make(4)
                                            ->schema([
                                                Select::make('status')
                                                    ->options(collect(ReleaseStatus::cases())->mapWithKeys(fn ($status) => [$status->value => $status->label()]))
                                                    ->default(ReleaseStatus::RELEASED->value)
                                                    ->native(false)
                                                    ->required(),

                                                DatePicker::make('release_date')
                                                    ->label('Release / Premier Date')
                                                    ->native(false),

                                                DatePicker::make('end_date')
                                                    ->label('Series Concluded Date')
                                                    ->native(false)
                                                    ->visible(fn ($get) => $get('type') === TitleType::TV_SERIES->value),

                                                TextInput::make('runtime_minutes')
                                                    ->label('Runtime (Minutes)')
                                                    ->numeric()
                                                    ->placeholder('e.g. 148'),

                                                Select::make('content_rating')
                                                    ->label('Age / Content Rating')
                                                    ->options([
                                                        'G' => 'G (General Audiences)',
                                                        'PG' => 'PG (Parental Guidance)',
                                                        'PG-13' => 'PG-13 (Parents Strongly Cautioned)',
                                                        'R' => 'R (Restricted 17+)',
                                                        'NC-17' => 'NC-17 (Adults Only)',
                                                        'TV-Y' => 'TV-Y (All Children)',
                                                        'TV-PG' => 'TV-PG (Parental Guidance Suggested)',
                                                        'TV-14' => 'TV-14 (Parents Strongly Cautioned)',
                                                        'TV-MA' => 'TV-MA (Mature Audience Only)',
                                                        'U/A 13+' => 'U/A 13+',
                                                        'U/A 16+' => 'U/A 16+',
                                                        'A' => 'A (Adults 18+)',
                                                    ])
                                                    ->native(false),
                                            ]),

                                        Grid::make(4)
                                            ->schema([
                                                TextInput::make('origin_country')
                                                    ->label('Country of Origin')
                                                    ->placeholder('e.g. India, United States')
                                                    ->default('United States'),

                                                TextInput::make('original_language')
                                                    ->label('Original Language')
                                                    ->default('English'),

                                                TextInput::make('official_website')
                                                    ->url()
                                                    ->placeholder('https://...'),

                                                TextInput::make('rating')
                                                    ->label('Curator Rating (0.0 to 10.0)')
                                                    ->numeric()
                                                    ->minValue(0)
                                                    ->maxValue(10)
                                                    ->step(0.1)
                                                    ->default(0.0),
                                            ]),

                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('budget')
                                                    ->label('Production Budget')
                                                    ->helperText('For Indian movies, enter in INR (e.g. 200000000 = 20 Cr). For international, enter in USD.')
                                                    ->numeric()
                                                    ->placeholder('e.g. 200000000 or 150000000'),

                                                TextInput::make('box_office')
                                                    ->label('Box Office Collection / Revenue')
                                                    ->helperText('For Indian movies, enter in INR (e.g. 1070000000 = 107 Cr). For international, enter in USD.')
                                                    ->numeric()
                                                    ->placeholder('e.g. 1070000000 or 850000000'),
                                            ]),
                                    ]),

                                Tab::make('Media & Artwork')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                FileUpload::make('poster_path')
                                                    ->label('Official Vertical Poster (2:3 aspect)')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('titles/posters')
                                                    ->imageEditor()
                                                    ->helperText('Recommended resolution: 1000x1500px'),

                                                FileUpload::make('backdrop_path')
                                                    ->label('Horizontal Backdrop / Banner (16:9 aspect)')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('titles/backdrops')
                                                    ->imageEditor()
                                                    ->helperText('Recommended resolution: 1920x1080px or 3840x2160px'),
                                            ]),

                                        TextInput::make('trailer_url')
                                            ->label('Official Trailer Video URL')
                                            ->url()
                                            ->placeholder('https://www.youtube.com/watch?v=... or direct MP4/HLS')
                                            ->helperText('Embeddable trailer preview link for viewers.'),
                                    ]),

                                Tab::make('Taxonomies & Distribution')
                                    ->icon('heroicon-o-sparkles')
                                    ->schema([
                                        Select::make('genres')
                                            ->relationship('genres', 'name')
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->label('Genres'),

                                        Select::make('productionCompanies')
                                            ->relationship('productionCompanies', 'name')
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->label('Production Studios & Networks'),

                                        Select::make('streamingPlatforms')
                                            ->relationship('streamingPlatforms', 'name')
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->label('Streaming Services / Where to Watch'),
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Publishing & Highlights')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Active / Published')
                                    ->helperText('Enable to display this title on the public website.')
                                    ->default(false),

                                Toggle::make('is_featured')
                                    ->label('Featured Hero Title')
                                    ->helperText('Showcase in homepage carousel')
                                    ->default(false),

                                Toggle::make('is_trending')
                                    ->label('Trending Tonight')
                                    ->helperText('Mark as currently popular')
                                    ->default(false),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }
}
