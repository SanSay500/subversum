<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    protected function randomFloat($min = 0, $max = 1): array|float|int
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word()).' '.ucfirst($this->faker->word()),
            'slot' => $this->faker->randomElement(['analyzer','scanner','engine', 'storage']),
            'is_nft' => $this->faker->boolean(10),
            'rarity' => random_int(1,10),
            'user_id' => random_int(1, 10),
            'primary_max_dollars' => random_int(1500,224000),
            'primary_critical_step_chance' => round($this->randomFloat(0.002, 0.20),4),
            'primary_critical_step_force' => round($this->randomFloat(0.011, 0.029),4),
            'primary_dollars_per_step' => random_int(1500, 15000),
            'secondary_max_dollars' =>random_int(300,44800),
            'secondary_critical_step_chance' => round($this->randomFloat(0.0004, 0.04),4),
            'secondary_critical_step_force' => round($this->randomFloat(0.0022, 0.0058),4),
            'secondary_dollars_per_step' =>random_int(300, 3000),
        ];
    }
}
