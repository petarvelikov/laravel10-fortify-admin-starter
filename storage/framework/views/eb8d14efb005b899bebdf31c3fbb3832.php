<?php $__env->startSection('content'); ?>

    <h1>Registration</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="/register" method="post">
                        <?php echo csrf_field(); ?>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Name</label>
                            <input type="text" id="form1Example13" class="form-control form-control-lg" name="name" />
                            
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email</label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Confirm password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password_confirmation" />
                        </div>

                        <div style="margin-top: 36px;">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                            <span class="mx-4">OR</span>
                            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\petar\Desktop\TEST\l10-admin-fortify\resources\views/auth/register.blade.php ENDPATH**/ ?>