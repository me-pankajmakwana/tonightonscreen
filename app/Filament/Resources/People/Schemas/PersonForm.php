<?php

namespace App\Filament\Resources\People\Schemas;

use App\Enums\Department;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PersonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('General Information')
                            ->description('Name, stage name, primary industry department')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, ?string $state, callable $set) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                TextInput::make('stage_name')
                                    ->label('Stage / Professional Name')
                                    ->maxLength(255)
                                    ->placeholder('e.g. The Rock, Lady Gaga (if applicable)'),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Grid::make(2)
                                    ->schema([
                                        Select::make('gender')
                                            ->options([
                                                'Female' => 'Female',
                                                'Male' => 'Male',
                                                'Non-Binary' => 'Non-Binary',
                                                'Not Specified' => 'Not Specified',
                                            ])
                                            ->default('Not Specified')
                                            ->native(false),

                                        Select::make('known_for_department')
                                            ->label('Primary Department')
                                            ->options(collect(Department::cases())->mapWithKeys(fn ($dept) => [$dept->value => $dept->label()]))
                                            ->default(Department::ACTING->value)
                                            ->native(false)
                                            ->required(),
                                    ]),
                            ])
                            ->columns(2),

                        Section::make('Lifespan & Origins')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        DatePicker::make('birth_date')
                                            ->label('Date of Birth')
                                            ->native(false),

                                        DatePicker::make('death_date')
                                            ->label('Date of Passing (if deceased)')
                                            ->native(false),
                                    ]),

                                TextInput::make('birth_place')
                                    ->label('Place of Birth')
                                    ->placeholder('e.g. London, England, UK')
                                    ->maxLength(255),

                                TextInput::make('website')
                                    ->url()
                                    ->placeholder('https://...'),
                            ]),

                        Section::make('Biography')
                            ->schema([
                                Textarea::make('biography')
                                    ->rows(6)
                                    ->placeholder('Full biography and career highlights...'),

                                KeyValue::make('social_links')
                                    ->keyLabel('Platform (e.g. instagram, twitter, imdb)')
                                    ->valueLabel('Profile URL')
                                    ->reorderable(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Portrait & Headshot')
                            ->schema([
                                FileUpload::make('photo_path')
                                    ->label('Profile Picture / Headshot')
                                    ->image()
                                    ->disk('public')
                                    ->directory('people/photos')
                                    ->imageEditor()
                                    ->maxSize(10240),
                            ]),

                        Section::make('Status & Visibility')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Active / Published')
                                    ->helperText('Enable to display this talent on the public website.')
                                    ->default(false),

                                Select::make('status')
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->default('inactive')
                                    ->native(false)
                                    ->required(),

                                Toggle::make('is_featured')
                                    ->label('Feature on Homepage')
                                    ->helperText('Spotlight this talent in the featured artists row.')
                                    ->default(false),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }
}
