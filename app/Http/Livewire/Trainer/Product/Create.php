<?php

namespace App\Http\Livewire\Trainer\Product;

use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Livewire\Component;
class Create extends Component
{
    use WithFileUploads;

    public $name,$price,$details,$photo;

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'price' => ['required','numeric','gt:0'],
        'details' => ['required', 'string'],
    ];

    public function updatedPhoto()
    {
            $validatedata = $this->validate(
                ['photo' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 100 خانة',
        'after' => 'لابد ان يكون ميعاد المسابقة الايام القادمة',
        'gt' => 'لابد ان يكون الرقم اكبر من 0',
        'numeric' => 'لابد ان يكون الحقل رقم'
    ];

    public function add() {
        $data = $this->validate();
        $data = array_merge($data,['trainer_id' => auth('trainer')->user()->id]);
        $photoname = "";
        if($this->photo) {
            $photoname = $this->photo->getClientOriginalName();
            $data = array_merge($data,['photo' => $photoname]);
        }
        $product = Product::create($data);
        if($this->photo) {
            $dir = public_path('img/products/'.$product->id);
            if(file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->photo->storeAs('products/'.$product->id,$photoname);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "تم إضافة المنتج بنجاح");
        return redirect()->route('trainer.products');
    }

    public function render()
    {
        return view('livewire.trainer.product.create');
    }
}
