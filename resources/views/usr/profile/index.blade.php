@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Mi Perfil</a>
            </li>
                   
        </ol>
        <div style="margin-bottom:3%">
        <div  style="width:25%;float:left;margin-left:30%;margin-top:2%"><h1 class='text-primary text-center' style="font-size:4em ">{{Auth::user()->name}}</h1></div>
    <div style="display:inline-block; width:15%;margin-right:30%"><img class="" style="width:100%;" src="/uploads/profile/{{Auth::user()->image}}" alt=""></div>
</div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Mis Retiros
                <a class="createButton ml-5" href="{{ route('profile.edit', Auth::user()->id)}}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Editar Perfil'))</a>
                
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
                            @if(!empty($aRecords))
                            @foreach($aRecords as $oRecord)
                            <tr>
                            <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
                                <td>{{ $oRecord->recordid }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime( $oRecord->dateRecord )) }}</td>
                                @if($oRecord->dateReturn > $estimateddate)
                                <td><span class="text-danger">{{date("d/m/Y H:i:s", strtotime( $oRecord->dateReturn ))  }}</span></td>
                                @else
                                @if ($oRecord->dateReturn != '')
                                <td>{{ date("d/m/Y H:i:s", strtotime( $oRecord->dateReturn )) }}</td>
                                @else
                                <td></td> 
                                @endif
                                
                                @endif
                                <td>{{ $oRecord->bookid }}</td>
                                @if($oRecord->dateReturn!=NULL && $oRecord->dateReturn!='')
                                <td><span class='text-success'>Entregado <i class="far fa-check-circle"></i></span></td>
                                @else
                                
                                <td><span class="text-warning font-italic">Pendiente</span>
                                @if($estimateddate < now())
                                <span class="text-danger">- Tarde <i class="far fa-times-circle"></i></span></td>
                                @else
                                </td>
                                @endif
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