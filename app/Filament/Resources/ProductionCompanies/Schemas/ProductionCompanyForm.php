<?php

namespace App\Filament\Resources\ProductionCompanies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductionCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Production Studio Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Company / Studio Name')
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
                                TextInput::make('headquarters')
                                    ->label('Headquarters Location')
                                    ->placeholder('e.g. Burbank, California, USA')
                                    ->maxLength(255),

                                TextInput::make('website')
                                    ->url()
                                    ->placeholder('https://...'),
                            ]),

                        FileUpload::make('logo_path')
                            ->label('Studio Logo')
                            ->image()
                            ->disk('public')
                            ->directory('companies')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Overview of the studio or production company...'),
                    ]),
            ]);
    }
}
