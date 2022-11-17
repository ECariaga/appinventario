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
        $campos=[
            'Nombre'=>'required|string|max:100',
             'Marca'=>'required|string|max:100',
             'Modelo'=>'required|string|max:100',
             'NumSerie'=>'required|string|max:100',
             'Estado'=>'required|string|max:100',
             'Ubicacion'=>'required|string|max:100',
             'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=> 'El :attribute del artículo es obligatorio',
            'Marca.required'=>'La :attribute del artículo es obligatoria',
            'Ubicacion.required'=>'La :attribute del artículo es obligatoria',
            'Foto.required'=>'La foto es obligatoria',
        ];

        $this->validate($request, $campos,$mensaje);

        $datos = request()->except(['_token']);
        if ($request->hasFile('Foto')) {
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Articulo::create($datos);
        return redirect('articulo')->with('mensaje', 'Artículo agregado con éxito');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
             'Marca'=>'required|string|max:100',
             'Modelo'=>'required|string|max:100',
             'NumSerie'=>'required|string|max:100',
             'Estado'=>'required|string|max:100',
             'Ubicacion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=> 'El :attribute del artículo es obligatorio',
            'Marca.required'=>'La :attribute del artículo es obligatoria',
            'Ubicacion.required'=>'La :attribute del artículo es obligatoria',
            'Foto.required'=>'La foto es obligatoria',
        ];

        if ($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['Foto.required'=>'La foto es obligatoria',];
        } 

        $this->validate($request, $campos,$mensaje);

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
        $articulo = Articulo::findOrFail($id);

        if(Storage::delete('public/'.$articulo->Foto)){
            Articulo::destroy($id);
        }
        
        return redirect('articulo')->with('mensaje', 'Artículo eliminado con éxito');
    }
}
