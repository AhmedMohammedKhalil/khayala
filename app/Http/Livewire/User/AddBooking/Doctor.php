<?php

namespace App\Http\Livewire\User\AddBooking;

use App\Models\booking_doctor;
use DateTime;
use Livewire\Component;

class Doctor extends Component
{

    public $title,$status = 0 ,$start,$end,$description,$doctor_id;

    public function mount($doctor_id) {
        $this->doctor_id = $doctor_id;
    }
    protected $rules = [
        'title' => 'required|max:50',
        'description' => 'required|max:255',
        'start' => 'required',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function add() {

        $data = $this->validate();

        $today = new DateTime('today');
        $st = new DateTime($this->start);
        $finish = new DateTime($this->start);
        $finish = $finish->modify('+30 minutes');

        if($st < $today) {
            session()->flash('error', "لابد ان يكون موعد البدء اليوم او الايام القادمة");
        } elseif ($st > $finish) {
            session()->flash('error', "لابد ان يكون موعد البدء اصغر من موعد الانتهاء");
        } else {
            $flag = true;
            $bookings = booking_doctor::where('doctor_id',$this->doctor_id)->get();
            foreach($bookings as $b) {
                $b_start = new DateTime($b->start);
                $b_end = new DateTime($b->end);
                if(($st > $b_start && $st < $b_end) || ($finish < $b_end && $finish > $b_start)) {
                    session()->flash('error', "هذا الموعد معارض مع موعد للدكتور");
                    $flag = false;
                    break;
                }
            }

            if($flag == true) {
                $bookings = booking_doctor::where('user_id',auth('user')->user()->id)->get();
                foreach($bookings as $b) {
                    $b_start = new DateTime($b->start);
                    $b_end = new DateTime($b->end);
                    if(($st > $b_start && $st < $b_end) || ($finish < $b_end && $finish > $b_start)) {
                        session()->flash('error', "هذا الموعد لا يناسبك. هناك موعد لديك فى نفس الوقت");
                        $flag = false;
                        break;
                    }
                }
            }


            if($flag == true) {
                $data = array_merge(
                    $data,
                    [
                        'user_id' => auth('user')->user()->id,
                        'doctor_id' => $this->doctor_id,
                        'status' => 0,
                        'end' => $finish
                    ]
                );
                booking_doctor::create($data);
                return redirect()->route('user.booking.doctor');
            }

        }

    }
    public function render()
    {
        return view('livewire.user.add-booking.doctor');
    }
}
