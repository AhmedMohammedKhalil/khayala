<?php

namespace App\Http\Livewire\Trainer;

use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $confirm_password, $phone, $specialization, $description, $address;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'specialization' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'email'   => 'required|email|unique:trainers,email',
        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8','same:password'],
        'description' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],

    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function register(){
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            ['password' => Hash::make($this->password)]
        );
        Trainer::create($data);
        if(Auth::guard('trainer')->attempt($validatedData)){
            session()->flash('message', "You are Login successful.");
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.trainer.register');
    }
}
