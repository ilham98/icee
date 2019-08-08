<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>ICEE | Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body style="background: url('/img/welcome.jpg'); filter: blur(8);">
        <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
            <div>
          <a class="navbar-brand" href="#">ICEE</a>
          </div>
          <div class="text-light">(International Bla bla)</div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 ml-auto">
               @if (Route::has('login'))
                <div class="top-right mr-3 links">
                    @guest
                        <a class="text-light" href="{{ route('login') }}">Login |</a>
                        <a class="text-light" href="{{ route('register') }}">Register</a>
                    @endguest
                </div>
            @endif
            </form>
          </div>
        </nav>
        <div class="d-flex justify-content-center my-3">
            <img class="col-sm-8" src="/img/welcome.jpg">
        </div>
        <div class="d-flex p-3 justify-content-center">
            <div class="card col-sm-6">
                <div class="card-body">
                @foreach($news as $n)
                    <div class="d-flex justify-content-between">
                        <div class="text-primary h5">{{ $n->title }}</div>
                        <div>{{ date('M d Y', strtotime($n->updated_at)) }}</div>
                    </div>
                    <div>{{ substr($n->body, 0, 100) }}{{ strlen($n->body) > 100 ? '...' : '' }}</div>
                    <hr>
                @endforeach
                <div class="d-flex justify-content-center">
                    <a href="/news" class="btn btn-primary">See More News</a>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
