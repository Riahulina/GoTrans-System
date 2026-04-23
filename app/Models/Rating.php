<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'driver_id',
        'nilai',
        'komentar'
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

        //Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi ke Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}