<section class="login-area" style="min-height: calc(100vh - 167px);height:auto !important;padding:15px 0">
    <div class="d-table" style=""> 
        <div class="d-table-cell">
            <div class="login-form">
                <h3>Please Sign Up, or <a href="{{ route('user.login') }}">Log In</a></h3>

                <form wire:submit.prevent='register'>
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
                            <label for="phone"><i class="icofont-smart-phone"></i></label>
                            <input type="text" wire:model.lazy='phone' id="phone" class="form-control" placeholder="phone">
                            @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror 
                        </div>
                        
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
    
                        <div class="form-group">
                            <textarea name="address" class="form-control"  wire:model.lazy='address' id="address" rows="6" placeholder="Your address"></textarea>
                            @error('address') <span class="text-danger error">{{ $message }}</span>@enderror 
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>

