<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class kitchenTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_kitchenIndex()
    {
        $response = $this->get('staff/kitchen');

        $response->assertStatus(200);
    }

    public function test_kitchenShowOut()
    {
        $response = $this->get('staff/edit/17');

        $response->assertStatus(200);
    }

    public function test_kitchenUpdate()
    {
        $response = $this->followingRedirects()->post('staff/update/17',[
            'status'=>'Ready',
        ]);

        $response->assertStatus(200);
    }
    
}
