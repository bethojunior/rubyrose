@extends('layouts.page')

@section('title', 'Sobre nós ')
@section('content_header')
    <h1 class="m-0 text-dark">Sobre nós</h1>
@stop

@section('content')
    @include('includes.alerts')
    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('us.create') }}">
        @method('POST')
        @csrf
        <div class="form-group col-lg-4 col-sm-12">
            <textarea required type="text" name="content" class="form-control">{{ $us[0]['content'] }}</textarea>
        </div>

        <div class="col-lg-12 col-sm-12">
            <input type="submit" class="btn btn-outline-info" value="Salvar">
        </div>
    </form>

    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('us.createPhone') }}">
        @method('POST')
        @csrf


        <div class="form-group col-lg-4 col-sm-12">
            <span>Whats app</span>
            <input value="{{ $phone[0]['phone'] }}" required type="text" name="phone" class="form-control">
        </div>

        <div class="col-lg-12 col-sm-12">
            <input type="submit" class="btn btn-outline-info" value="Salvar">
        </div>
    </form>

@stop

@section('js')
    <script src="{{ asset('js/controllers/TypeProduct/TypeProductController.js') }}"></script>
    <script src="{{ asset('js/modules/typeProduct/index.js') }}"></script>
@endsection

