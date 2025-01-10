<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecomenProduct extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'product_id', 'product_id');
    }
}
