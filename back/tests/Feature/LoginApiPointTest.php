<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginApiPointTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_api(){

        $user = User::find(1);
        $response = $this ->post('/api/login',
            ['email' => $user->email, 'password'=>'password']);
        $response->assertStatus(200);

    }
}
