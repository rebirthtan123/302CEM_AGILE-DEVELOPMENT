<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class menuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_menuIndex()
    {
        $response = $this->get('staff/mainmenu');

        $response->assertStatus(200);
    }

    
}
