
<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='accept'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group">
                <input type="datetime-local" class="form-control ps-2" wire:model.lazy='book_at' name="book_at" id=""
                    placeholder="ميعاد الحجز">
                @error('book_at') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="btn btn-primary">قبول</button>

        </form>
    </div>
</div>

