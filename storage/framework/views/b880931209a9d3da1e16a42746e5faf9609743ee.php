


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('abooks.index')); ?>">Libros</a>
            </li>
            <li class="breadcrumb-item active">Alta de Libro</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="<?php echo e(route('abooks.store')); ?>" role="form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                           

                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" maxlength="250" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Nombre:" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un nombre valido.</strong>
                                </span>
                                <?php endif; ?>
                            </div>                          

                            <div class="form-group">
                                <label>Autor</label>
                                <input id="author" name="author" placeholder="Autor (opcional):" maxlength="250" class="form-control <?php echo e($errors->has('author') ? ' is-invalid' : ''); ?>">
                                <?php if($errors->has('author')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un autor menor a 60 carac.</strong>
                                </span>
                                <?php endif; ?>
                            </div>    

                            <div class="form-group">
                                <label>Fecha Publicacion</label>
                                <input id="date" name="date" type='number' maxlength="4" placeholder="Año de Publicacion (opcional): " class="form-control <?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>">
                                <?php if($errors->has('date')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debes ingresar un año valido.</strong>
                                </span>
                                <?php endif; ?>
                                
                            </div>

                           

                            <div class="form-group" id="box_publisher">
                                <label>Editorial</label>
                                <input  id="publisher" name="publisher" class="form-control <?php echo e($errors->has('publisher') ? ' is-invalid' : ''); ?>" placeholder="Editorial (opcional):" >
                                <?php if($errors->has('publisher')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar una Editorial valida (max. 60 caracteres).</strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Añadir Libro</button>
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





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views//admin/abooks/create.blade.php ENDPATH**/ ?>