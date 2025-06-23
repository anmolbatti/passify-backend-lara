<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : 'non-active' }}">
            <a class="nav-link " href="{{ route('admin.dashboard') }}"
                class="  {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item {{ Route::currentRouteName() == 'plans.view' ? 'active' : 'non-active' }}">
            <a class="nav-link collapsed" href="{{ route('plans.view') }}"
                class=" {{ Route::currentRouteName() == 'plans.view' ? 'active' : '' }}">
                <i class="bi bi-currency-dollar"></i>
                <span>Plan Management</span>
            </a>
        </li>

        <li class="nav-item {{ Route::currentRouteName() == 'user.index' ? 'active' : 'non-active' }}">
            <a class="nav-link collapsed" href="{{ route('user.index') }}"
                class=" {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#usr-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wallet"></i><span>Subscription Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="usr-nav"
                class="nav-content collapse {{ in_array(Route::currentRouteName(), ['admin.subscription_history', 'admin.payment_history']) ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.subscription_history') }}"
                        class="{{ Route::currentRouteName() == 'admin.subscription_history' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Subscription Histories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.payment_history') }}"
                        class="{{ Route::currentRouteName() == 'admin.payment_history' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Payment Histories</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : 'non-active' }}">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}"
                class=" {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <i class="bi bi-book"></i>
                <span>Library</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#usr-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wallet"></i><span>Library Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="usr-nav2"
                class="nav-content collapse {{ in_array(Route::currentRouteName(), ['library.create', 'admin.payment_history']) ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('library.view') }}"
                        class="{{ Route::currentRouteName() == 'admin.subscription_history' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>View</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('library.create') }}"
                        class="{{ Route::currentRouteName() == 'admin.payment_history' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ Route::currentRouteName() == 'admin.enquires' ? 'active' : 'non-active' }}">
            <a class="nav-link collapsed" href="{{ route('admin.enquires') }}"
                class=" {{ Route::currentRouteName() == 'admin.enquires' ? 'active' : '' }}">
                <i class="bi bi-envelope"></i>
                <span>Support Enquires</span>
            </a>
        </li>

        <li class="nav-item {{ Route::currentRouteName() == 'profile.edit' ? 'active' : 'non-active' }}">
            <a class="nav-link collapsed" href="{{ route('profile.edit') }}"
                class=" {{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>


        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" id="logout-form-sidebar">
                @csrf
            </form>
            <a class="nav-link collapsed" href="#" id="logout-button-sidebar">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </li>



    </ul>

</aside><!-- End Sidebar-->
