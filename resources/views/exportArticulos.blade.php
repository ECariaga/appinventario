<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>N° Serie</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Ubicación</th>
        </tr>
    </thead>
    @foreach($articulo as $art)
    <tbody>
        <tr>
            <td>{{ $art->Nombre }}</td>
            <td>{{ $art->Marca }}</td>
            <td>{{ $art->Modelo }}</td>
            <td>{{ $art->NumSerie }}</td>
            <td>{{ $art->Cantidad }}</td>
            
            @foreach($estados as $estado)
            @if($art->id_estado == $estado->id)
            <td>{{ $estado -> descripcion }}</td>
            @break
            @endif
            @endforeach

            @foreach($ubicaciones as $ubicacion)
            @if($art->id_ubicacion == $ubicacion->id)
            <td>{{ $ubicacion -> lugar }}</td>
            @break
            @endif
            @endforeach
            
        </tr>

    </tbody>
    @endforeach
</table>