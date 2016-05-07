@extends('layouts.app')

@section('content')
<!--{!!$posts!!}-->
<div class="container">
@foreach ($posts as $post)
    <h2><a href="{{ url('singlePost/'.$post->id)}}"><?= $post->title; ?></a></h2>
    <span id="frstSpan"><h5> author by :<?= $post->user->name; ?></h5> </span>
    <span><?= $post->content; ?></span>    
    <div><img src="{{url($post->image)}}" alt="userImage" width="200" height="150"></div>
@endforeach

<div>{!! $posts->render() !!}</div>
</div>
@endsection
