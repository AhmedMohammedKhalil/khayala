<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'trainer_id', 'book_at','status'
    ];
}
