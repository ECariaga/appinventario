@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">{{ isset($estado) ? 'Editar Estado' : 'Crear Estado' }}</h4>
        </div>
        <div class="card-body px-5 py-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form 
                action="{{ isset($estado) ? route('estados.update', $estado->id) : route('estados.store') }}" 
                method="POST">
                
                @csrf
                @if(isset($estado))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción del Estado</label>
                    <input 
                        type="text" 
                        name="descripcion" 
                        id="descripcion" 
                        class="form-control" 
                        placeholder="Ej. Disponible, Dañado, En Reparación"
                        value="{{ old('descripcion', isset($estado) ? $estado->descripcion : '') }}" 
                        required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save2 me-1"></i> {{ isset($estado) ? 'Actualizar' : 'Guardar' }}
                    </button>
                    <a href="{{ route('estados.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle me-1"></i> Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
