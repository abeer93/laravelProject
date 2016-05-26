<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request ;
use App\Http\Requests;
use Auth;
use Response;

class CommentsController extends Controller {

    //
    public function addComment(Request $request) {
        $user = Auth::user();
        $comment = new \App\Comment;
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment->content = $request->comment;
        $comment->user_id = $user->id;
        $comment->post_id = $request->id;
        $comment->save();
        return back();
    }

    public function deleteComment($id) {
        $comment = \App\Comment::find($id);
        $comment->delete();
        return back();
    }

    public function getComment($id) {
        $comment = \App\Comment::find($id);
        return Response::json($comment);
    }

    public function updateComment(Request $request,$comment_id) {
        $comment = \App\Comment::find($comment_id);
        $comment->content = $request->description;
        // echo $comment;
        // $comment->content = Input::get('description');
        $comment->save();
        // print_r(Input::all());
        // print_r(Input::get('description'));
        // print_r($comment->post->id);
        $post_id=$comment->post->id;
        // return Response::json($comment);
       return $post_id;
    }

}
