<?php

namespace Database\Factories;

use App\Models\Plot;
use App\Models\Worker;
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
            'worker_id' => random_int(1,Worker::count()),
            'plot_id' => random_int(1,Plot::count()),
            'mood' => random_int(1,100),
            'salary' => random_int(20000,60000),
        ];
    }
}
