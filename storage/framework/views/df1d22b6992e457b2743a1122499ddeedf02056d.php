


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="/admin/abooks">Libros</a>
            </li>
            <li class="breadcrumb-item active">Portadas</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Portada
            </div>         
            <div class="card-body">
                <?php if(empty($image) || $image==NULL): ?>
                    <h3>Agregar una Imagen de Portada</h3>    
                    <div class="form-group mt-3">
                        <form method="POST" action="<?php echo e(route('abooks.update' , $bookid )); ?>" role="form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="PATCH">
                        <input type="file" class="form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" name="image" id="image">
                        <?php if($errors->has('image')): ?>
                                <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                                <?php endif; ?>
                                <span id="image_error" class="invalid-feedback" role="alert" style="display:none;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                             
                                <div id="preview_image" class="mt-2" style=" display:none;"></div> 
                                <td><button type="submit" class="btn btn-primary" style="margin-top:20px; cursor:pointer; " >Cambiar Portada</button></td>       
                    </form>
                    </div>
                    <?php else: ?>
                    <h3>Cambiar Imagen de Portada</h3>    
                    <div class="form-group mt-3">
                        <div style="" class="form-group">
                        <img src="/uploads/books/<?php echo e($image); ?>"  style="margin-bottom:20px ;width:40%;float:left;" alt="">
                        <div style="margin:20px;float:left;width:20%"><h5 class="text-secondary">Portada Actual</h5></div>
                        </div>
                        <div style="width:100%;float:left;"><h4 class="text-secondary">Selecciona una nueva portada</h4></div>
                        <form method="POST" action="<?php echo e(route('abooks.update' , $bookid )); ?>" role="form" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="PATCH">
                        <input type="file" class="form-control <?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" name="image" id="image">
                        <?php if($errors->has('image')): ?>
                                <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                                <?php endif; ?>
                                <span id="image_error" class="invalid-feedback" role="alert" style="display:none;">
                                    <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                                </span>
                             
                                <div id="preview_image" class="mt-2" style=" display:none;"></div> 
                        <td><button type="submit" class="btn btn-primary" style="margin-top:20px; cursor:pointer; " >Cambiar Portada</button></td>      
                    </form>
                    </div>


                    
                <?php endif; ?>


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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views//admin/abooks/edit.blade.php ENDPATH**/ ?>