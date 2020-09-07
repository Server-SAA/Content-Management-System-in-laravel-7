@extends("layouts.admin")

@section("Admin-Content")
    <br>
    <hr>
    <div class="col-lg-12">
        <table class="table table-striped table-responsive table-condensed table-hover table-bordered">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('First Name') }}</th>
                <th>{{ __('Last Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Role') }}</th>
                <th>{{ __('Post Count') }}</th>
            </tr>

            @if (count($users) > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->post_count}}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection

