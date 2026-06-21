<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;

class TopProductsChart extends ChartWidget
{
    protected ?string $heading = 'Top 5 Productos Más Vendidos';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $topProducts = InvoiceItem::select('product_name', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        $labels = $topProducts->pluck('product_name')->toArray();
        $data = $topProducts->pluck('total_sold')->map(fn ($val) => (float) $val)->toArray();

        // Fallback if empty to make the graph look neat
        if (empty($labels)) {
            $labels = ['Sin Ventas'];
            $data = [0];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Unidades Vendidas',
                    'data' => $data,
                    'backgroundColor' => '#6366f1', // Indigo bar matching modern design
                    'borderRadius' => 4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
