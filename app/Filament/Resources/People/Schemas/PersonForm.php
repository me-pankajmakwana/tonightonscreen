<?php

namespace App\Filament\Resources\People\Schemas;

use App\Enums\Department;
use App\Filament\Forms\Components\QuillEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
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
                            ->description('Official name, popular stage name, primary industry department')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Display / Working Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, ?string $state, callable $set) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                TextInput::make('full_name')
                                    ->label('Official / Birth Name')
                                    ->maxLength(255)
                                    ->placeholder('e.g. Robert John Downey Jr.'),

                                TextInput::make('stage_name')
                                    ->label('Stage / Popular Moniker')
                                    ->maxLength(255)
                                    ->placeholder('e.g. RDJ, The Rock, SRK (if applicable)'),

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

                        Section::make('Origins, Physicality & Personal Dossier')
                            ->description('Nationality, residence, birth facts, height, and academic background')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('nationality')
                                            ->label('Nationality / Citizenship')
                                            ->placeholder('e.g. American, British, Indian'),

                                        TextInput::make('birth_place')
                                            ->label('Place of Birth')
                                            ->placeholder('e.g. London, England, UK'),

                                        TextInput::make('hometown')
                                            ->label('Native Hometown')
                                            ->placeholder('e.g. Greenwich Village, New York City'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('residence')
                                            ->label('Current Residence')
                                            ->placeholder('e.g. Malibu, California, USA'),

                                        TextInput::make('height')
                                            ->label('Height (Stature)')
                                            ->placeholder('e.g. 5 ft 9 in (175 cm)'),

                                        TextInput::make('zodiac_sign')
                                            ->label('Zodiac Sign')
                                            ->placeholder('e.g. Gemini, Aries, Leo'),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        DatePicker::make('birth_date')
                                            ->label('Date of Birth')
                                            ->native(false),

                                        DatePicker::make('death_date')
                                            ->label('Date of Passing (if deceased)')
                                            ->native(false),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('education')
                                            ->label('Alma Mater / Schools & Universities')
                                            ->placeholder('e.g. University College Cork'),

                                        TextInput::make('qualification')
                                            ->label('Highest Degree / Qualification')
                                            ->placeholder('e.g. Classical Dramatic Arts Degree'),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('languages')
                                            ->label('Languages Spoken (comma separated)')
                                            ->placeholder('e.g. English, French, Irish'),

                                        TextInput::make('religion')
                                            ->label('Faith / Worldview')
                                            ->placeholder('e.g. Christian, Hindu, Buddhist, Private'),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('hobbies')
                                            ->label('Hobbies & Interests')
                                            ->placeholder('e.g. Cooking, Gardening, Music'),

                                        TextInput::make('other_talents')
                                            ->label('Auxiliary Creative Talents')
                                            ->placeholder('e.g. Guitar, Singing, Martial Arts, Directing'),
                                    ]),

                                TextInput::make('website')
                                    ->url()
                                    ->placeholder('https://...'),
                            ]),

                        Section::make('Biography & Career Narrative')
                            ->description('Formatted rich-text biography with hyperlink support for titles, people, and accolades')
                            ->schema([
                                QuillEditor::make('biography')
                                    ->label('Biography & Career Highlights (Quill RichText Editor)')
                                    ->placeholder('Write in-depth formatted biography, character details, and hyperlinks...')
                                    ->minHeight(280),

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
