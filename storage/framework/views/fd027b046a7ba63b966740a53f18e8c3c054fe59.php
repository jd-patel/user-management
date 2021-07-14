<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-shield"></i> <?php echo e(Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name); ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?php echo e(URL::route('admin.edit.backend.user',[Crypt::encrypt(Auth::guard('admin')->user()->id)])); ?>" class="dropdown-item">
            <i class="fas fa-id-card mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(URL::route('admin.logout')); ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav><?php /**PATH /var/www/html/demo/user-management/resources/views/admin/layouts/partials/navbar.blade.php ENDPATH**/ ?>