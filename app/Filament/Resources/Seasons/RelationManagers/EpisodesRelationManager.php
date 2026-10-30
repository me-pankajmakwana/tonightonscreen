<?php

namespace App\Filament\Resources\Seasons\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EpisodesRelationManager extends RelationManager
{
    protected static string $relationship = 'episodes';

    protected static ?string $title = 'Season Episodes';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('title_id')
                    ->default(fn () => $this->getOwnerRecord()->title_id),

                Grid::make(2)
                    ->schema([
                        TextInput::make('episode_number')
                            ->label('Episode Number')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        TextInput::make('name')
                            ->label('Episode Title')
                            ->placeholder('e.g. Pilot, Chapter One, etc.')
                            ->required(),
                    ]),

                Grid::make(3)
                    ->schema([
                        DatePicker::make('air_date')
                            ->label('Air Date')
                            ->native(false),

                        TextInput::make('runtime_minutes')
                            ->label('Runtime (Minutes)')
                            ->numeric()
                            ->placeholder('e.g. 55'),

                        TextInput::make('video_url')
                            ->label('Video / Stream Link')
                            ->url()
                            ->placeholder('https://...'),
                    ]),

                FileUpload::make('still_path')
                    ->label('Episode Thumbnail / Still')
                    ->image()
                    ->disk('public')
                    ->directory('titles/episodes')
                    ->imageEditor(),

                Textarea::make('overview')
                    ->label('Episode Synopsis')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('episode_number', 'asc')
            ->columns([
                ImageColumn::make('still_path')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->height(45)
                    ->width(80),

                TextColumn::make('episode_number')
                    ->label('Ep #')
                    ->formatStateUsing(fn ($state) => "E{$state}")
                    ->weight('bold')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Episode Title')
                    ->searchable()
                    ->weight('semibold'),

                TextColumn::make('runtime_minutes')
                    ->label('Duration')
                    ->formatStateUsing(fn ($state) => $state ? "{$state} min" : '-')
                    ->sortable(),

                TextColumn::make('air_date')
                    ->label('Aired')
                    ->date()
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Add Episode')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['title_id'] = $this->getOwnerRecord()->title_id;

                        return $data;
                    }),
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
