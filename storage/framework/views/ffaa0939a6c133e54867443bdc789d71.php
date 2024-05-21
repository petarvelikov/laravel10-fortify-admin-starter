

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1 class="text-center">Items</h1>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card m-3 d-inline-block" style="width: 18rem;">
                <div class="card-header text-center" ><?php echo e($item->name); ?></div>
                <div class="text-center"><img src="/src/img/shop-def-img.jpg" class="card-img-top"  style="width: 175px; " alt="No Image"></div>
                <div class="card-body">
                    <p class="card-text"><?php echo e($item->description); ?></p>
                    <div class="row">
                        <div class="col"><p class="card-text">Price: <?php echo e($item->price); ?></p></div>
                        <div class="col"><a href="#" class="btn btn-sm btn-primary">Add to cart</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/items.blade.php ENDPATH**/ ?>