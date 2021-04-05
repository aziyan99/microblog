@section('title', 'Edit Post')
@section('action', 'Edit')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Edit post
                </h4>
                <form wire:submit.prevent="update">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" wire:model="title"
                                       class="form-control @error('title') is-invalid @enderror" autofocus>
                                @error('title') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select wire:model="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">-- choose --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="invalid-feedback"
                                                             role="alert">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" wire:model="thumbnail"
                                       class="form-control @error('thumbnail') is-invalid @enderror">
                                @error('thumbnail') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div wire:loading wire:target="thumbnail">
                                <div class="spinner-grow" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            @if ($thumbnail)
                                New Thumbnail Preview:
                                <br>
                                <br>
                                <img src="{{ $thumbnail->temporaryUrl() }}" class="img-thumbnail">
                            @endif
                            <hr>
                            @if (!$thumbnail)
                                Previous Thumbnail Preview:
                                <br>
                                <br>
                                <img src="{{ asset($oldThumbnail) }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group" wire:ignore>
                                <label>Body</label>
                                <textarea id="content" wire:model="body" cols="30" rows="10"
                                          class="form-control @error('body') is-invalid @enderror"></textarea>
                                @error('body') <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-2"></i>
                                    Save
                                </button>
                                <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3 mb-3">
                                    <i class="mdi mdi-arrow-left-bold-circle me-2"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 300,
                codemirror: {
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                    @this.set('body', contents);
                    }
                }
            });
        });
    </script>
@endpush
