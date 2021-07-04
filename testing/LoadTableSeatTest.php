<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoadTableSeatTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_tableSeat()
    {
        $response = $this->get('staff/table');
        $response->assertStatus(200);
    
    }
}
