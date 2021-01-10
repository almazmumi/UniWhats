<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UniWhats') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/allFontAwesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/Montserrat.css') }}" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    @yield('style')

</head>

<body>
    <div id="app">
        <div class="navbar">
            <div class="navbar-header">
                <div class="logo">
                    <a href="/" style="text-decoration:none;color:#fff;"><img src="{{ asset('images/logo.png') }}" alt="Logo"> beta</a>
                </div>
                <div class="buttons">
                <a href="{{route('groups.create')}}"><i id="button search" class="fas fa-plus"></i></a>
                    <i id="button menu" class="fas fa-sliders-h" onclick="showMenu()"></i>
                </div>
            </div>
            <div class="navbar-menu">
                <p class="description">
                    <b>UniWhats</b> is the home of student's whatsapp groups. Currently serving King Fahd University only (KFUPM).
                </p>
                <ul class="menu-links">
                    @if(!Auth::guest())
                    {{-- <li><a href="{{url('login')}}">Login</a></li>
                    <li><a href="{{url('register')}}">Signup</a></li> --}}
                    {{-- @else --}}
                    <li><a href="">Welcome, {{Auth::user()->name}}</a></li>
                    @endif
                    <li><a href="{{route('feedback')}}">Feedback Page</a></li>
                    @if(!Auth::guest())
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
        @yield('searchBar')

        <div class="container">
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @yield('script')
</body>

</html>
