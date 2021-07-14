<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Landing Page')); ?></div>
                <div class="card-body">
                    <p>
                        Hey
                        <?php if(auth()->guard()->guest()): ?> There, <?php else: ?> <?php echo e(Auth::user()->first_name); ?>, <?php endif; ?>
                    </p>
                    <p>You are on the landing page!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/demo/git/user-management/resources/views/welcome.blade.php ENDPATH**/ ?>