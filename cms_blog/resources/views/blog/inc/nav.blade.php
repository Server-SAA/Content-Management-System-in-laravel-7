<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">{{env("APP_NAME")}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">{{ __('Home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">{{ __('About') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/services">{{ __('Services') }}</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">{{ __("Login") }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">{{ __("Register") }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" area-labelledby="navbarDropdownMenuLink">
                        <li class="dropdown-item">
                            <a href="/admin">Admin</a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endguest
        </ul>

    </div>
</nav>
