@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{asset('site/css/product.css')}}">

@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content-product">
            <div class="product-page">
                <div class="product-wrapper">
                    <div class="product-photos">
                        <div class="product-photos-wrapper">
                            <ul class="product-main-photos">
                                @foreach($product->attachments as $product_img)
                               <li class="product-main-photo" data-fancybox="gallery" href="{{$product_img->img_f}}">
                                    <a class="product-main-link">
                                        <img src="{{$product_img->img_d}}" alt="" class="product-main-photo-item">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="product-previews-list">
                                @foreach($product->attachments as $product_img)
                                    <li class="product-previews-item">
                                        <a  class="product-previews-link" data-fancybox="gallery" href="{{$product_img->img_f}}">
                                            <img src="{{$product_img->img_d}}" alt="" class="product-previews-link-img">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="product-description">
                        <h1 class="product-title">{{ $product->translate()->title }}</h1>
                        <ul class="product-characteristics">
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">??????????:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->brand->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">????????????:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->silhouette->translate()->title}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">??????????:&#8195; </h3>
                                <span class="product-characteristics-item-decription">???? ??????????????</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">????????????:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->brand->translate()->made_in_country}}</span>
                            </li>
                            <li class="product-characteristics-item">
                                <h3 class="product-characteristics-item-title">??????????:&#8195; </h3>
                                <span class="product-characteristics-item-decription"> {{$product->textile->translate()->title}}</span>
                            </li>

                        </ul>
                        <ul class="product-options">
                            <li class="product-options-item">
                                <h4 class="product-options-item-title">????????????:</h4>
                                <div class="product-options-size-wrap">
                                    @foreach( $product_sizes as $option )
                                        <input type="radio" name="size" data-size="{{ $option->size_id }}" id="size{{ $option->size_id }}" @if($loop->first) checked @endif>
                                        <label for="size{{ $option->size_id }}">{{ $option->sizes->size }}</label>
                                    @endforeach
                                </div>
                            </li>
                            <li class="product-options-item">
                                <h4 class="product-options-item-title">????????:</h4>
                                <div class="product-options-color-wrap">
                                @foreach( $product_colors_first as $option )
                                    <div class="color-input-block">
                                        <input type="radio" name="color" data-color="{{ $option->colors_id }}" id="color{{ $option->colors_id }}" @if($loop->first) checked @endif>
                                        <label for="color{{ $option->colors_id }}">
                                            <span class="colors-value-block" style="background-color: {{ $option->colors->meaning }}"></span>
                                            {{ $option->colors->translate()->title }}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </li>
                        </ul>
                        @if($product->is_promotion)
                            <div class="product-price">
                                <span class="product-new-price">{{ $product->price}} ??????.</span>
                                <span class="product-old-price">{{ $product->new_price}} ??????.</span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="product-new-price">{{ $product->price}} ??????.</span>
                            </div>
                        @endif

                        <button class="product-add-cart" data-cart="{{ $product->id }}" >???????????????? ?? ??????????????</button>

                    </div>
                </div>
                <div class="product-tabs">
                    <ul class="product-tabs-headers">
                        <li class="product-tabs-header-item">
                            <burron class="product-tabs-header-btn">
                                <span>???????????????? ???????????? </span>
                                <i class="fas fa-chevron-up"></i>
                            </burron>
                            <div class="product-tabs-header-description active">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultrices augue elit sed convallis. Vitae eget laoreet tincidunt nibh amet, ipsum adipiscing. Ligula cursus tincidunt iaculis dignissim facilisi egestas eget. Diam et malesuada eu iaculis mauris sapien.</div>
                        </li>
                        <li class="product-tabs-header-item">
                            <burron class="product-tabs-header-btn">
                                <span>???????????????? ?? ????????????</span>
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
{{--   @include('includes.site.modal-add-to-cart')--}}
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{asset('site/js/product.js')}}"></script>
    <script>
        $('input[name=size]').change(function () {
            let sizeId = $(this).data('size')
            $.ajax({
                url: "{{ route('page.select-color', $product->id) }}",
                type: "get",
                data: {
                    id: sizeId
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('.product-options-color-wrap').html(data);

                },
                error: function (msg) {
                    debugger;
                    console.log(msg.responseText);
                    // alert('????????????');
                }
            });
            }

        );


// ==============================================??????????????=====================================================================
//         function modalAddToCart(teg) {
//             function cartOpen(evt){
//                 evt.preventDefault();
//                 $('.modal-add-to-cart').addClass('active');
//                 if(teg == '.product-add-cart'){
//                     addProductToCart();
//                 }
//                 $('body').addClass('overflow-bg');
//             }
//             //?????????????????? ?????????? ??????????????
//             function cartClose(){
//                 $('.modal-add-to-cart').removeClass('active');
//                 $('body').removeClass('overflow-bg');
//             }
//
//             $(teg).click(cartOpen);
//             $('.btn-close-modal-add-to-cart').click(cartClose);
//
//         }

        function addProductToCart(){
            let total_qty = parseInt($('.counter-orders').text());
            total_qty++;
            $('.counter-orders').text(total_qty);
            let prodSize = $('input[name=size]:checked').data('size');
            let prodColor = $('input[name=color]:checked').data('color');
            // console.log(prodColor);

            $.ajax({
                url: "{{ route('cart.add-to-cart') }}",
                type: "post",
                data: {
                    id: $('.product-add-cart').data('cart'),
                    quantity: 1,
                    size: prodSize,
                    color: prodColor
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                   $('.modal-add-to-cart-list').html(data);


                },
                error: function (msg) {
                    debugger;
                    console.log(msg.responseText);
                    // alert('????????????');
                }
            });
        }

        modalAddToCart('.product-add-cart')

    </script>
@endsection
