<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin">SB Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="/admin/user/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                @if (Auth::user()->role == "Administrator")
                    <li class="divider"></li>
                    <li>
                        <a href="/administrator/">Administrator</a>
                    </li>
                @endif;
                <li class="divider"></li>
                <li>
                    <a href="/"><span class="fa fa-fw fa-home"></span> Home Site</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                        {!! csrf_field() !!}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
@include("admin.inc.sidebar")
<!-- /.navbar-collapse -->
</nav>
