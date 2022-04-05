<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $confirm_password, $phone, $address;
    

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'email'   => 'required|email|unique:users,email',
        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8','same:password'],
        'address' => ['required', 'string', 'max:255'],

    ];

    public function register(){
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            ['password' => Hash::make($this->password)]
        );
        //dd($data);
        User::create($data);
        if(Auth::guard('user')->attempt($validatedData)){ 
            session()->flash('message', "You are Login successful."); 
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.user.register');
    }
}
