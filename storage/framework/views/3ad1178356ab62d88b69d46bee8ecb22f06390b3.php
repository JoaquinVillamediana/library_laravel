

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Lista</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Usuarios
                <a class="createButton ml-5" href="<?php echo e(route('users.create')); ?>"><?php echo $__env->make('admin.widgets.button',
                    array('class'=>'primary', 'value'=>'Agregar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
            </div>
            <?php if(!empty($aData)): ?>
            <?php echo e(var_dump($aData)); ?>

            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Tipo</th>
                                <th>Dni</th>
                                <th>Libros Act.</th>
                                <th>Creado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($aUsers)): ?>
                            <?php $__currentLoopData = $aUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name . " " . $user->last_name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <?php if($user->type == 1): ?>
                                <td>-</td>
                                <?php else: ?>
                            <td><img src="/uploads/profile/<?php echo e($user->image); ?>" style="width:50px;margin:0 auto;" alt=""></td>
                                <?php endif; ?>

                                <?php if($user->type == 1): ?>
                                <td>Adm.</td>
                                <?php else: ?>
                                <td>Usr.</td>
                                <?php endif; ?>
                                <?php if($user->type ==1): ?>
                                <td>-</td>
                                <?php else: ?>
                                <td><?php echo e($user->DNI); ?></td>
                                <?php endif; ?>
                                <?php if($user->type == 1): ?>
                                <td>-</td>
                                <?php else: ?>
                                <td><?php echo e($user->actual_books); ?></td>
                                <?php endif; ?>
                                <td><?php echo e(date("d/m/Y H:i:s", strtotime( $user->created_at ))); ?></td>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/admin/users/index.blade.php ENDPATH**/ ?>