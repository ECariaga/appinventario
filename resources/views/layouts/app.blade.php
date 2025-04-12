<!DOCTYPE html>
<html>
<head>
    <title>App Inventario CACHS</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9">

<header>

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2b3864; height: 80px;">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/articulo') }}">Sistema de Inventario</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/articulo') }}">Inventario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/reportes') }}">Reportes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/lista-usuarios') }}">Usuarios</a>
            </li>
          </ul>

           <!--Lado derecho del Navbar -->
          <div class="mx-5 px-3">
              @if(auth()->check())

              <div class="dropdown-center dropdown">
                <button class="btn dropdown-toggle" style="background-color: #2b3864; border-color:#2b3864; color: #fff" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle mx-2" style="font-size: 1.5rem;"></i> {{ auth()->user()->name }}
                </button>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="{{ route('login.destroy')}}">Cerrar Sesión</a></li>
               </ul>
              </div>  
              @else
                <a href="{{route('login.index')}}">
                 <button type="button" class="btn btn-outline-light me-2">Iniciar Sesión</button>
                </a>
              
                <a href="{{route('registrarse.index')}}">
                 <button type="button" class="btn btn-primary active">Registrarse</button>
                </a>
              @endif

          </div>          
          
        </div>
      </div>
  </nav>

</header>
  
  
<div class="container-fluid">
    @yield('content')
</div>



<footer class="text-center text-white mt-auto" style="background-color:#2b3864;">
  <!-- Grid container -->
  <div class="container p-4"></div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="d-flex flex-row justify-content-center p-3 gap-2" style="background-color: rgba(0, 0, 0, 0.2);">
    <p>Copyright © {{date('Y')}}:</p>
    <a class="text-white" href="https://www.colegioauroradechilesur.cl/"> Colegio Aurora de Chile Sur</a>
  </div>
  <!-- Copyright -->
</footer>

@yield('js')
</body>
</html>

