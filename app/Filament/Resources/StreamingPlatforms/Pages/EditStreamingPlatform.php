<?php

namespace App\Filament\Resources\StreamingPlatforms\Pages;

use App\Filament\Resources\StreamingPlatforms\StreamingPlatformResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStreamingPlatform extends EditRecord
{
    protected static string $resource = StreamingPlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
