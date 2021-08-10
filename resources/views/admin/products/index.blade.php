@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Продукты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Продукты</li>
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
                                <h3 class="card-title">Список продуктов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('includes.admin.alerts')
                                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить
                                    продукт</a>
                                @if (count($products))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Наименование</th>
                                                <th>Изображение</th>
                                                <th>Цена</th>
                                                <th>Родитель</th>
                                                <th>Товар акционный</th>
                                                <th>Товар-новинка</th>
                                                <th>Товар коллекция</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $loop->index}}</td>
                                                    <td>{{ $product->translate()->title }}</td>
                                                    <td>
                                                        @if(count($product->attachments))
                                                        <img src="{{$product->attachments[0]->img_prev}}" alt="img" width="100" height="50">
                                                        @else
                                                            Нет изображений
                                                        @endif
                                                    </td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->category->translate()->title}}</td>
                                                    <td>@if($product->is_promotion)
                                                            +<br> Новая цена: {{$product->new_price}}
                                                        @else - @endif
                                                    </td>
                                                    <td>@if($product->is_new) + @else - @endif </td>
                                                    <td>@if($product->is_collection) + @else - @endif </td>
                                                    <td>
                                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post" class="float-left">
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
                                    <p>Продуктов пока нет...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
{{--                            <div class="card-footer clearfix">--}}
{{--                                {{ $categories->links() }}--}}
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
