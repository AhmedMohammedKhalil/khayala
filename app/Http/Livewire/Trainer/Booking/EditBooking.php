<?php

namespace App\Http\Livewire\Trainer\Booking;

use App\Models\booking_trainer;
use DateTime;
use Livewire\Component;

class EditBooking extends Component
{
    public $title,$status,$oldstart,$start,$oldend,$end,$description,$booking;

    public function mount($booking_id) {
        $this->booking = booking_trainer::find($booking_id);
        $this->title = $this->booking->title;
        $this->status = $this->booking->status;
        $this->oldstart = $this->booking->start;
        $this->oldend = $this->booking->end;
        $this->description = $this->booking->description;

    }
    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:255',
        'status' => 'required',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function updatedStart()
    {
            $data = $this->validate(
                [
                    'title' => 'required|max:50',
                    'description' => 'required|max:255',
                    'status' => 'required',
                    'start' => ['required'],
                    'end' => ['required'] ,

                ]
            );
    }
    public function updatedEnd()
    {
            $data = $this->validate(
                [
                    'title' => 'required|max:50',
                    'description' => 'required|max:255',
                    'status' => 'required',
                    'start' => ['required'] ,
                    'end' => ['required'] ,
                ]
            );
    }

    public function edit() {
        $today = new DateTime('today');
        $st = new DateTime($this->start);
        $finish = new DateTime($this->end);



        $data = $this->validate($this->rules);

        if($this->start && $this->end) {
            $data = array_merge(
                $data,
                [
                    'start' => $this->start,
                    'end' => $this->end,

                ]
            );
        }
        if(!empty($this->start) && $st < $today) {
            session()->flash('error', "لابد ان يكون ميعاد البدء اليوم او الايام القادمة");
        } elseif (!empty($this->end) && $st > $finish) {
            session()->flash('error', "لابد ان يكون ميعاد البدء اصغر من ميعاد الانتهاء");
        } else {
            booking_trainer::find($this->booking->id)->update($data);
            return redirect()->route('trainer.bookings');
        }

    }
    public function render()
    {
        return view('livewire.trainer.booking.edit-booking');
    }
}
