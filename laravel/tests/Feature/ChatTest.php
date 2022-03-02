<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'autor_id',
            'mensaje',
            'id'
        ]);
    }


    public function show($id){
    
        $chatapp = DB::table('chatapp')
        ->select('mensaje', 'id', 'autor_id')
        ->where('id', '=', $id)
        ->get();
        return \response($chatapp);
    }

    public function update(Request $request, $id)
    {
        $chatapp=Chattapp::find($id);
        $chatapp->update($request->all());
        return $chatapp;
    }

    public function destroy($id)
    {
        return Task::destroy($id);
    }
}
