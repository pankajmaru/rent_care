  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light"> Rent Care </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-header text-uppercase font-weight-bold">Rent Points</li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link">                          
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <span class="badge badge-info right"></span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('tenant-index') }}" class="nav-link">                          
                          <i class="nav-icon fas fa-users"></i>
                          <p>Tenant</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('tenant-create') }}" class="nav-link">                          
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Add Tenant</p>
                    </a>
                </li>
                  <li class="nav-item">
                      <a href="{{ route('room-add') }}" class="nav-link">                          
                          <i class="nav-icon fas fa-user-plus"></i>
                          <p>Add Room</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('room-index') }}" class="nav-link">                        
                        <i class="nav-icon fas fa-stream"></i>
                        <p>Rooms Lists</p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('bill-create') }}" class="nav-link">                        
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>New Bill</p>
                    </a>
                </li>                  
                  <li class="nav-item">
                      <a href="{{ route('bill-index') }}" class="nav-link">                          
                          <i class="nav-icon fas fa-list-ol"></i>
                          <p>Bill-Lists</p>
                      </a>
                  </li>                
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>