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
    use WithoutMiddleware;

    /** @test_login_by_staff */
    public function test_login_by_staff()
    {        
        $response = $this->json('POST', 
            'auth/check', 
            ['username' => 'staff',
            'password' => 'staff',
            '_token' => csrf_token()]
        );
        $response->assertStatus(500);
    }
}

?>