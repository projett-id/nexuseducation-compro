<nav class="mt-2">
    <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="navigation"
        aria-label="Main navigation"
        data-accordion="false"
        id="navigation"
    >
        @foreach($menuItems as $item)
            @if(isset($item['submenu']))
                @can($item['permission'])
                    <li class="nav-item {{ collect($item['submenu'])->pluck('route')->contains(request()->route()->getName()) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ collect($item['submenu'])->pluck('route')->contains(request()->route()->getName()) ? 'active' : '' }}">
                            <i class="nav-icon {{ $item['icon'] }}"></i>
                            <p>
                                {{ $item['title'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach($item['submenu'] as $sub)
                                @can($sub['permission'])
                                    <li class="nav-item">
                                        <a href="{{ route($sub['route']) }}" class="nav-link {{ request()->routeIs($sub['route']) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $sub['title'] }}</p>
                                        </a>
                                    </li>
                                @endcan
                            @endforeach
                        </ul>
                    </li>
                @endcan
            @else
                @can($item['permission'])
                    <li class="nav-item">
                        <a href="{{ route($item['route']) }}" class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                            <i class="nav-icon {{ $item['icon'] }}"></i>
                            <p>{{ $item['title'] }}</p>
                        </a>
                    </li>
                @endcan
            @endif
        @endforeach
    </ul>
</nav>