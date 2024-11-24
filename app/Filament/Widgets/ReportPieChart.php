<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;

class ReportPieChart extends ChartWidget
{
    // Título del gráfico
    protected static ?string $heading = 'Distribución de Tipos de Contaminación';

    // Datos del gráfico
    protected function getData(): array
    {
        // Obtener los tipos de contaminación y contar cuántos reportes hay por cada tipo
        $reportTypes = Report::selectRaw('type, count(*) as count')
            ->groupBy('type') // Agrupar por tipo de contaminación
            ->get();

        // Calcular el total de reportes para calcular el porcentaje
        $totalReports = Report::count();

        // Preparar las etiquetas (tipos de contaminación) y los valores (conteo de reportes)
        $labels = $reportTypes->pluck('type')->toArray();
        $data = $reportTypes->pluck('count')->toArray();

        // Calcular el porcentaje para cada tipo de contaminación
        $percentages = array_map(function ($count) use ($totalReports) {
            return round(($count / $totalReports) * 100, 2); // Redondear el porcentaje a 2 decimales
        }, $data);

        return [
            'labels' => $labels, // Etiquetas para los tipos de contaminación
            'datasets' => [
                [
                    'label' => 'Tipos de Contaminación',
                    'data' => $percentages, // Los porcentajes de los reportes
                    'backgroundColor' => [
                        '#FF5733', '#FF8D1A', '#FFEC4D', '#32CD32', '#33C1FF', // Colores más vivos
                        '#FF33FF', '#D74BFF', '#FF3333', '#C3FF33', '#33FF57'
                    ], // Colores vivos para las secciones
                    'borderColor' => '#ffffff', // Color del borde (blanco)
                    'borderWidth' => 2, // Grosor del borde
                ],
            ],
            'options' => [
                'plugins' => [
                    'tooltip' => [
                        'enabled' => true, // Mostrar los tooltips al pasar sobre las secciones
                        'callbacks' => [
                            'label' => function ($tooltipItem) use ($percentages) {
                                $index = $tooltipItem['dataIndex'];
                                return $tooltipItem['label'] . ': ' . $percentages[$index] . '%'; // Mostrar porcentaje en el tooltip
                            },
                        ],
                    ],
                    'legend' => [
                        'display' => true, // Mostrar la leyenda
                        'position' => 'top', // Posición de la leyenda
                    ],
                    'datalabels' => [
                        'formatter' => function ($value, $context) {
                            return $value . '%'; // Mostrar porcentaje en las etiquetas del gráfico
                        },
                        'color' => '#fff', // Color del texto de las etiquetas
                        'font' => [
                            'weight' => 'bold', // Peso de la fuente
                        ],
                    ],
                ],
                'responsive' => true, // Hacer el gráfico responsivo
                'maintainAspectRatio' => false, // No mantener la relación de aspecto
            ],
        ];
    }

    // Tipo de gráfico (pastel)
    protected function getType(): string
    {
        return 'pie'; // Usamos un gráfico de pastel
    }
}
