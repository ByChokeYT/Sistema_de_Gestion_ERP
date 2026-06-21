<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id', 'product_id', 'product_name', 
        'quantity', 'unit_price', 'subtotal'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::created(function ($item) {
            $product = $item->product;
            if ($product) {
                // Deduct stock quantity
                $product->decrement('stock_quantity', $item->quantity);

                // Record stock movement
                \App\Models\StockMovement::create([
                    'product_id' => $product->id,
                    'quantity' => -$item->quantity,
                    'type' => 'Venta',
                    'reference' => "Factura Nro. " . ($item->invoice->invoice_number ?? $item->invoice_id),
                ]);

                // Send live critical stock notification if stock drops below 5
                if ($product->fresh()->stock_quantity < 5) {
                    \Filament\Notifications\Notification::make()
                        ->title('Stock Crítico Detectado')
                        ->body("El producto {$product->name} ha quedado con stock bajo ({$product->stock_quantity} unidades).")
                        ->warning()
                        ->send();
                }
            }
        });
    }
}
