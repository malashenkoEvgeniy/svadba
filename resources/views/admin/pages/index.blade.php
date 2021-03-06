@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Страницы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Страницы</li>
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
                                <h3 class="card-title">Список страниц</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('includes.admin.alerts')

                                @if (count($pages))
                                    <div class="table-responsive">
                                        <caption>Основные страницы</caption>
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Наименование</th>
                                                <th>Родитель</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pages as $page)
                                                <tr>
                                                    <td>{{ $loop->index}}</td>
                                                    <td>{{ $page->translate()->title }}</td>
                                                    <td>

                                                        @if($page->parent !== null)
                                                            {{$page->parent->translate()->title}}
                                                        @else
                                                        Нет родителя
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @foreach($pages as $page)
                                            @if(count($page->children))
                                                <caption>Страницы услуг</caption>
                                                <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Добавить
                                                    страницу</a>
                                                <table class="table table-bordered table-hover text-nowrap" style="background-color: #cccccc">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th>Наименование</th>
                                                        <th>Изображение</th>
                                                        <th>Родитель</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($page->children as $subpage)
                                                        <tr>
                                                            <td>{{ $loop->index}}</td>
                                                            <td>{{ $subpage->translate()->title }}</td>
                                                            <td>
                                                                @if(count($subpage->attachments))
                                                                    <img src="{{$subpage->attachments[0]->img_prev}}" alt="img" width="100" height="50">
                                                                @else
                                                                    Нет изображений
                                                                @endif
                                                            </td>
                                                            <td>Услуги</td>
                                                            <td>
                                                                <a href="{{ route('pages.edit', ['page' => $subpage->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>

                                                                <form action="{{ route('pages.destroy', ['page' => $subpage->id]) }}" method="post" class="float-left">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                            onclick="return confirm('Подтвердите удаление')">
                                                                        <i    class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <p>Страниц пока нет...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
{{--                            <div class="card-footer clearfix">--}}
{{--                                {{ $order->links() }}--}}
{{--                                --}}{{--<ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
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
