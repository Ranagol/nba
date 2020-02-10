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


@endsection