<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg d-lg-none">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <i class="far fa-user rounded-circle mr-1"></i>
            <div class="d-sm-none d-lg-inline-block">Hi, {{ $user->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Welcome, {{ $user->name }}</div>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </li>
</ul>