<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;

class ReportsCharts extends ChartWidget
{
    protected static ?string $heading = 'Reportes por Mes';

    protected function getData(): array
    {
        $reports = Report::selectRaw('strftime("%Y-%m", created_at) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'labels' => $reports->pluck('month')->toArray(),
            'datasets' => [
                [
                    'label' => 'Número de Reportes',
                    'data' => $reports->pluck('count')->toArray(),
                    'backgroundColor' => '#4c9aff',
                    'borderColor' => '#1e3d58',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Meses',
                    ],
                ],
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Cantidad de Reportes',
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'enabled' => true,
                    'mode' => 'index',
                ],
            ],
        ];
    }
}
