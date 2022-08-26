<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'user_id' => User::find(random_int(1,10)),
        'resource_id' => Resource::find(random_int(1,3)),
        'res_quantity' => random_int(1, 50000),
        'lot_price' => random_int(1, 100000),
        ];
    }
}
