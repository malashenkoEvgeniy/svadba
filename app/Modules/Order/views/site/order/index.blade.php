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

        // function validate_form() {
        //     valid = true;
        //     if ($('#name').value == "") {
        //         alert("Вы не ввели своё имя");
        //         valid = false;
        //     }
        //TODO: закончить валидацию формы
        //     return valid;
        //
        // }


        //Табы в форме заказа
        $('.btn-order').click(function (evt) {
            evt.preventDefault();
            let postf = $(this).attr('data-order'),
                content = $('.order-form-level'+ postf);
            // if(!validate_form()){
            //     console.log('ssss');
            // }

            $('.order-form-level.active').removeClass('active');
            content.addClass('active');
        });

        //Отображение блока инпутов для апи новой почты
        $('#new_post').change(function (evt) {
            $('.new-post-order-block').addClass('active');
        });
        $('#pickup').change(function (evt) {
            if( $('.new-post-order-block').hasClass('active')){
                $('.new-post-order-block').removeClass('active');
            }

        });
        $('#courier').change(function (evt) {
            if( $('.new-post-order-block').hasClass('active')){
                $('.new-post-order-block').removeClass('active');
            }
        });

        $(function() {


            $.ajax({
                url: "https://api.novaposhta.ua/v2.0/",
                type: "post",
                data: {
                    modelName: 'Address',
                    calledMethod: 'getAreas',
                    apikey: "{{ \App\Services\NewPostServices::API_KEY}}",
                },
                headers: {
                    'content-type': "application/json",
                        } ,
                success: function (response) {
                    console.log(response);


                },

                error: function (msg) {
                    debugger;
                    console.log(msg.responseText);
                    // alert('Ошибка');
                }



            });
        });

    });

    </script>
@endsection
