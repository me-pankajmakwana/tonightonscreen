<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->default('movie'); // movie, tv_series, documentary, short_film
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tagline', 500)->nullable();
            $table->longText('overview')->nullable();
            $table->string('status', 40)->default('released'); // announced, in_production, post_production, released, ended, canceled
            $table->date('release_date')->nullable();
            $table->date('end_date')->nullable(); // For series that ended
            $table->string('original_language', 50)->default('English');
            $table->unsignedInteger('runtime_minutes')->nullable(); // Duration for movie or avg runtime for series
            $table->string('content_rating', 20)->nullable(); // PG-13, R, TV-MA, U/A 16+, etc.
            $table->string('poster_path', 500)->nullable(); // Portrait poster upload
            $table->string('backdrop_path', 500)->nullable(); // Landscape backdrop/banner upload
            $table->string('trailer_url', 500)->nullable(); // YouTube or video URL
            $table->unsignedBigInteger('budget')->nullable();
            $table->unsignedBigInteger('box_office')->nullable();
            $table->string('official_website', 500)->nullable();
            $table->decimal('rating', 3, 1)->default(0.0);
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_trending')->default(false)->index();
            $table->timestamps();
        });

        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->unsignedInteger('season_number'); // 1, 2, 3...
            $table->string('name'); // e.g. "Season 1"
            $table->text('overview')->nullable();
            $table->string('poster_path', 500)->nullable();
            $table->string('trailer_url', 500)->nullable();
            $table->date('air_date')->nullable();
            $table->timestamps();

            $table->unique(['title_id', 'season_number']);
        });

        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->constrained('seasons')->cascadeOnDelete();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->unsignedInteger('episode_number'); // 1, 2, 3...
            $table->string('name');
            $table->text('overview')->nullable();
            $table->string('still_path', 500)->nullable(); // Thumbnail
            $table->date('air_date')->nullable();
            $table->unsignedInteger('runtime_minutes')->nullable();
            $table->string('video_url', 500)->nullable();
            $table->timestamps();

            $table->unique(['season_id', 'episode_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
        Schema::dropIfExists('seasons');
        Schema::dropIfExists('titles');
    }
};
