@extends('layouts.page')

@section('title', 'Editar produto')
@section('content_header')
    <h1 class="m-0 text-dark">Editar produto - {{ $product->name }}</h1>
@stop

@section('content')
    @include('includes.alerts')
    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('products.updateProduct',$product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group col-lg-3 col-sm-12">
            <span>Nome</span>
            <input value="{{ $product->name }}" required type="text" name="name" class="form-control">
        </div>

        <div class="form-group col-lg-3 col-sm-12">
            <span>Tipo</span>
            <select class="col-lg-12 col-sm-12 js-example-basic-single form-control" name="type_product_id">
                @foreach($types as $type)
                    <option @if($type->name == $product->type[0]['name']) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-lg-2 col-sm-12">
            <span>Cor</span>
            <input value="{{ $product->color }}" required type="color" name="color" id="color" class="form-control">
        </div>

        <div class="form-group col-lg-2 col-sm-12">
            <span>Valor</span>
            <input value="{{ $product->value }}" id="value-product" required type="text" name="value" class="form-control">
        </div>

        <div class="form-group col-lg-2 col-sm-12">
            <span>Valor promocional</span>
            <input value="{{ $product->promotional_value }}" id="value-promotional-product" required type="text" name="promotional_value" class="form-control">
        </div>

        <div class="form-group col-lg-2 col-sm-12">
            <span>Qtd Mininma</span>
            <input value="{{ $product->minimum_order }}" required type="number" name="minimum_order" class="form-control">
        </div>

        <div class="form-group col-lg-12 col-sm-12">
            <span>Descrição</span>
            <textarea value="" class="form-control" name="description" id="" cols="10" rows="5">{{ $product->description }}</textarea>
        </div>

        <div class="row col-lg-12">
            @foreach($product->images as $path)
                <div class="col-lg-3 card pb-2 image-{{$path->id}}">
                    <img class="col-lg-12" src="{{ asset('storage/').'/'.$path->image }}">
                    <button type="button" id="{{ $path->id }}" class="btn btn-danger col-lg-12 delete-image">Deletar</button>
                </div>
            @endforeach
        </div>

        <div class="col-sm-12 col-lg-12">
            <input id="input-b3" name="images[]" type="file" class="file" multiple
                   data-show-upload="false" data-show-caption="true" data-msg-placeholder="Selecione imagens para upload">
        </div>

        <div class="col-lg-12 col-sm-12" style="margin-top: 2vw">
            <input type="submit" class="btn btn-success" value="Salvar">
        </div>
    </form>

@stop

@section('js')
    <script src="{{ asset('js/controllers/Product/ProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/edit.js') }}"></script>
@endsection
