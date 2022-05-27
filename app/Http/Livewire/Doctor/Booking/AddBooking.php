<?php

namespace App\Http\Livewire\Doctor\Booking;

use App\Models\booking_doctor;
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
                ['doctor_id' => auth('doctor')->user()->id]
            );
            booking_doctor::create($data);
            return redirect()->route('trainer.bookings');
        }

    }
    public function render()
    {
        return view('livewire.doctor.booking.add-booking');
    }
}
