<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="/admin/categories/"><i class="fa fa-fw fa-bar-chart-o"></i> Category</a>
        </li>
        <li>
            <a href="/admin/posts"><i class="fa fa-fw fa-paper-plane"></i> Post</a>
        </li>

        @if (Auth::user()->role == "Admin")
            <li>
                <a href="/admin/users"><i class="fa fa-fw fa-user"></i> Users</a>
            </li>
        @endif
        <li>
            <a role="button" href="/logout" onclick="event.preventDefault();$('.logout').submit()"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
            <form action="/logout" class="logout" method="post">
                {{csrf_field()}}
            </form>
        </li>
    </ul>
</div>
