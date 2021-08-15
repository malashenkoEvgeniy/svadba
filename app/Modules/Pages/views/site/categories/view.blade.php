@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/modal.css')}}">
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
@endsection
