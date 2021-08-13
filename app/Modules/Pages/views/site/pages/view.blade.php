@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <h1 class="content-title page-title">{{$page->translate()->title}}</h1>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
