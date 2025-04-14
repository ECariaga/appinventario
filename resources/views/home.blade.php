@extends('layouts.inicio')

@section('title','Home')
@section('content')

    <div class="container text-center py-5">
        <img src="{{ asset('img/logo-cachs.png') }}" alt="Logo Colegio" style="max-width: 150px;" class="mb-4">

        <h1 class="mb-3">Sistema de Inventario</h1>
        <h4 class="text-muted mb-4">Colegio Aurora de Chile Sur - Chiguayante</h4>

        <p class="lead mb-5">
            Bienvenido al sistema de gestión de inventario del Colegio. Aquí podrás registrar, editar y hacer seguimiento de los materiales y recursos escolares de manera eficiente.
        </p>

        
    </div>
@endsection