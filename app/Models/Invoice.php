<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer_id', 'invoice_number', 'cuf', 'cufd', 
        'control_code', 'emission_date', 'total_amount', 
        'discount_amount', 'taxable_amount', 'status', 'payment_method',
        'siat_status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    protected static function booted()
    {
        static::creating(function ($invoice) {
            if (empty($invoice->invoice_number)) {
                $invoice->invoice_number = (static::max('invoice_number') ?? 0) + 1;
            }
            if (empty($invoice->cuf)) {
                $invoice->cuf = strtoupper(bin2hex(random_bytes(24)));
            }
            if (empty($invoice->cufd)) {
                $invoice->cufd = strtoupper(bin2hex(random_bytes(16)));
            }
            if (empty($invoice->control_code)) {
                $invoice->control_code = strtoupper(substr(md5(uniqid()), 0, 10));
            }
            if (empty($invoice->emission_date)) {
                $invoice->emission_date = now();
            }
        });
    }
}
