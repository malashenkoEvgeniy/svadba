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
                                <input type="file" name="images" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
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
                                <div id="body-table-options">
                                <label for="main_available">
                                    Товар доступен на сайте
                                    <input type="checkbox" name="main-available" id="main_available">
                                </label>
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Цвет</th>
                                        <th>Размер</th>
                                        <th>Количество</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $product->options as $option)
                                        <tr>
                                            <td>{{ $loop->index}}</td>
                                            <td>{{ $option->colors->translate()->title }}</td>
                                            <td>{{ $option->sizes->size }}</td>
                                            <td>{{ $option->available_quantity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h5>Общее количество доступных товаров <span id="count-products">{{ \App\Services\ProductService::getCountProducts($product) }}</span></h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-options-tab" data-toggle="tab" href="#product-options" role="tab" aria-controls="product-options" aria-selected="false">Options</a>
                                <a class="nav-item nav-link " id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Seo</a>

                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-options" role="tabpanel" aria-labelledby="product-options-tab">
                                <form action="{{ route('request-product-option') }}" method="post" name="product-option-form" id="product-option-form">
                                    <label for="color_id">Цвета</label>
                                    <select name="color_id" id="color_id"  >
                                        @foreach($colors as  $color)
                                            <option value="{{$color->id}}">{{$color->translate()->title}}</option>
                                        @endforeach
                                    </select>
                                    <label for="size_id">Размер</label>
                                    <input name="size" id="size_id" type="number" min="30" value="30" >
                                    <label for="available_quantity_id">Количество</label>
                                    <input name="available_quantity" id="available_quantity_id" type="number" value="1" >
                                    <button type="button" class="btn btn-primary product-option-form-btn">Добавить</button>


                                </form>
                            </div>
                            <div class="tab-pane fade " id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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

            $('.product-option-form-btn').click( function () {
                    $.ajax({
                        url: "{{ route('request-product-option') }}",
                        type: "post",
                        data: {
                            id: {{ $product->id  }},
                            color_id: $('#color_id').val(),
                            size:  $('#size_id').val(),
                            available_quantity:  $('#available_quantity_id').val(),

                        },
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            $('#body-table-options').html(data);
                        },
                        error: function (msg) {
                            debugger;
                            console.log(msg.responseText);
                            // alert('Ошибка');
                        }
                    });
                }
            );
        });
        // ClassicEditor
        //     .create( document.querySelector( '.editor' ), {
        //         ckfinder: {
        //             uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        //         },
        //         alignment: {
        //             options: [ 'left', 'right', 'center', 'justify' ]
        //         },
        //         image: {
        //             // You need to configure the image toolbar, too, so it uses the new style buttons.
        //             toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],
        //
        //             styles: [
        //                 // This option is equal to a situation where no style is applied.
        //                 'full',
        //
        //                 // This represents an image aligned to the left.
        //                 'alignLeft',
        //
        //                 // This represents an image aligned to the right.
        //                 'alignRight'
        //             ]
        //         },
        //         toolbar: {
        //             items: [
        //                 'heading',
        //                 '|',
        //                 'bold',
        //                 'italic',
        //                 'link',
        //                 'bulletedList',
        //                 'numberedList',
        //                 '|',
        //                 'CKFinder',
        //                 'outdent',
        //                 'indent',
        //                 '|',
        //                 'blockQuote',
        //                 'insertTable',
        //                 'mediaEmbed',
        //                 'undo',
        //                 'redo',
        //                 'alignment',
        //                 'fontBackgroundColor',
        //                 'fontColor',
        //                 'fontSize',
        //                 'fontFamily'
        //             ]
        //         },
        //         language: 'ru',
        //         table: {
        //             contentToolbar: [
        //                 'tableColumn',
        //                 'tableRow',
        //                 'mergeTableCells'
        //             ]
        //         },
        //         licenseKey: '',
        //     } )
        //     .catch( function( error ) {
        //         console.error( error );
        //     } );

    </script>
@endsection
