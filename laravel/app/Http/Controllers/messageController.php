<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();
        return \response($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($cid, Request $request)
    {
        $message = Message::where('id',$cid)->first();
        if($message!=null){
            $request->validate([
                'msg' => 'required||max:255'
            ]);

            $comment = Comment::create([
                'message_id' => $cid,
                'author_id' => 1,
                'msg' => $request->msg
            ]);
            return \response($comment,201);
        }
        else {
            return \response(["cid" => "doesn't exist"], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cid, $id)
    {
        $comment = Comment::findOrFail($id);
        return \response($task);
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
        Comment::findOrFail($id)->update($request->all());
        return \response("Comment Updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid, $id)
    {
        Comment::destroy($id)->where('message_id',$cid);
        return \response("Comment with ID->${id}, has been deleted");
    }
}