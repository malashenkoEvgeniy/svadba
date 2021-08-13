@extends('layouts.site')
@section('links')

@endsection
@section('content')
    <main>
        @include('includes.site.breadcrumbs')
        @widget('catalog', 1)
    </main>
@endsection

@section('scripts')

@endsection
