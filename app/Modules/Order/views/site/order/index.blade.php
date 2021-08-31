@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <h1 class="content-title page-title">Оформление заказа</h1>
            <div class="order-wrap">
                <div class="order-form">
                    <div class="order-form-header">
                        <a href="#" class="make-order-link make-order active" data-tab="order">Оформить заказ</a>
                        <a href="#" class="make-order-link make-fitting " data-tab="fitting">Записаться на примерку</a>
                    </div>
                    <div class="order-wrap order-block active">@widget('order-form')</div>
                    <div class="order-wrap fitting-block ">@widget('fitting-form')</div>

                </div>
                <div class="order-products">@widget('product-cart')</div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            window.showCart();

        //Табы на странице заказов
        $('.make-order-link').click(function (evt) {
            evt.preventDefault();
            let pref = $(this).attr('data-tab'),
                content = $('.'+ pref +'-block');

            $('.make-order-link.active').removeClass('active');
            $(this).addClass('active');
            $('.order-wrap.active').removeClass('active');
            content.addClass('active');
        });


           let phoneMask = IMask(
                document.getElementById('phone'), {
                    mask: '+{38}(000)000-00-00'
                });


        //Табы в форме заказа
        $('.btn-order1').click(function (evt) {
            evt.preventDefault();
            let postf = $(this).attr('data-order'),
                content = $('.order-form-level'+ postf);
              if($('#name').val().length > 0){
                $('#name').removeClass('invalid');
            }

            if($('#surnamename').val().length > 0){
                $('#surnamename').removeClass('invalid');
            }

            if($('#phone').val().length > 0){
                $('#phone').removeClass('invalid');
            }

            if($('#name').hasClass('invalid') ||  $('#surnamename').hasClass('invalid')  || $('#phone').hasClass('invalid') ) {

                $('.invalid').css('border', '2px solid red');
                $('.el-input:not(.invalid)').css('border', '2px solid #000');
            } else {
                $('.el-input:not(.invalid)').css('border', '2px solid #000');
                $('.order-form-level.active').removeClass('active');
                content.addClass('active');
            }

        });

            $('.btn-order2').click(function (evt) {
                evt.preventDefault();
                let postf = $(this).attr('data-order'),
                    content = $('.order-form-level'+ postf);

                    $('.order-form-level.active').removeClass('active');
                    content.addClass('active');
            });

        //Отображение блока инпутов для апи новой почты
        $('#new_post').change(function (evt) {
            $('.new-post-order-block').addClass('active');

            if( !$('.new-post-order-block').hasClass('active')){
                $('.new-post-order-block').addClass('active');
            }

            if( $('.input-pickup').hasClass('active')){
                $('.input-pickup').removeClass('active');
            }

            if( $('.courier-input').hasClass('active')){
                $('.courier-input').removeClass('active');
            }
        });
        $('#pickup').change(function (evt) {
            if( $('.new-post-order-block').hasClass('active')){
                $('.new-post-order-block').removeClass('active');
            }

            if( !$('.input-pickup').hasClass('active')){
                $('.input-pickup').addClass('active');
            }

            if( $('.courier-input').hasClass('active')){
                $('.courier-input').removeClass('active');
            }

        });
        $('#courier').change(function (evt) {
            if( $('.new-post-order-block').hasClass('active')){
                $('.new-post-order-block').removeClass('active');
            }

            if( $('.input-pickup').hasClass('active')){
                $('.input-pickup').removeClass('active');
            }

            if( !$('.courier-input').hasClass('active')){
                $('.courier-input').addClass('active');
            }
        });

        {{--$(function() {--}}


        {{--    $.ajax({--}}
        {{--        url: "https://api.novaposhta.ua/v2.0/",--}}
        {{--        type: "post",--}}
        {{--        data: {--}}
        {{--            modelName: 'Address',--}}
        {{--            calledMethod: 'getAreas',--}}
        {{--            apikey: "{{ \App\Services\NewPostServices::API_KEY}}",--}}
        {{--        },--}}
        {{--        headers: {--}}
        {{--            'content-type': "application/json",--}}
        {{--                } ,--}}
        {{--        success: function (response) {--}}
        {{--            console.log(response);--}}


        {{--        },--}}

        {{--        error: function (msg) {--}}
        {{--            debugger;--}}
        {{--            console.log(msg.responseText);--}}
        {{--            // alert('Ошибка');--}}
        {{--        }--}}



        {{--    });--}}
        {{--});--}}

{{--            $(function() {--}}
{{--                var settings = {--}}
{{--                    "async": true,--}}
{{--                    "crossDomain": true,--}}
{{--                    "url": "https://api.novaposhta.ua/v2.0/json/",--}}
{{--                    "method": "POST",--}}
{{--                    "headers": {--}}
{{--                        "content-type": "application/json",--}}

{{--                    },--}}
{{--                    "processData": false,--}}
{{--                    "data": "{\r\n\"apiKey\": \"{{ \App\Services\NewPostServices::API_KEY}}\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}"--}}
{{--                }--}}

{{--                $.ajax(settings).done(function (response) { console.log(response);--}}
{{--                });--}}
{{--            });--}}

    });

    </script>
@endsection
