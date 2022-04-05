<div style="padding: 40px 0 ">
    <div class="login-form">
        <form wire:submit.prevent='edit'>
            @if (session()->has('error')) 
                <div class="alert alert-danger"> 
                    {{ session('error') }} 
                </div> 
            @endif 
                <div class="form-group">
                    <label for="name"><i class="icofont-ui-user"></i></label>
                    <input type="text" wire:model.lazy='name' id="name" class="form-control" placeholder="Name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror 
                </div>

                <div class="form-group">
                    <label for="email"><i class="icofont-envelope"></i></label>
                    <input type="email" wire:model.lazy='email' id="email" class="form-control" placeholder="Email">
                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror 
                </div>
                
                <div class="form-group">
                    <label for="photo"><i class="icofont-photobucket"></i></label>
                    <input type="file" wire:model='photo' id="photo" class="form-control" placeholder="photo">
                    @error('photo') <span class="text-danger error">{{ $message }}</span>@enderror 
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

