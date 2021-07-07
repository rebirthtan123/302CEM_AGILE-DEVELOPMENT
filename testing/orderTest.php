<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan; 

class orderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_orderIndex()
    {
        $response = $this->get('staff/addOrder/1');

        $response->assertStatus(200);
    }
    
     public function test_viewOrder()
    {
        $response = $this->get('admin/viewOrder');

        $response->assertStatus(200);
    }

    public function test_orderStore()
    {
        $response = $this->followingRedirects()->post('staff/addOrder/store/1',['statusTable'=>'Occupied', 'table_id'=>'1', 
        'quantities'=>[10], 'menus'=>[1],
    ]);

        $response->assertStatus(200);
    }

    public function test_orderUpdate()
    {
        $response = $this->followingRedirects()->post('staff/order/1',[
            'id'=>'17', 'status'=>'Served',
        ]);

        $response->assertStatus(200);
    }

    public function test_orderDelete()
    {
        $response = $this->followingRedirects()->post('staff/mainmenu/delete/100/3');

        $response->assertStatus(200);
    }
}
