@extends('articulos.layout')
@section('content')

<div class="card">
  <div class="card-header">Articulos</div>
  <div class="card-body">
      
      <form action="{{ url('articulo') }}" method="post">
        {!! csrf_field() !!}
        <label>Nombre</label></br>
        <input type="text" name="Nombre" id="Nombre" class="form-control"></br>
        <label>Marca</label></br>
        <input type="text" name="Marca" id="Marca" class="form-control"></br>
        <label>Modelo</label></br>
        <input type="text" name="Modelo" id="Modelo" class="form-control"></br>
        <label>Numero de Serie</label></br>
        <input type="text" name="NumSerie" id="NumSerie" class="form-control"></br>
        <label>Estado</label></br>
        <input type="text" name="Estado" id="Estado" class="form-control"></br>
        <label>Ubicación</label></br>
        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control"></br>
        <label>Foto</label></br>
        <input type="text" name="Foto" id="Foto" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop