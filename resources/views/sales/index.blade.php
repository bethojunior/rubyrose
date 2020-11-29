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
        @foreach($sales as $key => $sale)

            <div id="{{ $key }}" user="{{ $sale[0]['user'][0]['name'] }}" data="{{ $sale[0] }}" class="through-salesman card col-lg-12 col-sm-12 pt-2">

                <p>ID : {{ $key }} </p>
                <p>Revendedor : {{ $sale[0]['user'][0]['name'] }}</p>
                <p>Data : {{ Carbon\Carbon::parse($sale[0]['created_at'])->format('d/m/Y - H:m:s')  }} hrs</p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne{{$key}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                    Produtos
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne{{$key}}" class="collapse show" aria-labelledby="headingOne{{$key}}" data-parent="#accordionExample">
                            <div class="card-body">
                                @php
                                    $total = 0;
                                @endphp
                                <div class="card pt-2 pl-2">
                                    @foreach($sale as $both)
                                        <p>
                                            Nome:
                                            {{ $both->products[0]['name'] }}
                                        </p>
                                        <p>
                                            Valor unitário:
                                            R${{ $both->products[0]['value']}}
                                        </p>
                                        <p>
                                            Quantidade : {{ $both->amount }}
                                        </p>
                                        <p>
                                            Valor total : R$
                                            @php
                                                $total = $total + (floatval($both->products[0]['value']) * $both->amount) ;
                                            @endphp
                                            {{ floatval($both->products[0]['value']) * $both->amount }}
                                        </p>
                                        <hr>
                                    @endforeach
                                </div>
                                <div class="card pt-2 pl-2">
                                    <p>
                                        <h5>Valor total do pedido :</h5>
                                        <b>R$ {{ $total }}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="form-group mt-2" method="POST" action="{{ route('sales.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="sale_id" value="{{ $sale[0]['sale_id'] }}">

                    <select class="form-control" name="status" id="">
                        <option @if ( $sale[0]['status'] == \App\Constants\SalesStatus::EM_ABERTO ) selected @endif value="{{ \App\Constants\SalesStatus::EM_ABERTO }}">Em aberto</option>
                        <option @if ( $sale[0]['status'] == \App\Constants\SalesStatus::FINALIZADO ) selected @endif value="{{ \App\Constants\SalesStatus::FINALIZADO }}">Finalizado</option>
                        <option @if ( $sale[0]['status'] == \App\Constants\SalesStatus::CANCELADO ) selected @endif value="{{ \App\Constants\SalesStatus::CANCELADO }}">Cancelado</option>
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

