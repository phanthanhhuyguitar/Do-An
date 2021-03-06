<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('admin-asset/dist-1/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php $img = Auth::user()->Hinh ?>
                <img width="46px" src="{{asset("upload/avatar/$img")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.category.list')}}" class="nav-link">
                        <i class="far fa-file-alt"></i>
                        <p>Thể loại
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.category.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.type.list')}}" class="nav-link">
                        <i class="far fa-sticky-note"></i>
                        <p>
                            Loại tin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.type.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.type.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.news.list')}}" class="nav-link">
                        <i class="far fa-newspaper"></i>
                        <p>
                            Tin tức
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.news.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.news.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.slide.list')}}" class="nav-link">
                        <i class="fas fa-sliders-h"></i>
                        <p>
                            Slide
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.slide.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.slide.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.user.list')}}" class="nav-link">
                        <i class="fa fa-users fa-fw"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
