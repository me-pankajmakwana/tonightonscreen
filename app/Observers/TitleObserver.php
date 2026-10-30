<?php

namespace App\Observers;

use App\Models\Title;
use App\Services\ProductionSyncService;
use Illuminate\Support\Facades\Log;

class TitleObserver
{
    /**
     * Handle the Title "saved" event.
     */
    public function saved(Title $title): void
    {
        // Prevent auto-sync if we are currently receiving a webhook
        if (request()->is('api/webhooks/*')) {
            return;
        }

        if (!config('services.production_sync.enabled') || !config('services.production_sync.auto_sync')) {
            return;
        }

        try {
            /** @var ProductionSyncService $syncService */
            $syncService = app(ProductionSyncService::class);
            $result = $syncService->syncTitle($title);

            if ($result['success']) {
                Log::info("TitleObserver: Auto-synced [{$title->title}] ({$title->slug}) to production.");
            } else {
                Log::warning("TitleObserver: Auto-sync to production failed for [{$title->title}]: " . ($result['message'] ?? 'Unknown error'));
            }
        } catch (\Throwable $e) {
            Log::error("TitleObserver: Error auto-syncing [{$title->title}] to production: " . $e->getMessage());
        }
    }
}
