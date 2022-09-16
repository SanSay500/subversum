<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_of_level=['easy_level','middle_level', 'hard_level'];
        $count_of_steps=[50, 10000, 30000];

        for ($i=0; $i<=2; $i++){
            DB::table('daily_events')->insert(values:[
                'name_of_level'=>$name_of_level[$i],
                'count_of_steps'=>$count_of_steps[$i],
            ]);
        }
    }
}
