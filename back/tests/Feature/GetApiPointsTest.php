<?php

namespace Tests\Feature;

use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestApiPoints extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_api_users()
    {
        $response = $this->get('api/users');

        $response->assertStatus(200);
    }

    public function test_api_buildings()
    {
        $response = $this->get('api/buildings');

        $response->assertStatus(200);
    }

    public function test_api_resources()
    {
        $response = $this->get('api/resources');

        $response->assertStatus(200);
    }

    public function test_api_regions()
    {
        $response = $this->get('api/regions');

        $response->assertStatus(200);
    }

    public function test_api_items()
    {
        $response = $this->get('api/items');

        $response->assertStatus(200);
    }

    public function test_api_drones()
    {
        $response = $this->get('api/drones');

        $response->assertStatus(200);
    }

    public function test_api_auctions()
    {
        $response = $this->get('api/auctions');

        $response->assertStatus(200);
    }
    public function test_api_user_info()
    {
        $response = $this->get('api/users/3');

        $response->assertStatus(200);
    }
    public function test_api_regions_info()
    {
        $response = $this->get('api/regions/2');

        $response->assertStatus(200);
    }

    public function test_api_plot_info()
    {
        $response = $this->get('api/plots/2');

        $response->assertStatus(200);
    }

    public function test_api_resources_map()
    {
        $response = $this->get('api/res_map');

        $response->assertStatus(200);
    }

    public function test_api_buildings_map()
    {
        $response = $this->get('api/buildings_map');

        $response->assertStatus(200);
    }

    public function test_api_workers_map()
    {
        $response = $this->get('api/workers_map');

        $response->assertStatus(200);
    }


}
