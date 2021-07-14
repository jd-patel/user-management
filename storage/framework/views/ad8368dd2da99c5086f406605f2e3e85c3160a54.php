
<!-- jQuery -->
<script src="<?php echo e(asset('/public/vendor/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('/public/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/public/vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('/public/vendor/adminlte/dist/js/demo.js')); ?>"></script>

<script src="<?php echo e(asset('/public/vendor/toastr/toastr.min.js')); ?>"></script>

<script type="text/javascript">
	<?php if(session()->has('success')): ?>
		toastr["success"]("<?php echo e(session()->get('success')); ?>");
	<?php endif; ?>

	<?php if(session()->has('error')): ?>
		toastr["error"]("<?php echo e(session()->get('error')); ?>");
	<?php endif; ?>

	<?php if(session()->has('warning')): ?>
		toastr["warning"]("<?php echo e(session()->get('warning')); ?>");
	<?php endif; ?>

	<?php if(session()->has('info')): ?>
		toastr["info"]("<?php echo e(session()->get('info')); ?>");
	<?php endif; ?>
</script>
<?php echo $__env->yieldPushContent('scripts'); ?><?php /**PATH /var/www/html/demo/user-management/resources/views/admin/layouts/partials/scripts.blade.php ENDPATH**/ ?>