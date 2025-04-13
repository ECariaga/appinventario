@extends('layouts.app')

@section('content')
    <h1>Detalle de Ubicación</h1>
    <p><strong>ID:</strong> {{ $ubicacion->id }}</p>
    <p><strong>Lugar:</strong> {{ $ubicacion->lugar }}</p>
    <a href="{{ route('ubicacion.index') }}">Volver</a>
@endsection
