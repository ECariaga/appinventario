<!DOCTYPE html>
<html>

<head>
    <title>Login App Inventario CACHS</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
</head>

<body style="background-color: #F4F6F9">
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema de Inventario</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Lado derecho del Navbar -->
                <div class="mx-5 px-3">

                    <a href="{{route('login.index')}}">
                        <button type="button" class="btn btn-outline-light me-2">Iniciar Sesión</button>
                    </a>

                    <a href="{{route('registrarse.index')}}">
                        <button type="button" class="btn btn-primary active">Registrarse</button>
                    </a>

                </div>

            </div>
        </nav>

    </header>
    <div class="container-fluid">
        @yield('content')
    </div>

</body>

</html>