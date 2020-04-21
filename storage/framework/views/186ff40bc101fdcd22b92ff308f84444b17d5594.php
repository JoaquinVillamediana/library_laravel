

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Mi Perfil</a>
            </li>
                   
        </ol>
        <div style="margin-bottom:3%">
        <div  style="width:25%;float:left;margin-left:30%;margin-top:2%"><h1 class='text-primary text-center' style="font-size:4em "><?php echo e(Auth::user()->name); ?></h1></div>
    <div style="display:inline-block; width:15%;margin-right:30%"><img class="" style="width:100%;" src="/uploads/profile/<?php echo e(Auth::user()->image); ?>" alt=""></div>
</div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Mis Retiros
                <a class="createButton ml-5" href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>"><?php echo $__env->make('admin.widgets.button', array('class'=>'primary', 'value'=>'Editar Perfil'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id Retiro</th>
                                <th>Fecha Retiro</th>                                
                                <th>Fecha Devolucion</th>
                                <th>Libro</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($aRecords)): ?>
                            <?php $__currentLoopData = $aRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
                                <td><?php echo e($oRecord->recordid); ?></td>
                                <td><?php echo e(date("d/m/Y H:i:s", strtotime( $oRecord->dateRecord ))); ?></td>
                                <?php if($oRecord->dateReturn > $estimateddate): ?>
                                <td><span class="text-danger"><?php echo e(date("d/m/Y H:i:s", strtotime( $oRecord->dateReturn ))); ?></span></td>
                                <?php else: ?>
                                <?php if($oRecord->dateReturn != ''): ?>
                                <td><?php echo e(date("d/m/Y H:i:s", strtotime( $oRecord->dateReturn ))); ?></td>
                                <?php else: ?>
                                <td></td> 
                                <?php endif; ?>
                                
                                <?php endif; ?>
                                <td><?php echo e($oRecord->bookid); ?></td>
                                <?php if($oRecord->dateReturn!=NULL && $oRecord->dateReturn!=''): ?>
                                <td><span class='text-success'>Entregado <i class="far fa-check-circle"></i></span></td>
                                <?php else: ?>
                                
                                <td><span class="text-warning font-italic">Pendiente</span>
                                <?php if($estimateddate < now()): ?>
                                <span class="text-danger">- Tarde <i class="far fa-times-circle"></i></span></td>
                                <?php else: ?>
                                </td>
                                <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/usr/profile/index.blade.php ENDPATH**/ ?>