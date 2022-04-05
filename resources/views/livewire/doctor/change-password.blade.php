<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='edit'>
            @if (session()->has('error')) 
                <div class="alert alert-danger"> 
                    {{ session('error') }} 
                </div> 
            @endif 
                 <div class="form-group">
                    <label for="password"><i class="icofont-lock"></i></label>
                    <input type="password" wire:model.lazy='password' id="password" class="form-control" placeholder="Password">
                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror 
                </div>

                <div class="form-group">
                    <label for="confirm_password"><i class="icofont-lock"></i></label>
                    <input type="password" wire:model.lazy='confirm_password' id="confirm_password" class="form-control" placeholder="confirm password">
                    @error('confirm_password') <span class="text-danger error">{{ $message }}</span>@enderror 
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

