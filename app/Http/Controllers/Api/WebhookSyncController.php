<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Genre;
use App\Models\Person;
use App\Models\Title;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebhookSyncController extends Controller
{
    /**
     * Webhook health check endpoint.
     */
    public function health(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'TonightOnScreen Webhook API is online and authenticated.',
            'server_time' => now()->toIso8601String(),
            'app_env' => config('app.env'),
        ]);
    }

    /**
     * Unified sync endpoint: routes to Person or Title based on entity type.
     */
    public function sync(Request $request): JsonResponse
    {
        $entityType = strtolower((string) $request->input('entity_type', $request->input('type', '')));

        if ($entityType === 'person' || $request->has('person') || ($request->has('name') && !$request->has('type') && !$request->has('overview'))) {
            return $this->syncPerson($request);
        }

        if ($entityType === 'title' || $entityType === 'movie' || $entityType === 'tv' || $request->has('title')) {
            return $this->syncTitle($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Missing or unrecognized entity_type. Must be "person" or "title".',
        ], 422);
    }

    /**
     * Sync (Create or Update) a Person.
     */
    public function syncPerson(Request $request): JsonResponse
    {
        try {
            $input = $request->input('person', $request->all());

            $name = $input['name'] ?? null;
            if (empty($name)) {
                return response()->json([
                    'success' => false,
                    'message' => 'The "name" field is required for syncing a Person.',
                ], 422);
            }

            $slug = !empty($input['slug']) ? Str::slug($input['slug']) : Str::slug($name);

            // Handle photo upload (file or base64)
            $photoPath = $input['photo_path'] ?? null;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $ext = $file->getClientOriginalExtension() ?: 'jpg';
                $filename = $slug . '-' . time() . '.' . $ext;
                $photoPath = $file->storeAs('people/photos', $filename, 'public');
            } elseif (!empty($input['photo_base64'])) {
                $photoPath = $this->saveBase64Image(
                    $input['photo_base64'],
                    'people/photos',
                    $slug . '-' . time()
                );
            }

            // Prepare Person attributes
            $attributes = [
                'name' => $name,
                'stage_name' => $input['stage_name'] ?? null,
                'gender' => $input['gender'] ?? 'Not Specified',
                'known_for_department' => $input['known_for_department'] ?? 'Acting',
                'birth_date' => !empty($input['birth_date']) ? substr($input['birth_date'], 0, 10) : null,
                'death_date' => !empty($input['death_date']) ? substr($input['death_date'], 0, 10) : null,
                'birth_place' => $input['birth_place'] ?? null,
                'biography' => $input['biography'] ?? null,
                'website' => $input['website'] ?? null,
                'status' => $input['status'] ?? 'active',
                'is_featured' => filter_var($input['is_featured'] ?? false, FILTER_VALIDATE_BOOLEAN),
                'is_active' => filter_var($input['is_active'] ?? true, FILTER_VALIDATE_BOOLEAN),
            ];

            if ($photoPath) {
                $attributes['photo_path'] = $photoPath;
            }

            if (isset($input['social_links'])) {
                $attributes['social_links'] = is_array($input['social_links'])
                    ? $input['social_links']
                    : json_decode($input['social_links'], true);
            }

            // Update or create Person by slug
            $person = Person::updateOrCreate(
                ['slug' => $slug],
                $attributes
            );

            Log::info("Webhook: Successfully synced Person [{$person->name}] ({$person->slug}) with ID {$person->id}");

            return response()->json([
                'success' => true,
                'message' => 'Person synced successfully.',
                'action' => $person->wasRecentlyCreated ? 'created' : 'updated',
                'data' => [
                    'id' => $person->id,
                    'name' => $person->name,
                    'slug' => $person->slug,
                    'photo_path' => $person->photo_path,
                    'photo_url' => $person->photo_url,
                    'is_active' => $person->is_active,
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Webhook syncPerson error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to sync Person: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Sync (Create or Update) a Title.
     */
    public function syncTitle(Request $request): JsonResponse
    {
        try {
            $input = $request->input('title_data', $request->all());

            $titleName = $input['title'] ?? null;
            if (empty($titleName)) {
                return response()->json([
                    'success' => false,
                    'message' => 'The "title" field is required for syncing a Title.',
                ], 422);
            }

            $slug = !empty($input['slug']) ? Str::slug($input['slug']) : Str::slug($titleName);

            // Handle Poster upload (file or base64)
            $posterPath = $input['poster_path'] ?? null;
            if ($request->hasFile('poster')) {
                $file = $request->file('poster');
                $ext = $file->getClientOriginalExtension() ?: 'jpg';
                $filename = $slug . '-poster-' . time() . '.' . $ext;
                $posterPath = $file->storeAs('titles/posters', $filename, 'public');
            } elseif (!empty($input['poster_base64'])) {
                $posterPath = $this->saveBase64Image(
                    $input['poster_base64'],
                    'titles/posters',
                    $slug . '-poster-' . time()
                );
            }

            // Handle Backdrop upload (file or base64)
            $backdropPath = $input['backdrop_path'] ?? null;
            if ($request->hasFile('backdrop')) {
                $file = $request->file('backdrop');
                $ext = $file->getClientOriginalExtension() ?: 'jpg';
                $filename = $slug . '-backdrop-' . time() . '.' . $ext;
                $backdropPath = $file->storeAs('titles/backdrops', $filename, 'public');
            } elseif (!empty($input['backdrop_base64'])) {
                $backdropPath = $this->saveBase64Image(
                    $input['backdrop_base64'],
                    'titles/backdrops',
                    $slug . '-backdrop-' . time()
                );
            }

            // Prepare Title attributes
            $attributes = [
                'type' => $input['type'] ?? 'movie',
                'title' => $titleName,
                'tagline' => $input['tagline'] ?? null,
                'overview' => $input['overview'] ?? ($input['description'] ?? null),
                'status' => $input['status'] ?? 'released',
                'release_date' => !empty($input['release_date']) ? substr($input['release_date'], 0, 10) : null,
                'end_date' => !empty($input['end_date']) ? substr($input['end_date'], 0, 10) : null,
                'original_language' => $input['original_language'] ?? 'English',
                'runtime_minutes' => !empty($input['runtime_minutes']) ? (int) $input['runtime_minutes'] : null,
                'content_rating' => $input['content_rating'] ?? null,
                'trailer_url' => $input['trailer_url'] ?? null,
                'budget' => !empty($input['budget']) ? (int) $input['budget'] : null,
                'box_office' => !empty($input['box_office']) ? (int) $input['box_office'] : null,
                'official_website' => $input['official_website'] ?? null,
                'rating' => !empty($input['rating']) ? (float) $input['rating'] : 0.0,
                'is_featured' => filter_var($input['is_featured'] ?? false, FILTER_VALIDATE_BOOLEAN),
                'is_trending' => filter_var($input['is_trending'] ?? false, FILTER_VALIDATE_BOOLEAN),
                'is_active' => filter_var($input['is_active'] ?? true, FILTER_VALIDATE_BOOLEAN),
            ];

            if ($posterPath) {
                $attributes['poster_path'] = $posterPath;
            }
            if ($backdropPath) {
                $attributes['backdrop_path'] = $backdropPath;
            }

            DB::beginTransaction();

            $title = Title::updateOrCreate(
                ['slug' => $slug],
                $attributes
            );

            // Sync Genres if provided
            if (isset($input['genres']) && is_array($input['genres'])) {
                $genreIds = [];
                foreach ($input['genres'] as $genreItem) {
                    if (is_numeric($genreItem)) {
                        $genreIds[] = (int) $genreItem;
                    } elseif (is_string($genreItem)) {
                        $genre = Genre::firstOrCreate(
                            ['slug' => Str::slug($genreItem)],
                            ['name' => $genreItem]
                        );
                        $genreIds[] = $genre->id;
                    } elseif (is_array($genreItem) && !empty($genreItem['name'])) {
                        $genre = Genre::firstOrCreate(
                            ['slug' => $genreItem['slug'] ?? Str::slug($genreItem['name'])],
                            ['name' => $genreItem['name']]
                        );
                        $genreIds[] = $genre->id;
                    }
                }
                $title->genres()->sync($genreIds);
            }

            // Sync Credits if provided
            if (isset($input['credits']) && is_array($input['credits'])) {
                foreach ($input['credits'] as $creditData) {
                    $personId = $creditData['person_id'] ?? null;
                    if (!$personId && !empty($creditData['person_slug'])) {
                        $p = Person::where('slug', $creditData['person_slug'])->first();
                        $personId = $p?->id;
                    }

                    if ($personId) {
                        Credit::updateOrCreate(
                            [
                                'creditable_type' => Title::class,
                                'creditable_id' => $title->id,
                                'person_id' => $personId,
                                'department' => $creditData['department'] ?? 'Acting',
                                'job' => $creditData['job'] ?? 'Actor',
                            ],
                            [
                                'character_name' => $creditData['character_name'] ?? null,
                                'billing_order' => $creditData['billing_order'] ?? 0,
                            ]
                        );
                    }
                }
            }

            DB::commit();

            Log::info("Webhook: Successfully synced Title [{$title->title}] ({$title->slug}) with ID {$title->id}");

            return response()->json([
                'success' => true,
                'message' => 'Title synced successfully.',
                'action' => $title->wasRecentlyCreated ? 'created' : 'updated',
                'data' => [
                    'id' => $title->id,
                    'title' => $title->title,
                    'slug' => $title->slug,
                    'type' => $title->type?->value ?? $title->type,
                    'poster_path' => $title->poster_path,
                    'poster_url' => $title->poster_url,
                    'release_date' => $title->release_date?->format('Y-m-d'),
                    'is_active' => $title->is_active,
                ],
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Webhook syncTitle error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to sync Title: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Helper to decode and save a base64 image string to public storage.
     */
    protected function saveBase64Image(string $base64Data, string $directory, string $filenamePrefix): ?string
    {
        $ext = 'jpg';
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $matches)) {
            $ext = strtolower($matches[1]);
            if ($ext === 'jpeg') $ext = 'jpg';
            $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
        }

        $decoded = base64_decode($base64Data, true);
        if ($decoded === false) {
            Log::warning("Failed to decode base64 image data for {$filenamePrefix}");
            return null;
        }

        $filename = "{$filenamePrefix}.{$ext}";
        $path = "{$directory}/{$filename}";

        Storage::disk('public')->put($path, $decoded);

        return $path;
    }
}
