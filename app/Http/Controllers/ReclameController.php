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
        $categorias = [
            "NÃO CARREGA IMAGEM",
            "Link quebrado"
            ];

        return view("reclame.form",['categorias'=>$categorias]);
    }


    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nNome' => "required|max:100",
            'nData' => "required|max:100",
            'nAvaliacao' => "required",
            'categoria' => "required"
        ], [
            'nNome.required' => "O :attribute é obrigatório",
            'nNome.max' => "Só é permitido 100 caracteres",
            'nData.required' => "O :attribute é obrigatório",
            'nData.max' => "Só é permitido 100 caracteres",
            'nAvaliacao.required' => "O :attribute é obrigatório",
            'categoria.required' => "O :attribute é obrigatório",
        ]);

        Reclame::create(
            [
                'nNome' => $request->nNome,
                'nData' => $request->nData,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria' => $request->categoria,
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

        $categorias = [
            "NÃO CARREGA IMAGEM",
            "Link quebrado"
        ];

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
            'nData' => "required|max:100",
            'nAvaliacao' => "required",
            'categoria' => "required"
        ], [
            'nNome.required' => "O :attribute é obrigatório",
            'nNome.max' => "Só é permitido 100 caracteres",
            'nData.required' => "O :attribute é obrigatório",
            'nData.max' => "Só é permitido 100 caracteres",
            'nAvaliacao.required' => "O :attribute é obrigatório",
            'categoria.required' => "O :attribute é obrigatório",
        ]);

        Reclame::updateOrCreate(
            ['id' => $request->id],
            [

                'nNome' => $request->nNome,
                'nData' => $request->nData,
                'nAvaliacao' => $request->nAvaliacao,
                'categoria' => $request->categoria,
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
