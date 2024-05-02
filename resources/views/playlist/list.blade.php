@extends('base')

@section('conteudo')
    <div class="container" style="background-color: #c1a0f7; padding: 20px; border-radius: 10px;">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #6d38aa;">LISTAGEM DE PLAYLIST</h3>

        <form action="{{ route('playlist.search') }}" method="post" class="mb-4">
            @csrf
            <div class="row mb-3">
                <div class="col-3">
                    <label for="valor" class="form-label" style="font-family: Arial, sans-serif;">Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="nomeplay">Nome da Playlist</option>
                    </select>
                    <div class="col-6">
                        <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="font-family: Arial, sans-serif;">Buscar</button>
            <a href="{{ url('playlist/create') }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Novo</a>
        </form>

        <hr>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($dados as $item)
                <div class="col">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">{{ $item->nomeplay }}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Musica 1: <a href="{{ $item->musica1->link }}" target="_blank">{{ $item->musica1->nmusica }}</a></li>
                                <li class="list-group-item">Musica 2: <a href="{{ $item->musica2->link }}" target="_blank">{{ $item->musica2->nmusica }}</a></li>
                                <li class="list-group-item">Musica 3: <a href="{{ $item->musica3->link }}" target="_blank">{{ $item->musica3->nmusica }}</a></li>
                                <li class="list-group-item">Musica 4: <a href="{{ $item->musica4->link }}" target="_blank">{{ $item->musica4->nmusica }}</a></li>
                                <li class="list-group-item">Musica 5: <a href="{{ $item->musica5->link }}" target="_blank">{{ $item->musica5->nmusica }}</a></li>
                                <li class="list-group-item">Musica 6: <a href="{{ $item->musica6->link }}" target="_blank">{{ $item->musica6->nmusica }}</a></li>
                                <li class="list-group-item">Musica 7: <a href="{{ $item->musica7->link }}" target="_blank">{{ $item->musica7->nmusica }}</a></li>
                            </ul>
                            <p class="card-text">Estilo Musical: {{ $item->categoria->nome }}</p>
                            <a href="{{ route('playlist.edit', $item->id) }}" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Editar</a>
                            <form action="{{ route('playlist.destroy', $item) }}" method="post" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-secondary" style="font-family: Arial, sans-serif;">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
