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
        DB::table('buildings')->truncate();
        $buildings = [
            ['Terra Station', 100],
            ['Air Station', 200],
            ['Hydro Station', 300],
        ];
        foreach ($buildings as $building) {
            DB::table('buildings')->insert(values: [
                'type' => $building[0],
                'price' => $building[1],
            ]);
        }
    }
}
