@extends('layouts.page')

@section('title', 'Listagem de produtos')
@section('content_header')
    <h1 class="m-0 text-dark">Produtos</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">
        @foreach($products as $product)
            <div class="card col-lg-3 col-sm-12 pt-2 m-1">
                <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active item-carousel">
                            <img src="{{ asset('assets/images/logo/logo.jpeg') }}" class="d-block w-100" alt="...">
                        </div>
                        @foreach($product->images as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/').'/'.$image->image }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><label for="">{{ $product->name }}</label></h5>
                    <p class="card-text"><label for="">{{ $product->description }}</label></p>
                    <p>
                        <span>Cor : <span style="background-color: {{ $product->color }}" class="badge badge-secondary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                    </p>
                    <p>
                        <span>Valor : R$ {{ $product->value }}</span>
                    </p>
                    @if($product->promotional_value !== null)
                        <p class="badge-info pl-1">
                            <span>Valor promocional : R$ {{ $product->promotional_value }}</span>
                        </p>
                    @endif
                    <p>
                        <span>Pedido minimo : {{ $product->minimum_order }} unidades</span>
                    </p>
                    <p>
                        <span>
                            Status :
                            @if($product->status == \App\Constants\ProductStatus::ATIVO) Ativo @endif
                            @if($product->status == \App\Constants\ProductStatus::DESATIVADO) Desativado @endif
                        </span>
                    </p>
                    <form method="POST" action="{{ route('products.update') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="status" value="@if($product->status == \App\Constants\ProductStatus::ATIVO) {{ \App\Constants\ProductStatus::DESATIVADO }} @endif @if($product->status == \App\Constants\ProductStatus::DESATIVADO) {{\App\Constants\ProductStatus::ATIVO}} @endif">

                        <input id="{{ $product->id }}" type="submit" value="@if($product->status == \App\Constants\ProductStatus::ATIVO)Desativar @endif @if($product->status == \App\Constants\ProductStatus::DESATIVADO) Ativar @endif" class="disable-product col-lg-12 col-sm-12 btn btn-danger">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/list.js') }}"></script>
@endsection
