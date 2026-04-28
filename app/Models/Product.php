<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'sku', 'barcode', 'cost_price', 
        'sale_price', 'currency', 'stock_quantity', 'unit', 
        'description', 'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
