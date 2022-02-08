<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HomeFix</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/profile.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand h3 sf-toggle-on" href="{{ url('/') }}">
                    HomeFix
                </a>
                <a class="navbar-brand float-right" href="{{ route('service.list') }}">
                    Services
                </a>
                <a class="navbar-brand float-right" href="{{ route('view.cart') }}">
                    Cart
                </a>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (auth()->user()->role !='admin'&& auth()->user()->role !='sp')
                        <a class="navbar-brand float-right" href="{{ route('apply.form') }}">
                            সেবা প্রদানের জন্য আবেদন করুন
                        </a>
                        @endif
                        @if (auth()->user()->role =='admin')
                        <a class="navbar-brand float-right">
                            Admin On Deck
                        </a>
                        <a class="navbar-brand float-right" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                        <a class="navbar-brand float-right " href="{{ route('service.create.view') }}">
                            Create Service Type
                        </a>
                        <a class="navbar-brand float-right " href="{{ route('trans') }}">
                            Transaction List
                        </a>
                        <a class="navbar-brand float-right " href="{{ route('application.list') }}">
                            Applications( {{ Auth::user()->unreadnotifications()->count() }} )
                        </a>
                        
                        @endif
                        @if (auth()->user()->role =='sp')
                        <a class="navbar-brand float-right " href="{{ route('service.list.create') }}">
                            Create Service
                        </a>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="rounded-circle" src="{{ url('/storage/'.Auth::user()->image) }}" width="30" height="30" > {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile',Auth::user()->id) }}">
                                        Profile
                                    </a>
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
    </div>
</body>

@include('layouts.footer')

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };
    
        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</html>
