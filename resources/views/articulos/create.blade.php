@extends('layouts.app')
@section('content')

    <form action="{{ secure_url('articulo') }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('articulos.form',['modo'=>'Agregar'])
    </form>
@endsection
