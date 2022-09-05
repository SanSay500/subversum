<?php

namespace Database\Factories;

use App\Models\Plot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourceMap>
 */
class ResourceMapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'resource_id' => random_int(1,3),
            'plot_id' => random_int(1,300000),
            'total_count' => random_int(1000,5000),
        ];
    }
}
