@extends('main')
@section('titulo', 'Listagem de Bicicletas')
@section('conteudo')
    <div class="row">

        <h3>Listagem de Bicicletas</h3>
        <form action="{{ route('bicicleta.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="nome">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="marca">Marca</option>
                        <option value="modelo">Modelo</option>
                        <option value="preco">Preço</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('bicicleta/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>


    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->marca }}</td>
                        <td>{{ $item->modelo }}</td>
                        <td>{{ $item->preco }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('bicicleta.edit', $item->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('bicicleta.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Exclur'
                                    onclick="return confirm('Deseja Excluir?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
