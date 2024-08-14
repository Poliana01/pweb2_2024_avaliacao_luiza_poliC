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

    public function build(): \ArielMejiaDev\LarapexCharts\PolarAreaChart
    {

        $reclame = DB::table("reclame")
            ->selectRaw('count(1) as qtd_reclame, categoria as nome_categoria')
            //->join('categoria','categorias.id', '=','reclame.categorias_id')
            ->groupBy('categoria')->get();


        $countImagem = 0;
        $countLink = 0;
        $countDemora = 0;
        $countInfo = 0;
        $countPlay = 0;
        $countOutro = 0;
        $nomeCategoria = [];

        //dd($reclame);
        foreach ($reclame as $item) {
            // $qtdReclame[] = $item->qtd_reclame;
            //var_dump($item->nome_categoria);
            if ($item->nome_categoria == 'IMAGEM') {
                $countImagem = $item->qtd_reclame;
            } else if ($item->nome_categoria == 'LINK') {
                $countLink = $item->qtd_reclame;
            } else if ($item->nome_categoria == 'DEMORA NO CARREGAMENTO') {
                $countDemora = $item->qtd_reclame;
            } else if ($item->nome_categoria == 'INFORMAÇÃO ERRADA') {
                $countInfo = $item->qtd_reclame;
            } else if ($item->nome_categoria == 'PLAYLIST') {
                $countPlay = $item->qtd_reclame;
            } else if ($item->nome_categoria == 'OUTRO') {
                $countOutro = $item->qtd_reclame;
            }

            $nomeCategoria[] = $item->nome_categoria;
        }




        return $this->chart->polarAreaChart()
            ->setTitle('Quantidade de Reclamações por Categoria.')
            ->setSubtitle('Qual a maior reclamação?')
            ->addData([$countImagem, $countLink, $countDemora, $countInfo, $countPlay, $countOutro])

            ->setColors(['#FFA500', '#8B008B', '#00BFFF', '#228B22', '#FF1493', '#D32F2F',])
            ->setLabels($nomeCategoria);

    }
}
