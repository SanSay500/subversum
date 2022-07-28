<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->truncate();
        $workers = ['Builder', 'Carrier', 'Scientist', 'Overseer'];

        foreach ($workers as $worker) {
            DB::table('workers')->insert(values: [
                'type' => $worker,
            ]);
        }
    }
}
