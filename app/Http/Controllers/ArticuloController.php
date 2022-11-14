<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    
    public function index()
    {
        $articulos = Articulo::all();
        return view ('articulos.index')->with('articulos',$articulos);
    }

    public function create()
    {
        return view ('articulos.create');
    }

    public function store(Request $request)
    {
        $datos = request()->all();
        Articulo::create($datos);
        return redirect('articulo')->with('mensaje','Articulo agregado');
    }

    public function show($id)
    {
        $articulo = Articulo::find($id);
        return view ('articulos.show')->with('articulos',$articulo);
    }

    public function edit($id)
    {
        $articulo = Articulo::find($id);
        return view ('articulos.edit')->with('articulos',$articulo);
    }

    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        $datos = request()->all();
        $articulo->update($datos);
        return redirect('articulo')->with('mensaje','Articulo actualizado');

    }

    public function destroy($id)
    {
        //
    }
}
