@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Error!</strong> {!! $error !!}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if (session("success"))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>Message!</strong> {!! session("success") !!}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session("error"))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>Error!</strong> {!! session("error") !!}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
