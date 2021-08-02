<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('/site/css/layout.css')}}">
    </head>
    <body>
    <header>
        <div class="header-wrapper">
            <div class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="" class="nav-link">Item1</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Item2</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Item3</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Item4</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Item5</a></li>
                </ul>
                <p class="end-nav">End of header</p>
            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>
