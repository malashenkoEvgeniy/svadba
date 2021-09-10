{{--<?php--}}
{{--if(!isset($_COOKIE['cart_id'])) {--}}
{{--    setcookie('cart_id', uniqid());--}}
{{--}--}}

{{--?>--}}
{{--    {{dd($_COOKIE['cart_id'])}}--}}
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
    <link rel="stylesheet" href="{{ asset('site/css/social_buttons.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/modal.css')}}">
    @yield('links')
    <title>Svadba-Kiev</title>
</head>
<body>
<div class="overflow"></div>
<div class="site-content" id="site-content">
   @include('includes.site.header')


    @yield('content')
    @include('includes.site.social_buttons')
    @include('includes.site.modal-add-to-cart')
    @include('includes.site.footer')
    @include('includes.site.fitting-form-modal')
    @include('includes.site.form_fitting_success_alert')


</div>
<script src="{{ asset('site/js/jquery.js')}}"></script>
<script rel="stylesheet" src="{{ asset('/js/app.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="https://unpkg.com/imask"></script>
<script src="{{asset('site/js/script.js')}}"></script>
<script src="{{asset('site/js/home.js')}}"></script>
<script src="{{asset('site/js/social_buttons.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        let eventSelect = $('.livesearch').select2({
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
                                text: item.id + ' ' + item.title,
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

        eventSelect.on("select2:select", function (e) {
            console.log("select2:select");
            $('.search-form').submit();
        });



        function log (name, evt) {
            if (!evt) {
                var args = "{}";
            } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                    if (value && value.nodeName) return "[DOM node]";
                    if (value instanceof $.Event) return "[$.Event]";
                    return value;
                });
            }
            var $e = $("<li>" + name + " -> " + args + "</li>");
            $eventLog.append($e);
            $e.animate({ opacity: 1 }, 10000, 'linear', function () {
                $e.animate({ opacity: 0 }, 2000, 'linear', function () {
                    $e.remove();
                });
            });
        }

        window.showCart = function () {

        $.ajax({
            url: "{{ route('cart.show-to-show') }}",
            type: "get",
            data: {},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // console.log(data);
                $('.modal-add-to-cart-list').html(data);


            },
            error: function (msg) {
                debugger;
                console.log(msg.responseText);
                // alert('Ошибка');
            }
        });
         }
        let fittingForm = document.forms.fitting_form;
        $(fittingForm).submit(function (evt) {
            let timeArr = ((fittingForm.elements.date.value.split('-').join(', ') + ', ' + fittingForm.elements.time.value.split(':').join(', ')).split(','));
            let dateNow = new Date();
            let date = new Date(
                parseInt(timeArr[0]),
                parseInt(timeArr[1]),
                parseInt(timeArr[2]),
                parseInt(timeArr[3]),
                parseInt(timeArr[4])
            )
            let diff =date - dateNow; // вычитаем два объекта с датами друг от друга
            if(diff <= 0) {
                $('.wrong_date').fadeIn();
                setTimeout(function () {
                    $('.wrong_date').fadeOut();
                }, 3000);
            } else {

                $.ajax({
                    url: "{{ route('fittingForms') }}",
                    type: "post",
                    data: {
                        name: fittingForm.elements.name.value,
                        phone: fittingForm.elements.phone.value,
                        date: date.getTime(),
                        msg: fittingForm.elements.msg.value,
                        shop_id: fittingForm.elements.address.value
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        evt.preventDefault();
                        $('.fitting-success').fadeIn();
                        let str = 'Спасибо за запрос. Будем рады вас видеть ' + fittingForm.elements.date.value.split('-').reverse().join('.') + ' в ' + fittingForm.elements.time.value;
                        $('.fitting-success span').text(str);
                        setTimeout(function () {
                            $('.fitting-success').fadeOut();
                        }, 3000);

                        console.log(data);
                    },
                    error: function (msg) {
                        debugger;
                        console.log(msg.responseText);
                        // alert('Ошибка');
                    }
                });
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>
