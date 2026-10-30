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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained('titles')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name', 100);
            $table->string('author_email', 150)->nullable();
            $table->unsignedTinyInteger('rating'); // 1 to 10
            $table->string('headline', 200);
            $table->text('content');
            $table->boolean('is_approved')->default(true)->index();
            $table->boolean('contains_spoilers')->default(false);
            $table->unsignedInteger('helpful_votes')->default(0);
            $table->timestamps();

            $table->index(['title_id', 'is_approved', 'created_at']);
            $table->index(['rating']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
