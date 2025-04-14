@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Reporte general -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Reporte General</h5>
                </div>
                <div class="card-body">
                    <p>Exporta un Excel con todos los artículos registrados hasta la fecha.</p>
                    <a href="{{ route('exportar.general') }}" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-download"></i> Exportar Todo
                    </a>
                </div>
            </div>
        </div>

        <!-- Reporte filtrado por ubicación -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Reporte por Ubicación</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('exportar.ubicacion') }}" method="GET">
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Seleccione una ubicación:</label>
                            <select class="form-select" name="ubicacion" id="ubicacion" required>
                                <option value="" selected disabled>-- Selecciona --</option>
                                @foreach($ubicaciones as $ubicacion)
                                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->lugar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-filter"></i> Exportar por Ubicación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
