@extends('elements.master')
@section('title')
@section('content')

<h4>Create a new report</h4>

<form action="/reports/create" method="post" >
  <div class="form-group">
    @csrf
    <div>
      <label for="title">Report title</label>
      <input id="title" type="text" class="form-control" name="title"  placeholder="Report title" required>
    </div>
  
    <div>
        <label for="content">Report content</label>
        <textarea id="content" name="content" class="textarea form-control" placeholder="Report content" required></textarea>
    </div>
  
    @foreach($teams as $team)
      <input type="checkbox" id="{{ $team->name }}" name="arrayForTeamIds[]" value="{{ $team->id }}">
      <label for="{{ $team->name }}">{{ $team->name }}</label><!--So, under name we actually created an array, because we wan't this checkbox thingy to create and send something like this: arrayForTeamIds = [ 0 => 1, 1 => 2, 2 => 3]. arrayForTeamIds contains id of every checked team. Don't forget, 1 report can belong to many teams at the same time. So, we are sending an array. In the ReportController@store there is a whereIn() that is expecting this array... See the ReportController@store for further info.
          
      -->
    @endforeach

    @include('elements.errors')
  
    <div>
      <button class="btn btn-info" type="submit">Submit</button>
    </div>
  </div>
 

  

</form>




@endsection