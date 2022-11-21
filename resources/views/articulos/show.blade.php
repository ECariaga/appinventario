@extends('articulos.layout')
@section('content')
<div class="card">
  <div class="card-header"><h3>Ver Detalle</h3></div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Nombre : {{ $articulos->Nombre }}</h5>
        <p class="card-text">Marca : {{ $articulos->Marca }}</p>
        <p class="card-text">Modelo : {{ $articulos->Modelo }}</p>
        @if($articulos->NumSerie == null)
        <p class="card-text">N° Serie : Desconocido</p>
        @else
        <p class="card-text">N° Serie : {{ $articulos->NumSerie }}</p>
        @endif
        <p class="card-text">Cantidad : {{ $articulos->Cantidad }}</p>
        @foreach($estados as $estado)
          @if($articulos->id_estado == $estado->id)
            <p class="card-text">Estado : {{ $estado -> descripcion }}</p>
              @break
          @endif
        @endforeach
        <p class="card-text">Ubicación : {{ $articulos->Ubicacion }}</p>
        <img src="{{asset('storage').'/'.$articulos->Foto }}" width="200" alt=""><br>

        <a href="{{ url('/articulo/') }}" class="btn btn-success btn-sm">Regresar</a>
  </div>
      
    </hr>
  
  </div>

  
</div>