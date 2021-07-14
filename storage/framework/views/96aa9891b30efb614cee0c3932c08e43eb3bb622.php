<?php $__env->startSection("htmlheader_title", "Register"); ?>

<?php $__env->startSection('content'); ?>
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card shadow border-0">
                <h4 class="card-title text-white card-header text-center text-uppercase bg-primary p-3"><?php echo e(__('Create Your Account')); ?></h4>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-row row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="first_name" class="control-label"><?php echo e(__('First Name')); ?> <span class="text-danger">*</span></label>
                                <input id="first_name" type="text" placeholder="<?php echo e(__('First Name')); ?>" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" autofocus>

                                <?php $__errorArgs = ['first_name'];
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

                            <div class="col-md-6 form-group">
                                <label for="last_name" class="control-label"><?php echo e(__('Last Name')); ?></label>
                                <input id="last_name" type="text" placeholder="<?php echo e(__('Last Name')); ?>" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" autofocus>

                                <?php $__errorArgs = ['last_name'];
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

                        <div class="form-row row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="email" class="control-label"><?php echo e(__('Email Address')); ?> <span class="text-danger">*</span></label>
                                <input id="email" type="email" placeholder="<?php echo e(__('Email Address')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email">

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

                            <div class="col-md-6 form-group">
                                <label for="phone_number" class="control-label"><?php echo e(__('Phone Number')); ?> <small>(e.g +91 XXX XXX XXXX)</small> <span class="text-danger">*</span></label>
                                <input id="phone_number" type="digit" placeholder="<?php echo e(__('Phone Number')); ?>" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?>" autofocus>
                                <?php $__errorArgs = ['phone_number'];
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

                        <div class="form-row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="date_of_birth" class="control-label"><?php echo e(__('Date Of Birth')); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input id="date_of_birth" type="text" placeholder="<?php echo e(__('Date Of Birth')); ?>" class="datepicker form-control <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> p-2" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" autofocus>
                                <span class="input-group-prepend" for="date_of_birth">
                                    <label class="input-group-text" for="date_of_birth">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </label>
                                </span>
                                </div>
                                <?php $__errorArgs = ['date_of_birth'];
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
                            <div class="col-md-6 form-check custom-radio">
                                <label for="gender_male" class="control-label clear"><?php echo e(__('Gender')); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <label class="form-check form-check-inline ml-2">
                                    <input id="gender_male" <?php if(old('gender') == 'Male'): ?> checked <?php endif; ?> type="radio" value="Male" class="form-check-input custom-control-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender">
                                    <span class="custom-control-label"> Male </span>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input id="gender_female" <?php if(old('gender') == 'Female'): ?> checked <?php endif; ?> type="radio" value="Female" class="form-check-input custom-control-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender">
                                    <span class="custom-control-label"> Female </span>
                                </label>
                            </div>

                                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-row mt-md-2">
                            <label for="password" class="control-label"><?php echo e(__('Password')); ?> <span class="text-danger">*</span></label>

                            <div class="col-md-12 form-group">
                                <input id="password" type="password" placeholder="<?php echo e(__('Password')); ?>" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password">

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

                        <div class="form-row mt-md-2">
                            <div class="col-md-12 form-group">
                                <label for="password-confirm" class="control-label"><?php echo e(__('Confirm Password')); ?> <span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" placeholder="<?php echo e(__('Confirm Password')); ?>" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-md-2">
                            <div class="col-xl-4 col-md-6 col-8"> 
                                <button type="submit" class="btn btn-block btn-primary text-uppercase">
                                    <?php echo e(__('Sign Up')); ?>

                                </button>
                            </div>
                        </div>

                        <?php if(!$socialSettings->isEmpty()): ?>
                            <div class="row px-3 mb-4">
                                <div class="line"></div> <small class="or text-center">OR</small>
                                <div class="line"></div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-xl-6 col-md-8 col-10 text-center">
                                    <?php $__currentLoopData = $socialSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <a title="Sign Up With <?php echo e(ucfirst($value->provider)); ?>" href="<?php echo e(URL::route('social.redirect',$value->provider)); ?>" class="btn btn-inline btn-social btn-<?php echo e($value->provider); ?> btn-social-mobile">
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
                    <p>Already have an account? <span><a href="<?php echo e(URL::route('login')); ?>"><strong>Sign In!</strong></a></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo e(asset('/public/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">  
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
<script src="<?php echo e(asset('/public/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">

$( document ).ready(function() {

    $('.datepicker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      startView: 'decade',
      maxViewMode: 2,
      endDate: '-0d',
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/demo/user-management/resources/views/auth/register.blade.php ENDPATH**/ ?>