@extends('base')

@section('conteudo')
<div class="container" style="background-color: #cae6b4; padding: 20px; border-radius: 10px;">
    <h3 class="mb-4 text-uppercase fw-bold" style="color: #435e34;">ALGO EM NOSSO SITE ESTÁ COM PROBLEMA? NOS DIGA O QUE É:</h3>

    <form action="{{ route('reclame.search') }}" method="post" class="mb-4">
        @csrf
        <div class="row mb-3">
            <div class="col-3">
                <label for="nome" class="form-label" style="font-family: Arial, sans-serif;">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="font-family: Arial, sans-serif;">Buscar</button>
        <a href="{{ url('reclame/create') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Novo</a>
        <a href="{{ url('reclame/chart') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Gráfico</a>
        <a href="{{ url('reclame/report') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">PDF</a>


    </form>

    <hr>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Música</th>
                <th>Confira</th>
                <th>Avaliação</th>
                <th>Estilo Musical</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nNome }}</td>
                <td>{{ $item->nMusica }}</td>
                <td><a href="{{ $item->nLink }}" target="_blank">{{ $item->nLink }}</a></td>
                <td>{{ $item->nAvaliacao }}</td>
                <td>{{ $item->categoria->nome }}</td>
                <td><a href="{{ route('reclame.edit', $item->id) }}" class="btn btn-secondary"
                        style="font-family: Arial, sans-serif;">Editar</a></td>
                <td>
                    <form action="{{ route('reclame.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-secondary"
                            style="font-family: Arial, sans-serif;">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
