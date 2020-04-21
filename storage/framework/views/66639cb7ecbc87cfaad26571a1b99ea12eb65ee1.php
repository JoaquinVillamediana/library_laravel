

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <h1 class="text-center text-primary">Biblioteca Online</h1>
    <hr>
    <br>
    <div class="container">
    <?php switch($actual):
    case (0): ?>
    <?php case (1): ?>
        <p><span class="text-success">
    <?php break; ?>
    <?php case (2): ?>
    <?php case (3): ?>
        <p><span class="text-warning">
    <?php break; ?>
    <?php case (4): ?>
    <?php case (5): ?>
        <p><span class="text-danger">
    <?php break; ?>
    <?php endswitch; ?>
    Actualmente tienes <?php echo e($actual); ?> libros en tu posesion. (Max. 5)</span></p>
    </div>
    <hr>
    <div class="container">
    <?php $__currentLoopData = $aRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
    <?php if($estimateddate < now() ): ?>
    <p class="text-danger font-weight-bold">Se vencio tu plazo para devolver '<?php echo e($oRecord->bookid); ?>'</p><br>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Biblioteca/resources/views/usr/home/index.blade.php ENDPATH**/ ?>