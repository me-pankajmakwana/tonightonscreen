<?php

use App\Http\Controllers\Api\WebhookSyncController;
use App\Http\Middleware\VerifyWebhookSecret;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| Webhook routes are authenticated with the X-Webhook-Secret header.
|
*/

Route::prefix('webhooks')->middleware([VerifyWebhookSecret::class])->group(function () {
    Route::get('/health', [WebhookSyncController::class, 'health'])->name('api.webhooks.health');
    Route::post('/sync', [WebhookSyncController::class, 'sync'])->name('api.webhooks.sync');
    Route::post('/person', [WebhookSyncController::class, 'syncPerson'])->name('api.webhooks.person');
    Route::post('/title', [WebhookSyncController::class, 'syncTitle'])->name('api.webhooks.title');
});
