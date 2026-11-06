<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class November7To10BirthdaysSeeder extends Seeder
{
    /**
     * Run the database seeds for November 7 to 10 celebrity birthdays.
     */
    public function run(): void
    {
        $sqlPath = database_path('insert_november_7_to_10_birthdays.sql');
        if (file_exists($sqlPath)) {
            DB::unprepared(file_get_contents($sqlPath));
        }

        Cache::flush();
    }
}

