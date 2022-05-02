<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Rating extends Component
{
    public $rating;

    public function mount($rating) {
        $this->rating = $rating;
    }

    protected $listeners = [
        'refreshRate',
    ];

    public function refreshRate($rating)
    {
        $this->rating = $rating;
    }
    public function render()
    {
        return view('livewire.user.rating');
    }
}
