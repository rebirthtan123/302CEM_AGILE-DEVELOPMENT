<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adminIndex()
    {
        $response = $this->get('admin/index');

        $response->assertStatus(200);
    }

    public function test_adminMenu()
    {
        $response = $this->get('admin/menu');

        $response->assertStatus(200);
    }

    public function test_adminUser()
    {
        $response = $this->get('admin/user');

        $response->assertStatus(200);
    }

    public function test_storeMenu()
    {        
        $response = $this->followingRedirects()->get(route('admin.menu'), 
            ['itemName' => '',
            'categoryName' => '',
            'price' => '',
            ]
        );
        $response->assertStatus(200);
    }

    public function test_storeUser()
    {        
        $response = $this->followingRedirects()->get(route('admin.user'), 
            ['username' => '',
            'role' => '',
            ]
        );
        $response->assertStatus(200);
    }

    public function test_updateMenu()
    {        
        $response = $this->followingRedirects()->get(route('admin.menu'), 
            ['itemName' => 'menu',
            'categoryName' => 'menu',
            'price' => 'menu',
            ]
        );
        $response->assertStatus(200);
    }

    public function test_updateUser()
    {        
        $response = $this->followingRedirects()->get(route('admin.user'), 
            ['username' => 'staff',
            'role' => 'staff',
            ]
        );
        $response->assertStatus(200);
    }

    
}