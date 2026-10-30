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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('stage_name')->nullable();
            $table->string('slug')->unique();
            $table->string('gender')->default('Not Specified'); // Male, Female, Non-Binary, Not Specified
            $table->string('known_for_department')->default('Acting'); // Acting, Directing, Writing, Production, etc.
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('biography')->nullable();
            $table->string('photo_path', 500)->nullable();
            $table->json('social_links')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
