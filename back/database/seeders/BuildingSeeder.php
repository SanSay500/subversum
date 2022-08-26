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
            ['Steel factory', 100],
            ['Oil Refinery', 200],
            ['Gold Mine', 300],
            ['Tech Lab Facility', 500],
            ['Diamond mine', 1000]
        ];
        foreach ($buildings as $building) {
            DB::table('buildings')->insert(values: [
                'type' => $building[0],
                'price' => $building[1],
            ]);
        }
    }
}
