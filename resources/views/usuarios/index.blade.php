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
                                    <div class="d-flex ">

                                        <form method="POST" action="{{ url('/lista-usuarios' . '/' . $usuario->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger mx-1" title="Eliminar Usuario" onclick="return confirm('¿Estás seguro/a de que desea eliminar este usuario ?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>

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