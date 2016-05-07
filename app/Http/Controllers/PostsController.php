<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Events\ViewPostHandler;
use Illuminate\Support\Facades\Input;


class PostsController extends Controller {

    
    public function allPosts() {
        $posts = \App\Post::where('publish',1)->paginate(4);
        return view('allPosts')->with('posts', $posts);
    }

    public function publishPosts () {
        $posts = \App\Post::where('publish',0)->paginate(4);
        return view('publishPosts')->with('posts', $posts);
    } 

    public function orderBy($column_name){
        $posts = \App\Post::orderBy($column_name, 'DESC')->paginate(4);
        return view('allPosts')->with('posts', $posts);
    }

    public function publish($id){
        $post = \App\Post::find($id);
        $post->publish=1;
        $post->save();
        return back();
    }

    public function myPosts() {
        $user = Auth::user();
        $posts = \App\Post::where('user_id', '=', $user->id)->where('publish',1)->paginate(4);
        return view('allPosts')->with('posts', $posts);
    }

    public function singlePost($id) {
        $post = \App\Post::find($id);
        $post->viewCount+=1;
        $post->save();
        $comments=$post->comment;
        return view('singlePost')->with('post', $post)->withcomments($comments);
    }

    public function userPosts($id) {
        $posts = \App\Post::where('user_id', '=', $id)->get();
        return view('allPosts')->with('posts', $posts);
    }

    public function newPost() {
        return view('newPost');
    }

    public function addPost(Request $request) {
        $user = Auth::user();
        $post = new \App\Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $user->id;
        if(Input::file('image'))
        {
            $imageName=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images/', $imageName);
            $post->image='/images/'. $imageName;
        }
        $post->save();
        $message = 'Post published successfully';
        return redirect('myPosts')->withMessage($message);
    }
    
    public function editPost($id){
        $post = \App\Post::find($id);
        return view('editPost')->with('post',$post);
    }
    
    public function updatePost($id,Request $request){
        $post = \App\Post::find($id);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('myPosts');
    }
    
    public function deletePost($id){
        $post = \App\Post::find($id);
        $post->delete();
        return redirect('myPosts');
    }

}
