<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Project;

class ProjectChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {

        $projects = Project::selectRaw('MONTH(start_date) as month, COUNT(*) as project_count')
        ->groupBy('month')
        ->get();

    // Prepare data for the chart
        $months = [];
        $projectCounts = [];

    foreach ($projects as $project) {
        $months[] = date("F", mktime(0, 0, 0, $project->month, 1));
        $projectCounts[] = $project->project_count;
    }
    /*
    return $this->chart->lineChart()
            ->setTitle('Projects chart ')
            ->setSubtitle('number of projects per month')
            ->addData('Projects Started', $projectCounts)
            ->setXAxis($months);
            */

        return $this->chart->lineChart()
            ->setTitle('Projects chart ')
            ->setSubtitle('number of projects per month')
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);


    }

}
