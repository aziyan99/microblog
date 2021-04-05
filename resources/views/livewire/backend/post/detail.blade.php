@section('title', 'Post')
@section('action', 'Detail')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Posts detail
                </h4>
                <h5 class="card-subtitle">Detail of posts data</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mt-3 mb-3">
                        <tr>
                            <th>Title</th>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $post->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Created by</th>
                            <td>{{ $post->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Thumbnail</th>
                            <td>
                                <a href="{{ asset($post->thumbnail) }}" target="_blank">
                                    <img src="{{ asset($post->thumbnail) }}" alt="thumbnail" class="img-thumbnail" width="200">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Body</th>
                            <td>
                                {!! $post->body !!}
                            </td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('post.index') }}" class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left-bold-circle me-2"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
