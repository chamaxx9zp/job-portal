<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  </head>
  <body>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container"> 
          <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            @if(Auth::check())
           
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->profile_pic)
                <img src="{{Storage::url( auth()->user()->profile_pic)}}" width="40" class="rounded-circle">
                @else 
                <img src="https://placehold.co/400" class="rounded-circle" width="40">
                @endif
              </a>
              <ul class="dropdown-menu">
                @if(auth()->user()->user_type === 'seeker')
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('seeker.profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('job.applied')}}">Job applied</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="logout" href="#">Logout</a>
                  <form id="form-logout" action="{{ route('logout') }}" method="post">@csrf</form>
                </li>
                @else 
                <li class="nav-item">
                  <a class="nav-link" id="" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                @endif
              </ul>
            </li>

            @endif
            @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login')  }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('create.seeker') }}">Job Seeker</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('create.employer') }}">Employer</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')

    <script>
      let logout = document.getElementById('logout');
      let form = document.getElementById('form-logout');
      logout.addEventListener('click', function(){
        form.submit();
      })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>