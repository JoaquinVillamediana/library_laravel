@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Libros</a>
            </li>
            <li class="breadcrumb-item active">Retiro de Libros</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Libros
                <a class="createButton ml-5" href="{{ route('books.create')}}">@include('admin.widgets.button', array('class'=>'primary', 'value'=>'Devolver'))</a>
                
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                <form method="post" action="{{ route('books.store') }}" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Portada</th>                                
                                <th>Autor</th>
                                <th>Fecha Publicacion</th>
                                <th>Editorial</th>
                                <th>Retirar</th>
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
                                <?php $id =  $oBook->idbooks?>
                                <td>{{ $oBook->name }}</td>
                                @if($oBook->image != NULL)
                                <td><img style="width:50px;margin:0 auto;" src="/uploads/books/{{ $oBook->image }}" alt=""></td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $oBook->author }}</td>
                                <td>{{ $oBook->date }}</td>
                                <td>{{ $oBook->publisher }}</td>
                                @if($available[$i] == 'yes')
                                @if($actualbooks>=5)
                                <td class="text-secondary">Ya posees 5 libros</td>
                                @else
                                <form method="POST" action="{{ route('books.store') }}" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="POST">
                                <input id="book_id" name="book_id" type="hidden" value="{{ $oBook->idbooks }}">
                                <td><button type="submit" class="btn btn-primary" style="cursor:pointer;" ><i class="fas fa-reply"></i></button></td>      
                                </form>                
                                @endif
                                @else
                                <td>No Disponible</td>                        
                                @endif                                
                            </tr>
                            <?php $i++; ?>   
                            @endforeach
                            
                            @endif
                        </tbody>
                    </table>
                    </form>
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