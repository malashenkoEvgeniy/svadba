@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/add-to-cart.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <div class="product-page">
                <div class="product-wrapper">
                    <div class="product-photos">
                        <div class="product-photos-wrapper">
                            <ul class="product-main-photos">
                                @foreach($product->attachments as $product_img)
                               <li class="product-main-photo">
                                    <a class="product-main-link">
                                        <img src="{{$product_img->img_d}}" alt="" class="product-main-photo-item">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="product-previews-list">
                                @foreach($product->attachments as $product_img)
                                    <li class="product-previews-item">
                                        <a href="#" class="product-previews-link">
                                            <img src="{{$product_img->img_d}}" alt="" class="product-previews-link-img">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="product-description">
                        <h1 class="product-title">Viola</h1>
                        <ul class="product-characteristics">
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Бренд:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->brand->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Силует:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->silhouette->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Длина:&#8195; </h3>
                                <span class="product-characteristics-item-decription">со шлейфом</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Страна:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->brand->translate()->made_in_country}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Ткань:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->textile->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Цвет:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->color->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">Размер:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->size->size}}</span>
                            </li>
                        </ul>
                        @if($product->is_promotion)
                            <div class="product-price">
                                <span class="product-new-price">{{$product->new_price}} грн.</span>
                                <span class="product-old-price">{{$product->price}} грн.</span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="product-new-price">{{$product->price}} грн.</span>
                            </div>
                        @endif

                        <button class="product-add-cart " >Добавить в корзину</button>

                    </div>
                </div>
                <div class="product-tabs">
                    <ul class="product-tabs-headers">
                        <li class="product-tabs-header-item">
                            <burron class="product-tabs-header-btn">
                                <span>Описание товара </span>
                                <i class="fas fa-chevron-up"></i>
                            </burron>
                            <div class="product-tabs-header-description active">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultrices augue elit sed convallis. Vitae eget laoreet tincidunt nibh amet, ipsum adipiscing. Ligula cursus tincidunt iaculis dignissim facilisi egestas eget. Diam et malesuada eu iaculis mauris sapien.</div>
                        </li>
                        <li class="product-tabs-header-item">
                            <burron class="product-tabs-header-btn">
                                <span>Доставка и оплата</span>
                                <i class="fas fa-chevron-down"></i>
                            </burron>
                            <div class="product-tabs-header-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultrices augue elit sed convallis. Vitae eget laoreet tincidunt nibh amet, ipsum adipiscing. Ligula cursus tincidunt iaculis dignissim facilisi egestas eget. Diam et malesuada eu iaculis mauris sapien.</div>
                        </li>
                    </ul>
                </div>
            </div>
            @widget('similar', $product)
        </section>
    </main>
   @include('includes.site.modal-add-to-cart')
@endsection

@section('scripts')
    <script src="{{asset('site/js/product.js')}}"></script>
    <script>
        // Переключает табы в карточке товара
        $('.product-tabs-header-btn').click(function (){
            if($(this).children('i').hasClass('fa-chevron-up')) {
                $(this).children('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                $(this).siblings('.product-tabs-header-description').removeClass('active');

            } else {
                $(this).children('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                $(this).siblings('.product-tabs-header-description').addClass('active');
            }
        });

        //Добавляет товар в корзину

        function cartOpen(){
            $('.modal-add-to-cart').addClass('active');
            $('body').addClass('overflow-bg');
        }

        function cartClose(){
            $('.modal-add-to-cart').removeClass('active');
            $('body').removeClass('overflow-bg');
        }

        $('.product-add-cart').click(cartOpen);
        $('.btn-close-modal-add-to-cart').click(cartClose);
        // $('.product-add-cart').click(cartClose);
    </script>
@endsection
