<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('titles', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->after('status')->index();
        });

        Schema::table('people', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->after('status')->index();
        });

        // Explicitly set all existing records to inactive (false)
        DB::table('titles')->update(['is_active' => false]);
        DB::table('people')->update(['is_active' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
