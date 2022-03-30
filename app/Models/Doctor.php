<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guard = 'doctor';

    protected $fillable = [
        'name', 'email', 'password','photo','address', 'phone', 'specialization','rating','description'
    ];

    protected $hidden = [
        'password',
    ];

    public function cases()
    {
        return $this->hasMany(Cases::class,'doctor_id');
    }

    public function user_booking()
    {
        return $this->belongsToMany(User::class,'user_doctors')
                ->withTimestamps()
                ->withPivot('book_at','status');
    }

    public function rates()
    {
        return $this->morphToMany(User::class, 'rate');
    }

}
