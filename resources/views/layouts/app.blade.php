<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/favicon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UCR') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9bb80f595a.js" crossorigin="anonymous"></script>

    <!-- jQuery CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script> -->

    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/booking.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/masterList.css') }}" rel="stylesheet">
    <link href="{{ asset('css/RegiForm.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                 <a class="navbar-brand me-3" href="{{url('/')}}"><img src="{{asset('img/Logo-black.png')}}" height="60px" width="60px" alt=""></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">About UCR</a>
                        </li>
                     
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('browse')}}">Browse</a>
                        </li>
                        
                        @if (Auth::user())
                            @if((Auth::user()->role == 'Staff') OR (Auth::user()->role == 'Admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('computer')}}">Manage Computer</a>
                                </li>
                                
                            @endif
                           
                            @if (Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin')}}">Dashboard</a>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <!-- Center Navbar -->
                    <form class="search-bar me-auto m-3">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     @if(Auth::user()->role == 'User')
                                        <a class="dropdown-item" href="{{route('user-account')}}">My Account</a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                   
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        @if(Route::currentRouteName()!==('home'))
            <div class="footer container">
                <h2 class="text-center mt-3 pt-3">Connect with Us</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    <!-- Address -->
                    <div class="address text-center p-3 mt-3">
                        <h4>Our Office</h4>
                        <address>
                            123 Sandy Bay Rd,<br>
                            Sandy Bay TAS 7003 <br>
                            Centenary Building, 34 <br>
                            University of Tasmania <br>
                            <br>
                            (07) 456 9870 <br>
                            
                        </address>
                    </div>
                    
                    <!-- Social media -->
                    <div class="social text-center p-3 m-3">
                        <h4>Social Media</h4>
                        <a href="http://facebook.com/UCR" class="link-success">Facebook</a>  <br>
                        <a href="http://instagram.com/UCR" class="link-success">Instagram</a>  <br>
                        <a href="http://twitter.com/UCR" class="link-success">Twitter</a>  <br>
                        <a href="http://utas.edu.au" class="link-success">UniApp</a>  <br>

                        <br>
                        
                        <i>help@ucr.com.au</i> 
                    </div>
                </div>
                <p class="text-center mb-5">&copy; 2022 UTAS Computer Rental Service - UCR</p>

            </div>
        @endif
        

        <!-- scripts -->
        @yield('scripts')
    </div>
</body>
</html>
