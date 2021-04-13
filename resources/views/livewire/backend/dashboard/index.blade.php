@section('title', 'Dashboard')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h3><i class="mdi mdi-pin me-2"></i>{{ $totalCategories }}</h3>
                <p>Categories</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h3><i class="mdi mdi-newspaper me-2"></i>{{ $totalPosts }}</h3>
                <p>Posts</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h3><i class="mdi mdi-account-multiple me-2"></i>{{ $totalUsers }}</h3>
                <p>Users</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h3><i class="mdi mdi-eye me-2"></i>{{ $totalViews }}</h3>
                <p>Views</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h3>Last posts</h3>
        @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <p>
                    <span class="badge bg-info">{{ $post->user->name }}</span>
                    <span class="badge bg-primary">{{ $post->category->name }}</span>
                    <span class="badge bg-secondary">{{ $post->created_at->diffForHumans() }}</span>
                </p>
                <p>{{ strip_tags(Str::limit($post->body, 30)) }}</p>
                <a href="{{ route('read', $post->slug) }}" target="_blank" class="btn btn-success text-white">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
