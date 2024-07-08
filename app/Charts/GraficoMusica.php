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

        $qtdMusica = DB::table("musicas")
            ->selectRaw('count(1) as qtd_musica, categorias.nome as nome_categoria')
            ->join('categorias','categorias.id', '=','musicas.categoria_id')
            ->groupBy('categorias.nome')->get();

        dd($qtdMusica);

        return $this->chart->pieChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([40, 50, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
