<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Item;
use function PHPUnit\Framework\isEmpty;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drone>
 */
class DroneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all()->take(10);
        foreach ($users as $user) {
            $engine_item = Item::where('slot', 'engine')->where('user_id', $user->id)->value('id');
            $analyzer_item = Item::where('slot', 'analyzer')->where('user_id', $user->id)->value('id');
            $scanner_item = Item::where('slot', 'scanner')->where('user_id', $user->id)->value('id');
            $storage_item = Item::where('slot', 'storage')->where('user_id', $user->id) ->value('id');
            return [
                'name' => $this->faker->colorName(),
                'user_id' => $user->id,
                'engine_slot_item_id' => $engine_item,
                'analyzer_slot_item_id' => $analyzer_item,
                'scanner_slot_item_id' => $scanner_item,
                'storage_slot_item_id' => $storage_item,
            ];
        }
    }
}
