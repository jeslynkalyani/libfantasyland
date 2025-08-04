<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col-4 m-4">
        <h4>National Library of Fantasy Land</h4>
        </div>
         @guest
        <div class="col-7 m-4">
        <a href="{{ route('login') }}" class = "btn btn-secondary">Login</a>
        </div>
    @endguest
    </div>


    @auth
    <div class="row">
        <div class="col-4 m-4">
            <h5>Welcome Back, {{Auth::user()->name}} <a href="{{ route('logout') }}">Logout</a></h5>

        </div>
        <div class="col-6 mt-4 mb-4">

        </div>
    </div>
    @endauth
    @yield('content')
</body>
</html>
