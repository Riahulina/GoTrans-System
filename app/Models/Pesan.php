<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'order_id',
        'pengirim_id',
        'isi_pesan',
        'waktu_kirim',
        'status'
    ];

    //Relasi ke Order (chat per order)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //Relasi ke User (pengirim)
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }
}