<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='edit'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="form-group">
                    <input type="text" wire:model.lazy='name' id="name" class="form-control" placeholder="إسم المنتج">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>



                <div class="form-group">
                    <input type="number" wire:model.lazy='price' id="price" class="form-control" placeholder="السعر">
                    @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>



                <div class="form-group">
                    <input type="file" wire:model='photo' id="photo" class="form-control" placeholder="photo">
                    @error('photo') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <textarea name="details"  wire:model.lazy='details' class="form-control" id="details" rows="6" placeholder="التفاصيل"></textarea>
                    @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
        </form>
    </div>
</div>

