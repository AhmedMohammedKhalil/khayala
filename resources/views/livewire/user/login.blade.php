<section class="login-area" style="min-height: calc(100vh - 167px);height:0">
    <div class="d-table" style=""> 
        <div class="d-table-cell">
            <div class="login-form">
                <h3>Please Log In, or <a href="{{ route('user.register') }}">Sign Up</a></h3>

                <form wire:submit.prevent='login'>
                    @if (session()->has('error')) 
                        <div class="alert alert-danger"> 
                            {{ session('error') }} 
                        </div> 
                    @endif 
                    <div class="form-group">
                        <label for="email"><i class="icofont-ui-user"></i></label>
                        <input type="email" wire:model.lazy='email' id="email" class="form-control" placeholder="Email">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror 

                    </div>

                    <div class="form-group">
                        <label for="password"><i class="icofont-lock"></i></label>
                        <input type="password" wire:model.lazy='password' id="password" class="form-control" placeholder="Password">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror 
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
