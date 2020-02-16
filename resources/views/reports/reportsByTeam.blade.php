@extends('elements.master')
@section('title')
@section('content')

<h4>Reports about {{ $team->name }} </h4>



@foreach($team->reports as $report)
  <p>Report title: <a href="/reports/{{$report->id }}">{{ $report->title }}</a> </p>
  <p>Report writer:{{ $report->user->name }}</p>
  <p>This report involves: 
      @foreach($report->teams as $team)
        <a href="/reports/team/{{ $team->name }}">{{ $team->name}}</a>
      @endforeach
  </p>
  <p>Report date: {{ $report->created_at }}</p>
  <hr>
@endforeach





@endsection