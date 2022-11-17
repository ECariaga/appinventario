@extends('articulos.layout')
@section('content')

<div class="card">
  <div class="card-header">Articulos</div>
  <div class="card-body">

    <form action="{{ url('articulo') }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('articulos.form')
    </form>

  </div>
</div>
