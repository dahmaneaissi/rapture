<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li><a href="{{ route( 'dashbord.index' ) }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route( 'entities.list' ) }}"><i class="fa fa-male"></i> <span>Entités</span></a></li>
            <li><a href="{{ route( 'users.list' ) }}"><i class="fa fa-users"></i> <span>Users</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-expeditedssl"></i>
                    <span>Access</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route( 'roles.list' ) }}"><i class="fa fa-graduation-cap"></i> <span>Roles</span></a></li>
                    <li><a href="{{ route( 'roles.list' ) }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>