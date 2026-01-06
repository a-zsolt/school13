<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MiniShop - Demo')</title>
</head>
<body>
    <h1>Mini Shop - Szimulátor</h1>
    <hr>
    <nav>
        <a href="{{route('orders.home')}}">Főoldal</a>
    </nav>
    <hr>
    @section('content')

    @show
</body>
</html>
