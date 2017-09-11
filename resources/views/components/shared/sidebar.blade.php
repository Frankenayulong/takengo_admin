<div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{Request::is('home') ? 'active' : ''}}">
                <a href="{{url('/home')}}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{Request::is('cars*') ? 'active' : ''}}">
                <a href="{{url('/cars')}}" class="nav-link">
                    <i class="icon-grid"></i>
                    <span class="title">Cars</span>
                </a>
            </li>
            <li class="nav-item  {{Request::is('orders*') ? 'active' : ''}}">
                <a href="{{url('/orders')}}" class="nav-link">
                    <i class="icon-basket-loaded"></i>
                    <span class="title">
                        Orders
                        <span class="badge badge-danger">2</span>
                    </span>
                </a>
            </li>
            <li class="nav-item  {{Request::is('messages*') ? 'active' : ''}}">
                <a href="{{url('/messages')}}" class="nav-link">
                    <i class="icon-envelope"></i>
                    <span class="title">
                        Messages
                        <span class="badge badge-danger">2</span>
                    </span>
                </a>
            </li>
            <li class="nav-item {{Request::is('newsletters*') ? 'active' : ''}}">
                <a href="{{url('/newsletters')}}" class="nav-link">
                    <i class="icon-settings"></i>
                    <span class="title">Newsletters</span>
                </a>
            </li>
            <li class="nav-item {{Request::is('users*') ? 'active' : ''}} ">
                <a href="{{url('/users')}}" class="nav-link">
                    <i class="icon-users"></i>
                    <span class="title">User</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item {{Request::is('admins*') ? 'active' : ''}} ">
                <a href="{{url('/admins')}}" class="nav-link">
                    <i class="icon-earphones-alt"></i>
                    <span class="title">Admins</span>
                    <span class="arrow"></span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>