@extends('elements.master')
@section('title')
@section('content')

<h4>Reports</h4>
<div>
  @foreach($reports as $report)
    <p>Report title: <a href="/reports/{{$report->id }}">{{ $report->title }}</a> </p>
    <p>Report writer:{{ $report->user->name }}</p>
    <hr>
  @endforeach
</div>


{{ $reports->render() }}



@endsection
