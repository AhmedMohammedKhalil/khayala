<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password='', $confirm_password='',$user_id='';


    public function mount() {
        $this->user_id = Auth::guard('user')->user()->id;
    }


    protected $rules = [

        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8','same:password'],
    ];

   

    public function edit() {

        $validatedata = $this->validate();
        $data =['password' => Hash::make($this->password)];

        User::whereId($this->user_id)->update($data);
        session()->flash('message', "Your Profile Updated."); 
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.change-password');
    }
}
