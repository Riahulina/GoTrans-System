<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'plat_nomor',
        'status'
    ];


    public function isOnline()
    {
        return $this->status === 'online';
    }
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi ke Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    // Relasi ke Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relasi Ke Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Relasi Ke Transaksi
    public function transaksi()
    {
        return $this->hasManyThrough(Transaksi::class, Order::class);
    }
}
