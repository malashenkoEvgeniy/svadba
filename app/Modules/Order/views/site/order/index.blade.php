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
                        <a href="#" class="make-order-link make-order " data-tab="order">Оформить заказ</a>
                        <a href="#" class="make-order-link make-fitting active" data-tab="fitting">Записаться на примерку</a>
                    </div>
                    <div class="order-wrap order-block">@widget('order-form')</div>
                    <div class="order-wrap fitting-block active">@widget('fitting-form')</div>

                </div>
                <div class="order-products">@widget('product-cart')</div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        //Табы на странице заказов
        $('.make-order-link').click(function (evt) {
            evt.preventDefault();
            let pref = $(this).attr('data-tab'),
                content = $('.'+ pref +'-block');
            console.log(content);
            $('.make-order-link.active').removeClass('active');
            $(this).addClass('active');
            $('.order-wrap.active').removeClass('active');
            content.addClass('active');
        });
    </script>
@endsection
