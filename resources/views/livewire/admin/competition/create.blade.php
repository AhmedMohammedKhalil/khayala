<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='add'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="form-group">
                    <input type="text" wire:model.lazy='name' id="name" class="form-control" placeholder="إسم المسابقة">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="text" wire:model.lazy='organization' id="organization" class="form-control" placeholder="المنظمة">
                    @error('organization') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="number" wire:model.lazy='total' id="total"  min="1"  max="50" class="form-control" placeholder="عدد المشاركين">
                    @error('total') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="datetime-local" wire:model.lazy='appointment' id="appointment" class="form-control" placeholder="المنظمة">
                    @error('appointment') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="file" wire:model='photo' id="photo" class="form-control" placeholder="photo">
                    @error('photo') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <textarea name="description"  wire:model.lazy='description' class="form-control" id="description" rows="6" placeholder="التفاصيل"></textarea>
                    @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <textarea name="address" class="form-control"  wire:model.lazy='address' id="address" rows="6" placeholder="العنوان"></textarea>
                    @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
</div>

