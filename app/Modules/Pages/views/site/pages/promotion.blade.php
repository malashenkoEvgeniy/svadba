@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{ asset('site/css/page.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/modal.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/range-slider.css')}}">

@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">

            <section class="content">
                <h2 class="content-title page-title">{{ $page->translate()->title }}</h2>

            </section>
            <section class="filter">
                <button class="filter-btn filter-btn-filter">Фильтр</button>
                <button class="filter-btn filter-btn-sort">Сортировать по @include('svg.arrow-sort') </button>
                <ul class="filter-btn-sort-list">
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link" data-order="sort-price-asc">возростанию цен</a>
                    </li>
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link" data-order="sort-price-desc">убыванию цен</a>
                    </li>
                </ul>
            </section>
            <section class="rubric-products">
                <ul class="rubric-products-list">
                    @foreach( $products as $product)
                        @widget('product', ['model'=> $product])
                    @endforeach
                </ul>
                <div class="block-pagination">
                    {{ $products->links() }}
                </div>
            </section>
        </section>


    </main>
    @include('includes.site.modal-btn-filter')
@endsection

@section('scripts')
    <script src="{{  asset('site/js/rubric.js')}}"></script>
    <script src="{{  asset('site/js/range-slider.js')}}" async></script>
    <script>

        $(document).ready(function () {
            //Отработка сортировки
            $('.filter-btn-sort-link').click(function (evt) {
                evt.preventDefault();
                $('.filter-btn-sort-list').removeClass('active');
                let orderBy = $(this).data('order');
                // console.log(orderBy);
                $.ajax({
                    url: "{{ route('promotion-sort') }}",
                    type: "get",
                    data: {
                        orderBy: orderBy
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // console.log(data);
                        // debugger;

                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters, location.pathname.length);
                        let newUrl = url + '?';
                        newUrl += 'orderBy=' + orderBy;
                        history.pushState({}, newUrl);
                        $('.rubric-products-list').html(data);
                    },
                    error: function (msg) {
                        debugger;
                        console.log(msg.responseText);
                        // alert('Ошибка');
                    }
                });
            });

            //Отработка фильтрации
            $("#filter-form").change(function(){
                // для читаемости кода
                let $form = $(this);
                console.log( $form.serializeArray() )
                // вы же понимаете, о чём я тут толкую?
                // это ведь одна из ипостасей AJAX-запроса
                // $.post(
                //     $form.attr("action"), // ссылка куда отправляем данные
                //     $form.serialize()     // данные формы
                // );
                // отключаем действие по умолчанию
                return false;
            });

        });


    </script>

@endsection
