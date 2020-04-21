

<?php $__env->startSection('content'); ?>
<?php date_default_timezone_set('America/Buenos_Aires');?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Registros</a>
            </li>
            <li class="breadcrumb-item active">Lista</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Registros
                <!-- <a class="createButton ml-5" href="<?php echo e(route('books.create')); ?>"><?php echo $__env->make('admin.widgets.button', array('class'=>'primary', 'value'=>'Agregar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a> -->
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha de Retiro</th>                                
                                <th>Fecha de Devolucion</th>
                                <th>Libro</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($aRecords)): ?>
                            <?php $__currentLoopData = $aRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
                                <td><?php echo e($oRecord->recordid); ?></td>
                                <td><?php echo e(date("d/m/Y H:i:s", strtotime($oRecord->dateRecord))); ?></td>
                                <?php if($estimateddate < $oRecord->dateReturn && $oRecord->dateReturn!= NULL): ?>
                                <td><span class="text-danger"><?php echo e(date("d/m/Y H:i:s", strtotime($oRecord->dateReturn))); ?></span></td>
                                <?php else: ?>
                                <?php if($oRecord->dateReturn != ''): ?>
                                <td><?php echo e(date("d/m/Y H:i:s", strtotime($oRecord->dateReturn))); ?></td>
                                <?php else: ?>
                                <td></td>
                                <?php endif; ?>
                                <?php endif; ?>
                                <td><?php echo e($oRecord->bookid); ?></td>
                                <td><?php echo e($oRecord->userid); ?></td>
                                <?php if(empty($oRecord->dateReturn) || $oRecord->dateReturn ==''): ?>
                                <td><span class="text-warning font-italic">Pendiente</span>
                                
                                
                                <?php if( now() > $estimateddate ): ?>
                                <span class="text-danger">- Tarde <i class="far fa-times-circle"></i></span></td>
                                <?php else: ?>
                                </td>
                                <?php endif; ?> 
                                <?php else: ?>
                                <td><span class="text-success">Entregado  <i class="far fa-check-circle"></i></span></td>    
                                <?php endif; ?>
                            </tr>   
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/admin/records/index.blade.php ENDPATH**/ ?>