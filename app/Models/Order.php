<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'driver_id',
        'kendaraan_id',
        'alamat_asal',
        'alamat_tujuan',
        'pickup_lat',
        'pickup_lng',
        'tujuan_lat',
        'tujuan_lng',
        'jarak_km',
        'harga',
        'status'
    ];

    public function isSelesai()
    {
        return $this->status === 'completed';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
