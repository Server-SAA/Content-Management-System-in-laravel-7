@extends("layouts.admin")

@section("Admin-Content")
    <div class="col-lg-12">
        {!! Form::open(["method" => "post", "action" => "UserController@updateProfile"]) !!}
            <div class="form-group">
                {!! Form::label("name", "Name") !!}
                {!! Form::text("name", $user->name, ["class" => "form-control"]) !!}
            </div>


            <div class="form-group">
                {!! Form::label("f_name", "First Name") !!}
                {!! Form::text("f_name", $user->first_name, ["class" => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label("l_name", "Last Name") !!}
                {!! Form::text("l_name", $user->last_name, ["class" => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("email", "Email") !!}
                {!! Form::text("email", $user->email, ["class" => "form-control", "required"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("gender", "Gender") !!}
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            {!! Form::submit("submit", ["class" => "btn btn-primary", "type" => "submit"]) !!}
        {!! Form::close() !!}
    </div>
@endsection
