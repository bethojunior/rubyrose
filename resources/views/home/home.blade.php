@extends('layouts.page')

@section('title', 'Dashboard ')
@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">

    <div class="row col-lg-12 col-sm-12">
        <div class="card text-white bg-info mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Quantidade de Revendedores</div>
            <div class="card-body center">
                <h5 class="card-title"> {{ $salesman }} </h5>
            </div>
        </div>
    </div>
    <div class="row col-lg-12 col-sm-12">
        <div class="col-lg-12 col-sm-12">
            <h3 class="center">Pedidos</h3>
        </div>
        <div class="card text-white bg-primary mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Total de pedidos</div>
            <div class="card-body center">
                <h5 class="card-title">{{ $totalSales }}</h5>
            </div>
        </div>

        <div class="card text-white bg-success mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Pedidos finalizados</div>
            <div class="card-body center">
                <h5 class="card-title">{{ $totalSalesFinished }}</h5>
            </div>
        </div>

        <div class="card text-white bg-gradient-yellow mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Pedidos Em andamento</div>
            <div class="card-body center">
                <h5 class="card-title">{{ $totalSalesWait }}</h5>
            </div>
        </div>

        <div class="card text-white bg-gradient-red mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Pedidos cancelados</div>
            <div class="card-body center">
                <h5 class="card-title">{{ $totalSalesCanceled }}</h5>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

