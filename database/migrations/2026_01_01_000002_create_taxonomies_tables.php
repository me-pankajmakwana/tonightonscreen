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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('production_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo_path', 500)->nullable();
            $table->string('headquarters')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('streaming_platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Netflix, Amazon Prime, Disney+, Apple TV+, Theatrical/Cinema
            $table->string('slug')->unique();
            $table->string('logo_path', 500)->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('display_priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streaming_platforms');
        Schema::dropIfExists('production_companies');
        Schema::dropIfExists('genres');
    }
};
