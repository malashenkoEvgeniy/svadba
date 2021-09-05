@extends('layouts.admin')
@section('links')
    <style>
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
                    <h1>Создание категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Создание продукта</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form role="form" method="post" action="{{ route('products.store') }}" name="form" id="form" enctype="multipart/form-data">
                            @csrf
                            @include('includes.admin.alerts')
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Изображение</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required >
                                        <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                    </div>
                                </div>
                                @if(count($parent)>0)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Родительская категория</span>
                                        </div>
                                            <select class="parent_category">
                                                <option value="0">Выбирите категорию</option>
                                                @foreach($parent as  $category)
                                                    <option value="{{$category->id}}">{{$category->translate()->title}}</option>
                                                @endforeach
                                            </select>
                                        <div class="sub-category-wrap">
                                        </div>


                                    </div>
                                @endif
                                @if(count($brands)>0)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Бренд</span>
                                        </div>

                                        <select name="brand_id"  >
                                            @foreach($brands as  $brand)
                                                <option value="{{$brand->id}}">{{$brand->translate()->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if(count($textiles)>0)
                                    <div class="input-group mb-3 accessory">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ткань</span>
                                        </div>

                                        <select name="textile_id"  >
                                            @foreach($textiles as  $textile)
                                                <option value="{{$textile->id}}">{{$textile->translate()->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if(count($silhouettes)>0)
                                    <div class="input-group mb-3 accessory" style="display: flex; flex-direction: column">
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
                                                    <input type="radio" value="{{$silhouette->id}}" id="silhouette{{$silhouette->id}}" class="silhouette-input" name="silhouette_id"  @if($loop->first) checked @endif ></div>

                                            @endforeach
                                        </div>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Название" required>
                                </div>
                                <div class="form-group">
                                    <label>Цена</label>
                                    <input type="number" min="10" value="10"  class="form-control" name="price" >
                                </div>
                                <div class="form-group">
                                    <input id="is_new" type="checkbox" class="form-control" name="is_new" ><label for="is_new">Товар новинка</label>
                                    <input id="is_collection" type="checkbox" class="form-control" name="is_collection" ><label for="is_collection">Товар новинка</label>
                                    <input id="prom" type="checkbox" class="form-control" name="is_promotion" ><label for="prom">Товар акционный</label>
                                    <div class="new_price_block">
                                        <label for="new_price">Новая цена</label>
                                        <input id="new_price" type="number"  class="form-control" name="new_price" >
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Текст</label>
                                    <textarea  class="form-control editor" name="body" ></textarea >
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header"> <h3 class="card-title">Seo</h3></div>

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

                            <div class="card-footer">
                                <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.parent_category').change(function () {
                let val = $(this).val();
                if(val == 3){
                   $('.accessory').fadeOut();
                } else {
                    $('.accessory').fadeIn();
                }
                $.ajax({
                    url: "{{ route('get-sub-category') }}",
                    type: "get",
                    data: {
                        id: val
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('.sub-category-wrap').html(data);
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



        $('#prom').change(function (){
            $('.new_price_block').toggleClass('active');
        });



    </script>
@endsection
