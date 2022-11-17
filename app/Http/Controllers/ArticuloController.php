<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{

    public function index()
    {

        $articulos = Articulo::all();
        return view('articulos.index')->with('articulos', $articulos);
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {
        $datos = request()->except(['_token']);
        if ($request->hasFile('Foto')) {
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Articulo::create($datos);
        return redirect('articulo')->with('mensaje', 'Articulo agregado');
    }

    public function show($id)
    {
        $articulo = Articulo::find($id);
        return view('articulos.show')->with('articulos', $articulo);
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.edit', compact('articulo'));
    }

    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        
        if ($request->hasFile('Foto')) {
            $articulo = Articulo::findOrFail($id);
            Storage::delete('public/'.$articulo->Foto);
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Articulo::where('id', '=', $id)->update($datos);
        $articulo = Articulo::findOrFail($id);

        return view('articulos.edit', compact('articulo'));
    }

    public function destroy($id)
    {
        Articulo::destroy($id);
        return redirect('articulo');
    }
}
