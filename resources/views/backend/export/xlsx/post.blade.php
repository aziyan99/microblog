<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Category</th>
        <th>Created by</th>
        <th>Body</th>
        <th>Views</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->views }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
