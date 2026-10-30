<?php

namespace App\Filament\Resources\Titles\Pages;

use App\Filament\Resources\Titles\TitleResource;
use App\Services\ProductionSyncService;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTitle extends EditRecord
{
    protected static string $resource = TitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('syncToProduction')
                ->label('Sync to Production')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Push Title to Production')
                ->modalDescription('This will immediately send this title\'s details, poster, and backdrop to the production website via webhook.')
                ->action(function () {
                    /** @var ProductionSyncService $syncService */
                    $syncService = app(ProductionSyncService::class);
                    $result = $syncService->syncTitle($this->getRecord());

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
