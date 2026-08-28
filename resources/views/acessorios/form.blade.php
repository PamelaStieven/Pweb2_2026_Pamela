@extends('main')
@section('titulo', 'Formulário de Acessorios')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('acessorio.update', $data->id);
            } else {
                $action = route('acessorio.store');
            }
        @endphp

        <h4>Formulário Acessorio</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
            </div>
            <div class="col-6">
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $data->categoria ?? '') }}">
            </div>
            <div class="col-6">
                <label for="preco">Preço</label>
                <input type="number" name="preco" class="form-control" value="{{ old('preco', $data->preco ?? '') }}" step="0.01">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('acessorio') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
