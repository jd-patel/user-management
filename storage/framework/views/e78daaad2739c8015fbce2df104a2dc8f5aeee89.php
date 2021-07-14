<?php $__env->startSection('htmlheader'); ?>
	<?php echo $__env->make('admin.layouts.partials.htmlheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
  
<?php echo $__env->make('admin.layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin.layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Your Page Content Here -->
<?php echo $__env->yieldContent('main-content'); ?>



<?php echo $__env->make('admin.layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->make('admin.layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</body>
</html><?php /**PATH /var/www/html/demo/user-management/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>