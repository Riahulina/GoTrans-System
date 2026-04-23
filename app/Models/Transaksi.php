<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'order_id',
        'total',
        'komisi_admin',
        'pendapatan_driver',
        'metode_bayar'
    ];

    //Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}