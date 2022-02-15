<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function becreated()
    {
        $response = $this->post('/tickets',[
            'titol' => 'Test Titol',
            'desc' => 'Test Desc'
        ]);
        $response->assertStatus(201);
    }
}