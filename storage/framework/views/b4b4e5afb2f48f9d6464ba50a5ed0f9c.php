

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1>Settings</h1>

        <?php if($settings->count() > 0): ?>
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>
                        <a class="btn btn-success" href="<?php echo e(url('admin/settings/create')); ?>">Create new setting</a>
                    </th>
                </thead>
                <tfoot>
                    <th colspan="6">Брой записи: <?php echo e($settings->count()); ?></th>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->key); ?></td>
                            <td><?php echo e($item->value); ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="<?php echo e(url('admin/settings', $item->id)); ?>">Show</a>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(url('admin/settings/edit', $item->id)); ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo e(url('admin/settings/destroy', $item->id)); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No settings found.</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/admin/settings.blade.php ENDPATH**/ ?>