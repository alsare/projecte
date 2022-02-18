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
    public function test_createdtickets()
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
     * @depends  test_createdtickets($id)
     */
        public function seen($id)
        {
            $response = $this->GET('/api/tickets/{$id}');
            $response->assertStatus(200);
        }
    /**
     * @return void
     * @depends  test_createdtickets($id)
     */ 
        public function borrar($id)
        {
            $response = $this->delete('/api/tickets/{$id}');
            $response->assertStatus(200);
        }
    /**
     * @return void
     * @depends  test_createdtickets($id)
     */
        public function beupdated($id)
        {
            $response = $this->post('/api/tickets/{$id}' .$ticket -> $id,[
                'titol' => 'TestA',
                'desc' => 'TestA'
            ]);
            $response->assertStatus(201);
        }
}