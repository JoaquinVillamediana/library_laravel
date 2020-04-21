

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Libros</a>
            </li>
            <li class="breadcrumb-item active">Retiro de Libros</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Libros
                <a class="createButton ml-5" href="<?php echo e(route('books.create')); ?>"><?php echo $__env->make('admin.widgets.button', array('class'=>'primary', 'value'=>'Devolver'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                <form method="post" action="<?php echo e(route('books.store')); ?>" role="form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Portada</th>                                
                                <th>Autor</th>
                                <th>Fecha Publicacion</th>
                                <th>Editorial</th>
                                <th>Retirar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($aBooks)): ?>
                            <?php $i=0; ?>
                            
                            <?php $__currentLoopData = $aBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($available[$i] == 'no'): ?>
                            <tr class="text-danger font-italic">
                            <?php else: ?>
                            <tr>
                            <?php endif; ?>
                                <td><?php echo e($oBook->idbooks); ?></td>
                                <?php $id =  $oBook->idbooks?>
                                <td><?php echo e($oBook->name); ?></td>
                                <?php if($oBook->image != NULL): ?>
                                <td><img style="width:50px;margin:0 auto;" src="/uploads/books/<?php echo e($oBook->image); ?>" alt=""></td>
                                <?php else: ?>
                                <td></td>
                                <?php endif; ?>
                                <td><?php echo e($oBook->author); ?></td>
                                <td><?php echo e($oBook->date); ?></td>
                                <td><?php echo e($oBook->publisher); ?></td>
                                <?php if($available[$i] == 'yes'): ?>
                                <?php if($actualbooks>=5): ?>
                                <td class="text-secondary">Ya posees 5 libros</td>
                                <?php else: ?>
                                <form method="POST" action="<?php echo e(route('books.store')); ?>" role="form" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <input name="_method" type="hidden" value="POST">
                                <input id="book_id" name="book_id" type="hidden" value="<?php echo e($oBook->idbooks); ?>">
                                <td><button type="submit" class="btn btn-primary" style="cursor:pointer;" ><i class="fas fa-reply"></i></button></td>      
                                </form>                
                                <?php endif; ?>
                                <?php else: ?>
                                <td>No Disponible</td>                        
                                <?php endif; ?>                                
                            </tr>
                            <?php $i++; ?>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
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

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views//usr/books/index.blade.php ENDPATH**/ ?>