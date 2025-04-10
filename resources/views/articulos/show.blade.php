@extends('layouts.app')
@section('content')

<div class="container">
  <div class="py-3">
    <div class="card mb-3">
      <div class="card-header">
        <h3>Detalle del Artículo</h3>
      </div>
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
            <div class="card-text">
              <p>N° Serie :</p>
              <div class="d-flex flex-column justify-content-center align-items-center">
                 {!! DNS1D::getBarcodeHTML("$articulo->NumSerie",'PHARMA') !!}
                  <span>p - {{ $articulo->NumSerie }}</span>
              </div>
            </div>
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
              <a href="{{ secure_url('/articulo/') }}" class="btn btn-success btn-sm">Regresar</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hola" id="myInput">
            <i class="bi bi-clock"></i> Ver historial
          </button>

          <!-- Modal -->
          <div class="modal fade" id="hola" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Historial de Artículo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <table id="tabla_historial" class="table table-striped table table-bordered" style="width:100%">
                    <thead class="table-dark">

                      <tr>
                        <th class="align-middle text-center">Usuario</th>
                        <th class="align-middle text-center">Evento Realizado</th>
                        <th class="align-middle text-center">Valores Nuevos</th>
                        <th class="align-middle text-center">Fecha de Actualización</th>
                        <th class="align-middle text-center">Hora de Actualización</th>
                      </tr>
                    </thead>
                    <tbody>

                      <ul>

                        @forelse ($audits as $audit)
                        @if($audit->auditable_id == $articulo->id)
                        <tr>
                          @if($audit->user_id == null)
                          <td class="align-middle text-center">Desconocido</td>
                          @else

                          @foreach($users as $user)
                          @if($audit->user_id == $user->id)
                          <td class="align-middle text-center">{{$user->name}}</td>
                          @endif
                          @endforeach

                          @endif

                          @switch($audit->event)
                          @case('created')
                          <td class="align-middle text-center">Creado</td>
                          @break
                          @case('updated')
                          <td class="align-middle text-center">Actualizado</td>
                          @break
                          @case('deleted')
                          <td class="align-middle text-center">Eliminado</td>
                          @break
                          @case('restored')
                          <td class="align-middle text-center">Restaurado</td>
                          @break
                          @endswitch

                          <td class="align-middle">
                            <ul class="list-unstyled text-start m-0">
                              @foreach(json_decode($audit->new_values, true) as $key => $value)
                                @if($key !== 'id')
                                  @if($key === 'Foto')
                                  <li><strong>Imagen:</strong><br>
                                    <img src="{{ asset('storage/' . $value) }}" alt="Imagen" width="80">
                                  </li> 
                                  @elseif($key === 'id_estado')
                                    @php
                                        $estadoNombre = $estados->firstWhere('id', $value)->descripcion ?? 'Desconocido';
                                    @endphp
                                    <li><strong>Estado:</strong> {{ $estadoNombre }}</li>
                                    
                                  @else
                                  <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
                                  @endif
                                @endif
                                
                              @endforeach
                            </ul>
                          </td>
                          <td class="align-middle text-center">{{ $audit->updated_at->format('d-m-y')}}</td>
                          <td class="align-middle text-center">{{ $audit->updated_at->format('h:i:s')}}</td>
                        </tr>
                        @endif
                        @empty
                        <h3>No existe un historial del articulo</h3>
                        @endforelse


                      </ul>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
@endsection

<!--modal -->
<script>
  $("#hola").on('show.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>