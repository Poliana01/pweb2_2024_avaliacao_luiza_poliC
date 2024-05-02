<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Categoria;
use App\Models\Musica;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        //app/http/Controller
        $dados = Playlist::all();

        // dd($dados);

        return view("playlist.list", ["dados" => $dados]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $musicas = Musica::all();

        return view("playlist.form",[
            'categorias'=>$categorias,
            'musicas'=>$musicas,

        ]);
    }


    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nomeplay' => "required|max:100",
            'musica_1_id' => "required",
            'musica_2_id' => "required",
            'musica_3_id' => "required",
            //'imagem' => "required|max:100",
            'categoria_id' => "required"


        ], [
            'nomeplay.required' => "O :attribute é obrigatório",
            'nomeplay.max' => "Só é permitido 100 caracteres",
            'musica_1_id.required' => "O :attribute é obrigatório",
            'musica_2_id.required' => "O :attribute é obrigatório",
            'musica_3_id.required' => "O :attribute é obrigatório",
            //'imagem.required' => "Só é permitido imagem",
            //'imagem.max' => "Só é permitido imagem",
            'categoria_id.required' => "O :attribute é obrigatório",
        ]);

        Playlist::create(
            [
                'nomeplay' => $request->nomeplay,
                'musica_1_id' => $request->musica_1_id,
                'musica_2_id' => $request->musica_2_id,
                'musica_3_id' => $request->musica_3_id,
                'musica_4_id' => $request->musica_4_id,
                'musica_5_id' => $request->musica_5_id,
                'musica_6_id' => $request->musica_6_id,
                'musica_7_id' => $request->musica_7_id,
                //'imagem' => $request->imagem,
                'categoria_id' => $request->categoria_id,
            ]
        );


        return redirect('playlist');
    }




    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $dado = Playlist::findOrFail($id);

        $categorias = Categoria::all();
        $musicas = Musica::all();

        return view("playlist.form", [
            'dado' => $dado,
            'categorias'=> $categorias,
            'musicas'=> $musicas
        ]);
    }



    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'nomeplay' => "required|max:100",
            'musica_1_id' => "required",
            'musica_2_id' => "required",
            'musica_3_id' => "required",
            'musica_4_id' => "required",
            'musica_5_id' => "required",
            'musica_6_id' => "required",
            'musica_7_id' => "required",
            //'imagem' => "required|max:100",
            'categoria_id' => "required"
        ], [
            'nomeplay.required' => "O :attribute é obrigatório",
            'nomeplay.max' => "Só é permitido 100 caracteres",
            'musica_1_id.required' => "O :attribute é obrigatório",
            'musica_2_id.required' => "O :attribute é obrigatório",
            'musica_3_id.required' => "O :attribute é obrigatório",
            'musica_4_id.required' => "O :attribute é obrigatório",
            'musica_5_id.required' => "O :attribute é obrigatório",
            'musica_6_id.required' => "O :attribute é obrigatório",
            'musica_7_id.required' => "O :attribute é obrigatório",
            //'imagem.required' => "Só é permitido imagem",
            //'imagem.max' => "Só é permitido imagem",
            'categoria_id.required' => "O :attribute é obrigatório",
        ]);

        Playlist::updateOrCreate(
            ['id' => $request->id],
            [

                'nomeplay' => $request->nomeplay,
                'musica_1_id' => $request->musica_1_id,
                'musica_2_id' => $request->musica_2_id,
                'musica_3_id' => $request->musica_3_id,
                'musica_4_id' => $request->musica_4_id,
                'musica_5_id' => $request->musica_5_id,
                'musica_6_id' => $request->musica_6_id,
                'musica_7_id' => $request->musica_7_id,
                //'imagem' => $request->imagem,
                'categoria_id' => $request->categoria_id,
            ]
        );

        return redirect('playlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Playlist::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('playlist');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Playlist::where(
                $request->tipo,
                "like",
                "%" . $request->valor . "%"
            )->get();
        } else {
            $dados = Playlist::all();
        }
        // dd($dados);

        return view("playlist.list", ["dados" => $dados]);
    }
}
