<!DOCTYPE html>
<html>
<head>
    <title>App Inventario CACHS</title>
    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    

</head>
<body>
<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Sistema de Inventario</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reportes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Usuarios</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</header>
  
  
<div class="container-fluid">
    @yield('content')
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

  <script>
/*
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
*/
</script>
  
</div>

@yield('js')

</body>
</html>