<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font awsome -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/image/clean-car.png" alt="" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/about-us">Over ons</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                                    {{--  onclick="document.getElementById("logout").className = "logout-dialog-open""  --}}
                                    <a class="dropdown-item"
                                    onclick=" document.getElementById('logout').style.display='block'"><div style="color: black;">logout</div></a>

                                 {{--  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>  --}}
                                </div
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 links-footer">
                    <h3 class="footer-titles">Links</h3>
                    <a href="/about-us">Over ons</a><br>
                    <a href="/login">Login</a><br>
                    <a href="/inschrijven">inschrijven</a><br>
                    <a href="/contact">Contact ons</a><br>
                    <a href="/algemene-voorwaarden">Algemene voorwaarden</a>

                </div>
                <div class="col-md-3 contact-footer">
                        <h3>Contact</h3>
                        Van Dissselstraat 15<br>
                        6262PN<br>
                        Zwolle<br>
                        0626-123456<br>
                        info@easydrive4all.nl
                    </div>
                <div class="col-md text-center mt-auto mb-auto"><img src="/image/clean-car.png" width="100px" alt=""></div>

            </div>
        </div>
    </footer>


        <div id="logout" class="logout-dialog" style="display: none; "> 
            <b class="m-4">Weet u zeker dat u wilt uitloggen?</b>

            <div class="button-yes-cancel">
                <button class="button-yes" href="{{route('logout')}}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">JA</button>
                                   <button class="button-cancel" 
            onclick=" document.getElementById('logout').style.display='none'">CANCEL</button>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form> 
            </div>
  
        </div>

</body>
</html>
