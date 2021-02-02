<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ URL::asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"> Rent Care </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images').'/'.$image->admin_image }}" style="width: 40px; height: 40px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin-profile') }}">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-uppercase font-weight-bold">Rent Points</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="far fa-circle ml-3"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Landlord Management<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('create-landlord-expenses') }}" class="nav-link">
                                <i class="far fa-circle ml-3"></i>
                                <p>Landlord Expenses</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item ml-3">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle ml-3"></i>
                                <p>Document Wallet</p>
                            </a>
                        </li>                         --}}
                        <li class="nav-item ml-3">
                            <a href="{{ route('index-landlord-expenses') }}" class="nav-link">
                                <i class="far fa-circle ml-3"></i>
                                <p>Landlord Expenses Lists</p>
                            </a>
                        </li> 
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p class="ml-2">Tenant Management<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('tenant-create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Add Tenant</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('tenant-index') }}" class="nav-link">
                                <i class="fas fa-list-ol"></i>
                                <p class="ml-2">Tenant List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Bill Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('bill-create') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>New Bill</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('bill-index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>Bill-Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-door-open"></i>
                        <p class="ml-2">
                            Room Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('room-create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Add Room</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('room-index') }}" class="nav-link">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>Rooms Lists</p>
                            </a>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
