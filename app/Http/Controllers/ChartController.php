<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Charts\ProjectChart;
use Illuminate\Support\Facades\View;
use \PDF;


class ChartController extends Controller
{
    public function index(ProjectChart $chart)
{
    return view('backoffice.projects.chart',['chart' => $chart->build()]);
}

public function exportPDF(ProjectChart $chart) {
    $pdf = PDF::loadView('backoffice.projects.chartexport', ['chart' => $chart->build()]);
    return $pdf->download('chart.pdf');
}

}
