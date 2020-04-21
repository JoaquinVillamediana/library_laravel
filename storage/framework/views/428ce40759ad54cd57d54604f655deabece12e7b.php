

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
                <a class="createButton ml-5" href=""><?php echo $__env->make('admin.widgets.button', array('class'=>'primary', 'value'=>'Crear'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                <th>Email</th>
                                <th>Grupo</th>
                                <th>Tipo</th>
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                <th>Email</th>
                                <th>Grupo</th>
                                <th>Tipo</th>
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(!empty($aUsers)): ?>
                            <?php $__currentLoopData = $aUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name . " " . $user->last_name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->group); ?></td>                                
                                <?php if($user->type == 1): ?>
                                    <td>Adm.</td>
                                <?php else: ?>
                                    <td>Usr.</td>
                                <?php endif; ?>
                                <td><?php echo e($user->created_at); ?></td>
                                <td><a class="btn btn-primary btn-circle" href="<?php echo e(action('admin\UserController@edit', $user->id)); ?>"><i class="fa fa-list"></i></a></td>
                                <td>
                                    <form id="deleteForm_<?php echo e($user->id); ?>" action="<?php echo e(action('admin\UserController@destroy', $user->id)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal(<?php echo e($user->id); ?>);"><i class="fa fa-times"></i></button>
                                    </form>                
                                </td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>