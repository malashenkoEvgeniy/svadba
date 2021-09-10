@extends('layouts.site')
@section('links')
    <link rel="stylesheet" href="{{asset('site/css/page.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/temp.css')}}">
@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        <section class="content">
            <h1 class="content-title page-title" style="margin-bottom: 30px">{{$page->translate()->title}}</h1>
            <div>{!! $page->translate()->body !!}</div>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
