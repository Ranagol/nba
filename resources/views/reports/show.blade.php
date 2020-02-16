@extends('elements.master')
@section('title')
@section('content')

<h4>Report title: {{ $report->title }}</h4>
<p>Author: <strong>{{ $report->user->name }}</strong></p>
<p>Content: {{ $report->content }}</p>
<p>This report involves: 
  @foreach($report->teams as $team)
    <a href="/reports/team/{{ $team->name }}">{{ $team->name}}</a>
  @endforeach
</p>







@endsection