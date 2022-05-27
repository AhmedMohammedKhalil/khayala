<?php

namespace App\Http\Livewire\Trainer\Booking;

use App\Models\booking_trainer;
use DateTime;
use Livewire\Component;

class AddBooking extends Component
{
    public $title,$status = 1 ,$start,$end,$description;

    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:255',
        'status' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function add() {
        $today = new DateTime('today');
        $st = new DateTime($this->start) ;
        $finish = new DateTime($this->end) ;

        $data = $this->validate();

        if($st < $today) {
            session()->flash('error', "لابد ان يكون ميعاد البدء اليوم او الايام القادمة");
        } elseif ($st > $finish) {
            session()->flash('error', "لابد ان يكون ميعاد البدء اصغر من ميعاد الانتهاء");
        } else {
            $data = array_merge(
                $data,
                ['trainer_id' => auth('trainer')->user()->id]
            );
            booking_trainer::create($data);
            return redirect()->route('trainer.bookings');
        }

    }
    public function render()
    {
        return view('livewire.trainer.booking.add-booking');
    }
}
