@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex">
                        <h1>Редактирование бренда</h1>
                        @if(count($brand->attachments))
                            <img src="{{$brand->attachments[0]->img_prev}}" alt="img" width="100" height="50"></td>
                        @else
                            Нет изображений
                        @endif
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
                                <h3 class="card-title">Бренд "{{ $brand->translate()->title }}"</h3>
                            </div>
                            <!-- /.card-header -->

                            <form role="form" method="post" action="{{ route('brands.update', ['brand' => $brand->id]) }}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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

                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title"
                                               class="form-control " id="title"
                                               value="{{ $brand->translate()->title }}"
                                               placeholder="Название">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Страна производитель</label>
                                        <input type="text" name="made_in_country"
                                               value="{{ $brand->translate()->made_in_country }}"
                                               class="form-control" id="title" >

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
