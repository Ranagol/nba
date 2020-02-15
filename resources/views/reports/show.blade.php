@extends('elements.master')
@section('title')
@section('content')

<h4>Report title: {{ $report->title }}</h4>
<p>Author: </p>
<p>Content: {{ $report->content }}</p>







@endsection