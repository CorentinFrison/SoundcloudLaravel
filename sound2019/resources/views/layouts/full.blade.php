<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
<header>
    <a href="{{ url('/') }}" data-pjax>
        {{ config('app.name', 'Laravel') }}
    </a>
</header>
<!-- Authentication Links -->
<nav>
    <ul>
        @guest
            <li><a href="{{ route('login') }}" data-pjax>Login</a></li>
            <li><a href="{{ route('register') }}" data-pjax>Register</a></li>
        @else
            <li>Bonjour <a href="/utilisateur/{{ Auth::user()->id }}" data-pjax> {{ Auth::user()->name }}</a></li>
            <li><a href="/nouvelle" data-pjax>Inserer une chanson</li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-pjax>
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>

<form id="search" >
<input type="text" name="searchbar" placeholder="Rechercher" required/>
<input type="submit">
</form>

<audio id="audio" controls>
    <source src="">
</audio>






<main id="pjax-container">
    @yield('content')


</main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>


</body>
</html>