<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 660px;position: fixed">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/default.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('active_dashboard')"><p>Dashboard</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admins.index')}}" class="nav-link @yield('active_admins')"><p>Admins</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tickets.create')}}" class="nav-link @yield('active_tickets')"><p>Add new ticket</p></a>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <a href="" class="nav-link log"><p>Logout</p></a>
                    </form>
                </li>
                <script>
                    $('.log').click(function (e){
                        e.preventDefault();
                        $(this).closest('form').submit();
                    })
                </script>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
