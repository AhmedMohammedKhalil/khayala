<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_competition extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'competition_id', 'status'
    ];


    public function competition() {
        return $this->belongsTo(Competition::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
