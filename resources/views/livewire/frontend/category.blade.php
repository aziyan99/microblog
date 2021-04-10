<div class="category-list">
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('home.category', $category->slug) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
