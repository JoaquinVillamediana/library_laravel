

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/usr/profile">Mi Perfil</a>
            </li>
            <li class="breadcrumb-item active">Editar Perfil</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Mi Perfil
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('profile.update' ,Auth::user()->id )); ?>" role="form"
                    enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input name="_method" type="hidden" value="PATCH">
                    <label for="name">Cambiar Nombre:</label>
                    <input type="text" maxlength="60" style="margin-bottom:10px;" class="form-control" value="<?php echo e(Auth::user()->name); ?>" name="name" id="name">
                    <?php if($errors->has('name')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>El maximo de caracteres es 60.</strong>
                    </span>
                    <?php endif; ?>
                    <label for="">Foto actual:</label>
                    <div style="margin-top:20px"><img src="/uploads/profile/<?php echo e(Auth::user()->image); ?>" width="40%" alt=""></div>
                    <div style="float:left; width:100%;margin-top:20px"><label for="image">Cambiar Foto:</label></div>
                    <input type="file" class="form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>"
                        name="image" id="image">
                    <?php if($errors->has('image')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                    </span>
                    <?php endif; ?>
                    <span id="image_error" class="invalid-feedback" role="alert" style="display:none;">
                        <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                    </span>

                    <div id="preview_image" class="mt-2" style=" display:none;"></div>
                    <br>
                    <label for="oldpass">Cambiar Contraseña:</label>
                    <input type="password" name="oldpass" maxlength="60" id="oldpass" placeholder="Contraseña Actual:" class="form-control <?php echo e($errors->has('oldpass') ? ' is-invalid' : ''); ?>">
                    <?php if($errors->has('oldpass') || $errors->has('passerror')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>Tu actual contraseña no cumple con los parametros necesitados.</strong>
                    </span>
                    <?php endif; ?>
                    <input style="margin-top:20px" type="password" maxlength="60" name="newpass" id="newpass" placeholder="Nueva Contraseña:" class="form-control <?php echo e($errors->has('newpass') ? ' is-invalid' : ''); ?>">
                    <?php if($errors->has('newpass')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>Tu nueva contraseña no cumple con los parametros necesitados.</strong>
                    </span>
                    <?php endif; ?>
                    
                    <input style="margin-top:20px" type="password" maxlength="60" name="confirm" id="confirm" placeholder="Confirmar Contraseña:" class="form-control <?php echo e($errors->has('confirm') ? ' is-invalid' : ''); ?>">
                    <?php if($errors->has('confirm')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>Tu nueva contraseña no cumple con los parametros necesitados.</strong>
                    </span>
                    <?php endif; ?>
                    <?php if($errors->has('coincidence')): ?>
                    <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                        <strong>Las contraseñas deben ser iguales.</strong>
                    </span>
                    <?php endif; ?>
                    <td><button type="submit" class="btn btn-primary" style="margin-top:20px; cursor:pointer; ">Guardar Cambios</button></td>

                </form>


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
</div>


<script src="/js/admin/image_preview.js"></script>
<script>
    $('#image').change(function() {
        
        setImagePreview(this, $(this).attr('id'));
    });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/usr/profile/edit.blade.php ENDPATH**/ ?>