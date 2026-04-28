<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'sin_code', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
