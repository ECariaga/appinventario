@extends('articulos.layout')
@section('content')

<div class="container">
 <div class="py-3"> 
    <div class="card mb-3">
    <div class="card-header"><h3>Detalle del Artículo</h3></div>
      <div class="row g-0">
        <div class="col-md-4">
        <img src="{{asset('storage').'/'.$articulos->Foto }}" class="img-fluid rounded-start" alt=""><br>
        </div>
        <div class="col-md-8">
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
            <div class="py-3">
              <a href="{{ url('/articulo/') }}" class="btn btn-success btn-sm">Regresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>    
</div>