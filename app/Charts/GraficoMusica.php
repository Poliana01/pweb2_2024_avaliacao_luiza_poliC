<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class GraficoMusica
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $musicas = DB::table("musicas")
            ->selectRaw('count(1) as qtd_musica, categorias.nome as nome_categoria')
            ->join('categorias','categorias.id', '=','musicas.categoria_id')
            ->groupBy('categorias.nome')->get();


        $qtdMusicas = [];
        $nomeCategoria = [];

        foreach($musicas as $item){
            $qtdMusicas[]= $item->qtd_musica;
            $nomeCategoria[]= $item->nome_categoria;
        }

        return $this->chart->pieChart()
            ->setTitle('Quantidade de musicas por categoria')
            ->addData($qtdMusicas)
            ->setLabels($nomeCategoria);
    }
}
