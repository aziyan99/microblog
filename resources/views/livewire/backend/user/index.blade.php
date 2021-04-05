@section('title', 'Users')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Users data
                </h4>
                <h5 class="card-subtitle">listing of all users data</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <a href="{{ route('user.create') }}" class="btn btn-primary mt-3">
                            <i class="mdi mdi-plus-circle me-2"></i>
                            Create new user
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
                                    <option value=20"">20</option>
                                    <option value=50"">50</option>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    @if(auth()->user()->id == $user->id)
                                        <i class="text-center"><small>Current Login</small></i>
                                    @else
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning text-light mb-2">
                                            <i class="mdi mdi-pencil-box-outline align-middle me-1"></i>
                                            edit
                                        </a>
                                        <button type="button" wire:click="resetPassword({{ $user->id }})" class="btn btn-secondary mb-2 text-light">
                                            <i class="mdi mdi-key align-middle me-1"></i>
                                            Reset Password
                                        </button>
                                        @if($destroyId != $user->id)
                                            <button type="button" wire:click="setDestroyId({{ $user->id }})" class="btn btn-danger mb-2 text-light">
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
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted"><i>Users data is empty</i></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
