<?php

namespace App\Http\Livewire\Admin\Competition;

use App\Models\Competition;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Edit extends Component
{
    use WithFileUploads;

    public $competition,$name,$organization,$address,$description,$photo,$appointment,$total;

    public function mount($comp_id) {
        $this->competition = Competition::whereId($comp_id)->first();
        $this->name = $this->competition->name;
        $this->organization = $this->competition->organization;
        $this->total = $this->competition->total;
        $this->address = $this->competition->address;
        $this->description = $this->competition->description;
        $this->appointment = $this->competition->appointment;

    }
    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'organization' => ['required', 'string', 'max:100'],
        'total' => ['required','numeric','gt:1' , 'lt:51'],
        'address' => ['required', 'string'],
        'description' => ['required', 'string'],
        'appointment' => ['required','after:today'],
    ];

    public function updatedPhoto()
    {
            $validatedata = $this->validate(
                ['photo' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
        'after' => 'لابد ان يكون ميعاد المسابقة الايام القادمة',
        'gt' => 'لابد ان يكون الرقم اكبر من 1',
        'lt' => 'لابد ان يكون الرقم اصغر من 51',
        'numeric' => 'لابد ان يكون الحقل رقم'

    ];

    public function edit() {
        $data = $this->validate();
        $photoname = "";
        if($this->photo) {
            $photoname = $this->photo->getClientOriginalName();
            $data = array_merge($data,['photo' => $photoname]);
        }
        Competition::whereId($this->competition->id)->update($data);
        if($this->photo) {
            $dir = public_path('img/competitions/'.$this->competition->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->photo->storeAs('competitions/'.$this->competition->id,$photoname);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "تم تعديل المسابقة بنجاح");
        return redirect()->route('admin.competitions');
    }
    public function render()
    {
        return view('livewire.admin.competition.edit');
    }
}
