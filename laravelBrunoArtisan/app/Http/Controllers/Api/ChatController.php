<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::all();
        return \response($chats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
    
        $chat = Chat::create($request->all());
        return \response($chat, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat = Chat::find($id);

        if (empty($chat)) {
            return \response()->json([
                "message" => "Chat ${id} not found"
            ], 404);
        } else {
            return \response($chat);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chat = Chat::find($id);

        if (empty($chat)) {
            return \response()->json([
                "message" => "Chat ${id} not found"
            ], 404);
        } else {
            $chat->update($request->all());
            return \response($chat);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::find($id);

        if (empty($chat)) {
            return \response()->json([
                "message" => "Chat ${id} not found"
            ], 404);
        } else {
            Chat::destroy($id);
            return \response()->json([
                "message" => "Chat ${id} deleted"
            ]);
            }
    }
}
