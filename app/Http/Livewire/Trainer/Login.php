<?php

namespace App\Http\Livewire\Trainer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:trainers,email',
        'password' => 'required|min:8'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('trainer')->attempt($validatedData)){ 

            session()->flash('message', "You are Login successful."); 
            return redirect()->route('home');
        }else{ 
            session()->flash('error', 'email or password are wrong.'); 
        } 
    }

    public function render()
    {
        return view('livewire.trainer.login');
    }
}
