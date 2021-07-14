<!DOCTYPE html>
<html>
<?php $__env->startSection('htmlheader'); ?>
	<?php echo $__env->make('admin.layouts.partials.htmlheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<body class="hold-transition login-page">

<!-- Your Page Content Here -->
<?php echo $__env->yieldContent('main-content'); ?>

</body>
</html><?php /**PATH /var/www/html/demo/user-management/resources/views/admin/layouts/auth.blade.php ENDPATH**/ ?>