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
            ['Main', 'Terra Station', 1, 100],
            ['Main', 'Air Station', 2, 200],
            ['Main', 'Hydro Station', 3, 300],
            ['Infrastructure', 'Terra Storage', 11, 10],
            ['Infrastructure', 'Eco Generator', 12, 10],
            ['Infrastructure', 'Extractor', 13, 10],
            ['Infrastructure', 'Hydro Storage', 21, 10],
            ['Infrastructure', 'Water Purifier', 22, 10],
            ['Infrastructure', 'Hydro-Pump', 23, 10],
            ['Infrastructure', 'Air Storage', 31, 10],
            ['Infrastructure', 'Air Filter', 32, 10],
            ['Infrastructure', 'Air Compressor', 33, 10],

        ];
        for ($i=1; $i<=10; $i++) {
            foreach ($buildings as $building) {
                DB::table('buildings')->insert(values: [
                    'type' => $building[0],
                    'name' => $building[1],
                    'code' => $building[2],
                    'level' => $i,
                    'price' => $building[3]*$i,
                ]);
            }
        }
    }
}
