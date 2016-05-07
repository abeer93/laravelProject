@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('updatePost/'.$post->id)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title" >Title : </label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}"/>
    </div>
    <div class="form-group">
        <label for="content">Content : </label>
        <input type="text" name="content" class="form-control" value="{{ $post->content }}"/>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit" />
    </div>


</form>
</div>


@endsection