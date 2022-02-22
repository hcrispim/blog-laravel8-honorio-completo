<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog Code Experts</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <style>
    .navbar {
      margin-bottom: 40px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Laravel 8 Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('site.index') }}">Home</a>
        </li>
        @foreach($categories as $category)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('site.category', ['slug' => $category->slug]) }}">{{$category->name}}</a>
        </li>
        @endforeach
      </ul>
    </div>


    @auth
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{auth()->user()->name}}

          @if(auth()->user()->profile)
            <!-- <img src="{{asset('storage/' . auth()->user()->profile->avatar)}}" alt="Foto de {{auth()->user()->name}}" class="rounded-circle" width="50"> -->
            <img src="{{asset('storage/' . auth()->user()->profile->avatar)}}" class="rounded-circle" width="50">
          @endif
          <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

          <a class="dropdown-item" href="{{ route('profile.index') }}">
            Profile
          </a>
        </div>
      </li>
    </ul>
    @endauth
  </nav>
  <div class="container">
    @include("flash::message")
    @yield('content')
  </div>

  <script src="{{asset('js/app.js')}}"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
</body>

</html>