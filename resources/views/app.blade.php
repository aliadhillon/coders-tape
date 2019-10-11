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
        <nav>
            <ul>
                <li><a class="{{ Request::is('/') ? 'active' : null }}" href="/">Welcome</a></li>
                <li><a class="{{ Request::is('about') ? 'active' : null }}" href="/about">About Us</a></li>
                <li><a class="{{ Request::is('services') ? 'active' : null }}" href="/services">Services</a></li>
            </ul>
        </nav>
        <hr>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
