<?php

namespace App\Console\Commands;

use App\Models\Title;
use App\Support\SeoHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class EnrichTitleTmdbCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'titles:enrich-tmdb 
                            {slug? : Optional title slug to enrich a single title}
                            {--limit=50 : Maximum number of titles to process}
                            {--dry-run : Preview changes without persisting to the database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enrich movie and series metadata (budgets, worldwide box office, runtimes, status) via TMDb API';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $apiKey = config('services.tmdb.api_key') ?: env('TMDB_API_KEY');

        if (empty($apiKey)) {
            $this->warn("TMDb API key is not configured. Please set TMDB_API_KEY in your .env file.");
            $this->line("Example: TMDB_API_KEY=your_api_key_here");
            return self::FAILURE;
        }

        $slug = $this->argument('slug');
        $limit = (int) $this->option('limit');
        $dryRun = (bool) $this->option('dry-run');

        if ($dryRun) {
            $this->warn("Running in DRY-RUN mode. No database records will be modified.");
        }

        $query = Title::query()->where('is_active', true);

        if ($slug) {
            $query->where('slug', $slug);
        } else {
            // Prioritize titles with missing budget or box office
            $query->where(function ($q) {
                $q->whereNull('budget')
                  ->orWhere('budget', 0)
                  ->orWhereNull('box_office')
                  ->orWhere('box_office', 0)
                  ->orWhereNull('runtime')
                  ->orWhere('runtime', 0);
            })->take($limit);
        }

        $titles = $query->get();

        if ($titles->isEmpty()) {
            $this->info("No titles require enrichment matching the criteria.");
            return self::SUCCESS;
        }

        $this->info("Processing {$titles->count()} title(s)...");

        $enrichedCount = 0;

        foreach ($titles as $title) {
            $this->line("Searching TMDb for: <fg=yellow>{$title->title}</> ({$title->release_year})");

            $isSeries = ($title->type?->value ?? $title->type) === 'tv_series';
            $endpoint = $isSeries ? 'search/tv' : 'search/movie';

            $searchRes = Http::timeout(10)->get("https://api.themoviedb.org/3/{$endpoint}", [
                'api_key' => $apiKey,
                'query' => $title->title,
                'year' => $title->release_year,
            ]);

            if ($searchRes->failed() || empty($searchRes->json('results'))) {
                $this->line("  <fg=red>✗ No TMDb match found.</>");
                continue;
            }

            $firstMatch = $searchRes->json('results.0');
            $tmdbId = $firstMatch['id'];

            // Fetch full details
            $detailEndpoint = $isSeries ? "tv/{$tmdbId}" : "movie/{$tmdbId}";
            $detailRes = Http::timeout(10)->get("https://api.themoviedb.org/3/{$detailEndpoint}", [
                'api_key' => $apiKey,
            ]);

            if ($detailRes->failed()) {
                $this->line("  <fg=red>✗ Failed to fetch details for TMDb ID {$tmdbId}.</>");
                continue;
            }

            $details = $detailRes->json();
            $changed = false;

            // 1. Budget
            if (isset($details['budget']) && $details['budget'] > 0 && empty($title->budget)) {
                $this->line("  <fg=green>+ Budget: {$details['budget']}</>");
                $title->budget = (int) $details['budget'];
                $changed = true;
            }

            // 2. Revenue / Box Office
            if (isset($details['revenue']) && $details['revenue'] > 0 && empty($title->box_office)) {
                $this->line("  <fg=green>+ Box Office: {$details['revenue']}</>");
                $title->box_office = (int) $details['revenue'];
                $changed = true;
            }

            // 3. Runtime
            if (isset($details['runtime']) && $details['runtime'] > 0 && empty($title->runtime)) {
                $this->line("  <fg=green>+ Runtime: {$details['runtime']} mins</>");
                $title->runtime = (int) $details['runtime'];
                $changed = true;
            }

            // 4. Tagline
            if (!empty($details['tagline']) && empty($title->tagline)) {
                $title->tagline = SeoHelper::cleanString($details['tagline']);
                $changed = true;
            }

            if ($changed) {
                $enrichedCount++;
                if (!$dryRun) {
                    $title->saveQuietly();
                }
            } else {
                $this->line("  <fg=slate>Already up-to-date.</>");
            }

            // Polite delay for rate limits
            usleep(250000);
        }

        $this->newLine();
        $this->info("Enrichment complete! {$enrichedCount} title(s) updated.");

        return self::SUCCESS;
    }
}

