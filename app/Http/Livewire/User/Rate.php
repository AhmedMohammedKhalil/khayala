<?php

namespace App\Http\Livewire\User;

use App\Models\Doctor;
use App\Models\Product;
use App\Models\Rate as ModelsRate;
use App\Models\Trainer;
use Livewire\Component;

class Rate extends Component
{
    public $rate_type;
    public $rate_id;
    public $rating = 0;
    public $rate = 0;
    public function mount($rate_type,$rate_id) {
        $this->rate_id = $rate_id;
        $this->rate_type = $rate_type;
    }

    public function makeRate() {

        ModelsRate::updateOrCreate(
            ['rate_id' => $this->rate_id, 'rate_type' => $this->rate_type,'user_id' => Auth('user')->user()->id],
            ['rate' => $this->rate]
        );


        $rates = ModelsRate::where('rate_id',$this->rate_id)
                    -> where('rate_type',$this->rate_type)->get();
        $sum = $rates->sum('rate');
        $count = $rates->count();
        $this->rating = number_format($sum / $count);

        if($this->rate_type == 'doctor')
        {
            Doctor::whereId($this->rate_id)->update(['rating' => $this->rating]);
        }
        else if($this->rate_type == 'trainer') {
            Trainer::whereId($this->rate_id)->update(['rating' => $this->rating]);
        }
        else
        {
            Product::whereId($this->rate_id)->update(['rating' => $this->rating]);
        }

        $this->emitTo(Rating::class,'refreshRate',$this->rating);


    }
    public function render()
    {
        return view('livewire.user.rate');
    }
}
