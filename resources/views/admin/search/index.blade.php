@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <h1 class="text-center  m-3">Buscador</h1>
        <div class="container">
            <form action="" method="post" id="searchForm" name="searchForm">
            @csrf
                <div class="form-group">
                    <p>Buscar por:</p>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="autor">
                        <input class="form-check-input " type="radio" name="type" value="author" id="" checked>Autor
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="nombre">
                        <input class="form-check-input " type="radio" name="type" value="name" id="">Nombre
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="editorial">
                        <input class="form-check-input " type="radio" name="type" value="publisher" id="">Editorial
                    </label>
                </div>
                <br><br>
                <div class="container w-25 m-0 p-0">
                    <input type="text" class="form-control" name="word" id="searchname">
                    <span id="nameError" style="display:none; color:red;">Ingrese el nombre del libro que desea buscar</span>
                </div>
                <br>

                <input class="btn btn-primary " type="submit" value="Buscar!">
            </form>
        
            @if(!empty($aSearchBooks))
            <br><br>
            <table class='table table-striped border'><thead><tr><th>ID</th><th>Nombre</th><th>Autor</th><th>Publicacion</th><th>Editorial</th></tr></thead><tbody>
            @foreach($aSearchBooks as $oSearchBook)
            <tr><td>{{$oSearchBook->idbooks}}</td><td>{{$oSearchBook->name}}</td><td>{{$oSearchBook->author}}</td><td>{{$oSearchBook->date}}</td><td>{{$oSearchBook->publisher}}</td></tr>
            
            @endforeach
            </tbody></table>
            @endif
        </div>
        
        
   
    </div>

    <script>
    const csrf_token = "{{ csrf_token() }}";
    </script>

@endsection