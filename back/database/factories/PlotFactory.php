<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plot>
 */
class PlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => $this->faker->boolean('1') ? random_int(1,User::count()) : NULL,
            'region_id' => random_int(1,Region::count()),
            'longitude' => $this->faker->randomNumber(),
            'latitude' => $this->faker->randomNumber(),
            'price' => random_int(10,1000),
        ];
    }
}
