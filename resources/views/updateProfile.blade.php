@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('editProfile/'.$user->id) }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title" >User name : </label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" />
    </div>
    <div class="form-group">
        <label for="content">Email : </label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}" />
    </div>
    <div class="form-group">
        <!-- <label for="content">Image : </label> -->
        <img src="{{url($user->image)}}" alt="userImage" width="200" height="150">
        <input type="file" name="image" class="form-control" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
</div>

</form>



@endsection
