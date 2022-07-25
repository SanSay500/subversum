<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = ['Steel factory', 'Oil Refinery', 'Gold Mine', 'Tech Lab Facility', 'Diamond mine'];

        foreach ($buildings as $building) {
            DB::table('buildings')->insert(values: [
                'type' => $building,
            ]);
        }
    }
}
