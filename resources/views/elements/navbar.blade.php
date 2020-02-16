<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="navbar-nav">
    <a class="nav-item nav-link" href="/welcome">Welcome</a>
    <a class="nav-item nav-link" href="/register">Register</a>
    <a class="nav-item nav-link" href="/login">Login</a>
    <a class="nav-item nav-link" href="/">Teams</a>
    <a class="nav-item nav-link" href="/reports/create">Create a new report</a>
    <a class="nav-item nav-link" href="/reports">All reports</a>
    
    
      @if(Auth::check())<!--ako user postoji i autentikovan je -->
        <div class="nav-item nav-link">You are logged in as: <strong>{{ auth()->user()->name}}</strong></div><!--prikazi njegovo ime i logout link -->
        
        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-danger" type="submit" >Logout</button>
        </form>
      @endif
    
    </div>
</nav>