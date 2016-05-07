<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

/////////// post controller ********************************************************************/
Route::get('myPosts', 'PostsController@myPosts');
Route::get('singlePost/{id}', 'PostsController@singlePost');
Route::get('allPosts', 'PostsController@allPosts');
Route::get('userPosts/{id}', 'PostsController@userPosts');
Route::get('newPost', 'PostsController@newPost');
Route::post('addPost', 'PostsController@addPost');
Route::get('editPost/{id}', 'PostsController@editPost');
Route::post('updatePost/{id}', 'PostsController@updatePost');
Route::get('deletePost/{id}', 'PostsController@deletePost');
Route::get('orderBy/{column_name}', 'PostsController@orderBy');
Route::get('publishPosts', 'PostsController@publishPosts');
Route::post('publish/{id}','PostsController@publish');
/*************************************************************************************************/

/////////// comment controller *********************************************************************
Route::post('addComment/{id}','CommentsController@addComment');
Route::get('deleteComment/{id}', 'CommentsController@deleteComment');
Route::get('/comment/{comment_id}','CommentsController@getComment');
Route::post('/updateComment/{comment_id}','CommentsController@updateComment');
/*************************************************************************************************


/////////// user controller ***********************************************************************/
Route::get('allUsers', 'UserController@allUsers');
Route::get('newUser', 'UserController@newUser');
Route::post('addUser', 'UserController@addUser');
Route::get('updateProfile', 'UserController@updateProfile');
Route::post('editProfile/{id}', 'UserController@editProfile');
/*************************************************************************************************/


// Route::post('/updateComment/{comment_id}',function($comment_id){
  // $comment = \App\Comment::find($comment_id);
  // var_dump($comment);
  // print_r(Input::all());
  // print_r(Input::get('description'));
  // print_r($comment_id);
  // $comment->content = $request->description;
  // $comment->content = Input::get('description');
  // $comment->save();
  // return Response::json($comment);
// });



Route::get('posts', function() {
    $post = App\Post::find(1);
    echo $post->title;
    echo "<br/>";
    echo $post->content;
});

Route::auth();

Route::get('/home', 'HomeController@index');




























