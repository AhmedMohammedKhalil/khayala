<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='edit'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="form-group">
                    <input type="text" wire:model.lazy='title' id="title" class="form-control" placeholder="الأسم">
                    @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <textarea name="details"  wire:model.lazy='details' class="form-control" id="details" rows="6" placeholder="التفاصيل"></textarea>
                    @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <textarea name="treatment"  wire:model.lazy='treatment' class="form-control" id="treatment" rows="6" placeholder="العلاج"></textarea>
                    @error('treatment') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>


                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
        </form>
    </div>
</div>

