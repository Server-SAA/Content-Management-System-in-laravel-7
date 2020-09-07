@extends("layouts.admin")

@section("Admin-Content")
    <a role="button" class="btn btn-primary" id="open-form">{{ __('Add New Post') }}</a>
    <br>
    <hr>
    <div class="col-lg-12">
        <table class="table table-striped table-responsive table-condensed table-hover table-bordered">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Tags') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Comments') }}</th>
                <th>{{ __('Views') }}</th>
                <th>{{ __('Edit') }}</th>
                <th>{{ __('Delete') }}</th>
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
    </div>

    <div class="dialog" title="Posts">
        {!! Form::open(["action" => "PostController@store", "id" => "add_form"]) !!}
            <div class="form-group">
                {!! Form::label("title", "Title") !!}
                {!! Form::text("title", "", ["class" => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("cat", "Category") !!}
                <select name="cat" class="form-control">
                    @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                    @endforeach
                </select>
                <a href="/admin/categories" class="btn-xs btn btn-info">{{ __('Go and create one') }}</a>
            </div>

            <div class="form-group">
                {!! Form::label("tags", "Tags") !!}
                {!! Form::text("tags", "", ["class" => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("type", "Type") !!}
                <select name="type" class="form-control">
                    <option value="published">{{ __('Published') }}</option>
                    <option value="draft">{{ __('Draft') }}</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("content", "Content") !!}
                {!! Form::textarea("content", "", ["class" => "form-control", "rows" => "5"]) !!}
            </div>

            {!! Form::submit("Submit", ["class" => "btn btn-primary", "id" => "add_post"]) !!}
        {!! Form::close() !!}
    </div>

@endsection
