<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;


    protected $fillable = [
        'doctor_id','title', 'details', 'tratement'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
