<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoadKitchenTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_kitchen()
    {
        $response = $this->get('staff/kitchen');

        $response->assertStatus(200);
    }
}
