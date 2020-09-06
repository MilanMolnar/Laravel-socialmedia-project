<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CodeGram') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ $body_class ?? ''}}">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mt-3"  id="nav-col">
        <div class="container">
            <a class="navbar-brand d-flex"  href="{{ url('/') }}">
                <div><img src="/images/cc_logo.png" class="pr-3" alt="cclogo" style="height:35px; border-right: 1px solid #ffffff"> </div>
                <b><div class="pl-3" style="font-family: 'Segoe Script';color: #ffffff;  font-size: x-large ; margin: 0px;  padding: 0px" >CodeMessage</div></b>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <b><a  style="color: #ffffff;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></b>
                        </li>

                    @else
                        <li class="nav-item dropdown">
                            <a style="color: #ffffff ; " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b> {{ Auth::user()->username }}</b> <span class="caret"></span>
                            </a>

                            <div style="background-color: rgba(102, 244, 242, 0.8)" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" href="/#">
                                    <b><p class="pl-3" style="color: #ffffff;  margin: 0px; padding: 0px" >• CodeGramm</p></b>
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <b>  <p class="pl-3" style="color: #ffffff; margin: 0px; padding: 0px" >• {{ __('Logout') }}</p></b>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</div>
</body>
</html>
