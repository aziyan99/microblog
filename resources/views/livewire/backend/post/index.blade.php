@section('title', 'Post')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Posts data
                </h4>
                <h5 class="card-subtitle">listing of all posts data</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <a href="{{ route('post.create') }}" class="btn btn-primary mt-3">
                            <i class="mdi mdi-plus-circle me-2"></i>
                            Create new post
                        </a>
                        <button type="button" wire:click="exportExcel" class="btn btn-secondary mt-3">
                            <i class="mdi mdi-file-excel me-2"></i>
                            Export excel
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-2">
                                <select wire:model="count" class="form-control align-middle mt-3 mb-3">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-10">
                                <input type="text" wire:model="search" class="form-control align-middle mt-3 mb-3">
                            </div>
                        </div>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created by</th>
                            <th>Views</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <span class="badge bg-purple">{{ $post->category->name }}</span>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <span class="badge bg-megna">{{ $post->views }}</span>
                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('view', $post)
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning text-light mb-2">
                                            <i class="mdi mdi-pencil-box-outline align-middle me-1"></i>
                                            edit
                                        </a>
                                    @endcan
                                    <a href="{{ route('post.detail', $post->id) }}" class="btn btn-info text-light mb-2">
                                        <i class="mdi mdi-eye-outline align-middle me-1"></i>
                                        detail
                                    </a>
                                    @can('view', $post)
                                        @if($destroyId != $post->id)
                                            <button type="button" wire:click="setDestroyId({{ $post->id }})" class="btn btn-danger mb-2 text-light">
                                                <i class="mdi mdi-delete align-middle me-1"></i>
                                                delete
                                            </button>
                                        @else
                                            <button type="button" wire:click="destroy" class="btn btn-danger text-light mb-2">
                                                <i class="mdi mdi-delete align-middle me-1"></i>
                                                delete this data?
                                            </button>
                                            <button type="button" wire:click="cancelDestroy" class="btn btn-secondary text-light mb-2">
                                                <i class="mdi mdi-repeat align-middle me-1"></i>
                                                cancel delete
                                            </button>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted"><i>Post data is empty</i></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
