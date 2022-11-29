@extends('layouts.inicio')

@section('title','Login')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center my-5 p-5 shadow-lg">
               
                <div class="card-body">
                
                    <form class="mt-4" method="POST" action="">
                    <h5 class="h3 mb-3 pb-3 fw-normal">Inicio de Sesión</h5>
                        @csrf
                        <div class="form-group form-floating mb-3">
                          <input type="text" class="form-control" name="username" value="" placeholder="Correo" required="required" autofocus>
                          <label for="floatingName">Correo</label>
                       </div>

                       <div class="form-group form-floating mb-3">
                          <input type="password" class="form-control" name="username" value="" placeholder="Contraseña" required="required" autofocus>
                          <label for="floatingName">Contraseña</label>
                       </div>
                        @error('message')
                        <div class="alert alert-danger" role="alert">
                         * {{$message}}
                        </div>
                        @enderror
                       <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
                       <p class="mt-5 mb-3 text-muted">&copy; {{date('Y')}}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection