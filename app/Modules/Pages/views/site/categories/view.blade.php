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
                <h2 class="content-title page-title">{{ $rubric->translate()->title }}</h2>
                @if($rubric->slug !== 'akcii')
                    @if( count($categories))
                        <ul class="content-brands-list">
                            <li class="content-brands-item">@lang('main.categories'):</li>
                            @foreach( $categories as $category)
                                <li class="content-brands-item">
                                    <a href="{{ route('page.category.view', ['slug'=>$category->slug])}}" class="content-brands-link">{{$category->translate()->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endif

                @if($rubric->id !== 3)
                    @if($rubric->parent_id !== 3)
                        @if($silhouettes !== null)
                        <div class="silhouette">
                            <h3 class="silhouette-title">Силуэт</h3>
                            <ul class="silhouette-list">
                                @foreach( $silhouettes as $silhouette)
                                <li class="silhouette-item">
                                    <div class="silhouette-link" data-link="{{$silhouette->id}}">
                                        <img src="{{$silhouette->attachments[0]->img_d}}" alt="" class="silhouette-img">
                                        <h4 class="silhouette-link-title">{{ $silhouette->translate()->title }}</h4>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                     @endif
                @endif
            </section>
            <section class="filter">
                <button class="filter-btn filter-btn-filter">Фильтр</button>
                <button class="filter-btn filter-btn-sort">Сортировать по @include('svg.arrow-sort') </button>
                <ul class="filter-btn-sort-list">
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link" data-order="sort-promotion">акционные</a>
                    </li>
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link" data-order="sort-new">новинки</a>
                    </li>
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
                    url: "{{ route('view-sort', $rubric->slug) }}",
                    type: "get",
                    data: {
                        orderBy: orderBy
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
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

            $('.silhouette-link').click(function (evt) {
                evt.preventDefault();
                let id = $(this).data('link');
                $.ajax({
                    url: "{{ route('view-filter', $rubric->slug) }}",
                    type: "get",
                    data: {
                        silhouettes: [id],
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('.rubric-products').html(data);
                        // console.log(data);
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
                let $form = $(this);
                let obj = $form.serializeArray();
                let brands = [];
                let colors = [];
                let silhouettes = [];
                let textiles = [];
                let sizes = [];
                let pricemin, pricemax;
                console.log(obj);
                obj.forEach(function(item, i, arr) {
                    if(item['name']=='brand[]'){
                        brands.push(item['value']);
                    }
                    if(item['name']=='color[]'){
                        colors.push(item['value']);
                    }
                    if(item['name']=='silhouette[]'){
                        silhouettes.push(item['value']);
                    }
                    if(item['name']=='textile[]'){
                       textiles.push(item['value']);
                    }
                    if(item['name']=='size[]'){
                        sizes.push(item['value']);
                    }
                    if(item['name']=='pricemin'){
                        pricemin = item['value'];
                    }
                    if(item['name']=='pricemax'){
                        pricemax = item['value'];
                    }
                });
                $.ajax({
                    url: "{{ route('view-filter', $rubric->slug) }}",
                    type: "get",
                    data: {
                        brands: brands,
                        colors: colors,
                        silhouettes: silhouettes,
                        textiles: textiles,
                        sizes: sizes,
                        pricemin: pricemin,
                        pricemax: pricemax
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('.rubric-products').html(data);
                        // console.log(data);
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
