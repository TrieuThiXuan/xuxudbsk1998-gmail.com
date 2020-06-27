<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
{{--            <a href="#" class="nav-link active">--}}
{{--                <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                <p>--}}
{{--                    Dashboard--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
        </li>
        <li class="nav-item">
            <a href="{{ route('promotions.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Chương trình khuyến mãi
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Thể loại
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_vendor') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Nhà cung cấp
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('count') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Theo dõi
                </p>
            </a>
        </li>
    </ul>
</nav>
