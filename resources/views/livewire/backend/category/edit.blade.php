@section('title', 'Edit Category')
@section('action', 'Edit')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit existing category
                </h4>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" value="{{ $slug }}" class="form-control @error('slug') is-invalid @enderror" readonly>
                        @error('slug') <small class="invalid-feedback" role="alert">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save me-2"></i>
                            Update
                        </button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary mt-3 mb-3">
                            <i class="mdi mdi-arrow-left-bold-circle me-2"></i>
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
