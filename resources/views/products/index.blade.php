@extends('layouts.page')

@section('title', 'Tipos de produto ')
@section('content_header')
    <h1 class="m-0 text-dark">Produtos</h1>
@stop

@section('content')
    @include('includes.alerts')
    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('products.insert') }}">
        @csrf
        <div class="form-group col-lg-4 col-sm-12">
            <span>Nome</span>
            <input required type="text" name="name" class="form-control">
        </div>

        <div class="form-group col-lg-4 col-sm-12">
            <span>Tipo</span>
            <select class="col-lg-12 col-sm-12 js-example-basic-single" name="state">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-lg-2 col-sm-12">
            <span>Valor</span>
            <input id="value-product" required type="text" name="value" class="form-control">
        </div>

        <div class="form-group col-lg-2 col-sm-12">
            <span>Qtd Mininma</span>
            <input required type="number" name="minimum_order" class="form-control">
        </div>

        <div class="form-group col-lg-12 col-sm-12">
            <span>Descrição</span>
            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="col-lg-12 col-sm-12">
            <input type="submit" class="btn btn-outline-info" value="Salvar">
        </div>
    </form>

    <div class="row col-lg-12 col-sm-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($types as $type)--}}
{{--                <tr class="type-{{$type->id}}">--}}
{{--                    <th scope="row">{{ $type->id }}</th>--}}
{{--                    <th scope="row">{{ $type->name }}</th>--}}
{{--                    <th scope="row">--}}
{{--                        <button id="{{ $type->id }}" class="btn btn-outline-danger delete-type">Excluir</button>--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/index.js') }}"></script>
@endsection
