


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('books.index')); ?>">Libros</a>
            </li>
            <li class="breadcrumb-item active">Alta de Libro</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 margin-bottom-20" style="margin: 0 auto;">
                        <form method="POST" action="<?php echo e(route('books.store')); ?>" role="form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                           

                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" maxlength="250" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Nombre:" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un nombre.</strong>
                                </span>
                                <?php endif; ?>
                            </div>                          

                            <div class="form-group">
                                <label>Autor</label>
                                <input id="Author" name="Author" placeholder="Autor (opcional):" maxlength="250" class="form-control">
                                <!-- <?php if($errors->has('Dni')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar Tu Dni.</strong>
                                </span>
                                <?php endif; ?> -->
                            </div>    

                            <div class="form-group">
                                <label>Fecha Publicacion</label>
                                <input id="date" name="date" type='number' maxlength="4" placeholder="Año de Publicacion (opcional): " class="form-control">
                                <!-- <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un email.</strong>
                                </span>
                                <?php endif; ?>
                                <?php if($errors->has('duplicated_email_error')): ?>
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>El email ingresado ya se encuentra registrado.</strong>
                                </span>
                                <?php endif; ?> -->
                            </div>

                           

                            <div class="form-group" id="box_publisher">
                                <label>Editorial</label>
                                <input  id="publisher" name="publisher" class="form-control" placeholder="Editorial (opcional):" >
                                <!-- <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Debe ingresar un password (min. 8 caracteres).</strong>
                                </span>
                                <?php endif; ?> -->
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


<script>

    $(document).ready(function () {




    });
        

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views//admin/books/create.blade.php ENDPATH**/ ?>