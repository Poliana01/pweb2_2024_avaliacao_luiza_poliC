<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class GraficoReclame
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
{ 
    return $this->chart->barChart()
    ->setTitle('Quantidade de Reclamações por Categoria.')
    ->setSubtitle('Primeiro semestre de 2024.')
    ->addData('IMAGEM', [1, 1, 2, 2, 2, 1])
    ->addData('LINK', [1, 3, 3, 6, 6, 1])
    ->addData('DEMORA NO CARREGAMENTO', [1, 3, 8, 2, 6, 4])
    ->addData('INFORMAÇÃO ERRADA', [1,4, 8, 2, 6, 4])
    ->addData('PLAYLIST', [7, 3, 8, 7, 1, 1])
    ->addData('OUTRO', [1, 0, 0, 0, 1, 1])
    ->setXAxis(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho']);
}
}
   