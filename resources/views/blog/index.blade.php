@extends('layouts.page')

@section('title', 'Listagem de Blogs')
@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Blogs</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">
        @foreach($blogs as $blog)
            <div class="card col-lg-4 col-sm-12 pt-1 pb-1">
                <p> {{ $blog->title }} </p>
                <p> {{ $blog->content }} </p>
                <img src="{{ asset('storage/').'/'.$blog->image }}">
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/list.js') }}"></script>
@endsection
