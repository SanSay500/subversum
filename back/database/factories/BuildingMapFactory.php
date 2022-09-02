<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\Plot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BuildingMap>
 */
class BuildingMapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'building_id'=>random_int(1,Building::count()),
            'plot_id'=>random_int(1,Plot::count()),
        ];
    }
}
