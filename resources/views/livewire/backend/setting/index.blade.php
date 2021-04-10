@section('title', 'Settings')
<div class="row">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Update Informations
                </h4>
                <h5 class="card-subtitle">Sometimes you need a fresh information</h5>
                <form wire:submit.prevent="updateInformations" class="mt-3">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Short desc</label>
                        <input type="text" wire:model="short_desc" class="form-control @error('short_desc') is-invalid @enderror">
                        @error('short_desc') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" wire:model="facebook" class="form-control @error('facebook') is-invalid @enderror">
                        @error('facebook') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" wire:model="youtube" class="form-control @error('youtube') is-invalid @enderror">
                        @error('youtube') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" wire:model="instagram" class="form-control @error('instagram') is-invalid @enderror">
                        @error('instagram') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" wire:model="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                        @error('phone_number') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea cols="30" rows="4" wire:model="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                        @error('address') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save me-2"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Update Logo
                </h4>
                <h5 class="card-subtitle">Sometimes you need a fresh logo</h5>

                <form wire:submit.prevent="updateLogo" class="mt-3">
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" wire:model="logo"
                               class="form-control @error('logo') is-invalid @enderror">
                        @error('logo') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div wire:loading wire:target="logo">
                        <div class="spinner-grow" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    @if ($logo)
                        New Logo Preview:
                        <br>
                        <br>
                        <img src="{{ $logo->temporaryUrl() }}" class="img-thumbnail" width="100">
                    @endif
                    <hr>
                    @if (!$logo)
                        Previous Logo Preview:
                        <br>
                        <br>
                        <img src="{{ asset($oldLogo) }}" class="img-thumbnail" width="100">
                    @endif
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save me-2"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
