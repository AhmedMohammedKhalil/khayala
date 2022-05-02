<?php

namespace App\Http\Livewire\Trainer;

use App\Models\user_trainer;
use Livewire\Component;

class AcceptBook extends Component
{
    public $book_at;
    public $booking;

    public function mount($booking_id) {
        $this->booking = user_trainer::whereId($booking_id)->first();

    }
    protected $rules = [
        'book_at' => 'required|after_or_equal:today',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'after_or_equal' => 'لابد ان يكون ميعاد الحجز اليوم او الايام القادمة'
    ];

    public function accept() {
        $this->validate();
        $this->booking->book_at = $this->book_at;
        $this->booking->status = '1';
        $this->booking->save();

        return redirect()->route('trainer.bookings');
    }
    public function render()
    {
        return view('livewire.trainer.accept-book');
    }
}
