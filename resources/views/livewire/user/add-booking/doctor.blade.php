
<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='add'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group">
                <span>اى حجز او استشارة مدتها نصف ساعه من ميعاد البدء</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control ps-2" wire:model.lazy='title' name="title" id="title" placeholder="عنوان الحجز">
                @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <input type="datetime-local" class="form-control ps-2" wire:model.lazy='start' name="start" id="start" placeholder="بداية الميعاد">
                @error('start') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <textarea name="description"  wire:model.lazy='description' class="form-control" id="description" rows="6" placeholder="التفاصيل"></textarea>
                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="btn btn-primary">إضافة</button>

        </form>
    </div>
</div>

