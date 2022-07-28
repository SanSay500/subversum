<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerMap>
 */
class WorkerMapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'worker_id' => random_int(1,4),
            'region_id' => random_int(1,10),
            'mood' => random_int(1,100),
            'salary' => random_int(20000,60000),
            'total_count' => random_int(1,5000),
        ];
    }
}
