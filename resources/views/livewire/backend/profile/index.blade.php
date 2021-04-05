@section('title', 'Profile')
<div class="row">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Update Profile
                </h4>
                <h5 class="card-subtitle">Sometimes you need a fresh profile</h5>

                <form wire:submit.prevent="updateProfile" class="mt-2">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                        @error('email') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                        @error('name') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" class="form-control" wire:model="role" readonly>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="mdi mdi-save mr-2 align-middle"></i>
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Update Password
                </h4>
                <h5 class="card-subtitle">Sometimes you need a fresh password</h5>

                <form wire:submit.prevent="updatePassword" class="mt-2">
                    <div class="form-group">
                        <label>New password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                        @error('password') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>New password confirmation</label>
                        <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" wire:model="password_confirmation">
                        @error('password_confirmation') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="mdi mdi-save mr-2 align-middle"></i>
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
