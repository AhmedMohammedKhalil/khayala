<?php

namespace App\Http\Livewire\Doctor\Case;

use App\Models\Cases;
use Livewire\Component;

class Create extends Component
{
    public $title, $treatment, $details;


    protected $rules = [
        'title' => ['required', 'string', 'max:100'],
        'details' => ['required', 'string', 'max:255'],
        'treatment' => ['required', 'string', 'max:255'],

    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',
    ];

    public function create(){
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            ['doctor_id' => auth('doctor')->user()->id]
        );
        Cases::create($data);
            session()->flash('message', "Your Case Added Successfully");
            return redirect()->route('doctor.Cases');
    }

    public function render()
    {
        return view('livewire.doctor.case.create');
    }
}
