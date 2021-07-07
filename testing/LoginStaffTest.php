<?php

namespace Tests\Feature;

use App\Model\Staff;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan; 

class StaffLoginTest extends TestCase
{
    

    /** @test_login_by_staff */
    public function test_login_by_staff()
    {        
        $response = $this->followingRedirects()->post(route('auth.check'), 
            ['username' => 'staff',
            'password' => 'staff',
            ]
        );
        $response->assertStatus(200);
    }

    public function test_login_validate()
    {        
        $response = $this->post(route('auth.check'), 
            ['username' => '',
            'password' => '',
            ]
        );
        $response->assertSessionHasErrors([
            'username' => 'The username field is required.',
            'password' => 'The password field is required.',
        ]);
    }
}

?>