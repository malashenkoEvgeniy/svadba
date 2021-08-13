@extends('layouts.site')


@section('links')
{{--    <link rel="stylesheet" href="{{ asset('assets/front/css/404.css') }}">--}}
@endsection


@section('content')

<div class="error-404">
    <h2 class="error-title">404</h2>
    <div>Страница
        <div>не</div>
        найдена</div>
    <a href='{{ LaravelLocalization::localizeUrl("/") }}' class="btn btn-primary button_return"> <span class="button__title"> Перейти на главную</span></a>
</div>
@endsection
@section('scripts')
    <script>
        setInterval(function (){
            $('.error-title').toggleClass('active');
        }, 300);


    </script>
@endsection

