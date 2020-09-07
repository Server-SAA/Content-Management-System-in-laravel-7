<div class="col-lg-4">

    <div class="card">
        <h4 align="center">Blog Search</h4>
        <div class="card-body">
            {!! Form::open(["method" => "post", "action" => "CMSController@search"]) !!}
                <div class="input-group mb-3">
                    {!! Form::search("s", "", ["placeholder" => "Search Form", "class" => "form-control search", "id" => "search", "title" => "title='type &quot;a&quot;'"]) !!}
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
            <div class="form-data"></div>
        </div>
    </div>

    <div class="card">
        <h4 align="center">{{ __('Blog Categories') }}</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>{{ __('Blog Categories') }}</h6>
                    <ul class="list-unstyled">
                        @if (count($cats) > 0)
                            @foreach ($cats as $cat)
                                <li><a href="/category/{{$cat->id}}">{{$cat->title}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6>Social Accounts</h6>
                    <ul class="list-unstyled">
                        <li><a href="">{{ __('Facebook') }}</a></li>
                        <li><a href="">{{ __('Twitter') }}</a></li>
                        <li><a href="">{{ __('Instagram') }}</a></li>
                        <li><a href="">{{ __('Whats App') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


