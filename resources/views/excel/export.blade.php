@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-3">
        <h1>Reportes</h1>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reporte general</h5>
                        <p class="card-text">Se generará un reporte que contenga todos los artículos registrados.</p>
                        <a href="{{route('exportar')}}" class="btn btn-primary">Exportar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection