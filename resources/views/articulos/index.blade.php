@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="py-3">
    <div class="card">
        <div class="card-header">
            <h2>Lista de Artículos</h2>
        </div>

        <div class="card-body">

            @if(Session::has('mensaje'))
            <!--Si hay algun mensaje este de debe mostrar-->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('mensaje')}}
                <!--Para hacer desaparecer el alert-->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <a href="{{ url('/articulo/create') }}" class="btn btn-success btn-sm" title="Agregar Nuevo Articulo">
                <i class="fa fa-plus" aria-hidden="true"></i> Agregar Articulo
            </a>
            <br />
            <br />

            <div class="table-responsive">
                <table id="tabla_articulos" class="table table-striped table table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="align-middle text-center">#</th>
                            <th class="align-middle text-center">Nombre</th>
                            <th class="align-middle text-center">Marca</th>
                            <th class="align-middle text-center">Modelo</th>
                            <th class="align-middle text-center">N° de Serie</th>
                            <th class="align-middle text-center">Cantidad</th>
                            <th class="align-middle text-center">Estado</th>
                            <th class="align-middle text-center">Ubicación</th>
                            <th class="align-middle text-center">Foto</th>
                            <th class="align-middle text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($articulos as $articulo)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center">{{ $articulo->Nombre }}</td>
                            <td class="align-middle text-center">{{ $articulo->Marca }}</td>
                            <td class="align-middle text-center">{{ $articulo->Modelo }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    {!! DNS1D::getBarcodeHTML("$articulo->NumSerie",'PHARMA') !!}
                                    <span>p - {{ $articulo->NumSerie }}</span>
                                </div>
                            </td>
                            <td class="align-middle text-center">{{ $articulo->Cantidad }}</td>
                            @foreach($estados as $estado)
                            @if($articulo->id_estado == $estado->id)
                            <td class="align-middle text-center">{{ $estado -> descripcion }}</td>
                            @break
                            @endif
                            @endforeach
                            <td class="align-middle text-center">{{ $articulo->Ubicacion }}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center">

                                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$articulo->Foto}}" width="100" alt="">
                                    
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="container-fluid h-100">
                                    <div class="row w-100 align-items-center">

                                        <div class="col text-center">

                                            <a href="{{ url('/articulo/' . $articulo->id) }}" title="Ver detalle"><button class="btn btn-secondary btn-lg mx-1"><i class="bi bi-eye-fill"></i></button></a>
                                            <a href="{{ url('/articulo/' . $articulo->id . '/edit') }}" title="Editar Articulo"><button class="btn btn-primary btn-lg mx-1"><i class="bi bi-pencil-square"></i></button></a>

                                            <!-- Boton que despliega el Modal -->

                                            <button type="button" class="btn btn-danger btn-lg mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Eliminar Articulo"><i class="bi bi-trash-fill"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Artículo</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿ Estás seguro/a de que desea eliminar este artículo ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form method="POST" action="{{ url('/articulo' . '/' . $articulo->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-info" role="alert">
                            <h5>Actualmente no hay artículos registrados</h5>
                        </div>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

@section('js')



<script>
    $('#tabla_articulos').DataTable({
        responsive: true,

        "language": {
            "lengthMenu": "Mostrar _MENU_ artículos por pagina",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existen artículos que mostrar",
            "infoFiltered": "(filtrado de un total de _MAX_ artículos)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron coincidencias",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": ordenar columna de forma ascendente",
                "sortDescending": ": ordenar columna de forma descendente"
            }
        }

    });
</script>

@endsection




@endsection