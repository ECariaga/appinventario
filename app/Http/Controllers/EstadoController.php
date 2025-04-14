<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Articulo;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        $estado = Estado::all();
        return view('estados.index', compact('estado'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        Estado::create($request->all());
        return redirect()->route('estados.index')->with('success', 'Estado creado con éxito.');
    }

    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, Estado $estado)
    {
       
        // Validar que el estado no esté asociado a ningún artículo
        if ($estado->articulos()->exists()) {
            return redirect()->route('estados.index')->with('error', 'No se puede actualizar el estado porque está asociado a un artículo.');
        }
        // Actualizar el estado
        $request->validate([
            'descripcion' => 'required|string|max:50',
        ]);
        $estado->update($request->all());
        return redirect()->route('estados.index')->with('success', 'Estado actualizado.');
    }

    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
    
        // Verificar si hay algún artículo asociado a este estado
        $existeArticulo = Articulo::where('id_estado', $estado->id)->exists();
    
        if ($existeArticulo) {
            return redirect()->route('estados.index')->with('error', 'No se puede eliminar el estado porque está asociado a un artículo.');
        }
    
        // Eliminar el estado si no está en uso
        $estado->delete();
    
        return redirect()->route('estados.index')->with('success', 'Estado eliminado correctamente.');
    }
    
}
