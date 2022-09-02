<?php

namespace Database\Seeders;

use App\Models\Plot;
use Database\Factories\PlotFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plot::factory(100000)->create();
    }
}
