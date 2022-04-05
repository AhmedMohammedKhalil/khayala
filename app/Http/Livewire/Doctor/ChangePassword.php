<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password='', $confirm_password='',$doctor_id='';


    public function mount() {
        $this->doctor_id = Auth::guard('doctor')->user()->id;
    }


    protected $rules = [

        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8','same:password'],
    ];

   

    public function edit() {

        $validatedata = $this->validate();
        $data =['password' => Hash::make($this->password)];

        Doctor::whereId($this->doctor_id)->update($data);
        session()->flash('message', "Your Profile Updated."); 
        return redirect()->route('doctor.profile');
    }

    public function render()
    {
        return view('livewire.doctor.change-password');
    }
}
