<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
                </a>
            </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
                </a>
            </li> -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-footer">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                    <form method="POST" action="{{ route('logout') }}">
                        <a href="{{route('logout')}}" class="btn btn-default btn-flat float-end" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                        @csrf
                    </form>
                    
                </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>