<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainer extends Authenticatable
{
    use HasFactory;

    protected $guard = 'trainer';

    protected $fillable = [
        'name', 'email', 'password','photo','address', 'phone', 'specialization','rating','description'
    ];

    protected $hidden = [
        'password',
    ];

    public function works()
    {
        return $this->hasMany(Work::class,'trainer_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'trainer_id');
    }

    public function bookings()
    {
        return $this->hasMany(booking_trainer::class,'trainer_id');
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rate');
    }
}
