@extends('layouts.app')

@section('content')

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
                <a class="createButton ml-5" href="{{ route('users.create')}}">@include('admin.widgets.button',
                    array('class'=>'primary', 'value'=>'Agregar'))</a>
            </div>
            @if(!empty($aData))
            {{var_dump($aData)}}
            @endif
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
                            @if(!empty($aUsers))
                            @foreach($aUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name . " " . $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->type == 1)
                                <td>-</td>
                                @else
                            <td><img src="/uploads/profile/{{$user->image}}" style="width:50px;margin:0 auto;" alt=""></td>
                                @endif

                                @if($user->type == 1)
                                <td>Adm.</td>
                                @else
                                <td>Usr.</td>
                                @endif
                                @if($user->type ==1)
                                <td>-</td>
                                @else
                                <td>{{$user->DNI}}</td>
                                @endif
                                @if($user->type == 1)
                                <td>-</td>
                                @else
                                <td>{{$user->actual_books}}</td>
                                @endif
                                <td>{{ date("d/m/Y H:i:s", strtotime( $user->created_at ))}}</td>

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