<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Title;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductionSyncService
{
    protected string $url;
    protected string $secret;
    protected bool $enabled;
    protected int $timeout;

    public function __construct()
    {
        $this->url = (string) config('services.production_sync.url', 'https://tonightonscreen.com/api/webhooks/sync');
        $this->secret = (string) config('services.production_sync.secret', env('WEBHOOK_SECRET', ''));
        $this->enabled = (bool) config('services.production_sync.enabled', true);
        $this->timeout = (int) config('services.production_sync.timeout', 60);
    }

    /**
     * Test webhook connectivity to the production server.
     */
    public function testConnection(): array
    {
        try {
            $healthUrl = str_replace(['/sync', '/person', '/title'], '/health', $this->url);
            if (!str_ends_with($healthUrl, '/health')) {
                $healthUrl = rtrim($this->url, '/') . '/health';
            }

            $response = Http::timeout(15)
                ->withHeaders([
                    'X-Webhook-Secret' => $this->secret,
                    'Accept' => 'application/json',
                ])
                ->get($healthUrl);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'status' => $response->status(),
                    'message' => 'Production webhook is online and authenticated.',
                    'response' => $response->json(),
                ];
            }

            return [
                'success' => false,
                'status' => $response->status(),
                'message' => 'Production server responded with HTTP ' . $response->status() . ': ' . $response->body(),
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => 'Connection failed: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Send a Person and their uploaded photo to production.
     */
    public function syncPerson(Person|int|string $person): array
    {
        if (!$this->enabled) {
            return ['success' => false, 'message' => 'Production sync is disabled in configuration.'];
        }

        if (!$person instanceof Person) {
            $person = is_numeric($person)
                ? Person::find($person)
                : Person::where('slug', $person)->first();
        }

        if (!$person) {
            return ['success' => false, 'message' => 'Person not found.'];
        }

        try {
            $payload = [
                'entity_type' => 'person',
                'name' => $person->name,
                'stage_name' => $person->stage_name,
                'slug' => $person->slug,
                'gender' => $person->gender,
                'known_for_department' => $person->known_for_department,
                'birth_date' => $person->birth_date ? $person->birth_date->format('Y-m-d') : null,
                'death_date' => $person->death_date ? $person->death_date->format('Y-m-d') : null,
                'birth_place' => $person->birth_place,
                'biography' => $person->biography,
                'website' => $person->website,
                'status' => $person->status,
                'is_featured' => $person->is_featured,
                'is_active' => $person->is_active,
                'social_links' => $person->social_links,
                'photo_path' => $person->photo_path,
            ];

            // Resolve and encode local photo file
            if ($person->photo_path) {
                $base64 = $this->resolveFileAsBase64($person->photo_path);
                if ($base64) {
                    $payload['photo_base64'] = $base64;
                }
            }

            $endpoint = str_contains($this->url, '/sync') ? $this->url : rtrim($this->url, '/') . '/person';

            $response = Http::timeout($this->timeout)
                ->withHeaders([
                    'X-Webhook-Secret' => $this->secret,
                    'Accept' => 'application/json',
                ])
                ->post($endpoint, $payload);

            if ($response->successful()) {
                Log::info("ProductionSyncService: Successfully synced person [{$person->name}] ({$person->slug})");
                return [
                    'success' => true,
                    'message' => "Successfully synced [{$person->name}] to production.",
                    'response' => $response->json(),
                ];
            }

            $errorMessage = $response->json('message') ?: $response->body();
            Log::error("ProductionSyncService: Failed to sync person [{$person->name}]. HTTP {$response->status()}: {$errorMessage}");

            return [
                'success' => false,
                'status' => $response->status(),
                'message' => "Production rejected sync (HTTP {$response->status()}): {$errorMessage}",
            ];
        } catch (\Throwable $e) {
            Log::error("ProductionSyncService Exception for person [{$person->name}]: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Sync error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Send a Title and its poster / backdrop images to production.
     */
    public function syncTitle(Title|int|string $title): array
    {
        if (!$this->enabled) {
            return ['success' => false, 'message' => 'Production sync is disabled in configuration.'];
        }

        if (!$title instanceof Title) {
            $title = is_numeric($title)
                ? Title::find($title)
                : Title::where('slug', $title)->first();
        }

        if (!$title) {
            return ['success' => false, 'message' => 'Title not found.'];
        }

        try {
            $payload = [
                'entity_type' => 'title',
                'type' => $title->type?->value ?? $title->type,
                'title' => $title->title,
                'slug' => $title->slug,
                'tagline' => $title->tagline,
                'overview' => $title->overview,
                'status' => $title->status?->value ?? $title->status,
                'release_date' => $title->release_date ? $title->release_date->format('Y-m-d') : null,
                'end_date' => $title->end_date ? $title->end_date->format('Y-m-d') : null,
                'original_language' => $title->original_language,
                'runtime_minutes' => $title->runtime_minutes,
                'content_rating' => $title->content_rating,
                'trailer_url' => $title->trailer_url,
                'budget' => $title->budget,
                'box_office' => $title->box_office,
                'official_website' => $title->official_website,
                'rating' => $title->rating,
                'is_featured' => $title->is_featured,
                'is_trending' => $title->is_trending,
                'is_active' => $title->is_active,
                'poster_path' => $title->poster_path,
                'backdrop_path' => $title->backdrop_path,
            ];

            // Resolve and encode poster
            if ($title->poster_path) {
                $posterBase64 = $this->resolveFileAsBase64($title->poster_path);
                if ($posterBase64) {
                    $payload['poster_base64'] = $posterBase64;
                }
            }

            // Resolve and encode backdrop
            if ($title->backdrop_path) {
                $backdropBase64 = $this->resolveFileAsBase64($title->backdrop_path);
                if ($backdropBase64) {
                    $payload['backdrop_base64'] = $backdropBase64;
                }
            }

            // Attach Genres
            $genres = $title->genres()->pluck('name')->toArray();
            if (!empty($genres)) {
                $payload['genres'] = $genres;
            }

            // Attach Credits (Cast & Crew)
            $credits = $title->credits()->with('person')->get();
            if ($credits->isNotEmpty()) {
                $payload['credits'] = $credits->map(function ($credit) {
                    return [
                        'person_slug' => $credit->person?->slug,
                        'person_name' => $credit->person?->name,
                        'department' => $credit->department,
                        'job' => $credit->job,
                        'character_name' => $credit->character_name,
                        'billing_order' => $credit->billing_order,
                    ];
                })->toArray();
            }

            $endpoint = str_contains($this->url, '/sync') ? $this->url : rtrim($this->url, '/') . '/title';

            $response = Http::timeout($this->timeout)
                ->withHeaders([
                    'X-Webhook-Secret' => $this->secret,
                    'Accept' => 'application/json',
                ])
                ->post($endpoint, $payload);

            if ($response->successful()) {
                Log::info("ProductionSyncService: Successfully synced title [{$title->title}] ({$title->slug})");
                return [
                    'success' => true,
                    'message' => "Successfully synced [{$title->title}] to production.",
                    'response' => $response->json(),
                ];
            }

            $errorMessage = $response->json('message') ?: $response->body();
            Log::error("ProductionSyncService: Failed to sync title [{$title->title}]. HTTP {$response->status()}: {$errorMessage}");

            return [
                'success' => false,
                'status' => $response->status(),
                'message' => "Production rejected sync (HTTP {$response->status()}): {$errorMessage}",
            ];
        } catch (\Throwable $e) {
            Log::error("ProductionSyncService Exception for title [{$title->title}]: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Sync error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Locate a file on disk (public storage or public_path) and return base64 string.
     */
    protected function resolveFileAsBase64(string $relativePath): ?string
    {
        $filePath = null;

        if (Storage::disk('public')->exists($relativePath)) {
            $filePath = Storage::disk('public')->path($relativePath);
        } elseif (file_exists(public_path($relativePath))) {
            $filePath = public_path($relativePath);
        } elseif (file_exists(storage_path('app/public/' . $relativePath))) {
            $filePath = storage_path('app/public/' . $relativePath);
        } elseif (file_exists($relativePath)) {
            $filePath = $relativePath;
        }

        if ($filePath && file_exists($filePath) && is_readable($filePath)) {
            $content = file_get_contents($filePath);
            $mime = mime_content_type($filePath) ?: 'image/jpeg';
            return 'data:' . $mime . ';base64,' . base64_encode($content);
        }

        return null;
    }
}
