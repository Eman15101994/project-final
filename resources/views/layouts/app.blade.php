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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   
</head>
<body>


    <div id="app">
        <nav class="navbar navbar-expand-md bg-light   shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="/">
     
            <img src="{{asset('uploads/img/2.jpg')}}" class="logo-image">
      
</a>
                @if(isset(Auth::user()->id))
              
                <a class="nav-link" href="{{ route('home') }}">
                    Home
                </a>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::user()->id == "1")
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('customers.index') }}">Users</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{route('orders.index')}}">Orders</a>
                    </ul>
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{route('ordermenu.index')}}">Checkes</a>
                    </ul>
                    @endif()
                    @if(Auth::user()->id !="1")
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="{{route('ordermenu.myorders')}}">Myorders</a>
                    </ul>

                    @endif()

@endif()
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
                        <img src="/uploads/images/{{ Auth::user()->Profile_Picture }}" class="logo-image">
                            <li class="nav-item dropdown" style="display:flex; align-items:center;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                   
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    <div class="container" style="background-color:read">
        @yield('mycontent')"
</div>
    <div style="background-color:read">
        @yield('mycontent2')
</div>
</div>
    <div class="container" style="background-color:read">
        @yield('mycontent3')
</div>
</div>
    <div class="container" style="background-color:read">
        @yield('mycontent4')
</div>

@yield('script')
</body>
</html>
