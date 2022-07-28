<?php

namespace Database\Factories;

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
            'resource_id' => random_int(1,4),
            'region_id' => random_int(1,20),
            'short_storage_value' => random_int(1,500),
            'overall_storage_value' => random_int(1,500),
            'total_count' => random_int(1,500),
            'mining_level' => random_int(1,10),
        ];
    }
}
