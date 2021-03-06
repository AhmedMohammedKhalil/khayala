<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booking_doctor extends Model
{


    protected $fillable = [
        'doctor_id', 'start','end','status','title','description'
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }


    public function getColorAttribute(){
        if($this->status == 0)
            $color = 'rgb(252 162 162)';
        else
            $color = 'rgb(77 221 85 / 55%)';
        return $color;
    }


    protected $appends = ['color'];
}
