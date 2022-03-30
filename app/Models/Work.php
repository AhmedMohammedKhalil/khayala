<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;


    protected $fillable = [
        'trainer_id', 'name', 'job_estimation','details','job_title', 'placement'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
    
}
