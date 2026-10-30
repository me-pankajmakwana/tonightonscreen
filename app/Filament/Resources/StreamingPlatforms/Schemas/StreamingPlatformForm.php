<?php

namespace App\Filament\Resources\StreamingPlatforms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class StreamingPlatformForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Platform / OTT Network')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Platform Name')
                                    ->placeholder('e.g. Netflix, Prime Video, Disney+, Apple TV+, Theatrical')
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

                        Grid::make(2)
                            ->schema([
                                TextInput::make('website')
                                    ->label('Official Website / Service URL')
                                    ->url()
                                    ->placeholder('https://www.netflix.com'),

                                TextInput::make('display_priority')
                                    ->label('Display Priority (Order)')
                                    ->helperText('Lower number appears first (e.g. 1 for Netflix, 2 for Prime)')
                                    ->numeric()
                                    ->default(0),
                            ]),

                        FileUpload::make('logo_path')
                            ->label('Platform Icon / Logo')
                            ->image()
                            ->disk('public')
                            ->directory('platforms')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Active on Platform')
                            ->default(true),
                    ]),
            ]);
    }
}
