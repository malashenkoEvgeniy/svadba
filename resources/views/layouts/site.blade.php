<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('site/img/favicon.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@400;500;700&family=Vollkorn&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>--}}
{{--    <link href="nouislider.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="{{asset('site/libs/nouislider/dist/nouislider.css')}}">--}}
{{--    <link rel="stylesheet" type="text/css"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">--}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('site/libs/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/breadcrumbs.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/goods.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/pagination.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/add-to-cart.css')}}">
    @yield('links')
    <title>Svadba-Kiev</title>
</head>
<body>
<div class="overflow"></div>
<div class="site-content">
   @include('includes.site.header')


    @yield('content')
    @include('includes.site.modal-add-to-cart')
    @include('includes.site.footer')


</div>
<script src="{{ asset('site/js/jquery.js')}}"></script>
<script rel="stylesheet" src="{{ asset('/js/app.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
{{--<script src="{{asset('site/libs/nouislider/dist/nouislider.js')}}"></script>--}}
<script src="{{asset('site/js/script.js')}}"></script>
<script src="{{asset('site/js/home.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Введите название платья или бренда',
        ajax: {
            url: "{{ route('ajax-autocomplete-search')}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                // debugger;
                console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            slug: item.slug,
                            text: item.id+' '+item.title,
                            id: item.id
                        }
                    })
                };
            },
            errors() {
                debugger;
            },
            cache: true
        }
    });
</script>
@yield('scripts')
</body>
</html>
