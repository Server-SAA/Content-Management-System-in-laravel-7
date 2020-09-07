@extends("layouts.admin")

@section("Admin-Content")
    {!! Form::open(["method" => "post", "action" => "PostController@update"]) !!}
        <div class="form-group">
            {!! Form::label("title", "Title") !!}
            {!! Form::text("title", $post->title, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("tags", "Tags") !!}
            {!! Form::text("tags", $post->tags, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("type", "Type") !!}
            <select name="type" class="form-control">
                <option value="published">{{ __('Published') }}</option>
                <option value="draft">{{ __('Draft') }}</option>
            </select>
        </div>
        {!! Form::hidden("id", $post->id) !!}
        <div class="form-group">
            {!! Form::label("content", "Content") !!}
            {!! Form::textarea("content", $post->content, ["class" => "form-control", "rows" => "7"]) !!}
        </div>

        {!! Form::submit("Submit", ["class" => "btn btn-primary"]) !!}
    {!! Form::close() !!}

@endsection

