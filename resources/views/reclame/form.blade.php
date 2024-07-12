@extends('base')

@section('conteudo')
    <div class="container" style="background-color: #d6b99e; padding: 20px; border-radius: 10px;">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #6b2e05;">ALGO EM NOSSO SITE ESTÁ DANDO PROBLEMA? NOS DIGA O QUE É:</h3>

        @php
            $background_color = "#d6b99e"; // Definindo a cor de fundo como rosa bebê

            $editMode = !empty($dado->id);
            $route = $editMode ? route('reclame.update', $dado->id) : route('reclame.store');
            $nNome = $editMode ? $dado->nNome : old('nNome');
            $nData = $editMode ? $dado->nData : old('nData');
            $nAvaliacao = $editMode ? $dado->nAvaliacao : old('nAvaliacao');
        @endphp

        <form action="{{ $route }}" method="post" class="mt-4 p-4 rounded shadow-sm" style="background-color: {{ $background_color }};">
            @csrf
            @if ($editMode)
                @method('put')
            @endif

            <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

            <div class="mb-3">
                <label for="nNome" class="form-label">Usuário</label>
                <input type="text" name="nNome" id="nNome" class="form-control" value="{{ $nNome }}">
            </div>

            <div class="mb-3">
                <label for="nData" class="form-label">Data</label>
                <input type="text" name="nData" id="nData" class="form-control" value="{{ $nData }}">
            </div>

            <div class="mb-3">
                <label for="nAvaliacao" class="form-label">Relate o que Aconteceu</label>
                <input type="text" name="nAvaliacao" id="nAvaliacao" class="form-control" value="{{ $nAvaliacao }}">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Em Qual Área Você Teve Problemas?</label>
                <select name="categoria" id="categoria" class="form-select">
                    @foreach ($categorias as $item)
                        <option value="{{ $item}}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ url('reclame') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@stop
