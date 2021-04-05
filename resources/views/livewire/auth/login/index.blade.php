 <div class="mt-5">
     @if (session()->has('message'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{ session('message') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif
        <form wire:submit.prevent="authenticate">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                @error('email') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
            </div>
    {{--        @if(!$isShowPassword)--}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                    @error('password') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                </div>
    {{--        @else--}}
    {{--            <div class="form-group">--}}
    {{--                <label>Password</label>--}}
    {{--                <input type="text" class="form-control">--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--        <div class="form-check">--}}
    {{--            <input class="form-check-input" type="checkbox" wire:click="showPassword">--}}
    {{--            <label class="form-check-label">--}}
    {{--                Show password--}}
    {{--            </label>--}}
    {{--        </div>--}}
            <div class="form-group">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
