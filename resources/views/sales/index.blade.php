@extends('layouts.page')

@section('title', 'Dashboard ')
@section('content_header')
    <h1 class="m-0 text-dark">Pedidos</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
    <div class="header row col-lg-12 col-sm-12">
        <div class="form-group col-lg-2 col-sm-12">
            <span>Buscar pelo ID</span>
            <input id="search-sale-id" class="form-control">
        </div>
        <div class="form-group col-lg-4 col-sm-12">
            <span>Buscar pelo Revendedor</span>
            <input id="search-sale" class="form-control">
        </div>
        <div class="form-group col-lg-2 col-sm-12">
            <span>&nbsp;</span>
            <input value="Limpar filtro" id="clear-filter" class="form-control btn btn-outline-info" type="button">
        </div>
    </div>
{{--    {{ $sales }}--}}
    <div class="row col-lg-12 col-sm-12">
        @foreach($sales as $sale)
            <div id="{{ $sale->id }}" user="{{ $sale->user[0]['name'] }}" data="{{ $sale }}" class="through-salesman card col-lg-3 col-sm-12 pt-2">
                <p> ID : {{ $sale->id }} </p>
                <p>Revendedor : {{ $sale->user[0]['name'] }}</p>
                <p>Data : {{ Carbon\Carbon::parse($sale->created_at)->format('d/m/Y  h:m')  }} hrs</p>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

