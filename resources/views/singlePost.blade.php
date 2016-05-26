@extends('layouts.app')

@section('content')
@if(Auth::guest())
<p>plaeze Login first </p>
@else
<div class="container">
    <div>
        <div style="display: inline">
            <h2><?= $post->title; ?></h2>
            <div style="float: right">
            @if($post->created_at->hour==0)
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" >More
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('editPost/'.$post->id)}}">Edit</a></li>
                        <li><a href="{{ url('deletePost/'.$post->id)}}">Delete</a></li>
                    </ul>
                </div>        
            </div>
            @endif
        </div>
       
        <div>
            <p>author by :<?= $post->user->name; ?></p>
            <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>
        </div>

        <div>
            <h3>Post Content :</h3>
            <p>  <?= $post->content; ?></p>
        </div>


        <div class="container">
         @if($comments)
            <ul style="list-style: none; padding: 0">
                @foreach ($comments as $comment)
                <li class="panel-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h3>{{ $comment->user->name }}</h3>
                            <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                            @if (!Auth::guest() && (Auth::user()->admin || Auth::user()->id == $comment->user_id))
                            <div class="dropdown" >
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" >More
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><button type="button" class="btn updateComment" value="{{$comment->id}}">Edit</button></li>
                                    <li><a href="{{ url('deleteComment/'.$comment->id)}}">Delete</a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                            
                        <div class="list-group-item" id="commentContent">
                            <p>{{ $comment->content }}</p>
                        </div>
                </li>
               
                @endforeach
            </ul>
        @endif

        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Comment Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Update Comment</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="task_id" name="task_id" value="0">
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="{{url('addComment/'.$post->id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="comment">Comment : </label>
                <input type="text" name="comment" class="form-control" />
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Add Comment" />
            </div>
        </form>
        </div>       
        </div>
    @endif
    @endsection


