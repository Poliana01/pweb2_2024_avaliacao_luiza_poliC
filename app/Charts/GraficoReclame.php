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

        return $this->chart->barChart()
            ->setTitle('Quantidade de Reclamações por Categoria.')
            ->setSubtitle('Primeiro semestre de 2024.')
            ->addData('IMAGEM', [$countImagem])
            ->addData('LINK', [$countLink])
            ->addData('DEMORA NO CARREGAMENTO', [$countDemora])
            ->addData('INFORMAÇÃO ERRADA', [$countInfo])
            ->addData('PLAYLIST', [$countPlay])
            ->addData('OUTRO', [$countOutro])
            ->setColors(['#FFC107', '#D32F2F', '#FFC107', '#D32F2F', '#FFC107', '#D32F2F',])
            ->setXAxis($nomeCategoria);
        // dd($qtdAlunos);
        /*
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

        */
    }
}
