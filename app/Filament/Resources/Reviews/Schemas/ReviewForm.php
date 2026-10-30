<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('title_id')
                    ->relationship('title', 'title')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                TextInput::make('author_name')
                    ->required(),
                TextInput::make('author_email')
                    ->email()
                    ->default(null),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                TextInput::make('headline')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_approved')
                    ->required(),
                Toggle::make('contains_spoilers')
                    ->required(),
                TextInput::make('helpful_votes')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
