<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterApiPointTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_api()
    {
        $response = $this->post('/api/register',
            [
                'name' => 'Testovan',
                'email' => 'test@shmest',
                'password' => 'password',
                'password_confirmation' => 'password'
            ]
        );
        $response->assertStatus(200);
    }
}
