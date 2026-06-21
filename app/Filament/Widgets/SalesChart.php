<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Invoice;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Ventas Mensuales (Bs.)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        $sales = [];
        for ($i = 1; $i <= 12; $i++) {
            $sales[] = (float) Invoice::whereYear('emission_date', now()->year)
                ->whereMonth('emission_date', $i)
                ->where('status', 'Vigente')
                ->sum('total_amount');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Ventas (Bs.)',
                    'data' => $sales,
                    'borderColor' => '#f97316', // Orange matching our Claude-inspired theme
                    'backgroundColor' => 'rgba(249, 115, 22, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
