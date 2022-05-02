<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='create'>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="form-group">
                    <input type="text" wire:model.lazy='job_title' id="job_title" class="form-control" placeholder="المسمى الوظيفى">
                    @error('job_title') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="text" wire:model.lazy='placement' id="placement" class="form-control" placeholder="المكان">
                    @error('placement') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <input type="text" wire:model.lazy='job_estimation' id="job_estimation" class="form-control" placeholder="المدة">
                    @error('job_estimation') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>



                <div class="form-group">
                    <textarea name="details"  wire:model.lazy='details' class="form-control" id="details" rows="6" placeholder="التفاصيل"></textarea>
                    @error('details') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>


                <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
</div>

