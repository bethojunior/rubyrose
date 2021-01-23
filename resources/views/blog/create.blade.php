@extends('layouts.page')

@section('title', 'Inserir Blog')
@section('content_header')
    <h1 class="m-0 text-dark">Inserir Blog</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">
        <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('blog.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-lg-9 col-sm-12">
                <span>Titulo</span>
                <input required type="text" name="title" class="form-control">
            </div>

            <div class="form-group col-lg-3 col-sm-12">
                <span>link</span>
                <input type="text" name="link" class="form-control">
            </div>

            <div class="form-group col-lg-12 col-sm-12">
                <span>Conteúdo</span>
                <textarea class="form-control" name="content" id="" cols="10" rows="5"></textarea>
            </div>

            <div class="col-sm-12 col-lg-12">
                <input required id="input-b3" name="image" type="file" class="file"
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Selecione imagens para upload">
            </div>

            <div class="col-lg-12 col-sm-12" style="margin-top: 2vw">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </form>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/products/list.js') }}"></script>
@endsection
