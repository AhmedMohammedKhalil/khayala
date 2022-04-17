<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'trainer_id','name','photo','price','rating','details'
    ];



    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function orders()
    {
        return $this->belongsToMany(User::class,'user_products')
                ->withTimestamps();
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rate');
    }
}
