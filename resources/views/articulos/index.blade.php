@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('content')
<div class="container py-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="bi bi-archive-fill"></i> Lista de Artículos</h2>
        <a href="{{ url('/articulo/create') }}" title="Agregar Nuevo Artículo" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Agregar Artículo
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Tabla -->
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabla_articulos" class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>N° Serie</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articulos as $articulo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $articulo->Nombre }}</td>
                            <td>{{ $articulo->Marca }}</td>
                            <td>{{ $articulo->Modelo }}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    {!! DNS1D::getBarcodeHTML("$articulo->NumSerie", 'PHARMA') !!}
                                    <span class="small text-muted">p - {{ $articulo->NumSerie }}</span>
                                </div>
                            </td>
                            <td>{{ $articulo->Cantidad }}</td>
                            <td>{{ $estados->firstWhere('id', $articulo->id_estado)?->descripcion }}</td>
                            <td>{{ $ubicaciones->firstWhere('id', $articulo->id_ubicacion)?->lugar }}</td>
                            <td>
                                <img class="img-thumbnail" src="{{ asset('storage/' . $articulo->Foto) }}" width="80" alt="Foto del artículo">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center flex-row gap-2">
                                    <a href="{{ url('/articulo/' . $articulo->id) }}" title="Ver detalle" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ url('/articulo/' . $articulo->id . '/edit') }}" title="Editar Artículo" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- Botón eliminar -->
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $articulo->id }}" title="Eliminar Artículo">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                    <!-- Modal eliminar -->
                                    <div class="modal fade" id="modalEliminar{{ $articulo->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $articulo->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="modalLabel{{ $articulo->id }}">Confirmar Eliminación</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro/a de eliminar el artículo <strong>{{ $articulo->Nombre }} {{ $articulo->Marca }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form method="POST" action="{{ url('/articulo/' . $articulo->id) }}">
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
                        @empty
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-info m-0">Actualmente no hay artículos registrados.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#tabla_articulos').DataTable({
        responsive: true,
        language: {
            lengthMenu: "Mostrar _MENU_ artículos por página",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "No existen artículos para mostrar",
            infoFiltered: "(filtrado de un total de _MAX_ artículos)",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron coincidencias",
            paginate: {
                first: "Primera",
                last: "Última",
                next: "Siguiente",
                previous: "Anterior"
            },
            aria: {
                sortAscending: ": activar para ordenar ascendente",
                sortDescending: ": activar para ordenar descendente"
            }
        }
    });
</script>
@endsection
