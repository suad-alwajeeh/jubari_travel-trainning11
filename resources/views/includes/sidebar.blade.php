 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src={{asset('assets/img/logo.png')}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9;background-color: white;">
      <span class="brand-text font-weight-light">JUBARI TRAVEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/user8-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plane"></i>
              <p>
                Airline
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="airline_add" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>add airline </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="airline_display" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>disply airline</p>
                </a>
              </li>
             
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                ROLES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="role_add" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>ADD NEW</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="role_display" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>DISPLAY ALL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="role_display" class="nav-link">
                  <i class="far fa-eye nav-icon"></i>
                  <p>DISPLAY users roles</p>
                </a>
              </li>
             
            </ul>
          </li>
            
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>
              advertisements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adds_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adds_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display advertisements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adds_user_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>users advertisements</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>
              Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
