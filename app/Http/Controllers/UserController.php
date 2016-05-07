<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use Auth;

class UserController extends Controller
{ 
    // return all users 
    public function allUsers()
    {
        $users=\App\User::all();
        return view('allUsers')->with('users',$users);
    }
        public function newUser() {
        return view('newUser');
    }

    // create new user
    public function addUser(Request $request) {
        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $pass=$request->password;
        $confPass=$request->confPassword;
        // $user->admin = $request->get('admin', null);
        // $user->blocked = $request->get('blocked', null);
        if($request->has('admin')){
            $user->admin = true;
        }
        else{
            $user->admin = false;
        }
        if($request->has('blocked')){
            $user->blocked = true;
        }
        else{
            $user->blocked = false;
        }
        if($pass==$confPass)
        {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect();
        }
        else{
            // echo "<script>alert('sorry password did not match');</script>";
            return back()->withErrors('password mismatch');
        }
        
        
    }

    public function updateProfile(){
        $logged_user = Auth::user();
        // var_dump($logged_user);
        return view('updateProfile')->with('user',$logged_user);
    }


    public function editProfile($id,Request $request){
        $update_user= \App\User::find($id);
        $update_user->name=$request->name;
        $update_user->email=$request->email;
        // $filename=$request->image;    
        // return  var_dump($filename);
        if(Input::file())
        {
            // $image=Input::file('image')->move(public_path().'/images/', $filename.'.jpg');
            // $imgPlace='/images/'.$update_user->name.'.jpg';
            // $update_user->image=$imgPlace;

            // $file = Input::file('image');
            // $img = Image::make($file);
            // $imageName =$request->file('image')->getClientOriginalExtension();
            $imageName=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images/', $imageName);
            $update_user->image='/images/'. $imageName;
        }
        $update_user->save();
        return back();
    }






}
