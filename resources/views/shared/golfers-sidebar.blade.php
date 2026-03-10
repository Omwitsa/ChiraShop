<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- <a href="{{env('APP_ROOT')}}" class="brand-link">
        <img src="{{env('APP_ROOT')}}assets/images/logo.png" alt="AAA" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AAA</span>
    </a> -->

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{env('APP_ROOT')}}assets/images/icons/logo.png" alt="User Image">
            </div>
            <div class="info">
                <!-- <a href="{{env('APP_ROOT')}}" class="d-block">{{auth()->guard('client')->user()->Code}}</a> -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                
                <li class="nav-item menu-open">
                    <a href="{{env('APP_ROOT')}}client-dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{env('APP_ROOT')}}shop" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Shop</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="{{env('APP_ROOT')}}client-orders" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Shop</p>
                    </a>
                </li> -->
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{env('APP_ROOT')}}logout" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logout</p>
                        </a>
                        </li>
                        
                        <!-- <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                    Tables
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="pages/tables/simple.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Simple Tables</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/tables/data.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>DataTables</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/tables/jsgrid.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>jsGrid</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/examples/blank.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blank Page</p>
                    </a>
                    </li>
                </ul>
                </li> -->

                <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                        Level 2
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                        </a>
                        </li>
                        
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                        </a>
                        </li>
                    </ul>
                    </li>
                </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>