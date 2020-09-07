@extends("layouts.admin")

@section("Admin-Content")
    <div class="col-lg-12">
        <table class="table table-striped table-responsive table-condensed table-hover table-bordered">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Content') }}</th>
                <th>{{ __('Delete') }}</th>
            </tr>

            @if (count($cmnts) > 0)
                @foreach ($cmnts as $cmnt)
                    <tr>
                        <td>{{$cmnt->id}}</td>
                        <td>{{$cmnt->author}}</td>
                        <td>{{$cmnt->content}}</td>
                        <td><a href="/admin/comments/remove/{{$cmnt->id}}/{{$cmnt->post_id}}" class="btn btn-danger btn-xs"><span class="fa fa-remove"></span></a></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
