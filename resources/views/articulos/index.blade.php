@extends('articulos.layout')
@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Lista de Articulos</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/articulo/create') }}" class="btn btn-success btn-sm" title="Agregar Nuevo Articulo">
                <i class="fa fa-plus" aria-hidden="true"></i> Agregar Articulo
            </a>
            <br />
            <br />
            @forelse($articulos as $articulo)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>N° de Serie</th>
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $articulo->Nombre }}</td>
                            <td>{{ $articulo->Marca }}</td>
                            <td>{{ $articulo->Modelo }}</td>
                            <td>{{ $articulo->NumSerie }}</td>
                            <td>{{ $articulo->Estado }}</td>
                            <td>{{ $articulo->Ubicacion }}</td>
                            <td><img src="{{asset('storage').'/'.$articulo->Foto}}" width="200" alt=""></td>
                            <td>
                                <a href="{{ url('/articulo/' . $articulo->id) }}" title="Ver detalle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Detalle</button></a>
                                <a href="{{ url('/articulo/' . $articulo->id . '/edit') }}" title="Editar Articulo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                <form method="POST" action="{{ url('/articulo' . '/' . $articulo->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Artículo" onclick="return confirm('¿Estás seguro/a de que desea eliminar este articulo?')"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            @empty
            <div class="alert alert-info" role="alert">
                <h5>Actualmente no hay artículos registrados</h5>
            </div>
            @endforelse
        </div>
    </div>

@endsection