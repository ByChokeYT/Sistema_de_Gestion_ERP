<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer_id', 'invoice_number', 'cuf', 'cufd', 
        'control_code', 'emission_date', 'total_amount', 
        'discount_amount', 'taxable_amount', 'status', 'payment_method'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
