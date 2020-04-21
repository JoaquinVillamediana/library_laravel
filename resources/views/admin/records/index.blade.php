@extends('layouts.app')

@section('content')
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
                <!-- <a class="createButton ml-5" href="{{ route('books.create')}}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Agregar'))</a> -->
                
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
                            @if(!empty($aRecords))
                            @foreach($aRecords as $oRecord)
                            <tr>
                            <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
                                <td>{{ $oRecord->recordid }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($oRecord->dateRecord)) }}</td>
                                @if($estimateddate < $oRecord->dateReturn && $oRecord->dateReturn!= NULL)
                                <td><span class="text-danger">{{ date("d/m/Y H:i:s", strtotime($oRecord->dateReturn)) }}</span></td>
                                @else
                                @if($oRecord->dateReturn != '')
                                <td>{{  date("d/m/Y H:i:s", strtotime($oRecord->dateReturn)) }}</td>
                                @else
                                <td></td>
                                @endif
                                @endif
                                <td>{{ $oRecord->bookid }}</td>
                                <td>{{ $oRecord->userid }}</td>
                                @if(empty($oRecord->dateReturn) || $oRecord->dateReturn =='')
                                <td><span class="text-warning font-italic">Pendiente</span>
                                
                                
                                @if( now() > $estimateddate )
                                <span class="text-danger">- Tarde <i class="far fa-times-circle"></i></span></td>
                                @else
                                </td>
                                @endif 
                                @else
                                <td><span class="text-success">Entregado  <i class="far fa-check-circle"></i></span></td>    
                                @endif
                            </tr>   
                            @endforeach
                            @endif
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