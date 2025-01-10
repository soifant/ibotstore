<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_bayar',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function getStatusBadgeAttribute()
    {
        $statusMap = [
            1 => '<span class="badge bg-warning">PENDING</span>',
            2 => '<span class="badge bg-success">SUCCESS</span>',
            3 => '<span class="badge bg-danger">FAILED</span>',
            4 => '<span class="badge bg-secondary">EXPIRED</span>',
            5 => '<span class="badge bg-dark">CANCEL</span>',
        ];

        return $statusMap[$this->status] ?? '<span class="badge bg-light">Unknown</span>';
    }

    // public function getStatusBayarAttribute()
    // {
    //     $statusMap = [
    //         1 => '<span class="badge bg-warning">Belum Bayar</span>',
    //         2 => '<span class="badge bg-success">Sudah Bayar</span>'
    //     ];

    //     return $statusMap[$this->status_bayar] ?? '<span class="badge bg-light">Unknown</span>';
    // }
}
