<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <!--<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">-->
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                    <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong>Credenciales no v&aacute;lidas.</strong>
                    </span>
                    <?php endif; ?>  
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <!--<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">-->
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                    <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <!--<div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember Password</label>
                    </div>-->
                </div>

                <!--<a class="btn btn-primary btn-block" href="<?php echo e(url('/')); ?>">Login</a>-->

                <button type="submit" class="btn btn-primary btn-block">
                    <?php echo e(__('Login')); ?>

                </button>
                
            </form>

            <div class="text-center">
                <!--<a class="d-block small mt-3" href="<?php echo e(url('/admin/register')); ?>">Register an Account</a>
                <a class="d-block small" href="<?php echo e(url('/admin/forgot-password')); ?>">Forgot Password?</a>-->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/auth/login.blade.php ENDPATH**/ ?>