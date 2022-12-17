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
            <td>{{ $art->id_estado }}</td>
            <td>{{ $art->Ubicacion }}</td>
        </tr>

    </tbody>
    @endforeach
</table>