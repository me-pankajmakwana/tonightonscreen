<?php

namespace App\Filament\Resources\StreamingPlatforms;

use App\Filament\Resources\StreamingPlatforms\Pages\CreateStreamingPlatform;
use App\Filament\Resources\StreamingPlatforms\Pages\EditStreamingPlatform;
use App\Filament\Resources\StreamingPlatforms\Pages\ListStreamingPlatforms;
use App\Filament\Resources\StreamingPlatforms\Schemas\StreamingPlatformForm;
use App\Filament\Resources\StreamingPlatforms\Tables\StreamingPlatformsTable;
use App\Models\StreamingPlatform;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StreamingPlatformResource extends Resource
{
    protected static ?string $model = StreamingPlatform::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTv;

    protected static string|UnitEnum|null $navigationGroup = 'Taxonomies & Meta';

    protected static ?string $navigationLabel = 'Streaming Platforms / OTT';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return StreamingPlatformForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StreamingPlatformsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStreamingPlatforms::route('/'),
            'create' => CreateStreamingPlatform::route('/create'),
            'edit' => EditStreamingPlatform::route('/{record}/edit'),
        ];
    }
}
