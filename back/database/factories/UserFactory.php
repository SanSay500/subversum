<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'dollars_count' => random_int(10, 100000),
            'terra_count' => random_int(10, 100000),
            'air_count' => random_int(10, 100000),
            'hydro_count' => random_int(10, 10000),
            'critical_step_chance' => 1,
            'critical_step_force' => 0.05,
            'dollars_per_step' => 1500,
            'max_dollars' => 3000,
            'energy' => 100,
            'crystals' => 1,
            'steps' => 0,
            'level' => random_int(1, 10),
            'exp' => 5.55,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
