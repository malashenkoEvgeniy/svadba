@extends('layouts.admin')
@section('links')

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование магазина</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Редактирование магазина</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form role="form" method="post" action="{{ route('shops.update', ['shop' => $shop->id]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Город</span>
                        </div>
                        @if(count($cities)>0)
                            <label for="city_id">Выбирите город</label>
                            <select name="city_id"  id="city_id" >
                                @foreach($cities as  $city)
                                    <option value="{{$city->id}}"
                                    @if($city->id == $shop->city->id)
                                         selected @endif

                                    >{{$city->translate()->title}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control " id="title"  value="{{$shop->translate()->title}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@include('svg.email')</span>
                        </div>
                        <input type="text" class="form-control" name="email" value="{{$shop->email}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@include('svg.phone') </span>
                        </div>
                        <input type="text" class="form-control" name="phone"  value="{{$shop->phone}}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@include('svg.clock')</span>
                        </div>
                        <input type="text" class="form-control" name="working_house" value="{{$shop->working_house}}" >
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
                <div class="card-footer">
                    <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
@endsection
