<h5>Sidebar: teams with reports</h5>

<div>
  <ul>
    @foreach($teams as $team)
      <li><a href="/reports/team/{{ $team->name }}">{{ $team->name}}</a></li>
    @endforeach
  </ul>
  

</div>