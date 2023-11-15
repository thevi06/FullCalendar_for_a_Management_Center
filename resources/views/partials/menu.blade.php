<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ url('assets/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Talent Event Scheduling</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                <li class="nav-header">SETTINGS</li>
<!-- User Management -->
                @can('user-management')
                    <li class="nav-item @yield('user_manage_list')">
                        <a href="#" class="nav-link @yield('user_manage')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user-view')
                                <li class="nav-item">
                                    <a href="{{ route('users.all') }}" class="nav-link @yield('all_user')">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user-create')
                                <li class="nav-item">
                                    <a href="{{ route('users.create-user') }}" class="nav-link @yield('create_user')">
                                        <i class="fa fa-user-plus nav-icon"></i>
                                        <p>Create User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role-view')
                                <li class="nav-item">
                                    <a href="{{ route('role.roles') }}" class="nav-link @yield('role_list')">
                                        <i class="fa fa-user-cog nav-icon"></i>
                                        <p>Role List</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role-create')
                                <li class="nav-item">
                                    <a href="{{ route('role.create-role') }}" class="nav-link @yield('add_role')">
                                        <i class="fa fa-user-shield nav-icon"></i>
                                        <p>Create Role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
{{-- Calendar --}}
                    @can('calendar-management')
                    <li class="nav-item @yield('user_manage_list')">
                        <a href="#" class="nav-link @yield('user_manage')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Calendar Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('calendar-view')
                                <li class="nav-item">
                                    <a href="{{route('supplier.create-brands')}}" class="nav-link @yield('all_user')">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Event Calendar</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan  
<!-- Sign Out -->
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li class="nav-item">
                    <a href="{{ url('profile') }}" class="nav-link @yield('profile')">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sign out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
