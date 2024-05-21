

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1>Categories</h1>
    
        <?php if($categories->count() > 0): ?>
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>
                        <a class="btn btn-success" href="<?php echo e(route('categories.create')); ?>"><i class="bi bi-plus-square">&nbsp;</i>Create new category</a>
                    </th>
                </thead>
                <tfoot>
                    <th colspan="6">Брой записи: <?php echo e($categories->count()); ?></th>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('categories.edit', $item->id)); ?>"><i class="bi bi-pencil">&nbsp;</i>Edit</a>
                            <form class="d-inline" action="<?php echo e(url('admin/categories', $item->id)); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="delete-item-form btn btn-sm btn-danger" type="submit"><i class="bi bi-trash">&nbsp;</i>Delete</button>
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No categories found.</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>