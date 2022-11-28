@extends('layouts.app')
@section('content')

<form action="{{url('/articulo/'.$articulo->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}   
@include('articulos.form',['modo'=>'Editar'])
</form>
@endsection