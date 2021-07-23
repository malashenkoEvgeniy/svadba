@extends('admin.layouts.layout')

@section('title', 'Admin panel')
@section('links')
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Создать страницу</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Создать страницу</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin.includes.alerts')
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Картинка</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Название страницы</span>
                                    </div>
                                    <input type="text" class="form-control" name="title" required>
                                </div>

                                <div class="input-group mb-3">
                                    <h5 class="card-title mb-3">Описание</h5>
                                </div>
                                <div class="mb-3">
                          <textarea  name="body" class="editor">

                          </textarea>
                                </div>
                                @if(count($pages_parent))
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Родитель</span>
                                        </div>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">нет родителя</option>
                                            @foreach($pages_parent  as $item)
                                                <option value="{{$item->id}}">{{ $item->translate()->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif




                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seo Заголовок</span>
                                    </div>
                                    <input type="text" class="form-control" name="seo_title">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Seo ключевые слова</span>
                                    </div>
                                    <input type="text" class="form-control" name="seo_keywords">
                                </div>

                                <div class="form-group">
                                    <label>Seo Описание</label>
                                    <textarea class="form-control"  name="seo_description" ></textarea>
                                </div>

                                <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@section('scripts')
    <script>
        initEditor('.editor');
    </script>

@endsection
