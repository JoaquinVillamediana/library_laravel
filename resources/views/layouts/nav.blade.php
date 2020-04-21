<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/admin') }}">Biblioteca</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
@if(Auth::user()->type==1)
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Libros">
                <a class="nav-link" href="/admin/abooks/">
                <i class="fas fa-book-reader"></i>
                    <span class="nav-link-text">Libros</span>
                </a>
            </li>

        
        
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
                <a class="nav-link" href="/admin/users/">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-text">Usuarios</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registros">
                <a class="nav-link" href="/admin/records/">
                    <i class="fas fa-paste"></i>
                    <span class="nav-link-text">Registros</span>
                </a>
            </li>
@else
<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                <a class="nav-link" href="/usr/home">
                <i class="fas fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>

        
        
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil">
                <a class="nav-link" href="/usr/profile/">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-text">Mi Perfil</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Libros">
                <a class="nav-link" href="/usr/books/">
                <i class="fas fa-book"></i>
                    <span class="nav-link-text">Libros</span>
                </a>
            </li>
            @endif
            </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fas fa-sign-out-alt"></i>Logout</a>
            </li>
        </ul>

    </div>
</nav>