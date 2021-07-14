<?php $__env->startSection("htmlheader_title", "Login"); ?>

<?php $__env->startSection('content'); ?>
<div class="container pt-3">
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-6 mx-auto">
			<div class="card shadow border-0">
				<h4 class="card-title text-white card-header text-center text-uppercase bg-primary p-3"><?php echo e(__('Sign In')); ?></h4>

				<div class="card-body">
					<form method="POST" action="<?php echo e(route('login')); ?>">
						<?php echo csrf_field(); ?>

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
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

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								<label for="email" class="control-label"><?php echo e(__('Email Address')); ?> <span class="text-danger">*</span></label>
								<input id="email" type="email" placeholder="<?php echo e(__('Email Address')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autofocus>

								<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($message); ?></strong>
									</span>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								<label for="password" class="control-label"><?php echo e(__('Password')); ?> <span class="text-danger">*</span></label>
								<input id="password" type="password" placeholder="<?php echo e(__('Password')); ?>" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password">

								<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($message); ?></strong>
									</span>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

						<div class="form-group row justify-content-center px-3">
							<div class="col-xl-8 col-md-8 col-12">
								<div class="row">
									<div class="col-6 px-0">
										<div class="custom-control custom-checkbox mb-3"> 
										<input <?php echo e(old('remember') ? 'checked' : ''); ?> id="remember" name="remember" id="remember" value="1" type="checkbox" class="custom-control-input checkbox-muted"> 
										<label for="remember" class="custom-control-label text-muted">Remember Me</label> </div>
									</div> <!-- Forgot Password Link -->
									<div class="col-6 px-0 text-right"> 
										<span><a href="<?php echo e(route('password.request')); ?>"><b>Forgot Password?</b></a></span> 
									</div>
								</div>
							</div>
						</div> <!-- Log in Button -->
						
						<div class="form-group row justify-content-center">
							<div class="col-xl-4 col-md-6 col-8"> 
								<button type="submit" class="btn btn-block btn-primary text-uppercase">
									<?php echo e(__('Sign In')); ?>

								</button>
							</div>
						</div>

						<?php if(!$socialSettings->isEmpty()): ?>
							<div class="row px-3 mb-4">
								<div class="line"></div> <small class="or text-center">OR</small>
								<div class="line"></div>
							</div>

							<div class="form-group row justify-content-center">
								<div class="col-xl-8 col-md-8 col-10 text-center text-md-left">
									<?php $__currentLoopData = $socialSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<a href="<?php echo e(URL::route('social.redirect',$value->provider)); ?>" class="d-none d-lg-block btn btn-block btn-social btn-<?php echo e($value->provider); ?> text-uppercase"> 
											<span class="ffa ffa-<?php echo e($value->provider); ?> icon-<?php echo e($value->provider); ?>"></span> Sign in with <?php echo e(ucfirst($value->provider)); ?> </a>
										
										<a href="<?php echo e(URL::route('social.redirect',$value->provider)); ?>" class="d-lg-none btn btn-inline btn-social btn-<?php echo e($value->provider); ?> btn-social-mobile">
											<span class="icon-<?php echo e($value->provider); ?>"></span>
										</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						<?php endif; ?>
					</form>
				</div>
			</div>
			<div class="pt-2">
				<div class="row justify-content-center">
					<p>Don't have an account? <span><a href="<?php echo e(url('register')); ?>"><strong>Register Now!</strong></a></span></p>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.line {
	height: 1px;
	width: 45%;
	background-color: #E0E0E0;
	margin-top: 10px
}

.or {
	width: 10%;
	font-weight: bold
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/demo/user-management/resources/views/auth/login.blade.php ENDPATH**/ ?>