@extends('layouts.inicio')

@section('title','Login')
@section('content')

<div class="card text-center mx-auto my-5 p-5 border border-gray rounded-lg shadow-lg" style="width: 18rem;">
  <div class="card-body">
    <h3 class="text-center fw-bold">Login</h3>
    <form class="mt-4" method="POST" action="">
        <input type="email" class="border border-gray form-rounded" placeholder="Ingrese su correo">
    </form>
  </div>
</div>

@endsection