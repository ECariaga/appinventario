<div class="container py-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">{{ $modo }} Artículo</h4>
        </div>
        <div class="card-body px-5">

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre del Artículo</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ej. Laptop Lenovo"
                    value="{{ isset($articulo->Nombre) ? $articulo->Nombre : old('Nombre') }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input type="text" name="Marca" id="Marca" class="form-control" placeholder="Ej. Dell, HP"
                        value="{{ isset($articulo->Marca) ? $articulo->Marca : old('Marca') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>
                    <input type="text" name="Modelo" id="Modelo" class="form-control" placeholder="Ej. Inspiron 15"
                        value="{{ isset($articulo->Modelo) ? $articulo->Modelo : old('Modelo') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="Cantidad" class="form-label">Cantidad Disponible</label>
                    <input type="number" name="Cantidad" id="Cantidad" class="form-control"
                        value="{{ isset($articulo->Cantidad) ? $articulo->Cantidad : old('Cantidad') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="id_estado" class="form-label">Estado</label>
                    <select class="form-select" name="id_estado" id="id_estado">
                        <option selected disabled value="">--Seleccione el Estado--</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" @if(isset($articulo->id_estado) && $articulo->id_estado == $estado->id) selected @endif>
                                {{ $estado->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="id_ubicacion" class="form-label">Ubicación</label>
                    <select class="form-select" name="id_ubicacion" id="id_ubicacion">
                        <option selected disabled value="">--Seleccione la Ubicación--</option>
                        @foreach($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->id }}" @if(isset($articulo->id_ubicacion) && $articulo->id_ubicacion == $ubicacion->id) selected @endif>
                                {{ $ubicacion->lugar }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="Foto" class="form-label">Foto del Artículo</label><br>
                @if(isset($articulo->Foto))
                    <img src="{{ asset('storage/' . $articulo->Foto) }}" alt="Foto del Artículo" class="img-thumbnail mb-3" width="200">
                @endif
                <input type="file" name="Foto" id="Foto" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save2 me-1"></i> {{ $modo }} Artículo
                </button>
                <a href="{{ url('/articulo') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Regresar
                </a>
            </div>

        </div>
    </div>
</div>
