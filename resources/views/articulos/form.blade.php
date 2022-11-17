
<label>Nombre</label></br>
<input type="text" name="Nombre" value="{{isset($articulo->Nombre)?$articulo->Nombre:''}}" id="Nombre" class="form-control"></br>

<label>Marca</label></br>
<input type="text" name="Marca" value="{{isset($articulo->Marca)?$articulo->Marca:''}}" id="Marca" class="form-control"></br>

<label>Modelo</label></br>
<input type="text" name="Modelo" value="{{isset($articulo->Modelo)?$articulo->Modelo:''}}" id="Modelo" class="form-control"></br>

<label>Numero de Serie</label></br>
<input type="text" name="NumSerie" value="{{isset($articulo->NumSerie)?$articulo->NumSerie:''}}" id="NumSerie" class="form-control"></br>

<label>Estado</label></br>
<input type="text" name="Estado" value="{{isset($articulo->Estado)?$articulo->Estado:''}}" id="Estado" class="form-control"></br>

<label>Ubicación</label></br>
<input type="text" name="Ubicacion" value="{{isset($articulo->Ubicacion)?$articulo->Ubicacion:''}}" id="Ubicacion" class="form-control"></br>

<label>Foto</label></br>
@if(isset($articulo->Foto))
<img src="{{asset('storage').'/'.$articulo->Foto}}" width="200" alt="">
@endif
<input type="file" name="Foto" value="" id="Foto" class="form-control"></br>

<input type="submit" value="Agregar Articulo" class="btn btn-success"></br>