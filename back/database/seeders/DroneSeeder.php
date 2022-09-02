<?php

namespace Database\Seeders;

use App\Models\Drone;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected function readable_random_string($length = 6)
    {
        $string = '';
        $vowels = array("a","e","i","o","u");
        $consonants = array(
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
        );

        $max = $length / 2;
        for ($i = 1; $i <= $max; $i++)
        {
            $string .= $consonants[rand(0,19)];
            $string .= $vowels[rand(0,4)];
        }

        return $string;
    }

    public function run()
    {

        $users = User::all()->take(10);
        foreach ($users as $user) {
            $core_item = Item::where('slot', 'core')->where('user_id', $user->id)->value('id');
            $aiChip_item = Item::where('slot', 'aiChip')->where('user_id', $user->id)->value('id');
            $scanner_item = Item::where('slot', 'scanner')->where('user_id', $user->id)->value('id');
            $data_storage_item = Item::where('slot', 'data_storage')->where('user_id', $user->id) ->value('id');
            Drone::create ([
                'name' => ucfirst($this->readable_random_string(random_int(3,9))),
                'user_id' => $user->id,
                'core_slot_item_id' => $core_item,
                'aiChip_slot_item_id' => $aiChip_item,
                'scanner_slot_item_id' => $scanner_item,
                'data_storage_slot_item_id' => $data_storage_item,
            ]);
        }
       //Drone::factory(10)->create();
    }
}
