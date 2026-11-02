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
        Schema::table('people', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('name');
            $table->string('nationality', 100)->nullable()->after('birth_place');
            $table->string('residence')->nullable()->after('nationality');
            $table->string('hometown')->nullable()->after('residence');
            $table->string('height', 50)->nullable()->after('hometown');
            $table->string('languages')->nullable()->after('height');
            $table->string('education')->nullable()->after('languages');
            $table->string('qualification')->nullable()->after('education');
            $table->string('religion', 100)->nullable()->after('qualification');
            $table->string('zodiac_sign', 50)->nullable()->after('religion');
            $table->string('hobbies')->nullable()->after('zodiac_sign');
            $table->string('other_talents')->nullable()->after('hobbies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'nationality',
                'residence',
                'hometown',
                'height',
                'languages',
                'education',
                'qualification',
                'religion',
                'zodiac_sign',
                'hobbies',
                'other_talents',
            ]);
        });
    }
};
