


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('users.index')); ?>">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Alta de Usuario</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="<?php echo e(route('users.store')); ?>" role="form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">                             
                                <label>Tipo</label>
                                <select id="type" name="type"  class="form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>">                                                                        
                                    <option value="2" <?php echo e((old("type") == 2 ? "selected":"")); ?>>Usuario</option>
                                    <option value="1" <?php echo e((old("type") == 1 ? "selected":"")); ?>>Administrador</option>
                                </select>                                                                 
                                <?php if($errors->has('type')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe seleccionar un tipo de usuario.</strong>
                                </span>
                                <?php endif; ?>
                            </div>

                           

                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" maxlength="250" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Nombre:" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un nombre.</strong>
                                </span>
                                <?php endif; ?>
                            </div>                          

                            <div id="divDni" class="form-group">
                                <label id="DniLabel">Dni</label>
                                <input id="dni" name="dni" maxlength="11" class="form-control<?php echo e($errors->has('dni') ? ' is-invalid' : ''); ?>" placeholder="DNI:" >
                                
                                <?php if($errors->has('dni')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar tu Dni.</strong>
                                </span>
                                <?php endif; ?>
                            </div>    

                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" name="email" maxlength="60" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Email:" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un email.</strong>
                                </span>
                                <?php endif; ?>
                                <?php if($errors->has('duplicated_email_error')): ?>
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>El email ingresado ya se encuentra registrado.</strong>
                                </span>
                                <?php endif; ?>
                            </div>

                           

                            <div class="form-group" id="box_password">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password:" value="<?php echo e(old('password')); ?>">
                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un password (min. 8 caracteres).</strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <br /><br />
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">

        <div class="container">
            <div class="text-center">
                <small>Copyright © BMC 2019</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <?php echo $__env->make('layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>


<script>

    $(document).ready(function () {
        setUserFields($('#type').val());
    });
    
    $('#type').change(function() {
        setUserFields($(this).val());
    });

    function setUserFields(type) {
        
        if (type == 1) {
            $('#dni').hide();
            $('#DniLabel').hide();
            $('#divDni').hide();
        } else {
            $('#dni').show();
            $('#DniLabel').show();
            $('#divDni').show();
        }
    }
    
    
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/admin/users/create.blade.php ENDPATH**/ ?>