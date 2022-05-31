<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booking_trainer extends Model
{

    protected $fillable = [
        'trainer_id','user_id', 'start','end','status','title','description'
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
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
