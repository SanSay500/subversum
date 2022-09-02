<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Building;
use App\Models\Resource;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PlanetSeeder::class,
            ContinentSeeder::class,
            RegionSeeder::class,
            PlotSeeder::class,
            BuildingSeeder::class,
            ResourceSeeder::class,
            WorkerSeeder::class,
            BuildingMapSeeder::class,
            ResourceMapSeeder::class,
            WorkerMapSeeder::class,
            TokenSeeder::class,
            ItemSeeder::class,
            DroneSeeder::class,
            AuctionSeeder::class,
        ]);

    }
}
