<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
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
            'name' => $this->faker->word(),
            'continent_id' => random_int(1,10),
            'longitude' => $this->faker->randomNumber(),
            'latitude' => $this->faker->randomNumber(),
        ];
    }
}
