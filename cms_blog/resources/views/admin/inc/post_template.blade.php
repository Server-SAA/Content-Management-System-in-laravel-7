<table class="table table-striped table-responsive table-condensed table-hover table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Tags</th>
        <th>Type</th>
        <th>Comments</th>
        <th>Views</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td>{{$post->tags}}</td>
                <td>{{$post->type}}</td>
                <td><a href="/admin/posts/comments/{{$post->id}}">{{$post->cmnts_count}}</a></td>
                <td><a href="/admin/posts/views/reset/{{$post->id}}">{{$post->views_count}}</a></td>
                <td><a href="/admin/posts/edit/{{$post->id}}" class="btn-warning btn-xs btn"> <span class="fa fa-edit"></span></a></td>
                <td><a href="/admin/posts/remove/{{$post->id}}" class="btn-danger btn-xs btn"> <span class="fa fa-remove"></span></a></td>
            </tr>
        @endforeach
    @endif
</table>
