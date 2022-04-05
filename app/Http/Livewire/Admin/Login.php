<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Login extends Component
{
    

    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:admins,email',
        'password' => 'required|min:8'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('admin')->attempt($validatedData)){ 

            session()->flash('message', "You are Login successful."); 
            return redirect()->route('home');
        }else{ 
            session()->flash('error', 'email or password are wrong.'); 
        } 
    }
    public function render()
    {
        return view('livewire.admin.login');
    }
}
