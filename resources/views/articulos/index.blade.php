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
                <table id= "tabla_articulos" class="table table-striped table table-bordered" style="width:100%">
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
                            <td class="align-middle text-center">{{ $articulo->NumSerie }}</td>
                            <td class="align-middle text-center">{{ $articulo->Cantidad }}</td>
                             @foreach($estados as $estado)
                                 @if($articulo->id_estado == $estado->id)
                                    <td class="align-middle text-center">{{ $estado -> descripcion }}</td>
                                    @break
                                 @endif
                             @endforeach
                            <td class="align-middle text-center">{{ $articulo->Ubicacion }}</td>
                            <td class="align-middle"><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$articulo->Foto}}" width="200" alt=""></td>
                            <td class="align-middle">
                            <div class="d-flex">
                                
                                        <a href="{{ url('/articulo/' . $articulo->id) }}" title="Ver detalle"><button class="btn btn-secondary mx-1"><i class="bi bi-eye-fill"></i></button></a>
                                        <a href="{{ url('/articulo/' . $articulo->id . '/edit') }}" title="Editar Articulo"><button class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></button></a>
                                        <form method="POST" action="{{ url('/articulo' . '/' . $articulo->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger mx-1" title="Eliminar Artículo" onclick="return confirm('¿Estás seguro/a de que desea eliminar este articulo?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                            
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
            responsive:true,

            "language":{
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