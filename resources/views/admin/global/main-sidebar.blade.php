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

            @foreach( $menuItems as $itemMenu )
                @if(  Can( $itemMenu['routeName'] ) )
                    <li class="treeview">
                        @if( isset( $itemMenu['routeName'] ) && $itemMenu['routeName'] )
                            <a href="{{ route( $itemMenu['routeName'] ) }}"><i class="fa {{ $itemMenu['icon'] }}"></i> <span>{{ $itemMenu['title'] }}</span></a>
                        @endif
                    </li>
                @endif
            @endforeach

        </ul>



    </section>
    <!-- /.sidebar -->
</aside>