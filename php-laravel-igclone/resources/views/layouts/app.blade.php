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
                    <b><div class="pl-3" style="font-family: 'Segoe Script';color: #ffffff;  font-size: x-large ; margin: 0px;  padding: 0px" >CodeGram</div></b>
                </a><p class="pr-3" style="color: #ffffff; margin: 0px;  padding: 0px">•</p>
                <a class="" href="/cctv" class="text-dark font-weight-bold" style="font-size: 18px;padding-top: 3px; border-bottom: #ffffff solid; padding-bottom: 0px;color: #ffffff;text-decoration: none"> <b>CCTV</b></a>
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
                                <b><a id="auth-nav" style="color: #ffffff;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></b>
                            </li>
                            <li  class="pt-1" style="color:white">
                               <b style="font-size: large">|</b>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                   <b> <a id="auth-nav" style="color: #ffffff;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></b>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color: #ffffff ; " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b> {{ Auth::user()->username }}</b> <span class="caret"></span>
                                </a>

                                <div style="background-color: rgba(102, 244, 242, 0.9)" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a style="color: #ffffff;" class="dropdown-item" href="/profile/{{Auth::user()->id}}">
                                      <b><p class="pl-3" style="color: #ffffff; margin: 0px;  padding: 0px" >• Profile</p></b>
                                    </a>

                                    <a style="color: #ffffff" class="dropdown-item" href="/#">
                                        <b><p class="pl-3" style="color: #ffffff;  margin: 0px; padding: 0px" >• CodeMessage</p></b>
                                    </a>

                                    <a style="color: #ffffff" class="dropdown-item" href="/about">
                                        <b><p class="pl-3" style="color: #ffffff;  margin: 0px; padding: 0px" >• About</p></b>
                                    </a>

                                    <a style="color: #ffffff" class="dropdown-item" href="/account">
                                        <b><p class="pl-3" style="color: #ffffff;  margin: 0px; padding: 0px" >• Account</p></b>
                                    </a>

                                    <a style="color: #ffffff" class="dropdown-item" href="{{ route('logout') }}"
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
