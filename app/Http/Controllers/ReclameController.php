<?php

namespace App\Http\Controllers;

use App\Models\Reclame;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Charts\GraficoReclame;
use PDF;

class ReclameController extends Controller
{
    public function index()
    {
        //app/http/Controller
        $dados = Reclame::all();

        // dd($dados);

        return view("reclame.list", ["dados" => $dados]);
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view("reclame.form",['categorias'=>$categorias]);
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

        Reclame::create(
            [
                'nNome' => $request->nNome,
                'nMusica' => $request->nMusica,
                'nLink' => $request->nLink,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria_id' => $request->categoria_id,
            ]
        );


        return redirect('reclame');
    }




    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $dado = Reclame::findOrFail($id);

        $categorias = Categoria::all();

        return view("reclame.form", [
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

        Reclame::updateOrCreate(
            ['id' => $request->id],
            [

                'nNome' => $request->nNome,
                'nMusica' => $request->nMusica,
                'nLink' => $request->nLink,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria_id' => $request->categoria_id,
            ]
        );

        return redirect('reclame');
    }



    public function destroy($id)
    {
        $dado = Reclame::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('reclame');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Reclame::where(
                $request->tipo,
                "like",
                "%" . $request->valor . "%"
            )->get();
        } else {
            $dados = Reclame::all();
        }
        // dd($dados);

        return view("reclame.list", ["dados" => $dados]);
    }
    public function chart(GraficoReclame $reclameChart)
    {
        return view("reclame.chart", ["reclameChart" => $reclameChart->build()]);
    }

    public function report()
    {
        $reclames = Reclame::All();

        $data = [
            'titulo' => 'Relatorio Reclame',
            'reclames' => $reclames,

        ];

        $pdf = PDF::loadView('reclame.report', $data);

        return $pdf->download('relatorio_reclame.pdf');
    }
}
