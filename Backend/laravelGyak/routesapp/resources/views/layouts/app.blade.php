<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
    <title>@yield('page_title', 'Larave Hello Project')</title>
</head>
<body>
    <header class="ps-2 pe-2 d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <div class="me-2" aria-hidden="true">
                <span class="fs-2">👋🫩</span>
            </div>
            <span class="fs-4">Hello Laravel</span>
        </a>
        <x-nav/>
    </header>
    <main class="container">
            @if(session('status'))
                <div class="alert alert-primary" role="alert">
                    {{session('status')}}
                </div>
            @endif

        {{--@section('status')
            <div class="alert alert-primary" role="alert">
                {{$value}}
            </div>
        @endsection--}}

        @section('content')
            DEFAULT CONTENT
        @show
    </main>
</body>
</html>
