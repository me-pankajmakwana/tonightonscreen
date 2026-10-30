<?php

namespace App\Console\Commands;

use App\Models\Person;
use App\Models\Title;
use App\Services\ProductionSyncService;
use Illuminate\Console\Command;

class SyncToProductionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:production 
                            {type? : The entity type to sync (person or title)} 
                            {slug? : The slug or ID of the entity to sync} 
                            {--all : Sync all records of the selected type} 
                            {--recent= : Sync N most recently updated records} 
                            {--test : Test connection and authentication to production webhook}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync local People and Titles (including uploaded photos, posters, and backdrops) to production via Webhook API';

    /**
     * Execute the console command.
     */
    public function handle(ProductionSyncService $syncService): int
    {
        $this->info("=== TonightOnScreen Production Webhook Sync ===");
        $this->line("Target URL: " . config('services.production_sync.url'));

        if ($this->option('test')) {
            $this->info("Testing connection to production webhook...");
            $res = $syncService->testConnection();
            if ($res['success']) {
                $this->info("✓ Success: " . $res['message']);
                $this->line(json_encode($res['response'], JSON_PRETTY_PRINT));
                return self::SUCCESS;
            } else {
                $this->error("✗ Connection Failed: " . $res['message']);
                return self::FAILURE;
            }
        }

        $type = strtolower((string) $this->argument('type'));
        $slug = $this->argument('slug');

        if (empty($type)) {
            $type = $this->choice('What would you like to sync to production?', ['person', 'title', 'test-connection'], 0);
            if ($type === 'test-connection') {
                return $this->call('sync:production', ['--test' => true]);
            }
        }

        if ($type === 'person') {
            return $this->handlePersonSync($syncService, $slug);
        }

        if ($type === 'title') {
            return $this->handleTitleSync($syncService, $slug);
        }

        $this->error("Invalid entity type: {$type}. Must be 'person' or 'title'.");
        return self::INVALID;
    }

    protected function handlePersonSync(ProductionSyncService $syncService, ?string $slug): int
    {
        if ($slug) {
            $person = is_numeric($slug) ? Person::find($slug) : Person::where('slug', $slug)->first();
            if (!$person) {
                $this->error("Person not found with slug/ID: {$slug}");
                return self::FAILURE;
            }

            $this->line("Syncing Person: [{$person->name}] ({$person->slug})...");
            $res = $syncService->syncPerson($person);
            if ($res['success']) {
                $this->info("✓ " . $res['message']);
                return self::SUCCESS;
            } else {
                $this->error("✗ " . $res['message']);
                return self::FAILURE;
            }
        }

        if ($this->option('all')) {
            $people = Person::all();
            $this->line("Found {$people->count()} people to sync.");
            $bar = $this->output->createProgressBar($people->count());
            $bar->start();

            $successCount = 0;
            $failCount = 0;
            foreach ($people as $person) {
                $res = $syncService->syncPerson($person);
                if ($res['success']) {
                    $successCount++;
                } else {
                    $failCount++;
                }
                $bar->advance();
            }
            $bar->finish();
            $this->newLine();
            $this->info("Finished: {$successCount} succeeded, {$failCount} failed.");
            return $failCount === 0 ? self::SUCCESS : self::FAILURE;
        }

        $recentCount = (int) ($this->option('recent') ?: 5);
        $people = Person::latest('updated_at')->take($recentCount)->get();
        $this->line("Syncing {$people->count()} most recently updated people...");

        foreach ($people as $person) {
            $this->line("Syncing [{$person->name}] ({$person->slug})...");
            $res = $syncService->syncPerson($person);
            if ($res['success']) {
                $this->info("✓ " . $res['message']);
            } else {
                $this->error("✗ " . $res['message']);
            }
        }

        return self::SUCCESS;
    }

    protected function handleTitleSync(ProductionSyncService $syncService, ?string $slug): int
    {
        if ($slug) {
            $title = is_numeric($slug) ? Title::find($slug) : Title::where('slug', $slug)->first();
            if (!$title) {
                $this->error("Title not found with slug/ID: {$slug}");
                return self::FAILURE;
            }

            $this->line("Syncing Title: [{$title->title}] ({$title->slug})...");
            $res = $syncService->syncTitle($title);
            if ($res['success']) {
                $this->info("✓ " . $res['message']);
                return self::SUCCESS;
            } else {
                $this->error("✗ " . $res['message']);
                return self::FAILURE;
            }
        }

        if ($this->option('all')) {
            $titles = Title::all();
            $this->line("Found {$titles->count()} titles to sync.");
            $bar = $this->output->createProgressBar($titles->count());
            $bar->start();

            $successCount = 0;
            $failCount = 0;
            foreach ($titles as $title) {
                $res = $syncService->syncTitle($title);
                if ($res['success']) {
                    $successCount++;
                } else {
                    $failCount++;
                }
                $bar->advance();
            }
            $bar->finish();
            $this->newLine();
            $this->info("Finished: {$successCount} succeeded, {$failCount} failed.");
            return $failCount === 0 ? self::SUCCESS : self::FAILURE;
        }

        $recentCount = (int) ($this->option('recent') ?: 5);
        $titles = Title::latest('updated_at')->take($recentCount)->get();
        $this->line("Syncing {$titles->count()} most recently updated titles...");

        foreach ($titles as $title) {
            $this->line("Syncing [{$title->title}] ({$title->slug})...");
            $res = $syncService->syncTitle($title);
            if ($res['success']) {
                $this->info("✓ " . $res['message']);
            } else {
                $this->error("✗ " . $res['message']);
            }
        }

        return self::SUCCESS;
    }
}
