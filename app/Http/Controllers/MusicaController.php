<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoMusica;
use PDF;

class MusicaController extends Controller
{
    private $pagination = 2;

    public function index()
    {
        //app/http/Controller
        $dados = Musica::paginate($this->pagination);

        // dd($dados);

        return view("musica.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

       // dd( $categorias);

        return view("musica.form",['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller


        $request->validate([
            'usuario' => "required|max:100",
            'nmusica' => "required|max:100",
            'artista' => "required|max:100",
            'ano' => "required|max:4",
            'link' => "required|max:255",
            'categoria_id' => "required",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",

        ], [
            'usuario.required' => "O :attribute é obrigatório",
            'usuario.max' => "Só é permitido 100 caracteres",
            'nmusica.required' => "O :attribute é obrigatório",
            'nmusica.max' => "Só é permitido 100 caracteres",
            'artista.required' => "O :attribute é obrigatório",
            'artista.max' => "Só é permitido 100 caracteres",
            'ano.required' => "O :attribute é obrigatório",
            'ano.max' => "Só é permitido 4 caracteres",
            'link' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",

        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/musica/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Musica::create($data);

        return redirect('musica');
    }


        /**Musica::create(
            [
                'usuario' => $request->usuario,
                'nmusica' => $request->nmusica,
                'artista' => $request->artista,
                'ano' => $request->ano,
                'link' => $request->link,

                'categoria_id' => $request->categoria_id,
                'imagem' => $request->imagem,
            ]
        );
        /**
         *  $request->validate([
         *   'nome' => "required|max:100",
          *  'cpf' => "required|max:16",
          *  'categoria_id' => "required",
          *  'telefone' => "nullable"
       * ], [
        *    'nome.required' => "O :attribute é obrigatório",
        *    'nome.max' => "Só é permitido 100 caracteres",
         *   'cpf.required' => "O :attribute é obrigatório",
        *    'cpf.max' => "Só é permitido 16 caracteres",
         *   'categoria_id.required' => "O :attribute é obrigatório",
       * ]);

     *   Musica::create(
          *  [
         *       'nome' => $request->nome,
           *     'telefone' => $request->telefone,
           *     'cpf' => $request->cpf,
           *     'categoria_id' => $request->categoria_id,
           * ]
      *  );
         */

    /**
     * Display the specified resource.
     */



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $dado = Musica::findOrFail($id);

        $categorias = Categoria::all();

        return view("musica.form", [
            'dado' => $dado,
            'categorias'=> $categorias
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'usuario' => "required|max:100",
            'nmusica' => "required|max:100",
            'artista' => "required|max:100",
            'ano' => "required|max:4",
            'link' => "required|max:255",
            'categoria_id' => "required",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",

        ], [
            'usuario.required' => "O :attribute é obrigatório",
            'usuario.max' => "Só é permitido 100 caracteres",
            'nmusica.required' => "O :attribute é obrigatório",
            'nmusica.max' => "Só é permitido 100 caracteres",
            'artista.required' => "O :attribute é obrigatório",
            'artista.max' => "Só é permitido 100 caracteres",
            'ano.required' => "O :attribute é obrigatório",
            'ano.max' => "Só é permitido 4 caracteres",
            'link' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/musica/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        Musica::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('musica');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $dado = Musica::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('musica');
    }


    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Musica::where(
                $request->tipo,
                "like",
                "%" . $request->valor . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Musica::paginate($this->pagination);;
        }
        // dd($dados);

        return view("musica.list", ["dados" => $dados]);
    }


    public function chart(GraficoMusica $musicaChart)
    {
        return view("musica.chart", ["musicaChart" => $musicaChart->build()]);
    }

    public function report()
    {
        $musicas = Musica::All();

        $data = [
            'titulo' => 'Relatorio Musica',
            'musicas' => $musicas,

        ];

        $pdf = PDF::loadView('musica.report', $data);

        return $pdf->download('relatorio_musica.pdf');
    }


}
