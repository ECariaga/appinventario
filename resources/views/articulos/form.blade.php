
<div class="container">
    <div class="card">
    <div class="card-header"><h3>{{$modo}} Articulos</h3></div>
    <div class="card-body">
            @if(count($errors)>0)

                <div class="alert alert-danger" role="alert">
                    <strong>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    </strong>
                </div>
                
            @endif  
            <label>Nombre</label></br>
            <input type="text" name="Nombre" value="{{isset($articulo->Nombre)?$articulo->Nombre:old('Nombre')}}" id="Nombre" class="form-control"></br>

            <label>Marca</label></br>
            <input type="text" name="Marca" value="{{isset($articulo->Marca)?$articulo->Marca:old('Marca')}}" id="Marca" class="form-control"></br>

            <label>Modelo</label></br>
            <input type="text" name="Modelo" value="{{isset($articulo->Modelo)?$articulo->Modelo:old('Modelo')}}" id="Modelo" class="form-control"></br>

            <label>Numero de Serie</label></br>
            <input type="text" name="NumSerie" value="{{isset($articulo->NumSerie)?$articulo->NumSerie:old('NumSerie')}}" id="NumSerie" class="form-control"></br>

            <label>Cantidad</label></br>
            <input type="number" name="Cantidad" value="{{isset($articulo->Cantidad)?$articulo->Cantidad:old('Cantidad')}}" id="Cantidad" class="form-control"></br>

            <label>Estado</label></br>
            <select class="form-select" name="id_estado" id="id_estado">
                <option selected disabled value="">--Seleccione el Estado--</option>
                @foreach($estados as $estado)
                <option value="{{ $estado->id }}" @if (isset($articulo->id_estado) && $articulo->id_estado == $estado->id) selected @endif>{{$estado->descripcion}}</option>
                @endforeach
            </select>
            </br>

            <label>Ubicación</label></br>
            <input type="text" name="Ubicacion" value="{{isset($articulo->Ubicacion)?$articulo->Ubicacion:old('Ubicacion')}}" id="Ubicacion" class="form-control"></br>

            <label>Foto</label></br>
            @if(isset($articulo->Foto))
            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$articulo->Foto}}" width="200" alt="">
            @endif
            <input type="file" name="Foto" value="" id="Foto" class="form-control"></br>


            <input type="submit" value="{{$modo}} Articulo" class="btn btn-success">

            <a href="{{ url('/articulo/') }}" class="btn btn-success">Regresar</a>

    </div>
    </div>
</div>    