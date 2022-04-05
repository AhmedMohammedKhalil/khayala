<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    use WithFileUploads;
    public $name, $email, $photo, $phone, $specialization, $description, $address;


    public function mount() {
        $this->doctor_id = Auth::guard('doctor')->user()->id;
        $this->name = Auth::guard('doctor')->user()->name;
        $this->email = Auth::guard('doctor')->user()->email;
        $this->phone = Auth::guard('doctor')->user()->phone;
        $this->specialization = Auth::guard('doctor')->user()->specialization;
        $this->description = Auth::guard('doctor')->user()->description;
        $this->address = Auth::guard('doctor')->user()->address;

    }


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'specialization' => ['required', 'string', 'max:50'],
        'description' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'address' => ['required', 'string', 'max:255']
    ];

    public function updatedPhoto()
    {
            $validatedata = $this->validate( 
                ['photo' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    public function edit() {
        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [ 'email'   => ['required','email',"unique:doctors,email,".$this->doctor_id],
        ]));
        if(!$this->photo)
            Doctor::whereId($this->doctor_id)->update($validatedata);
        if($this->photo) {
            $photoname = $this->photo->getClientOriginalName();
            Doctor::whereId($this->doctor_id)->update(array_merge($validatedata,['photo' => $photoname]));
            $dir = public_path('img/doctors/'.$this->doctor_id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->photo->storeAs('doctors/'.$this->doctor_id,$photoname);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "Your Profile Updated."); 
        return redirect()->route('doctor.profile');
    }

    public function render()
    {
        return view('livewire.doctor.settings');
    }
}
