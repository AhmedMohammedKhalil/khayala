<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:doctors,email',
        'password' => 'required|min:8'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('doctor')->attempt($validatedData)){ 

            session()->flash('message', "You are Login successful."); 
            return redirect()->route('home');
        }else{ 
            session()->flash('error', 'email or password are wrong.'); 
        } 
    }

    public function render()
    {
        return view('livewire.doctor.login');
    }
}
