@extends('main')
@section('titulo', 'Formulário de Alunos')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('bicicleta.update', $data->id);
            } else {
                $action = route('bicicleta.store');
            }
        @endphp

        <h4>Formulário Bicicleta</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="marca">Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ old('marca', $data->marca ?? '') }}">
            </div>
            <div class="col-6">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $data->modelo ?? '') }}">
            </div>
            <div class="col-6">
                <label for="preco">Preço</label>
                <input type="number" name="preco" class="form-control" value="{{ old('preco', $data->preco ?? '') }}" step="0.01">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('bicicleta') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
