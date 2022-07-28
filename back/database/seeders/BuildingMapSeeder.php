<?php

namespace Database\Seeders;

use App\Models\BuildingMap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingMap::factory(30)->create();
    }
}
