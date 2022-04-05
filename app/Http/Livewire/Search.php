<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Product;
use App\Models\Trainer;

use Livewire\Component;

class Search extends Component
{
    public $products;
    public $trainers;
    public $doctors;
    public $search;

    public function makeSearch() {
        $this->products = '';
        $this->trainers = '';
        $this->doctors = '';
        $this->products = Product::where('name','like','%'.$this->search.'%') 
                                -> orwhere('details','like','\'%'.$this->search.'%')->get();
        $this->trainers = Trainer::where('name','like','%'.$this->search.'%')->get();
        $this->doctors = Doctor::where('name','like','%'.$this->search.'%')->get();
    }
    public function render()
    {
        if($this->search == '') {
            $this->products = Product::all();
            $this->doctors = Doctor::all();
            $this->trainers = Trainer::all();
        }
        return view('livewire.search');
    }
}
