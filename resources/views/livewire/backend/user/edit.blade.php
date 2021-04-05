@section('title', 'Edit User')
@section('action', 'Edit')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit user
                </h4>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model="name"
                               class="form-control @error('name') is-invalid @enderror" autofocus>
                        @error('name') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" wire:model="email"
                               class="form-control @error('email') is-invalid @enderror" autofocus>
                        @error('email') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select wire:model="role"
                                class="form-control @error('role') is-invalid @enderror">
                            <option value="">-- pilih --</option>
                            <option value="admin">admin</option>
                            <option value="writer">writer</option>
                        </select>
                        @error('role') <small class="invalid-feedback"
                                              role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <div class="alert alert-info">
                            By default password set to same as registered email
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save me-2"></i>
                            Save
                        </button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3 mb-3">
                            <i class="mdi mdi-arrow-left-bold-circle me-2"></i>
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
