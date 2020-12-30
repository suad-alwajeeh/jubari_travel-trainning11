
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
        <div class="image" id="su_user_image">
          
        </div>
        <div class="info">
       
          <a href="#" class="d-block" id="su_user_name"> </a>
        </div>
      </div>
@php

$_GLOBALS['admin_link']='
              <li class="nav-item">
                <a href="/department" class="nav-link">
                <i class="fas fa-building"></i>
                
                 <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/employees/insert" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Employee </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/employees" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Display  Employee</p>
                </a>
              </li>
             
            </ul>
              </li>
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
                <a href="/airline_add" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>add airline </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/airline_display" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>disply airline</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Supplier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addSupplier" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Supplier </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/displaySupplier" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Disply Suppliers</p>
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
                <a href="/role_add" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>ADD NEW</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/role_display" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>DISPLAY ALL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/role_user_display" class="nav-link">
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
              Supplier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/adds_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adds_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display advertisements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adds_user_display" class="nav-link">
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
              advertisements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/adds_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adds_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display advertisements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/adds_user_display" class="nav-link">
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
                <a href="/user_add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user_display" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="/remark" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                  <p> Remark</p>
                </a>
              </li>
          ';
$_GLOBALS['Sales_Executive']='<li class="nav-item">
                <a href="/service_test" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
              <p>Service</p>
                </a>
              </li>
         
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fas fa-user" aria-hidden="true"></i>
              <p>
                Sales Executive
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Sales Executive </p>
                </a>
              </li>
              </ul>
              </li>
              <li class="nav-item">
                <a href="/show_remark" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                  <p> Remark</p>
                </a>
              </li>';
 $_GLOBALS['Sales_Manager']='
<li class="nav-item">
                <a href="/service_test" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
              <p>Service</p>
                </a>
              </li>
         
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fas fa-user" aria-hidden="true"></i>
              <p>
                Sales Executive
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Sales Executive </p>
                </a>
              </li>
              </ul>
              </li>
              <li class="nav-item">
                <a href="/remark" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                  <p> Remark</p>
                </a>
              </li>';  
$_GLOBALS['Accountant']='
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fas fa-user" aria-hidden="true"></i>
              <p>
              Accountant
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>request </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>finished </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>erorr log </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service/sales_repo/" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>check up </p>
                </a>
              </li>
              </ul>
              </li> 
              <li class="nav-item">
                <a href="/service_test" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
              <p>all ticket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service_test" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
              <p>reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/service_test" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
              <p>profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/remark" class="nav-link">
                <i class="fas fa-sticky-note"></i>
                  <p> Remark</p>
                </a>
              </li>';                      
@endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if(Auth::user()->hasRole('admin'))
               @php
               echo $_GLOBALS['admin_link'];
              @endphp
               @endif  
               @if(Auth::user()->hasRole('sale_manager'))
               @php
               echo $_GLOBALS['Sales_Manager'];
              @endphp
               @endif 
               @if(Auth::user()->hasRole('accountant'))
               @php
               echo $_GLOBALS['Accountant'];
              @endphp
               @endif 
               @if(Auth::user()->hasRole('sale_executive'))
               @php
               echo $_GLOBALS['Sales_Executive'];
              @endphp
               @endif            
            <!--li class="nav-item">
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
          </li-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
