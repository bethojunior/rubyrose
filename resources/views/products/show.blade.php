@extends('layouts.page')

@section('title', 'Listagem de produtos')
@section('content_header')
    <h1 class="m-0 text-dark">Produtos</h1>
@stop

@section('content')
    @include('includes.alerts')

    {{ $products }}
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/index.js') }}"></script>
@endsection
