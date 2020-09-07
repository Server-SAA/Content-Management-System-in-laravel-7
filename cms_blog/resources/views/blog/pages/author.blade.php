@extends("layouts.app")

@section("Main-Content")
    <div class="col-lg-8">
        @if (count($posts) > 0)

            @foreach ($posts as $post)
                <a href="/post/{{$post->id}}"><h2>{{$post->title}}</h2></a>
                <p>By <b>{{$post->author}}</b> at <span class="glyphicon glyphicon-time"></span> <b>{{$post->created_at}}</b></p><br>
                <p>{{substr($post->content, 0, 150)}}...</p>
                <a href="/post/{{$post->id}}" class="btn btn-primary">Read More <span class="glyphicon glyphicon-arrow-right"></span></a>
                <hr><br>
            @endforeach
            {{$posts->links()}}
        @else
            <h1 class="text-center text-danger">No Post Found</h1>
        @endif
    </div>
@endsection
