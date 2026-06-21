<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Product;
use App\Models\Invoice;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos de la Factura')
                    ->columns(2)
                    ->schema([
                        Select::make('customer_id')
                            ->relationship('customer', 'name')
                            ->label('Cliente')
                            ->placeholder('Seleccione un cliente')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('invoice_number')
                            ->label('Número de Factura')
                            ->numeric()
                            ->readOnly()
                            ->default(fn () => (Invoice::max('invoice_number') ?? 0) + 1),
                        DateTimePicker::make('emission_date')
                            ->label('Fecha de Emisión')
                            ->default(now())
                            ->required(),
                        Select::make('payment_method')
                            ->label('Método de Pago')
                            ->options([
                                'Efectivo' => 'Efectivo',
                                'Tarjeta' => 'Tarjeta de Débito/Crédito',
                                'Transferencia' => 'Transferencia Bancaria',
                                'QR' => 'Pago Simple QR',
                            ])
                            ->default('Efectivo')
                            ->required(),
                    ]),

                Section::make('Detalle de Productos')
                    ->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->label('Ítems')
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name', modifyQueryUsing: fn ($query) => $query->where('is_active', true))
                                    ->label('Producto')
                                    ->placeholder('Seleccionar producto')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set, $get) {
                                        if ($state) {
                                            $product = Product::find($state);
                                            if ($product) {
                                                $set('product_name', $product->name);
                                                $set('unit_price', $product->sale_price);
                                                $set('quantity', 1);
                                                $set('subtotal', $product->sale_price);
                                            }
                                        } else {
                                            $set('product_name', null);
                                            $set('unit_price', 0);
                                            $set('quantity', 0);
                                            $set('subtotal', 0);
                                        }
                                        self::updateInvoiceTotals($get, $set);
                                    }),
                                TextInput::make('product_name')
                                    ->label('Nombre del Producto')
                                    ->required()
                                    ->readOnly(),
                                TextInput::make('quantity')
                                    ->label('Cantidad')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set, $get) {
                                        $quantity = (float) $state;
                                        $unitPrice = (float) $get('unit_price');
                                        $set('subtotal', round($quantity * $unitPrice, 2));
                                        self::updateInvoiceTotals($get, $set);
                                    })
                                    ->rules([
                                        fn ($get): \Closure => function (string $attribute, $value, \Closure $fail) use ($get) {
                                            $productId = $get('product_id');
                                            if ($productId) {
                                                $product = \App\Models\Product::find($productId);
                                                if ($product && $value > $product->stock_quantity) {
                                                    $fail("No hay suficiente stock. Disponible: {$product->stock_quantity} unidades.");
                                                }
                                            }
                                        },
                                    ]),
                                TextInput::make('unit_price')
                                    ->label('Precio Unitario')
                                    ->numeric()
                                    ->prefix('Bs.')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set, $get) {
                                        $unitPrice = (float) $state;
                                        $quantity = (float) $get('quantity');
                                        $set('subtotal', round($quantity * $unitPrice, 2));
                                        self::updateInvoiceTotals($get, $set);
                                    }),
                                TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->numeric()
                                    ->prefix('Bs.')
                                    ->readOnly()
                                    ->required(),
                            ])
                            ->columns(5)
                            ->defaultItems(1)
                            ->live()
                            ->afterStateUpdated(fn ($get, $set) => self::updateInvoiceTotals($get, $set))
                            ->afterStateHydrated(fn ($get, $set) => self::updateInvoiceTotals($get, $set)),
                    ]),

                Section::make('Resumen y Totales')
                    ->columns(3)
                    ->schema([
                        TextInput::make('discount_amount')
                            ->label('Descuento')
                            ->numeric()
                            ->default(0)
                            ->prefix('Bs.')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn ($get, $set) => self::updateInvoiceTotals($get, $set)),
                        TextInput::make('total_amount')
                            ->label('Monto Total')
                            ->numeric()
                            ->prefix('Bs.')
                            ->readOnly()
                            ->required(),
                        TextInput::make('taxable_amount')
                            ->label('Monto Sujeto a Crédito Fiscal')
                            ->numeric()
                            ->prefix('Bs.')
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Datos Fiscales (SIAT)')
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        TextInput::make('cuf')
                            ->label('CUF')
                            ->placeholder('Se generará automáticamente')
                            ->readOnly(),
                        TextInput::make('cufd')
                            ->label('CUFD')
                            ->placeholder('Se generará automáticamente')
                            ->readOnly(),
                        TextInput::make('control_code')
                            ->label('Código de Control')
                            ->placeholder('Se generará automáticamente')
                            ->readOnly(),
                        Select::make('status')
                            ->label('Estado')
                            ->options([
                                'Vigente' => 'Vigente',
                                'Anulada' => 'Anulada',
                            ])
                            ->default('Vigente')
                            ->required(),
                    ]),
            ]);
    }

    public static function updateInvoiceTotals($get, $set): void
    {
        $items = $get('items') ?? $get('../../items') ?? [];
        $subtotalSum = 0;
        foreach ($items as $item) {
            $quantity = (float) ($item['quantity'] ?? 0);
            $unitPrice = (float) ($item['unit_price'] ?? 0);
            $subtotalSum += $quantity * $unitPrice;
        }
        $discount = (float) ($get('discount_amount') ?? $get('../../discount_amount') ?? 0);
        $total = max(0, $subtotalSum - $discount);
        
        $set('total_amount', round($total, 2));
        $set('taxable_amount', round($total, 2));
        $set('../../total_amount', round($total, 2));
        $set('../../taxable_amount', round($total, 2));
    }
}
