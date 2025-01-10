<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMetod extends Model
{
    public function payments()
    {
        return $this->hasMany(Payment::class, 'metod_id');
    }
}
