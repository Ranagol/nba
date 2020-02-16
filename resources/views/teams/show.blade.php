@extends('elements.master')
@section('title')
@section('content')
<h3>Show team</h3>
<h4>Team name: {{ $team->name }}</h4>
<p>Email: {{ $team->email }}</p>
<p>Adress: {{ $team->adress }}</p>
<p>City: {{ $team->city }}</p>
<p>Players:</p>

<ul>
  @foreach($team->players as $player)
    <li><a href="/players/{{$player->id}}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
  @endforeach
</ul>

<div>
  <h4>Create a new comment</h4>
  <form action="/teams/{{$team->id }}/comment" method="POST" >
    @csrf
    <input class="form-control" type="text" name="content" placeholder="Write your comment here">
    <button type="submit" class="btn btn-success" >Submit</button>
  </form>
</div>
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

<hr>
<br>


<div>
  <h4>Comments</h4>
  @foreach($team->comments as $comment)
    <li>Komentator:<strong>{{ $comment->user->name}}</strong>  : {{ $comment->content }}</li>
  @endforeach
</div>



@endsection