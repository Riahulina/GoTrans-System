<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nama_kendaraan',
        'tarif_per_km',
        'kecepatan_rata',
        'status'
    ];

    //Relasi: 1 kendaraan dipakai banyak driver
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    //Relasi ke Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}