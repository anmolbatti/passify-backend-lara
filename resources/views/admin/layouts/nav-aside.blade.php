<!-- SIDE MENU BAR -->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/')}}">
            <img src="{{URL::asset('admin/img/brand/logo-name.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo" style="height:60px!important">
            <img src="{{URL::asset('admin/img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3">
        {{-- <li class="side-item side-item-category mt-4 mb-3">Accounts</li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('dashboard')}}">
                <span class="side-menu__icon lead-3 fa-solid fa-chart-tree-map"></span>
                <span class="side-menu__label">Dashboard</span></a>
        </li>
        <li class="side-item side-item-category mt-4 mb-3">Menu Control</li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('category.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid icofont-listine-dots"></span>
                <span class="side-menu__label">Category</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('sub_category.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid icofont-sub-listing"></span>
                <span class="side-menu__label">Sub Category</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('menu.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid icofont-restaurant-menu"></span>
                <span class="side-menu__label">Menu</span></a>
        </li>
        <li class="side-item side-item-category mt-4 mb-3">Deals Management</li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('deal.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid icofont-food-basket"></span>
                <span class="side-menu__label">Deals</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('deal_item.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid icofont-fast-food"></span>
                <span class="side-menu__label">Deals Items</span></a>
        </li> --}}

        <li class="side-item side-item-category mt-4 mb-3">User Control</li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('user.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-users-viewfinder"></span>
                <span class="side-menu__label">Users</span></a>
        </li>
        {{-- <li class="slide">
            <a class="side-menu__item" href="{{route('roles.index')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-people-roof"></span>
                <span class="side-menu__label">Roles</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('module')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-boxes-stacked"></span>
                <span class="side-menu__label">Modules</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('components')}}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-layer-group"></span>
                <span class="side-menu__label">Component</span></a>
        </li> --}}
    </ul>
</aside>
<!-- END SIDE MENU BAR -->
