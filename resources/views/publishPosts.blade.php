@extends('layouts.app')

@section('content')
<!--{!!$posts!!}-->
<div class="container">
@foreach ($posts as $post)
    <h2><a href="{{ url('singlePost/'.$post->id)}}"><?= $post->title; ?></a></h2>
    <span id="frstSpan"><h5> author by :<?= $post->user->name; ?></h5> </span>
    <span><?= $post->content; ?></span>   
    <div>
    	<form action="{{url('publish/'.$post->id)}}" method="post" accept-charset="utf-8">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<button type="submit" value="publish" class="btn btn-primary">publish</button>
        </form>    
    </div>    
@endforeach

<div>{!! $posts->render() !!}</div>
</div>
@endsection
