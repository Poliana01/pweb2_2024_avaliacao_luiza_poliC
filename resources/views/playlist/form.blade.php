@extends('base')

@section('conteudo')

    <script></script>
    <div class="container" style="background-color: #c1a0f7; padding: 20px; border-radius: 10px;">
        <h3 class="mb-4 text-uppercase fw-bold" style="color: #6d38aa;">FORMULÁRIO DE PLAYLIST</h3>

        @php
            $background_color = '#c1a0f7'; // Definindo a cor de fundo como rosa bebê

            $editMode = !empty($dado->id);
            $route = $editMode ? route('playlist.update', $dado->id) : route('playlist.store');
            $nomeplay = $editMode ? $dado->nomeplay : old('nomeplay');
            /*
            $musicas = [
                'musica_1_id' => $editMode ? $dado->musica_1_id : old('musica_1_id'),
                'musica_2_id' => $editMode ? $dado->musica_2_id : old('musica_2_id'),
                'musica_3_id' => $editMode ? $dado->musica_3_id : old('musica_3_id'),
                'musica_4_id' => $editMode ? $dado->musica_4_id : old('musica_4_id'),
                'musica_5_id' => $editMode ? $dado->musica_5_id : old('musica_5_id'),
                'musica_6_id' => $editMode ? $dado->musica_6_id : old('musica_6_id'),
                'musica_7_id' => $editMode ? $dado->musica_7_id : old('musica_7_id'),
            ];
            */
        @endphp

        <form action="{{ $route }}" method="post" class="mt-4 p-4 rounded shadow-sm"
            style="background-color: {{ $background_color }};">
            @csrf
            @if ($editMode)
                @method('put')
            @endif

            <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

            <div class="mb-3">
                <label for="nomeplay" class="form-label">Nome da Playlist</label>
                <input type="text" name="nomeplay" id="nomeplay" class="form-control" value="{{ $nomeplay }}">
            </div>

            <div class="mb-3">

                <label for="musica_1_id" class="form-label">Música 01</label>
                <select name="musica_1_id" id="musica_1_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_2_id" class="form-label">Música 02</label>
                <select name="musica_2_id" id="musica_2_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_3_id" class="form-label">Música 03</label>
                <select name="musica_3_id" id="musica_3_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_4_id" class="form-label">Música 04</label>
                <select name="musica_4_id" id="musica_4_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_5_id" class="form-label">Música 05</label>
                <select name="musica_5_id" id="musica_5_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_6_id" class="form-label">Música 06</label>
                <select name="musica_6_id" id="musica_6_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">

                <label for="musica_7_id" class="form-label">Música 07</label>
                <select name="musica_7_id" id="musica_7_id" class="form-select">

                    @foreach ($musicas as $item)
                        <option value="{{ $item->id }}">{{ $item->nmusica }}</option>
                    @endforeach
                </select>
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
            <a href="{{ url('playlist') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@stop
