<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="center">
        <a class="no-dec" href="/"><h2 class="title">Coder's Tape</h2></a>
        @include('partials.nav')
        <hr>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        <p>All Rights Reserved &COPY; 2019</p>
    </footer>
    @include('sweetalert::alert')
</body>
</html>
