<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <h3>{{$titulo}}</h3>
    <p>Testeee  </p>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
           <th scope="col">Imagem</th>
            <th scope="col">Usuário</th>
            <th scope="col"> Música</th>
            <th scope="col">Confira</th>
            <th scope="col">Avaliação</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($reclames as $reclame)
            @php
                $imagem =!empty($reclame->imagem) ? $reclame->imagem : "sem_imagem.jpg";
                $srcImagem = public_path()."/storage/".$imagem;
            @endphp
          <tr>

            <th scope="row">{{ $reclame->id }}</th>
            <td><img src="{{ $srcImagem }}" alt="img" style="width: 100px"></td>
            <td>{{$reclame->nNome}}</td>
            <td>{{$reclame->nMusica}}</td>
            <td>{{$reclame->nLink}}</td>
            <td>{{$reclame->nAvaliacao}}</td>
            <td>{{$reclame->categoria->nome ?? ''}}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6">Sem Resgistro</td>
          </tr>
    @endforelse

    <body>
    </html>