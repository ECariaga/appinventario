@extends('layouts.app')



@section('content')

<div class="container">
    <div class="py-3">
        <div class="card">
            <div class="card-header">
                <h2>Usuarios Registrados</h2>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="tabla_usuarios" class="table table-striped table table-bordered" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle text-center">Nombre</th>
                                <th class="align-middle text-center">Email</th>
                                <th class="align-middle text-center">Fecha de creación</th>
                                <th class="align-middle text-center">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($usuarios as $usuario)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">{{ $usuario->name }}</td>
                                <td class="align-middle text-center">{{ $usuario->email }}</td>
                                <td class="align-middle text-center">{{ $usuario->created_at->format('d-m-y | h:i:s')}}</td>
                                <td class="align-items-center">
                                    <div class="container-fluid h-100">
                                        <div class="row w-100 align-items-center">

                                            <div class="col text-center">

                                                <!-- Boton que despliega el Modal -->

                                                <button type="button" class="btn btn-danger btn-lg mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Eliminar Usuario"><i class="bi bi-trash-fill"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Usuario</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿ Estás seguro/a de que desea eliminar este usuario ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <form method="POST" action="{{ secure_url('/lista-usuarios' . '/' . $usuario->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                                    <button type="submit" class="btn btn-primary">Si, eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </tr>
                            @empty
                            <div class="alert alert-info" role="alert">
                                <h5>Actualmente no hay usuarios registrados</h5>
                            </div>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection