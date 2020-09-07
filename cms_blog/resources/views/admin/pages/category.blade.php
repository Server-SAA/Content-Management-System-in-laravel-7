@extends("layouts.admin")

@section("Admin-Content")
    <div class="col-lg-6">
        {!! Form::open(["method" => "post", "action" => "CatController@add"]) !!}
            <div class="form-group">
                {!! Form::label("title", "Category Title") !!}
                {!! Form::text("title", "", ["class" => "form-control"]) !!}
            </div>

            {!! Form::submit("Submit", ["class" => "btn btn-primary"]) !!}
        {!! Form::close() !!}

        @isset($_GET['edit'])
            <br><hr><br>

            {!! Form::open(["method" => "post", "action" => "CatController@update"]) !!}
                <div class="form-group">
                    {!! Form::label("title", "Category Title") !!}
                    {!! Form::text("title", $_GET['title'], ["class" => "form-control"]) !!}
                </div>
                {!! Form::hidden("id", $_GET['edit']) !!}

                {!! Form::submit("Submit", ["class" => "btn btn-success"]) !!}
            {!! Form::close() !!}
        @endisset
    </div>
    <div class="col-lg-6">
        <table class="table table-striped table-responsive table-condensed table-hover table-bordered">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Title') }}</th>
                @if (Auth::user()->role == "Admin")
                    <th>{{ __('Edit') }}</th>
                    <th>{{ __('Delete') }}</th>
                @endif
            </tr>

                @if (count($cats) > 0)
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->title}}</td>
                            @if (Auth::user()->role == "Admin")
                                <td><a class="btn btn-warning btn-xs" href="/admin/categories?edit={{$cat->id}}&title={{$cat->title}}"><span class="fa fa-edit"></span></a></td>
                                <td><a class="btn btn-danger btn-xs" href="/admin/categories/remove/{{$cat->id}}"><span class="fa fa-remove"></span></a></td>
                            @endif
                        </tr>
                @endforeach
                @endif
        </table>
    </div>
@endsection
