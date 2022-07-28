<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->truncate();
        $resources = ['Oil', 'Gold', 'Steel', 'Diamonds'];

        foreach ($resources as $resource) {
            DB::table('resources')->insert(values: [
                'type' => $resource,
            ]);
        }
    }
}
