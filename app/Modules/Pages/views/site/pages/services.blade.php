@extends('layouts.site')
@section('links')

@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        @widget('catalog', ['is_category'=>0])
    </main>
@endsection

@section('scripts')

@endsection
