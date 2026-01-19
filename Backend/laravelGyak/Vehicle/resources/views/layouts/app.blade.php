<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <title>@yield('page_title', 'Bérelhető Járművek')</title>
</head>
<body>
    <x-nav/>
    <main class="container">
        @section('content')
        @show
    </main>
</body>
</html>
