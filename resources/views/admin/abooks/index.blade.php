@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Librossss</a>
            </li>
            <li class="breadcrumb-item active">Lista</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Libros
                <a class="createButton ml-5" href="{{ route('abooks.create')}}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Agregar'))</a>
                
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
                                <th>Portada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($aBooks))
                            <?php $i=0; ?>
                            @foreach($aBooks as $oBook)
                            @if($available[$i] == 'no')
                            <tr class="text-danger font-italic">
                            @else
                            <tr>
                            @endif
                                <td>{{ $oBook->idbooks }}</td>
                                <td>{{ $oBook->name }}</td>
                                <td>{{ $oBook->author }}</td>
                                <td>{{ $oBook->date }}</td>
                                <td>{{ $oBook->publisher }}</td>
                                @if($available[$i] == 'yes')
                                <td> <span class="text-success"> Disponible  </span></td>
                                @else
                                <td>No Disponible</td>                        
                                @endif      
                                @if($oBook->image == null)
                                    <td><button onclick="location.href='{{ route('abooks.edit', $oBook->idbooks)}}'" class="btn btn-light" style="cursor:pointer;" ><i class="fas fa-camera text-secondary"></i></button></td>      
                                @else
                                <td><button onclick="location.href='{{ route('abooks.edit', $oBook->idbooks)}}'" class="btn btn-success" style="cursor:pointer;" ><i class="fas fa-camera text-body"></i></button></td>
                                @endif
                            </tr>
                            <?php $i++; ?>   
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