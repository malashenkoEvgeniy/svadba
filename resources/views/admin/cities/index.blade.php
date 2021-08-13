@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Города</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Города</li>
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
                                <h3 class="card-title">Список городов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('includes.admin.alerts')
{{--                                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить--}}
{{--                                    продукт</a>--}}
                                <form role="form" method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control " id="title"
                                           placeholder="Название">

                                    <div class="card-footer">
                                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                                        <button type="submit" class="btn btn-primary">Добавить город</button>
                                    </div>
                                </form>

                                @if (count($cities))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Наименование</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cities as $city)
                                                <tr>
                                                    <td>{{ $loop->index}}</td>
                                                    <td>{{ $city->translate()->title }}</td>
                                                    <td>
                                                        <form action="{{ route('cities.destroy', ['city' => $city->id]) }}" method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                <i
                                                                    class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>городов пока нет...</p>
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
