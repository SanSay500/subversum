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
//            'building_id'=>Building::where('id',fake()->randomElement([1,2,3,13,14,15,25,26,27]))->value('id'),//Building::where('id',fake()->randomElement([4,5,6,7,8,9,16,17,18,20,28,29,30,45,57,46]))->value('id'),
            'building_id'=>Building::where('id',fake()->randomElement([4,5,6,7,8,9,16,17,18,20,28,29,30,45,57,46]))->value('id'),
            'plot_id'=>random_int(1,30),
        ];
    }
}
