<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use App\Models\Articulo;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicacion.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lugar' => 'required|string|max:255',
        ]);

        Ubicacion::create($request->all());
        return redirect()->route('ubicacion.index')->with('success', 'Ubicación creada con éxito.');
    }

    public function edit(Ubicacion $ubicacion)
    {
        return view('ubicacion.edit', compact('ubicacion'));
    }

    public function update(Request $request, Ubicacion $ubicacion)
    {
        // Validar que la ubicación no esté asociada a ningún artículo
        if ($ubicacion->articulos()->exists()) {
            return redirect()->route('ubicacion.index')->with('error', 'No se puede actualizar la ubicación porque está asociada a un artículo.');
        }
        
        // Validar que el campo 'lugar' no esté vacío y tenga un máximo de 255 caracteres
        $request->validate([
            'lugar' => 'required|string|max:255',
        ]);
        // Actualizar la ubicación
        $ubicacion->update($request->all());
        return redirect()->route('ubicacion.index')->with('success', 'Ubicación actualizada.');
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        // Verificar si hay algún artículo asociado a esta ubicación
        $existeArticulo = Articulo::where('id_ubicacion', $ubicacion->id)->exists();
        if ($existeArticulo) {
            return redirect()->route('ubicacion.index')->with('error', 'No se puede eliminar la ubicación porque está asociada a un artículo.');
        }
       
        // Eliminar la ubicación
        $ubicacion->delete();
        return redirect()->route('ubicacion.index')->with('success', 'Ubicación eliminada.');
    }

}
