<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal_access_tokens')->insert(values: [
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => 1,
            'name'=>'api-token',
            'token' => '36bef2142bd8dd29bccab31d27d8c8f31e47748b6f16bcf47b5c991b3cd13001', // 1|TKs9DCANgCIzNLZFTYfzifpNv41WsitYNhJYpd5v
            'abilities' => '["*"]',
        ]);
    }
}
