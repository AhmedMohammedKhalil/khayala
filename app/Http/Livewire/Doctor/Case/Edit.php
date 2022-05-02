<?php

namespace App\Http\Livewire\Doctor\Case;

use App\Models\Cases;
use Livewire\Component;

class Edit extends Component
{
    public $title, $treatment, $details,$case;

    public function mount($case) {
        $this->case = $case;
        $this->title = $case->title;
        $this->treatment = $case->treatment;
        $this->details = $case->details;

    }

    protected $rules = [
        'title' => ['required', 'string', 'max:100'],
        'details' => ['required', 'string', 'max:255'],
        'treatment' => ['required', 'string', 'max:255'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'title.max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function edit(){
        $validatedData = $this->validate();

        Cases::whereId($this->case->id)->update($validatedData);
            session()->flash('message', "Your case Updated Successfully");
            return redirect()->route('doctor.cases');
    }

    public function render()
    {
        return view('livewire.doctor.case.edit');
    }
}
