@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
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
                        <h3 class="card-title">Список категорий</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
{{--                        @include('admin.includes.alerts')--}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $page->translate()->title }}</td>
                                            <td>
                                                <a href="{{ route('home.edit', $page->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="card-footer clearfix">
                        @if(count($slider))
                            <h2>Изображения для слайдера</h2>
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Изображение</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slider as $slide)
                                @foreach($slide->attachments as $slide_img)
                                    <tr>

                                        <td><img src="{{$slide_img->img_prev }}" alt="Превью">
                                            </td>
                                        <td>

                                            <form action="{{ route('home.destroy',  $slide->id) }}" method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                    <i  class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
