<?php

namespace App\Http\Controllers;

use App\Models\Avaliacoes;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{
    public function index()
    {
        //app/http/Controller
        $dados = Avaliacoes::all();

        // dd($dados);

        return view("avaliacoes.list", ["dados" => $dados]);
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view("avaliacoes.form",['categorias'=>$categorias]);
    }


    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nNome' => "required|max:100",
            'nMusica' => "required|max:100",
            'nLink' => "required",
            'nAvaliacao' => "required",
            'categoria_id' => "required"


        ], [
            'nNome.required' => "O :attribute é obrigatório",
            'nNome.max' => "Só é permitido 100 caracteres",
            'nMusica.required' => "O :attribute é obrigatório",
            'nMusica.max' => "Só é permitido 100 caracteres",
            'nLink.required' => "O :attribute é obrigatório",
            'nAvaliacao.required' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
        ]);

        Avaliacoes::create(
            [
                'nNome' => $request->nNome,
                'nMusica' => $request->nMusica,
                'nLink' => $request->nLink,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria_id' => $request->categoria_id,
            ]
        );


        return redirect('avaliacoes');
    }




    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $dado = Avaliacoes::findOrFail($id);

        $categorias = Categoria::all();

        return view("avaliacoes.form", [
            'dado' => $dado,
            'categorias'=> $categorias
        ]);
    }



    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'nNome' => "required|max:100",
            'nMusica' => "required|max:100",
            'nLink' => "required",
            'nAvaliacao' => "required",
            'categoria_id' => "required"
        ], [
            'nNome.required' => "O :attribute é obrigatório",
            'nNome.max' => "Só é permitido 100 caracteres",
            'nMusica.required' => "O :attribute é obrigatório",
            'nMusica.max' => "Só é permitido 100 caracteres",
            'nLink.required' => "O :attribute é obrigatório",
            'nAvaliacao.required' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
        ]);

        Avaliacoes::updateOrCreate(
            ['id' => $request->id],
            [

                'nNome' => $request->nNome,
                'nMusica' => $request->nMusica,
                'nLink' => $request->nLink,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria_id' => $request->categoria_id,
            ]
        );

        return redirect('avaliacoes');
    }



    public function destroy($id)
    {
        $dado = Avaliacoes::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('avaliacoes');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Avaliacoes::where(
                $request->tipo,
                "like",
                "%" . $request->valor . "%"
            )->get();
        } else {
            $dados = Avaliacoes::all();
        }
        // dd($dados);

        return view("avaliacoes.list", ["dados" => $dados]);
    }
}
