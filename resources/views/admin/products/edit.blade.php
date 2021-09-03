@extends('layouts.admin')
@section('links')
    <style>
        .preview {
            width: 100%;
        }
        .new_price_block {
            display: none;
        }

        .new_price_block.active{
            display: block;
        }

        .silhouettes-wrap {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .silhouette {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-direction: column;
        }

        .silhouette-label {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-direction: column;

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
            <form role="form" id="edit-main-form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="preview">
                            @if(count($product->attachments))
                                @foreach($product->attachments as $attach)
                                    <img src="{{$attach->img_prev}}" alt="Product Image">
                                @endforeach
                            @else
                                Нет изображений
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <label for="main_available">
                                Товар доступен на сайте
                                <input type="checkbox" name="main-available" id="main_available" @if($product->available > 0) checked @endif >
                            </label>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Изображение</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="images" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                        </div>
                    </div>
                    @if(count($brands)>0)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Бренд</span>
                            </div>

                            <select name="brand_id" >
                                @foreach($brands as  $brand)
                                    <option value="{{$brand->id}}" @if($brand->id == $product->brand->id) selected @endif>{{$brand->translate()->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if(count($textiles)>0)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ткань</span>
                            </div>

                            <select name="textile_id"  >
                                @foreach($textiles as  $textile)
                                    <option value="{{$textile->id}}" @if($textile->id == $product->textile->id) selected @endif>{{$textile->translate()->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if(count($silhouettes)>0)
                        <div class="input-group mb-3" style="display: flex; flex-direction: column">
                            <div class="input-group-prepend">
                                <h3 class="">Силуеты</h3>
                            </div>
                            <div class="silhouettes-wrap">
                                @foreach($silhouettes as  $silhouette)
                                    <div class="silhouette">

                                        <label class="silhouette-label" for="silhouette{{$silhouette->id}}">
                                            <img src="{{$silhouette->scheme}}" alt="">
                                            <span>{{$silhouette->translate()->title}}</span>
                                        </label>
                                        <input type="radio" value="{{$silhouette->id}}" id="silhouette{{$silhouette->id}}" class="silhouette-input" name="silhouette_id"  @if($silhouette->id == $product->silhouette->id) checked @endif ></div>

                                @endforeach
                            </div>
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control " id="title"  value="{{ $product->translate()->title }}"    placeholder="Название">
                    </div>
                    <div class="properties"> </div>

                    <div class="form-group">

                        <input id="is_new" type="checkbox" class="form-control" name="is_new" @if($product->is_new>0) checked @endif ><label for="is_new">Товар новинка</label>
                        <input id="is_collection" type="checkbox" class="form-control" name="is_collection" @if($product->is_collection>0) checked @endif ><label for="is_collection">Товар новинка</label>
                        <input id="prom" type="checkbox" class="form-control" name="is_promotion"  @if($product->is_promotion > 0) checked @endif><label for="prom" >Товар акционный</label>
                        <div class="new_price_block @if($product->is_promotion > 0) active @endif">
                            <label for="new_price"> @if($product->new_price !== 0 )
                            Старая цена
                            @else
                            Новая цена
                            @endif</label>
                            <input id="new_price" type="number" value="{{$product->new_price}}"  class="form-control" name="new_price" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="number" min="10" value="{{$product->price}}"  class="form-control" name="price" >
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
                                <form  method="post" name="product-option-form" id="product-option-form">
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
                                <textarea  class="form-control editor" name="body" >{{ $product->translate()->body }}</textarea>
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



                <div class="card-footer">

                    <button type="submit" id="btn-main-form" class="btn btn-primary">Сохранить</button>
                </div>

            </form>

            <div id="body-table-options">

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

            $('#btn-main-form').click(function () {
                $('#edit-main-form').submit();
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


    </script>
@endsection
