@extends('layouts.inicio')

@section('title','Registrarse')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center my-5 p-5 shadow-lg">
               
                <div class="card-body">
                
                    <form class="mt-4" method="post" action="">
                    <h5 class="h3 mb-3 pb-3 fw-normal">Registrarse</h5>
                        @csrf
                        <div class="form-group form-floating mb-3">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required="required" autofocus>
                          <label for="floatingName">Nombre</label>
                       </div>
                       @error('name')
                        <div class="alert alert-danger" role="alert">
                         * {{$message}}
                        </div>
                        @enderror 
                        <div class="form-group form-floating mb-3">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required="required" autofocus>
                          <label for="floatingName">Correo</label>
                       </div>
                       @error('email')
                        <div class="alert alert-danger" role="alert">
                         * {{$message}}
                        </div>
                        @enderror 
                       <div class="form-group form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required="required" autofocus>
                          <label for="floatingName">Contraseña</label>
                       </div>
                       @error('password')
                        <div class="alert alert-danger" role="alert">
                         * {{$message}}
                        </div>
                        @enderror 
                       <div class="form-group form-floating mb-3">
                          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar_pass" required="required" autofocus>
                          <label for="floatingName">Confirmar Contraseña</label>
                       </div>
                      
                       <button class="w-100 btn btn-lg btn-primary" type="submit">Crear cuenta</button>
                       <p class="mt-5 mb-3 text-muted">&copy; {{date('Y')}}</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection