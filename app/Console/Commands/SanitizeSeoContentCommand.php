<?php

namespace App\Console\Commands;

use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\Title;
use App\Support\SeoHelper;
use Illuminate\Console\Command;

class SanitizeSeoContentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:sanitize-content 
                            {--dry-run : Preview changes without saving them to the database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sanitize HTML entities (&#039;, &quot;), stray backslashes, and bad escape sequences across Titles, People, and Companies';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $isDryRun = (bool) $this->option('dry-run');

        if ($isDryRun) {
            $this->warn("Running in DRY-RUN mode. No database records will be modified.");
        } else {
            $this->info("Scanning and sanitizing database content...");
        }

        $titlesFixed = $this->sanitizeTitles($isDryRun);
        $peopleFixed = $this->sanitizePeople($isDryRun);
        $companiesFixed = $this->sanitizeCompanies($isDryRun);

        $this->newLine();
        $this->info("=== Sanitization Summary ===");
        $this->line("Titles cleaned:     {$titlesFixed}");
        $this->line("People cleaned:     {$peopleFixed}");
        $this->line("Companies cleaned:  {$companiesFixed}");

        if ($isDryRun && ($titlesFixed + $peopleFixed + $companiesFixed) > 0) {
            $this->warn("Run 'php artisan seo:sanitize-content' (without --dry-run) to persist these fixes.");
        }

        return self::SUCCESS;
    }

    protected function sanitizeTitles(bool $dryRun): int
    {
        $fixedCount = 0;
        $fields = ['overview', 'description', 'tagline', 'title'];

        Title::chunk(100, function ($titles) use (&$fixedCount, $dryRun, $fields) {
            foreach ($titles as $title) {
                $changed = false;

                foreach ($fields as $field) {
                    $original = $title->{$field};
                    if (empty($original)) {
                        continue;
                    }

                    // For overview/description that may contain Quill HTML tags, keep allowed tags but clean bad escape sequences and entities
                    $cleaned = $this->cleanFieldValue($original, $field === 'description' || $field === 'overview');

                    if ($cleaned !== $original) {
                        $this->line("Title #{$title->id} ({$title->slug}) [{$field}]:");
                        $this->line("  <fg=red>- {$this->truncate($original)}</>");
                        $this->line("  <fg=green>+ {$this->truncate($cleaned)}</>");

                        $title->{$field} = $cleaned;
                        $changed = true;
                    }
                }

                if ($changed) {
                    $fixedCount++;
                    if (!$dryRun) {
                        $title->saveQuietly();
                    }
                }
            }
        });

        return $fixedCount;
    }

    protected function sanitizePeople(bool $dryRun): int
    {
        $fixedCount = 0;
        $fields = ['biography', 'birth_place', 'stage_name'];

        Person::chunk(100, function ($people) use (&$fixedCount, $dryRun, $fields) {
            foreach ($people as $person) {
                $changed = false;

                foreach ($fields as $field) {
                    $original = $person->{$field};
                    if (empty($original)) {
                        continue;
                    }

                    $cleaned = $this->cleanFieldValue($original, $field === 'biography');

                    if ($cleaned !== $original) {
                        $this->line("Person #{$person->id} ({$person->slug}) [{$field}]:");
                        $this->line("  <fg=red>- {$this->truncate($original)}</>");
                        $this->line("  <fg=green>+ {$this->truncate($cleaned)}</>");

                        $person->{$field} = $cleaned;
                        $changed = true;
                    }
                }

                if ($changed) {
                    $fixedCount++;
                    if (!$dryRun) {
                        $person->saveQuietly();
                    }
                }
            }
        });

        return $fixedCount;
    }

    protected function sanitizeCompanies(bool $dryRun): int
    {
        $fixedCount = 0;
        $fields = ['description', 'headquarters'];

        ProductionCompany::chunk(100, function ($companies) use (&$fixedCount, $dryRun, $fields) {
            foreach ($companies as $company) {
                $changed = false;

                foreach ($fields as $field) {
                    $original = $company->{$field};
                    if (empty($original)) {
                        continue;
                    }

                    $cleaned = $this->cleanFieldValue($original, $field === 'description');

                    if ($cleaned !== $original) {
                        $this->line("Company #{$company->id} ({$company->slug}) [{$field}]:");
                        $this->line("  <fg=red>- {$this->truncate($original)}</>");
                        $this->line("  <fg=green>+ {$this->truncate($cleaned)}</>");

                        $company->{$field} = $cleaned;
                        $changed = true;
                    }
                }

                if ($changed) {
                    $fixedCount++;
                    if (!$dryRun) {
                        $company->saveQuietly();
                    }
                }
            }
        });

        return $fixedCount;
    }

    protected function cleanFieldValue(string $text, bool $preserveHtmlTags = false): string
    {
        // 1. Decode HTML entities (e.g. &#039; -> ', &quot; -> ", etc.)
        $cleaned = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $cleaned = html_entity_decode($cleaned, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // 2. Remove escaped quotes from legacy SQL / addslashes (e.g. \' -> ', \" -> ")
        $cleaned = stripslashes($cleaned);

        // 3. Remove stray backslashes before characters that form invalid JSON/string escapes
        $cleaned = preg_replace('/\\\\([^"\\\\\/bfnrtu])/', '$1', $cleaned);

        if (!$preserveHtmlTags) {
            $cleaned = strip_tags($cleaned);
            $cleaned = trim(preg_replace('/\s+/', ' ', $cleaned));
        }

        return $cleaned;
    }

    protected function truncate(string $str, int $limit = 90): string
    {
        $str = trim(preg_replace('/\s+/', ' ', strip_tags($str)));
        return mb_strlen($str) > $limit ? mb_substr($str, 0, $limit) . '...' : $str;
    }
}

