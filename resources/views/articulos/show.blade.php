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
        <div class="col-md-4">
          <div class="card-body">
            <h5 class="card-title">Nombre : {{ $articulos->Nombre }}</h5>
            <p class="card-text">Marca : {{ $articulos->Marca }}</p>
            <p class="card-text">Modelo : {{ $articulos->Modelo }}</p>
            @if($articulos->NumSerie == null)
            <p class="card-text">N° Serie : Desconocido</p>
            @else
            <p class="card-text">N° Serie : {{ $articulos->NumSerie }}</p>
            @endif
            <p class="card-text" id='contador'>Cantidad : {{ $articulos->Cantidad }}</p>
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
        <div class="col-md-3 d-flex align-items-center">

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hola" id="myInput">
  Ver historial
</button>

<!-- Modal -->
<div class="modal fade" id="hola" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Historial de Artículo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <table id= "tabla_historial" class="table table-striped table table-bordered" style="width:100%">
      <thead class="table-dark">
        
        <tr>
          <th class="align-middle text-center">Fecha</th>
          <th class="align-middle text-center">Hora</th>
          <th class="align-middle text-center">Descripción</th>
          <th class="align-middle text-center">Cantidad</th>
        </tr>
      </thead>  
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>




          <button type="button" title="Aumentar cantidad" class="btn btn-primary btn-lg mx-1" onclick="cantidad(this)" value="aumentar">
            <i class="bi bi-plus-square-fill"></i>
          </button>
          <button type="button" title="Disminuir cantidad" class="btn btn-danger btn-lg mx-1" id='disminuir' onclick="cantidad(this)" value="disminuir">
            <i class="bi bi-dash-square-fill"></i>
          </button>

          <button type="button" title="Eliminar cantidad" class="btn btn-secondary btn-lg mx-1">
            <i class="bi bi-trash-fill"></i>
          </button>
        </div>
    
      </div>
    </div>
    </div>    
</div>
@endsection

   <!--modal -->
  <script>
    $("#hola").on('show.bs.modal',function(){
      $('#myInput').trigger('focus')
    })
  </script>

