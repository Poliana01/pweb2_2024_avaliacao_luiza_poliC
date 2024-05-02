@extends('base')

@section('conteudo')
    <div class="container">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #ff007f;">FORMULÁRIO DE MÚSICA</h3>

        @php
            $background_color = "#FFC0CB"; // Definindo a cor de fundo como rosa bebê

            $editMode = !empty($dado->id);
            $route = $editMode ? route('musica.update', $dado->id) : route('musica.store');
            $usuario = $editMode ? $dado->usuario : old('usuario');
            $nmusica = $editMode ? $dado->nmusica : old('nmusica');
            $artista = $editMode ? $dado->artista : old('artista');
            $ano = $editMode ? $dado->ano : old('ano');
            $link = $editMode ? $dado->link : old('link');
        @endphp


        <form action="{{ $route }}" method="post" class="mt-4 p-4 rounded shadow-sm" style="background-color: {{ $background_color }};">
            @csrf
            @if ($editMode)
                @method('put')
            @endif


            <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" name="usuario" id="usuario" class="form-control" value="{{ $usuario }}">
            </div>

            <div class="mb-3">
                <label for="nmusica" class="form-label">Nome da Música</label>
                <input type="text" name="nmusica" id="nmusica" class="form-control" value="{{ $nmusica }}">
            </div>

            <div class="mb-3">
                <label for="artista" class="form-label">Artista</label>
                <input type="text" name="artista" id="artista" class="form-control" value="{{ $artista }}">
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano de Lançamento</label>
                <input type="text" name="ano" id="ano" class="form-control" value="{{ $ano }}">
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Ouça Agora:</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $link }}">
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Estilo Musical</label>
                <select name="categoria_id" id="categoria_id" class="form-select">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ url('musica') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@stop
