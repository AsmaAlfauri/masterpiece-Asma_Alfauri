{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div id="root"></div>
</div>
@endsection
 --}}


    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Album example · Bootstrap</title>
    {{-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> --}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Travel Jo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                Travel Jo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','1') }}">Aqaba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','2') }}">Ajloun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','3') }}">Jerash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','4') }}">Madaba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','5') }}">Amman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','6') }}">Zarqa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','7') }}">Ma'an</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','8') }}">Irbid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','9') }}">Mafraq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','10') }}">Al-Balqa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','11') }}">Tafila</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home','12') }}">Karak</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('my_favorites') }}">My Favorites</a>
                                @if(Auth::check())
                                    @if (Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ url('blogs') }}">Admin Panel</a>
                                    @endif
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>
    </nav>
</div>
</body>
<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

                @foreach ($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <img src="{{ asset('uploads/blogs/'.$blog->image) }}" width="100%" height="225" alt="Image">

                            <div class="card-body">
                                <h4 class="text-truncate">{{$blog->title}}</h4>
                                <p class="card-text text-truncate">
                                    {{$blog->body}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- <small class="text-muted">{{$blog->name}}</small> --}}

                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div style="margin: 5px" class="col">

                                        <form method="post" action="{{ route('blog.favorite',$blog->id) }}">
                                            @csrf
                                            <button style="
                        background-color: Transparent;
                        background-repeat:no-repeat;
                        border: none;
                        cursor:pointer;
                        overflow: hidden;  "
                                                    type="submit"><i
                                                    class="icon-heart icon-2x pull-left"></i>{{ $blog->favorite_to_users->count() }}</i>
                                            </button>
                                        </form>
                                        <a class="btn-md center-block pull-right" href="{{$blog->gps}}" target="_blank"
                                           role="button" aria-pressed="true"><i
                                                class="icon-map-marker icon-align-lef icon-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('showblog',$blog->id) }}" class="btn btn-primary btn-lg active"
                               role="button" aria-pressed="true">View</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</main>

<div class="container">
    {!! $blogs->links() !!}
</div>


<footer class="text-muted">
    <div class="container">
        <p class="float-right">
        </p>
    </div>
</footer>
</html>
