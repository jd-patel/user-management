<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
	<title><?php if (! empty(trim($__env->yieldContent('htmlheader_title')))): ?><?php echo $__env->yieldContent('htmlheader_title'); ?> - <?php endif; ?> <?php echo e(config('app.name')); ?> Admin</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo e(asset('/public/img/icon.png')); ?>" type="image/x-icon"/>
    <link rel="icon" href="<?php echo e(asset('/public/img/icon.png')); ?>" type="image/x-icon"/>
	<!-- Bootstrap CSS -->

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo e(asset('/public/vendor/fontawesome-free/css/all.min.css')); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo e(asset('/public/vendor/adminlte/dist/css/adminlte.min.css')); ?>">

	<link rel="stylesheet" href="<?php echo e(asset('/public/vendor/toastr/toastr.css')); ?>">

	<link rel="stylesheet" href="<?php echo e(asset('/public/vendor/custom.css')); ?>">
  
	<?php echo $__env->yieldPushContent('styles'); ?>

	<?php if( env('APP_ENV') == 'Production' ): ?>
		<!-- Google Analytics -->
	<?php endif; ?>
</head>
<?php /**PATH /var/www/html/demo/user-management/resources/views/admin/layouts/partials/htmlheader.blade.php ENDPATH**/ ?>