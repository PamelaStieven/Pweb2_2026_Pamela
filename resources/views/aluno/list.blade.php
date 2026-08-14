@extends('main')
@section('titulo', 'Listagem de Alunos')
@section('conteudo')

<div class="container my-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3>Listagem de Usuários</h3>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="userList.php" method="POST" class="row g-3 align-items-end">
                <div class="col-md-4 col-sm-12">
                    <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value=""></option>
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>

                <div class="col-md-5 col-sm-12">
                    <label for="valor" class="form-label"><strong>Valor:</strong></label>
                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Pesquisar...">
                </div>

                <div class="col-md-3 col-sm-12">
                    <button type="submit" name="btn-buscar" class="btn btn-primary w-100">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ url('aluno/create') }}" class="btn btn-success">Adicionar Novo</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">CPF</th>
                            <th scope="col">TELEFONE</th>
                            <th scope="col" colspan="2" class="text-center">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->cpf }}</td>
                                <td>{{ $item->telefone }}</td>
                                <td style="width: 80px;">
                                    <a class="btn btn-warning btn-sm"
                                       title="Editar"
                                       href="./userForm.php?id={{ $item->id }}">
                                        Editar
                                    </a>
                                </td>
                                <td style="width: 80px;">
                                    <a href="?action=deleteUser&id={{ $item->id }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
