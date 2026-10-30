<?php

namespace App\Filament\Resources\People\Pages;

use App\Filament\Resources\People\PersonResource;
use App\Services\ProductionSyncService;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPerson extends EditRecord
{
    protected static string $resource = PersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('syncToProduction')
                ->label('Sync to Production')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Push Talent to Production')
                ->modalDescription('This will immediately send this person\'s data and uploaded photo to the production website via webhook.')
                ->action(function () {
                    /** @var ProductionSyncService $syncService */
                    $syncService = app(ProductionSyncService::class);
                    $result = $syncService->syncPerson($this->getRecord());

                    if ($result['success']) {
                        Notification::make()
                            ->title('Synced to Production')
                            ->body($result['message'])
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title('Sync Failed')
                            ->body($result['message'])
                            ->danger()
                            ->send();
                    }
                }),
            DeleteAction::make(),
        ];
    }
}
