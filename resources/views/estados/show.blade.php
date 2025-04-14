@extends('layouts.app')

@section('content')
    <h1>Detalle del Estado</h1>
    <p><strong>ID:</strong> {{ $estado->id }}</p>
    <p><strong>Descripción:</strong> {{ $estado->descripcion }}</p>
    <a href="{{ route('estados.index') }}">Volver</a>
@endsection
