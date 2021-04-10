<div class="detail-post">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at->diffForHumans() }}, <u>{{ $post->category->name }}</u>, <u>{{ $post->user->name }}</u>, <u>{{ $post->views }} views</u></p>
    <br>
    <img src="{{ asset('storage') . "/" . $post->thumbnail }}" alt="thumb" class="img-fluid mx-auto d-block">
    <br>
    <br>
    {!! $post->body !!}
</div>
<div class="realted-posts">
    <hr>
    <h4>Related posts</h4>
    @foreach($relatedPosts as $related)
        <small>{{ $related->title }}, {{ $related->created_at->diffForHumans() }} <a href="{{ route('read', $related->slug) }}">more</a></small><br>
    @endforeach
</div>
