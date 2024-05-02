@extends('base')

@section('conteudo')
    <div class="container" style="background-color: #ffb9e0; padding: 20px; border-radius: 10px;">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #ff13b8;">LISTAGEM DE MÚSICAS</h3>

        <form action="{{ route('musica.search') }}" method="post" class="mb-4">
            @csrf
            <div class="row mb-3">
                <div class="col-3">
                    <label for="valor" class="form-label" style="font-family: Arial, sans-serif;">Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="usuario">Usuário</option>
                        <option value="nmusica">Nome Musica</option>
                        <option value="artista">artista</option>
                    </select>
                    <div class="col-6">
                        <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor">
                    </div>
                </div>


            </div>
            <button type="submit" class="btn btn-primary" style="font-family: Arial, sans-serif;">Buscar</button>
            <a href="{{ url('musica/create') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Novo</a>
        </form>

        <hr>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Sua Música</th>
                    <th>Artista</th>
                    <th>Ano</th>
                    <th>Ouça Agora</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->usuario }}</td>
                        <td>{{ $item->nmusica }}</td>
                        <td>{{ $item->artista }}</td>
                        <td>{{ $item->ano }}</td>
                        <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                        <td>{{ $item->categoria->nome }}</td>
                        <td><a href="{{ route('musica.edit', $item->id) }}" class="btn btn-secondary"
                                style="font-family: Arial, sans-serif;">Editar</a></td>
                        <td>
                            <form action="{{ route('musica.destroy', $item) }}" method="post">
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
