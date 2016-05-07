@extends('layouts.app')

@section('content')

<div class="container">
@if (!Auth::guest() && Auth::user()->admin)

@foreach ($users as $user)

<div class="first">
    <h2><a href="userPosts/{!! $user->id !!}"><?= $user->name; ?></a></h2>
    <li><?= $user->email; ?></li>
    <input name="admin" type="checkbox"   value="<?= $user->admin; ?>" 
    <?php  if($user->admin) echo 'checked';?> > <label> Is Admin   </label>
    <br/>
    <input name="blocked" type="checkbox" value="{{$user->blocked}}" 
    <?php  if($user->blocked) echo 'checked';?>> <label> Is Blocked  </label>



</div>       

@endforeach
 @endif
</div>
@endsection


