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
            ['Infrastructure', 'Terra Storage', 1, 10],
            ['Infrastructure', 'Eco Generator', 2, 10],
            ['Infrastructure', 'Extractor', 3, 10],
            ['Infrastructure', 'Hydro Storage', 1, 10],
            ['Infrastructure', 'Water Purifier', 2, 10],
            ['Infrastructure', 'Hydro-Pump', 3, 10],
            ['Infrastructure', 'Air Storage', 1, 10],
            ['Infrastructure', 'Air Filter', 2, 10],
            ['Infrastructure', 'Air Compressor', 3, 10],

        ];
        for ($i=1; $i<=10; $i++) {
            foreach ($buildings as $building) {
                DB::table('buildings')->insert(values: [
                    'type' => $building[0],
                    'name' => $building[1],
                    'code' => $building[2],
                    'level' => $i,
                    'price' => $building[2]*$i,
                ]);
            }
        }
    }
}
