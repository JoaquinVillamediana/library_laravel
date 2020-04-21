

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Libros</a>
            </li>
            <li class="breadcrumb-item active">Lista</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Libros
                <a class="createButton ml-5" href="<?php echo e(route('books.create')); ?>"><?php echo $__env->make('admin.widgets.button', array('class'=>'primary', 'value'=>'Agregar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                <th>Autor</th>
                                <th>Fecha Publicacion</th>
                                <th>Editorial</th>
                                <th>Estado</th>
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
                                <td><?php echo e($oBook->name); ?></td>
                                <td><?php echo e($oBook->author); ?></td>
                                <td><?php echo e($oBook->date); ?></td>
                                <td><?php echo e($oBook->publisher); ?></td>
                                <?php if($available[$i] == 'yes'): ?>
                                <td> <span class="text-success"> Disponible  </span></td>
                                <?php else: ?>
                                <td>No Disponible</td>                        
                                <?php endif; ?>                                
                            </tr>
                            <?php $i++; ?>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views//admin/books/index.blade.php ENDPATH**/ ?>