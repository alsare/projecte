<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    const TICKET_ID = 11;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ProvaPost()
    {
        $response = $this->post('/api/post',[
            'id' => 'id'
        ]);
        $response->assertStatus(201);
        $content = $response->getContent();
        $json = json_decode($content);
        return $json->id;
    }
}
