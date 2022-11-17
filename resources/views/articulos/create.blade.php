@extends('articulos.layout')
@section('content')

    <form action="{{ url('articulo') }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('articulos.form',['modo'=>'Agregar'])
    </form>

