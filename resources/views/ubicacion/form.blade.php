@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">{{ isset($ubicacion) ? 'Editar Ubicación' : 'Crear Ubicación' }}</h4>
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
                action="{{ isset($ubicacion) ? route('ubicacion.update', $ubicacion->id) : route('ubicacion.store') }}" 
                method="POST">
                
                @csrf
                @if(isset($ubicacion))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="lugar" class="form-label">Nombre de la Ubicación</label>
                    <input 
                        type="text" 
                        name="lugar" 
                        id="lugar" 
                        class="form-control" 
                        placeholder="Ej. Bodega Central, Laboratorio 2"
                        value="{{ old('lugar', isset($ubicacion) ? $ubicacion->lugar : '') }}" 
                        required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save2 me-1"></i> {{ isset($ubicacion) ? 'Actualizar' : 'Guardar' }}
                    </button>
                    <a href="{{ route('ubicacion.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle me-1"></i> Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
