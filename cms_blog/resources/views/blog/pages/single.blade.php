@extends("layouts.app")

@section("Main-Content")
    <style>
        .fixed {
            overflow-x: scroll;
        }
    </style>
    <div class="col-lg-8 fixed">



        <h1>{{$post->title}}</h1>
        <hr>
        <p>By <b class="lead"><a href="/author/{{$post->author}}">{{$post->author}}</a></b>
        <hr> at <span class="glyphicon glyphicon-time"></span> <b class="lead">{{$post->created_at}}</b></p><br>
        <hr>
        <p class="lead">{!! $post->content !!}</p>

        <br>
        <hr>
        <br>
        {!! Form::open(["method" => "post", "action" => "CMSController@cmnt"]) !!}

            <div class="form-group">
                {!! Form::label("author", "Author") !!}
                {!! Form::text("author", "", ["class" => "form-control", "placeholder" => "Enter your name"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("comment", "Comment") !!}
                {!! Form::textarea("comment", "", ["class" => "form-control", "placeholder" => "Enter your Comment"]) !!}
            </div>

            {!! Form::hidden("id", $post->id) !!}
            {!! Form::submit("submit", ["class" => "btn btn-outline-primary"]) !!}
        {!! Form::close() !!}
        <br>
        <hr>
        <br>

        @if (count($comments) > 0)
            @foreach ($comments as $comment)
                <h2>{{$comment->author}}</h2>
                <p>{{$comment->content}}</p>
            @endforeach
        @endif
    </div>
@endsection
