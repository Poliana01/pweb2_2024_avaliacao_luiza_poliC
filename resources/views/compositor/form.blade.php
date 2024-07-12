@extends('base')

@section('conteudo')
    <div class="container" style="background-color: #cae6b4; padding: 20px; border-radius: 10px;">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #435e34;">AINDA NÃO GRAVOU SUA MÚSICA? PUBLIQUE A LETRA AQUI PARA O MUNDO CONHECER!</h3>

        @php
            $background_color = "#cae6b4"; // Definindo a cor de fundo como rosa bebê

            $editMode = !empty($dado->id);
            $route = $editMode ? route('compositor.update', $dado->id) : route('compositor.store');
            $nNome = $editMode ? $dado->nNome : old('nNome');
            $nMusica = $editMode ? $dado->nMusica : old('nMusica');
            $nData = $editMode ? $dado->nData : old('nData');
            $nLetra = $editMode ? $dado->nLetra : old('nLetra');
        @endphp

        <form action="{{ $route }}" method="post" class="mt-4 p-4 rounded shadow-sm" style="background-color: {{ $background_color }};">
            @csrf
            @if ($editMode)
                @method('put')
            @endif

            <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

            <div class="mb-3">
                <label for="nNome" class="form-label">Nome do Compositor</label>
                <input type="text" name="nNome" id="nNome" class="form-control" value="{{ $nNome }}">
            </div>

            <div class="mb-3">
                <label for="nMusica" class="form-label">Nome da Música</label>
                <input type="text" name="nMusica" id="nMusica" class="form-control" value="{{ $nMusica }}">
            </div>

            <div class="mb-3">
                <label for="nData" class="form-label">Data</label>
                <input type="text" name="nData" id="nData" class="form-control" value="{{ $nData }}">
            </div>

            <div class="mb-3">
                <label for="nLetra" class="form-label">Letra</label>
                <input type="text" name="nLetra" id="nLetra" class="form-control" value="{{ $nLetra }}">
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
            <a href="{{ url('compositor') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@stop
