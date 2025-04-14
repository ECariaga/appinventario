@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">Configuración del Sistema</h1>
        <p class="lead">Desde aquí puedes administrar las ubicaciones y los estados de los artículos.</p>
        <p class="text-muted">Los estados ayudan a llevar un control preciso del inventario. Si necesitas asistencia, consulta la documentación o comunícate con soporte técnico.</p>
    </div>

    <div class="row g-4">
        <!-- Tarjeta de Ubicaciones -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0 rounded-4">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title mb-3">
                            <i class="bi bi-geo-alt-fill text-primary me-2"></i>Ubicaciones
                        </h4>
                        <p class="card-text text-muted">Gestiona las ubicaciones donde se encuentran los artículos. Puedes crear, editar o eliminar según sea necesario.</p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ url('/ubicacion') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Ver ubicaciones
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Estados -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0 rounded-4">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title mb-3">
                            <i class="bi bi-check2-square text-success me-2"></i>Estados
                        </h4>
                        <p class="card-text text-muted">Crea y administra los estados de los artículos para mejorar su seguimiento y control.</p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ url('/estados') }}" class="btn btn-outline-success w-100">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Ver estados
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
