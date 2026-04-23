<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'order_id',
        'nama_barang',
        'berat',
        'catatan'
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke Barang (khusus kirim barang)
    public function barang()
    {
        return $this->hasOne(Barang::class);
    }
}
