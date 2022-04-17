<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'phone',
        'address'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->belongsToMany(Product::class,'user_products')
                ->withTimestamps();
    }

    public function doctor_booking()
    {
        return $this->belongsToMany(Doctor::class,'user_doctors')
                ->withTimestamps()
                ->withPivot('book_at','status');
    }

    public function trainer_booking()
    {
        return $this->belongsToMany(Trainer::class,'user_trainers')
                ->withTimestamps()
                ->withPivot('book_at','status');
    }

    public function competiton_booking()
    {
        return $this->belongsToMany(Competition::class,'user_competitions')
                ->withTimestamps()
                ->withPivot('status');
    }

    public function rates() {
        return $this->hasMany(Rate::class,'user_id');
    }

}
