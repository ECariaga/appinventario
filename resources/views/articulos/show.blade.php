@extends('articulos.layout')
@section('content')
<div class="card">
  <div class="card-header">Ver Detalle</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Nombre : {{ $articulos->Nombre }}</h5>
        <p class="card-text">Marca : {{ $articulos->Marca }}</p>
        <p class="card-text">Modelo : {{ $articulos->Modelo }}</p>
        <p class="card-text">N° Serie : {{ $articulos->NumSerie }}</p>
        <p class="card-text">Estado : {{ $articulos->Estado }}</p>
        <p class="card-text">Ubicación : {{ $articulos->Ubicacion }}</p>
  </div>
      
    </hr>
  
  </div>

  
</div>