<?php

namespace App\Http\Livewire\Trainer\Work;

use App\Models\Work;
use Livewire\Component;

class Edit extends Component
{
    public $job_title, $job_estimation, $placement, $details, $work;

    public function mount($work) {
        $this->work = $work;
        $this->job_title = $work->job_title;
        $this->job_estimation = $work->job_estimation;
        $this->placement = $work->placement;
        $this->details = $work->details;

    }

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

    public function edit(){
        $validatedData = $this->validate();

        Work::whereId($this->work->id)->update($validatedData);
            session()->flash('message', "Your Work Updated Successfully");
            return redirect()->route('trainer.works');
    }

    public function render()
    {
        return view('livewire.trainer.work.edit');
    }
}
