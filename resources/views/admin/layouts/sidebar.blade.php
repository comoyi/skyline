<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $sys->user->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        @foreach($sys->systemMenus as $menu)
        <ul class="sidebar-menu">
            <li class="header"><i class="{{ $menu['icon'] }}"></i> <span>{{ $menu['name'] }}</span></li>
            <!-- Optionally, you can add icons to the links -->
            @if(isset($menu['child']))
                @foreach($menu['child'] as $m1)
                    @if(!isset($m1['child']) || empty($m1['child']))
                        <li class=""><a href="{{ url($m1['uri']) }}"><i class="{{ $m1['icon'] }}"></i> <span>{{ $m1['name'] }}</span></a></li>
                    @else
                        <li class="treeview">
                            <a href="{{ url($m1['uri']) }}"><i class="{{ $m1['icon'] }}"></i> <span>{{ $m1['name'] }}</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @foreach($m1['child'] as $m2)
                                    @if(!isset($m2['child']) || empty($m2['child']))
                                        <li><a href="{{ url($m2['uri']) }}"><i class="{{ $m2['icon'] }}"></i> <span>{{ $m2['name'] }}</span></a></li>
                                    @else
                                        <li class="treeview">
                                            <a href="{{ url($m2['uri']) }}"><i class="{{ $m2['icon'] }}"></i> <span>{{ $m2['name'] }}</span>
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                @foreach($m2['child'] as $m3)
                                                    <li><a href="{{ url($m3['uri']) }}"><i class="{{ $m3['icon'] }}"></i> <span>{{ $m3['name'] }}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
        @endforeach
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
