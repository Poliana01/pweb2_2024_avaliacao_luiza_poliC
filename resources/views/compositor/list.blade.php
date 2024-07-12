@extends('base')

@section('conteudo')
<div class="container" style="background-color: #cae6b4; padding: 20px; border-radius: 10px;">
    <h3 class="mb-4 text-uppercase fw-bold" style="color: #435e34;">AINDA NÃO GRAVOU SUA MÚSICA? PUBLIQUE A LETRA AQUI PARA O MUNDO CONHECER!</h3>
    </h3>

    <form action="{{ route('compositor.search') }}" method="post" class="mb-4">
        @csrf
        <div class="row mb-3">
            <div class="col-3">
                <label for="nome" class="form-label" style="font-family: Arial, sans-serif;">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="font-family: Arial, sans-serif;">Buscar</button>
        <a href="{{ url('compositor/create') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Novo</a>
    </form>

    <hr>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Compositor</th>
                <th>Nome da Música</th>
                <th>Data</th>
                <th>Letra</th>
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
                <td>{{ $item->nData }}</td>
                <td>{{ $item->nLetra }}</td>
                <td>{{ $item->categoria->nome  ?? ""}}</td>                <td><a href="{{ route('compositor.edit', $item->id) }}" class="btn btn-secondary"
                        style="font-family: Arial, sans-serif;">Editar</a></td>
                <td>
                    <form action="{{ route('compositor.destroy', $item) }}" method="post">
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
