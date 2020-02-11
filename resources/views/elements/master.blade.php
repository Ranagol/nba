<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>nba</title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="/welcome">Welcome</a>
          <a class="nav-item nav-link" href="/register">Register</a>
          <a class="nav-item nav-link" href="/login">Login</a>
          <a class="nav-item nav-link" href="/">Teams</a>
          <a class="nav-item nav-link" href="/posts">Create new team</a>
          
            @if(Auth::check())<!--ako user postoji i autentikovan je -->
              <div class="nav-item nav-link">{{ auth()->user()->name}}</div><!--prikazi njegovo ime i logout link -->
              <a class="nav-item nav-link" href="/logout">Logout</a>
              <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit" >Logout</button>
              </form>
            @endif
          
        </div>
    </nav>



    @yield('content')



  </div>


  
  
</body>
</html>