@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-3">

        <div class="card">
            <h2 class="card-header">Generar reporte</h2>
            <div class="card-body">
                <h5 class="card-title">Reporte general</h5>
                <p class="card-text">Se generará un reporte que contenga todos los artículos registrados hasta la fecha.</p>
                <a href="{{route('exportar')}}" class="btn btn-primary btn-lg">Exportar</a>
            </div>
        </div>

    </div>
</div>
@endsection