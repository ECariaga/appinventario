@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="bi bi-geo-alt-fill"></i> Lista de Ubicaciones</h2>
        <a href="{{ route('ubicacion.create') }}" title="Agregar Nueva Ubicación" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Nueva ubicación
        </a>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <table id="tabla_ubicacion" class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Lugar</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ubicaciones as $ubicacion)
                        <tr>
                            <td>{{ $ubicacion->id }}</td>
                            <td>{{ $ubicacion->lugar }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('ubicacion.edit', $ubicacion) }}" class="btn btn-outline-primary btn-sm" title="Editar Ubicación">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $ubicacion->id }}" title="Eliminar Ubicación">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEliminar{{ $ubicacion->id }}" tabindex="-1" aria-labelledby="modalEliminarLabel{{ $ubicacion->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="modalEliminarLabel{{ $ubicacion->id }}">Eliminar Ubicación</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro/a de eliminar la ubicación: <strong>{{ $ubicacion->lugar }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ url('/ubicacion/' . $ubicacion->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
