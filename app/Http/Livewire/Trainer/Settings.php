<?php

namespace App\Http\Livewire\Trainer;

use App\Models\Trainer;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PhpParser\Node\Scalar\MagicConst\Dir;

class Settings extends Component
{
    use WithFileUploads;
    public $name, $email, $photo, $phone, $specialization, $description, $address;


    public function mount() {
        $this->trainer_id = Auth::guard('trainer')->user()->id;
        $this->name = Auth::guard('trainer')->user()->name;
        $this->email = Auth::guard('trainer')->user()->email;
        $this->phone = Auth::guard('trainer')->user()->phone;
        $this->specialization = Auth::guard('trainer')->user()->specialization;
        $this->description = Auth::guard('trainer')->user()->description;
        $this->address = Auth::guard('trainer')->user()->address;

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
                [ 'email'   => ['required','email',"unique:trainers,email,".$this->trainer_id],
        ]));
        if(!$this->photo)
            Trainer::whereId($this->trainer_id)->update($validatedata);
        if($this->photo) {
            $photoname = $this->photo->getClientOriginalName();
            Trainer::whereId($this->trainer_id)->update(array_merge($validatedata,['photo' => $photoname]));
            $dir = public_path('img/trainers/'.$this->trainer_id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->photo->storeAs('trainers/'.$this->trainer_id,$photoname);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "Your Profile Updated."); 
        return redirect()->route('trainer.profile');
    }

    public function render()
    {
        return view('livewire.trainer.settings');
    }
}
