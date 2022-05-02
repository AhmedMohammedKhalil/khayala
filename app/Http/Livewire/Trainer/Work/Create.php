<?php

namespace App\Http\Livewire\Trainer\Work;

use App\Models\Work;
use Livewire\Component;

class Create extends Component
{
    public $job_title, $job_estimation, $placement, $details;


    protected $rules = [
        'job_title' => ['required', 'string', 'max:100'],
        'job_estimation' => ['required', 'string', 'max:100'],
        'placement' => ['required', 'string', 'max:100'],
        'details' => ['required', 'string', 'max:255'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'details.max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
    ];

    public function create(){
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            ['trainer_id' => auth('trainer')->user()->id]
        );
        Work::create($data);
            session()->flash('message', "Your Work Added Successfully");
            return redirect()->route('trainer.works');
    }

    public function render()
    {
        return view('livewire.trainer.work.create');
    }
}
