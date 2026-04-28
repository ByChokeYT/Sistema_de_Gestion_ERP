<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Ingresos Totales (BOB)', 'Bs. ' . number_format(Invoice::sum('total_amount'), 2))
                ->description('Total de facturas emitidas')
                ->descriptionIcon(Heroicon::OutlinedBanknotes)
                ->color('success'),
            Stat::make('Productos con Stock Bajo', Product::where('stock_quantity', '<', 5)->count())
                ->description('Menos de 5 unidades')
                ->descriptionIcon(Heroicon::OutlinedExclamationTriangle)
                ->color('danger'),
            Stat::make('Total Clientes', Customer::count())
                ->description('Clientes registrados')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('info'),
        ];
    }
}
