<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_doctor extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'doctor_id', 'book_at','status'
    ];

    
}
