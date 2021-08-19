@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/modal.css')}}">
    <style>
        .irs {
            top: 10px;
        }
        .irs--flat {
            height: 60px;
            width: 100%;
        }
        .irs--flat .irs-line {
            top: 15px;
            height: 1px;
            background-color: #000000;
            border-radius: 4px;
        }

        .irs--flat .irs-bar {
            top: 23px;
            height: 4px;
            background-color: #000000;
        }

        .irs--flat .irs-handle>i:first-child {
            position: absolute;
            display: block;
            top: -4px;
            left: 50%;
            width: 17px;
            height: 17px;
            margin-left: -1px;
            background-color: #000;
        }

        .irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single {
            color: #000000;
            font-size: 10px;
            line-height: 1.333;
            text-shadow: none;
            padding: 1px 5px;
            background-color: transparent;
            border: 1px solid #000000;

            border-radius: 4px;
            cursor: pointer;
        }

        .irs-from {
            visibility: visible;
            left: 0px!important;
            top: -30px!important;
            border-radius: 0;
            padding: 5px 65px;
        }

        .irs-to {
            visibility: visible;
            right: 0px;
            top: -30px;
            border-radius: 0;
            padding: 5px 65px;
        }

        .irs--flat .irs-from:before, .irs--flat .irs-to:before, .irs--flat .irs-single:before {
            position: absolute;
            display: block;
            content: "";
            bottom: -6px;
            left: 50%;
            width: 0;
            height: 0;
            margin-left: -3px;
            overflow: hidden;
            border: 3px solid transparent;
        }

        .irs--flat .irs-min, .irs--flat .irs-max {
            top: 0;
            padding: 1px 3px;
            color: #999;
            font-size: 10px;
            line-height: 1.333;
            text-shadow: none;
            background-color: #e1e4e9;
            border-radius: 4px;
            visibility: visible!important;
        }
    </style>
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">

            <section class="content">
                <h2 class="content-title page-title">Свадебные платья </h2>
                @if( count($categories))
                    <ul class="content-brands-list">
                        <li class="content-brands-item">@lang('main.categories'):</li>
                        <li class="content-brands-item">
                            <a href="#" class="content-brands-link">Все</a>
                        </li>

                        @foreach( $categories as $category)
                            <li class="content-brands-item">
                                <a href="{{ route('page.category.view', ['slug'=>$category->slug])}}" class="content-brands-link">{{$category->translate()->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if($silhouettes !== null)
                <div class="silhouette">
                    <h3 class="silhouette-title">Силуэт</h3>
                    <ul class="silhouette-list">
                        @foreach( $silhouettes as $silhouette)
                        <li class="silhouette-item">
                            <a href="#" class="silhouette-link">
                                <img src="{{$silhouette->attachments[0]->img_d}}" alt="" class="silhouette-img">
                                <h4 class="silhouette-link-title">{{ $silhouette->translate()->title }}</h4>

                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </section>
            <section class="filter">
                <button class="filter-btn filter-btn-filter">Фильтр</button>
                <button class="filter-btn filter-btn-sort">Сортировать по<i class="fas fa-chevron-down"></i></button>
                <ul class="filter-btn-sort-list">
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link">акционные</a>
                    </li>
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link">новинки</a>
                    </li>
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link">возростанию цен</a>
                    </li>
                    <li class="filter-btn-sort-item">
                        <a href="#" class="filter-btn-sort-link">убыванию цен</a>
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
    <script src="{{asset('site/js/rubric.js')}}"></script>
    <script>
        $(".js-range-slider").ionRangeSlider({
            grid: false,
            type: "double",

        });


        let nonLinearStepSlider = document.getElementById('slider-non-linear-step');

        noUiSlider.create(nonLinearStepSlider, {
            start: [500, 4000],
            range: {
                'min': [0],
                '10%': [500, 500],
                '50%': [4000, 1000],
                'max': [10000]
            }
        });
    </script>

@endsection
