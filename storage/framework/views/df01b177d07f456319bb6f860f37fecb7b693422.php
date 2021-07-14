<?php $__env->startSection("htmlheader_title", "Login"); ?>

<?php $__env->startSection('main-content'); ?>
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div> -->
  <!-- /.login-logo -->
    <div class="card-header text-center pb-5">
      <img src="<?php echo e(asset('/public/img/logo.png')); ?>" width="300">
    </div>
  <div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
      <div class="h2 text-uppercase">Admin Login</div>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div class="form-group row">
        <div class="col-md-12">
          <?php if(Session::has('success')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

          </div>
          <?php endif; ?>

          <?php if(Session::has('incorrect')): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo e(Session::get('incorrect')); ?>

          </div>
          <?php endif; ?>
        </div>
      </div>
      <form method="POST" action="<?php echo e(route('admin.login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
          <input type="email" name="email" value="<?php echo e(old('email', 'admin@admin.com')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email Address" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span id="exampleInputEmail1-error" class="error invalid-feedback"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="admin@1234" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span id="exampleInputEmail1-error" class="error invalid-feedback"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group row justify-content-center">
          <div class="col-8"> 
            <button type="submit" class="btn btn-block btn-primary text-uppercase">
              <?php echo e(__('Sign In')); ?>

            </button>
          </div>
        </div>
      </form>
      <div class="card">
        <div class="card-body bg-light">
          <div><b>Demo User: </b></div>
          <div><b>Email:</b> admin@admin.com</div>
          <div><b>Password:</b> admin@1234</div>
        </div>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/demo/user-management/resources/views/admin/login.blade.php ENDPATH**/ ?>