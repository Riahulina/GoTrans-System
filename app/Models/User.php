<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'nama',
    'email',
    'password',
    'role',
    'no_hp',
    'status'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //Relasi: User memiliki banyak Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //Relasi: User (driver) memiliki 1 data Driver
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    //Relasi ke Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Casting ke data
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relasi ke Pesan (chat)
    public function pesans()
    {
        return $this->hasMany(Pesan::class, 'pengirim_id');
    }
}
