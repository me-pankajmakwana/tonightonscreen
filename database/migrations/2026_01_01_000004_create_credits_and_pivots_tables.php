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
        // Polymorphic Credits table (Actors, Actresses, Directors, Producers, Writers, etc.)
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('people')->cascadeOnDelete();
            $table->morphs('creditable'); // creditable_type (Title or Episode), creditable_id
            $table->string('department', 50)->default('Acting'); // Acting, Directing, Writing, Production, Sound, etc.
            $table->string('job', 100)->default('Actor'); // Actor, Director, Producer, Executive Producer, Screenplay, etc.
            $table->string('character_name')->nullable(); // For actors: e.g. "Bruce Wayne / Batman"
            $table->unsignedInteger('billing_order')->default(99); // 1 = Top billing, 2, 3...
            $table->boolean('is_featured')->default(false); // Highlighted on summary
            $table->timestamps();

            $table->index(['creditable_type', 'creditable_id', 'department']);
        });

        // Pivot: Titles & Genres
        Schema::create('genre_title', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained('genres')->cascadeOnDelete();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->primary(['genre_id', 'title_id']);
        });

        // Pivot: Titles & Production Companies
        Schema::create('company_title', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_company_id')->constrained('production_companies')->cascadeOnDelete();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->string('role')->default('Production'); // Production, Distribution, Co-Production
            $table->timestamps();
        });

        // Pivot: Titles & Streaming Platforms ("Where to Watch")
        Schema::create('platform_title', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->foreignId('streaming_platform_id')->constrained('streaming_platforms')->cascadeOnDelete();
            $table->string('access_type', 30)->default('subscription'); // subscription, rent, buy, free, cinema
            $table->string('watch_url', 500)->nullable(); // Deep link to watch
            $table->string('quality', 20)->nullable(); // 4K UHD, HDR, 1080p
            $table->timestamps();
        });

        // Media Assets Gallery (for extra photos, posters, backdrops)
        Schema::create('media_assets', function (Blueprint $table) {
            $table->id();
            $table->morphs('mediable'); // Title or Person
            $table->string('type', 30)->default('poster'); // poster, backdrop, still, headshot
            $table->string('file_path', 500);
            $table->string('caption')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_assets');
        Schema::dropIfExists('platform_title');
        Schema::dropIfExists('company_title');
        Schema::dropIfExists('genre_title');
        Schema::dropIfExists('credits');
    }
};
