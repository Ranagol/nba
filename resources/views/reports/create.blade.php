@extends('elements.master')
@section('title')
@section('content')

<h4>Create a new report</h4>

<form action="/reports/create" method="post" >



@foreach($teams as $team)
  <input type="checkbox" name="{{ $team->name }}">
@endforeach

</form>




@endsection