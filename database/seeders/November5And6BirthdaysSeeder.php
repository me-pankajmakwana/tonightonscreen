<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class November5And6BirthdaysSeeder extends Seeder
{
    /**
     * Run the database seeds for November 5 & 6 celebrity birthdays.
     */
    public function run(): void
    {
        $sqlPath = database_path('insert_november_5_and_6_birthdays.sql');
        if (file_exists($sqlPath)) {
            \Illuminate\Support\Facades\DB::unprepared(file_get_contents($sqlPath));
        }

        Cache::flush();
    }
}

