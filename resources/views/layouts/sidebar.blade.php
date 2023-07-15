

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin/admin-dashboard')}}" class="nav-link @if(Request::segment(2) == 'admin-dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/logout')}}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
          
          
        </ul>
</nav>