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
                        <form role="form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Изображение</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                    </div>
                                </div>
                                @if(count($parent)>0)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Родительская категория</span>
                                        </div>

                                            <select name="category_id"  >
                                                @foreach($parent as  $category)
                                                    <option value="{{$category->id}}">{{$category->translate()->title}}</option>
                                                @endforeach
                                            </select>

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
                                    <div class="input-group mb-3">
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
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Силуеты</span>
                                        </div>
                                        <div class="silhouettes-wrap">
                                            @foreach($silhouettes as  $silhouette)
                                                <div class="silhouette">
                                                    <img src="{{$silhouette->scheme}}" alt="">
                                                    <label for="silhouette{{$silhouette->id}}">{{$silhouette->translate()->title}}</label>
                                                    <input type="radio" value="{{$silhouette->id}}" id="silhouette{{$silhouette->id}}" name="silhouette_id" >                                            </div>
                                            @endforeach
                                        </div>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Цена</label>
                                    <input type="number" min="100"  class="form-control" name="price" >
                                </div>
                                <div class="form-group">
                                    <input id="is_new" type="checkbox" class="form-control" name="is_new" ><label for="is_new">Товар новинка</label>
                                    <input id="is_collection" type="checkbox" class="form-control" name="is_collection" ><label for="is_collection">Товар новинка</label>
                                    <input id="prom" type="checkbox" class="form-control" name="is_promotion" ><label for="prom">Товар акционный</label>
                                    <div class="new_price_block">
                                        <label for="new_price">Новая цена</label>
                                        <input id="new_price" type="number" class="form-control" name="new_price" >
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
        $('#prom').change(function (){
            $('.new_price_block').toggleClass('active');
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
