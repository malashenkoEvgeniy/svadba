@extends('layouts.admin')
@section('links')
    <style>
        .new_price_block {
            display: none;
        }

        .new_price_block.active{
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>E-commerce</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">E-commerce</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                @if(count($product->attachments))
                                    <img src="{{$product->attachments[0]->img_d}}" alt="img" class="product-image" width="100" height="50">
                                @else
                                    Нет изображений
                                @endif
                            </div>
                            <div class="col-12 product-image-thumbs">
                                @if(count($product->attachments))
                                    <div class="product-image-thumb active"><img src="{{$product->attachments[0]->img_prev}}" alt="Product Image"></div>
                                @else
                                    Нет изображений
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Название</span>
                                </div>
                                <input type="text" name="title"  class="form-control " id="title"     placeholder="Название" value="{{ $product->translate()->title }}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Родительская категория</span>
                                </div>
                                @if(count($parent)>0)
                                    <select name="category_id"  >
{{--                                        <option value="0" >Выбрать категорию</option>--}}
                                        @foreach($parent as  $category)
                                            <option value="{{$category->id}}" @if($category->id == $product->category_id) checked @endif >{{$category->translate()->title}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>


                            <hr>
{{--                            <h4>Available Colors</h4>--}}
{{--                            <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                                <label class="btn btn-default text-center active">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>--}}
{{--                                    Green--}}
{{--                                    <br>--}}
{{--                                    <i class="fas fa-circle fa-2x text-green"></i>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">--}}
{{--                                    Blue--}}
{{--                                    <br>--}}
{{--                                    <i class="fas fa-circle fa-2x text-blue"></i>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">--}}
{{--                                    Purple--}}
{{--                                    <br>--}}
{{--                                    <i class="fas fa-circle fa-2x text-purple"></i>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">--}}
{{--                                    Red--}}
{{--                                    <br>--}}
{{--                                    <i class="fas fa-circle fa-2x text-red"></i>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">--}}
{{--                                    Orange--}}
{{--                                    <br>--}}
{{--                                    <i class="fas fa-circle fa-2x text-orange"></i>--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <h4 class="mt-3">Size <small>Please select one</small></h4>--}}
{{--                            <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">--}}
{{--                                    <span class="text-xl">S</span>--}}
{{--                                    <br>--}}
{{--                                    Small--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">--}}
{{--                                    <span class="text-xl">M</span>--}}
{{--                                    <br>--}}
{{--                                    Medium--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">--}}
{{--                                    <span class="text-xl">L</span>--}}
{{--                                    <br>--}}
{{--                                    Large--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-default text-center">--}}
{{--                                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">--}}
{{--                                    <span class="text-xl">XL</span>--}}
{{--                                    <br>--}}
{{--                                    Xtra-Large--}}
{{--                                </label>--}}
{{--                            </div>--}}

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    Цена {{ $product->price }}
                                </h2>
                                <div class="promotion-block-edit">
                                    <input id="prom" type="checkbox" class="form-control" name="is_promotion" @if($product->is_promotion) checked @endif ><label for="prom">Товар акционный</label>
                                    <div class="new_price_block @if($product->is_promotion) active @endif">
                                        <label for="new_price">Новая цена</label>
                                        <input id="new_price" type="number" class="form-control" name="new_price" value="{{ $product->new_price }}" >
                                    </div>
                                </div>
                                <input id="is_new" type="checkbox" class="form-control" name="is_new" ><label for="is_new" @if($product->is_new) checked @endif>Товар новинка</label>
                                <input id="is_collection" type="checkbox" class="form-control" name="is_collection" ><label for="is_collection" @if($product->is_collection) checked @endif>Товар новинка</label>
                            </div>

                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Seo</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                <label>Текст</label>
                                <textarea  class="form-control editor" name="body" >{!! $product->translate()->bogy !!}</textarea >
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <div class="card-body">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Seo Заголовок</span>
                                        </div>
                                        <input type="text" class="form-control" name="seo_title">
                                    </div>

                                    <div class="form-group">
                                        <label>Seo Описание</label>
                                        <textarea  class="form-control editor-s" name="seo_description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Seo ключевые слова</label>
                                        <textarea class="form-control editor-s" name="seo_keywords"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
                <div class="card-footer">
                    <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function () {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            });
            $('#prom').change(function (){
                $('.new_price_block').toggleClass('active');
            });
        });
        ClassicEditor
            .create( document.querySelector( '.editor' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                alignment: {
                    options: [ 'left', 'right', 'center', 'justify' ]
                },
                image: {
                    // You need to configure the image toolbar, too, so it uses the new style buttons.
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],

                    styles: [
                        // This option is equal to a situation where no style is applied.
                        'full',

                        // This represents an image aligned to the left.
                        'alignLeft',

                        // This represents an image aligned to the right.
                        'alignRight'
                    ]
                },
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'CKFinder',
                        'outdent',
                        'indent',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        'alignment',
                        'fontBackgroundColor',
                        'fontColor',
                        'fontSize',
                        'fontFamily'
                    ]
                },
                language: 'ru',
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
            } )
            .catch( function( error ) {
                console.error( error );
            } );

    </script>
@endsection
