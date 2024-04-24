<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayOfWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $daysOfWeek = [
            ['name' => 'Monday'],
            ['name' => 'Tuesday'],
            ['name' => 'Wednesday'],
            ['name' => 'Thursday'],
            ['name' => 'Friday'],
            ['name' => 'Saturday'],
            ['name' => 'Sunday'],
        ];

        DB::table('day_of_weeks')->insert($daysOfWeek);
    }
}
