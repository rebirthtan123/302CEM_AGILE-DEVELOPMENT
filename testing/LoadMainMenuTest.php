<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoadMainMenuTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_mainmenu()
    {
        $response = $this->get('staff/mainmenu');

        $response->assertStatus(200);
    }
}
