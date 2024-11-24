<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ReportsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'pending')->count();
        $inProgressReports = Report::where('status', 'in_progress')->count();
        $resolvedReports = Report::where('status', 'resolved')->count();

        $pendingPercentage = $totalReports > 0 ? ($pendingReports / $totalReports) * 100 : 0;
        $inProgressPercentage = $totalReports > 0 ? ($inProgressReports / $totalReports) * 100 : 0;
        $resolvedPercentage = $totalReports > 0 ? ($resolvedReports / $totalReports) * 100 : 0;

        return [
            Card::make('Total Reportes', $totalReports)
            ->icon('heroicon-o-chart-bar')
            ->color('primary'),
            Card::make('Pendientes', $pendingReports)
            ->description(number_format($pendingPercentage, 2) . '% del total')
            ->icon('heroicon-o-clock')
            ->color('warning'),
            Card::make('En Proceso', $inProgressReports)
            ->description(number_format($inProgressPercentage, 2) . '% del total')
            ->icon('heroicon-o-shield-exclamation')
            ->color('info'),
            Card::make('Resueltos', $resolvedReports)
            ->description(number_format($resolvedPercentage, 2) . '% del total')
            ->icon('heroicon-o-check-circle')
            ->description('Hasta ahora')
            ->color('success'),
        ];
    }
}
