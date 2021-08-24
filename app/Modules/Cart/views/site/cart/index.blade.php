@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <h1 class="content-title page-title">Корзина</h1>
          @widget('product-cart')
        </section>
    </main>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
