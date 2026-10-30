<?php

namespace App\Observers;

use App\Models\Person;
use App\Services\ProductionSyncService;
use Illuminate\Support\Facades\Log;

class PersonObserver
{
    /**
     * Handle the Person "saved" event.
     */
    public function saved(Person $person): void
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
            $result = $syncService->syncPerson($person);

            if ($result['success']) {
                Log::info("PersonObserver: Auto-synced [{$person->name}] ({$person->slug}) to production.");
            } else {
                Log::warning("PersonObserver: Auto-sync to production failed for [{$person->name}]: " . ($result['message'] ?? 'Unknown error'));
            }
        } catch (\Throwable $e) {
            Log::error("PersonObserver: Error auto-syncing [{$person->name}] to production: " . $e->getMessage());
        }
    }
}
