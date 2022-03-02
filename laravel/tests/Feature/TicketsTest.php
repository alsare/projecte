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
    public function test_ApiPostTickets()
    {
        $response = $this->post('/api/tickets',[
             'titol' => 'Test',
             'desc' => 'Test'
        ]);
        $response->assertStatus(201);
        $content = $response->getContent();
        $json = json_decode($content);
        return $json ->id;
    }

    /**
     * @return void
     * @depends  test_ApiPostTickets($id)
     */
        public function test_ApiGetTickets($id)
        {
            $response = $this->GET('/api/tickets/{$id}');
            $response->assertStatus(200);
        }
    /**
     * @return void
     * @depends  test_ApiPostTickets($id)
     */ 
        public function test_ApiDeleteTickets($id)
        {
            $response = $this->delete('/api/tickets/{$id}');
            $response->assertStatus(200);
        }
    /**
     * @return void
     * @depends  test_ApiPostTickets($id)
     */
        public function test_ApiPutTickets($id)
        {
            $response = $this->put('/api/tickets/{$id}' .$ticket -> $id,[
                'titol' => 'TestA',
                'desc' => 'TestA'
            ]);
            $response->assertStatus(201);
        }
}