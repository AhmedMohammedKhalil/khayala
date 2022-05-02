<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status', 'total','photo','address','description','organization','appointment'
    ];

    public function user_booking()
    {
        return $this->belongsToMany(User::class,'user_competitions')
                ->withTimestamps()
                ->withPivot('status');
    }

    public function userBooking() {
        return $this->belongsToMany(User::class,'user_competitions')
                ->wherePivot('status', 1);
    }
}
