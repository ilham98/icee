<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>ICEE | Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <script type="text/javascript" src="/js/app.js"></script>
    </head>
    <body style="background: url('/img/welcome.jpg'); filter: blur(8);">
        <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="#">ICEE</a>
          <div class="text-light">(International Bla bla)</div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 ml-auto">
               @if (Route::has('login'))
               
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link text-light {{ url()->current() === url('/') ? 'font-weight-bold' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ url()->current() === url('/public/news') ? 'font-weight-bold' : '' }}">
                      <a class="nav-link text-light" href="/public/news">News</a>
                    </li>
                    @guest
                      <li class="nav-item {{ url()->current() === url('/login') ? 'font-weight-bold' : '' }}">
                         <a class="nav-link text-light" href="/login">Login</a>
                      </li>
                      <li class="nav-item {{ url()->current() === url('/register') ? 'font-weight-bold' : '' }}"> 
                        <a class="nav-link text-light" href="/register">Register</a>
                      </li>
                    @endguest
                    @auth
                      <li class="nav-item">              
                        <a class="nav-link text-white" href="/dashboard">Dashbboard</a>
                      </li>
                    @endauth
                </ul>
            @endif
            </form>
          </div>
        </nav>
        @yield('content')
    </body>
</html>
