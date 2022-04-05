<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    use WithFileUploads;
    public $name='', $email='', $photo,$admin_id='';


    public function mount() {
        $this->admin_id = Auth::guard('admin')->user()->id;
        $this->name = Auth::guard('admin')->user()->name;
        $this->email = Auth::guard('admin')->user()->email;
        $this->address = Auth::guard('admin')->user()->address;

    }


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
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
                [ 'email'   => ['required','email',"unique:admins,email,".$this->admin_id],
        ]));
        if(!$this->photo)
            Admin::whereId($this->admin_id)->update($validatedata);
        if($this->photo) {
            $photoname = $this->photo->getClientOriginalName();
            Admin::whereId($this->admin_id)->update(array_merge($validatedata,['photo' => $photoname]));
            $dir = public_path('img/admins/'.$this->admin_id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->photo->storeAs('admins/'.$this->admin_id,$photoname);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "Your Profile Updated."); 
        return redirect()->route('admin.profile');
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
