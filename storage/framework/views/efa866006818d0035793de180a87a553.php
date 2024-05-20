<!doctype html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="Petar Velikov" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="<?php echo e(asset('packages/bootstrap-theme.min.css')); ?>" rel="stylesheet" />

        <link href="<?php echo e(asset('src/css/app.css')); ?>" rel="stylesheet" />
        <?php echo $__env->yieldContent('css-styles'); ?>

        <!-- Scripts - vite -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body>
        <!-- Header content -->
        <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main content -->
        <section id="my-layout-section" class="0p-3 0bg-secondary 0text-white" style="margin: 1px 0px 1px 0px; min-height: calc(100vh - 58px);">
            <?php echo $__env->yieldContent('content'); ?>
        </section>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        
        <script src="<?php echo e(asset('src/js/main.js')); ?>" defer></script>
        <?php echo $__env->yieldContent('js-scripts'); ?>
    </body>
</html>
<?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/layouts/master.blade.php ENDPATH**/ ?>