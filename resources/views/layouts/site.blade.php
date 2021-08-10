<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{asset('site/libs/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/goods.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/pagination.css')}}">
    @yield('links')
    <title>Document</title>
</head>
<body>
<div class="overflow"></div>
<div class="site-content">
   @include('includes.site.header')


    @yield('content')

    @include('includes.site.footer')


</div>
<script src="{{asset('site/js/jquery.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('site/js/script.js')}}"></script>
<script src="{{asset('site/js/home.js')}}"></script>
@yield('scripts')
</body>
</html>
