<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
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

    public function user_booking()
    {
        return $this->belongsToMany(User::class,'user_trainers')
                ->withTimestamps()
                ->withPivot('book_at','status');
    }

    public function rates()
    {
        return $this->morphToMany(User::class, 'rate');
    }
}
