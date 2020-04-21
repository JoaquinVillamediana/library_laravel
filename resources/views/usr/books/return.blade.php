
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('books.index') }}">Libros</a>
            </li>
            <li class="breadcrumb-item active">Devolucion de Libro</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Libros
                <a class="createButton ml-5" href="{{ route('books.index')}}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Retirar'))</a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                        
                            <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id Retiro</th>
                                <th>Libro</th>                                
                                <th>Fecha de Retiro</th>
                                <th>Fecha de Devolucion Max.</th>
                                <th>Devolver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($aRecords))
                            @foreach($aRecords as $oRecord)
                            <tr>
                                <td>{{ $oRecord->recordid }}</td>
                                <td>{{ $oRecord->bookid }}</td>
                                <td>{{date("d/m/Y H:i:s", strtotime( $oRecord->dateRecord )) }}</td>
                                <?php $estimateddate=date("Y-m-d H:i:s", strtotime($oRecord->dateRecord."+1 week"))?>
                                <td>{{date("d/m/Y H:i:s", strtotime( $estimateddate ))}}</td>
                                <form method="POST" action="{{ route('books.update',$oRecord->recordid) }}" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <td><button type="submit" class="btn btn-primary" style="cursor:pointer;" ><i class="fas fa-exchange-alt"></i></button></td>      
                                </form>                          
                            </tr>
                            
                            @endforeach
                            
                            
                            @endif
                        </tbody>
                    </table>
                        
                    
                </div>
                <br /><br />
            </div>
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


<script>

    $(document).ready(function () {




    });
        

</script>
<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>

@endsection