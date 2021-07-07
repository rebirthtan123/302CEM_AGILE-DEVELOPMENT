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

class receiptTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_receiptIndex()
    {
        $response = $this->post('staff/mainmenu/receipt/17/2');

        $response->assertStatus(200);
    }
    
     public function test_receiptMakePayment()
    {
        $response = $this->followingRedirects()->post('staff/payment/17/2',[
            'id'=>'17', 'status'=>'Paid',
        ]);

        $response->assertStatus(200);
    }

   

}
