@extends('layouts.admin')
@section('links')
    <style>
        svg {
            width: 20px;
            height: 20px;
        }


    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex">
                        <h1>Редактирование страницы</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Страница "{{ $pageEdit->translate()->title }}"</h3>
                            </div>
                            <!-- /.card-header -->

                            <form role="form" method="post" action="{{ route('pages.update', ['page' => $pageEdit->id]) }}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                        <div>{{ $pageEdit->translate()->title }}</div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">

                                            <span class="input-group-text">Лого</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.email')</span>
                                        </div>
                                        <input type="text" class="form-control" name="email" value=" @isset($contacts->email){{$contacts->email}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.email') (с форм обратной связи)</span>
                                        </div>
                                        <input type="text" class="form-control" name="email_for_forms" value=" @isset($contacts->email_for_forms){{$contacts->email_for_forms}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.phone') 1</span>
                                        </div>
                                        <input type="text" class="form-control" name="phone_1" value=" @isset($contacts->phone_1){{$contacts->phone_1}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.phone') 2</span>
                                        </div>
                                        <input type="text" class="form-control" name="phone_2" value=" @isset($contacts->phone_2){{$contacts->phone_2}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.phone') (В кнопке соц. сетей)</span>
                                        </div>
                                        <input type="text" class="form-control" name="phone_social" value=" @isset($contacts->phone_social){{$contacts->phone_social}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.viber')</span>
                                        </div>
                                        <input type="text" class="form-control" name="viber" value=" @isset($contacts->viber){{$contacts->viber}}@endisset">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.telegram')</span>
                                        </div>
                                        <input type="text" class="form-control" name="telegram" value=" @isset($contacts->telegram){{$contacts->telegram}}@endisset">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="fb" value=" @isset($contacts->fb){{$contacts->fb}}@endisset">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.instagram-icon')</span>
                                        </div>
                                        <input type="text" class="form-control" name="instagram" value=" @isset($contacts->instagram){{$contacts->instagram}}@endisset">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@include('svg.clock')</span>
                                        </div>
                                        <input type="text" class="form-control" name="working_house" value=" @isset($contacts->working_house){{$contacts->working_house}}@endisset">
                                    </div>


                                    <div class="form-group">
                                        <label>Текст</label>
                                        <textarea  class="form-control editor" name="body" >{{ $pageEdit->translate()->body }}</textarea>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-header"> <h3 class="card-title">Seo</h3></div>

                                    <div class="card-body">

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Seo Заголовок</span>
                                            </div>
                                            <input type="text" class="form-control" name="seo_title"  value="{{ $pageEdit->translate()->seo_title }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Seo ключевые слова</label>
                                            <input type="text" class="form-control" name="seo_keywords"  value="{{ $pageEdit->translate()->seo_keywords }}">

                                        </div>
                                        <div class="form-group">
                                            <label>Seo Описание</label>
                                            <textarea  class="form-control editor-s" name="seo_description" >{{ $pageEdit->translate()->seo_description }}</textarea>
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
