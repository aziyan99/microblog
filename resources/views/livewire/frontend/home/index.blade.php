<div class="content-wrapper">
    @foreach($posts as $post)
        <div class="content">
            <h3>{{ $post->title }}</h3>
            <small class="content-desc">{{ $post->created_at->diffForHumans() }}, <u>{{ $post->category->name }}</u>, <u>{{ $post->user->name }}</u></small>
            <br>
            <br>
            <small>{{ strip_tags(Str::limit($post->body, 200)) }}</small>
            <a href="{{ route('read', $post->slug) }}">more</a>
        </div>
    @endforeach
</div>
@push('js')
    <script>
        window.onscroll = function(ev) {
            if((window.innerHeight + window.scrollY) >= document.body.offsetHeight){
                window.livewire.emit('load-more');
            }
        }
    </script>
@endpush
