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
        'jarak_km',
        'harga',
        'status'
    ];
    
    public function isSelesai()
    {
        return $this->status === 'selesai';
    }
    //Relasi ke User (pemesan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi ke Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    //Relasi ke Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    //Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    //Relasi ke Pesan (chat)
    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    //Relasi ke Rating 

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
