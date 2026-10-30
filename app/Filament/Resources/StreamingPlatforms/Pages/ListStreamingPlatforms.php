<?php

namespace App\Filament\Resources\StreamingPlatforms\Pages;

use App\Filament\Resources\StreamingPlatforms\StreamingPlatformResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStreamingPlatforms extends ListRecords
{
    protected static string $resource = StreamingPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
