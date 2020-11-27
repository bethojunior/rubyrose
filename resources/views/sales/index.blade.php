@extends('layouts.page')

@section('title', 'Dashboard ')
@section('content_header')
    <h1 class="m-0 text-dark">Pedidos</h1>
@stop

@section('content')
    @include('includes.alerts')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
    <div class="header row col-lg-12 col-sm-12">
        <div class="form-group col-lg-2 col-sm-12">
            <span>Buscar pelo ID</span>
            <input id="search-sale-id" class="form-control">
        </div>
        <div class="form-group col-lg-3 col-sm-12">
            <span>Buscar pelo Revendedor</span>
            <input id="search-sale" class="form-control">
        </div>
        <div class="form-group col-lg-4">
            <span>Status</span>
            <select id="search-by-status" class="form-control">
                <option value="{{ \App\Constants\SalesStatus::EM_ABERTO }}">Em aberto</option>
                <option value="{{ \App\Constants\SalesStatus::CANCELADO }}">Cancelado</option>
                <option value="{{ \App\Constants\SalesStatus::FINALIZADO }}">Finalizado</option>
            </select>
        </div>
        <div class="form-group col-lg-2 col-sm-12">
            <span>&nbsp;</span>
            <input value="Limpar filtro" id="clear-filter" class="form-control btn btn-outline-info" type="button">
        </div>
    </div>
{{--    {{ $sales }}--}}
    <div class="row col-lg-12 col-sm-12">
        @foreach($sales as $sale)
            <div id="{{ $sale->sale_id }}" user="{{ $sale->user[0]['name'] }}" data="{{ $sale }}" class="through-salesman card col-lg-3 col-sm-12 pt-2">
                <p> ID : {{ $sale->sale_id }} </p>
                <p>Revendedor : {{ $sale->user[0]['name'] }}</p>
                <p>Data : {{ Carbon\Carbon::parse($sale->created_at)->format('d/m/Y - H:m:s')  }} hrs</p>
                <p>Produto : {{ $sale->products[0]['name'] }}</p>
                <p>Valor : R${{ $sale->products[0]['value'] }}</p>
                <p>Quantidade : {{ $sale->amount }}</p>
                <p>Valor total : R$ {{ floatval($sale->products[0]['value']) * $sale->amount}}</p>
                <form class="form-group" method="POST" action="{{ route('sales.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="sale_id" value="{{ $sale->sale_id }}">

                    <select class="form-control" name="status" id="">
                        <option @if ( $sale->status == \App\Constants\SalesStatus::EM_ABERTO ) selected @endif value="{{ \App\Constants\SalesStatus::EM_ABERTO }}">Em aberto</option>
                        <option @if ( $sale->status == \App\Constants\SalesStatus::FINALIZADO ) selected @endif value="{{ \App\Constants\SalesStatus::FINALIZADO }}">Finalizado</option>
                        <option @if ( $sale->status == \App\Constants\SalesStatus::CANCELADO ) selected @endif value="{{ \App\Constants\SalesStatus::CANCELADO }}">Cancelado</option>
                    </select>
                    <input value="Alterar status" type="submit" class="mt-2 btn btn-info col-lg-12 col-sm-12">
                </form>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

