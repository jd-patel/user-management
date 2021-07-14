<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::route('admin.dashboard')}}" class="brand-link">
      <img src="{{asset('/public/img/icon.png')}}" width="40">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="javascript:void(0);" class="d-block">
            <i class="fas fa-user-shield"></i> 
             {{ Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- <li class="nav-header">MISCELLANEOUS</li> -->
          <li class="nav-item">
            <a href="{{URL::route('admin.dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard' || Route::currentRouteName() == 'admin.home') active @endif">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::route('admin.users')}}" class="nav-link @if(Route::currentRouteName() == 'admin.users' || Route::currentRouteName() == 'admin.edit.user') active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>Manage Users</p>
            </a>
          </li>

          <li class="nav-item @if(Route::currentRouteName() == 'admin.backend.users' || Route::currentRouteName() == 'admin.edit.backend.user' || Route::currentRouteName() == 'admin.create.backend.user.show') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == 'admin.backend.users' || Route::currentRouteName() == 'admin.edit.backend.user' || Route::currentRouteName() == 'admin.create.backend.user.show') active @endif">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Manage Admin Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview" @if(Route::currentRouteName() == 'admin.backend.users' || Route::currentRouteName() == 'admin.edit.backend.user' || Route::currentRouteName() == 'admin.create.backend.user.show') style="display: block;" @endif style="display: none;">
              <li class="nav-item">
                <a href="{{URL::route('admin.backend.users')}}" class="nav-link @if(Route::currentRouteName() == 'admin.backend.users' || Route::currentRouteName() == 'admin.edit.backend.user') active @endif">
                  <i class="fas fa-list nav-icon"></i>
                  <p>List Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::route('admin.create.backend.user.show')}}" class="nav-link @if(Route::currentRouteName() == 'admin.create.backend.user.show') active @endif">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-link text-muted"> <i class="nav-icon fas fa-cogs"></i> SETTINGS</li>
          <li class="nav-item">
            <a href="{{URL::route('admin.email.settings')}}" class="nav-link @if(Route::currentRouteName() == 'admin.email.settings') active @endif">
              <i class="nav-icon fas fa-envelope mr-2"></i>
              <p>Email Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::route('admin.socialsettings')}}" class="nav-link @if(Route::currentRouteName() == 'admin.socialsettings') active @endif">
              <i class="nav-icon fas fa-share-alt"></i>
              <p>Social Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::route('admin.general.settings')}}" class="nav-link @if(Route::currentRouteName() == 'admin.general.settings') active @endif">
              <i class="nav-icon fas fa-sliders-h mr-2"></i>
              <p>General Settings</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>