<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo e(asset('/public/img/icon.png')); ?>" type="image/x-icon"/>
    <link rel="icon" href="<?php echo e(asset('/public/img/icon.png')); ?>" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php if (! empty(trim($__env->yieldContent('htmlheader_title')))): ?><?php echo $__env->yieldContent('htmlheader_title'); ?> - <?php endif; ?> <?php echo e(config('app.name')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('/public/js/app.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('/public/css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/public/css/bootstrap-social.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/public/css/custom.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <h3 class="mb-0"><?php echo e(config('app.name')); ?></h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link <?php if(Route::currentRouteName() == 'home'): ?> active <?php endif; ?>" href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php echo e(__('About')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php echo e(__('Our Work')); ?></a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(Route::currentRouteName() == 'login'): ?> active <?php endif; ?>" href="<?php echo e(route('login')); ?>"><?php echo e(__('Sign In')); ?></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(Route::currentRouteName() == 'register'): ?> active <?php endif; ?>" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->first_name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH /var/www/html/demo/user-management/resources/views/layouts/app.blade.php ENDPATH**/ ?>