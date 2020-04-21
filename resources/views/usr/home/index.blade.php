@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <h1 class="text-center text-primary">Biblioteca Online</h1>
    <hr>
    <br>
    <div class="container">
    @switch($actual)
    @case (0)
    @case (1)
        <p><span class="text-success">
    @break
    @case (2)
    @case (3)
        <p><span class="text-warning">
    @break
    @case (4)
    @case (5)
        <p><span class="text-danger">
    @break
    @endswitch
    Actualmente tienes {{$actual}} libros en tu posesion. (Max. 5)</span></p>
    </div>
    <hr>
    <div class="container">
    @foreach ($aRecords as $oRecord)
    <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
    @if($estimateddate < now() )
    <p class="text-danger font-weight-bold">Se vencio tu plazo para devolver '{{$oRecord->bookid}}'</p><br>
    @endif
    @endforeach
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

    @include('layouts.modals')

</div>

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

@endsection