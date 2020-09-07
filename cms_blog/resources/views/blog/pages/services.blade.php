@extends("layouts.app")

@section("Main-Content")
    <div class="col-lg-8">
        <div class="text-center jumbotron">
            <h1>Services</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum natus nisi praesentium ratione repellendus. Ad laboriosam perferendis rem similique voluptatum! Aperiam dolores eaque eos magni molestiae nulla placeat temporibus unde.
            <br>
            <h6>Services</h6>
            <ul class="list-group">
                @if (count($services) > 0)
                    @foreach($services as $service)
                            <li class="list-group-item list-group-item-primary">{{$service}}</li>
                    @endforeach
                @endif
            </ul>

            <h6>Working On</h6>
            <ul class="list-group">
            @if (count($Working) > 0)
                @foreach($Working as $provider)
                        <li class="list-group-item list-group-item-secondary">{{$provider}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
