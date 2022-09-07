<?php

namespace Database\Seeders;

use App\Models\Plot;
use App\Models\User;
use Database\Factories\PlotFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            for ($j=1; $j<=1000; $j++) {
                DB::table('plots')->insert(values: [
                    'name' => fake()->word(),
                    'user_id' => fake()->boolean('1') ? random_int(1, User::count()) : NULL,
                    'region_id' => $i,
                    'water_count' => 3000,
                    'terra_count' => 3000,
                    'hydro_count' => 3000,
                    'longitude' => $i,
                    'latitude' => $j,
                    'price' => random_int(10, 1000),
                ]);
            }
}
//        Plot::factory(100000)->create();
    }
}
