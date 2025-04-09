<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Estado;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{

    public function index()
    {

        //$articulos = Articulo::all();
        $datosart['articulos'] = Articulo::paginate(100);
        $estados = Estado::all();
        //return view('articulos.index')->with('articulos', $articulos);
        return view('articulos.index', $datosart, compact('estados'));
    }

    public function create()
    {
        $estados = Estado::all();
        //return view('articulos.create');
        return view('articulos.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $campos=[
            'id_estado'=>'required|int|',
            'Nombre'=>'required|string|max:100',
             'Marca'=>'required|string|max:100',
             'Modelo'=>'required|string|max:100',
             'NumSerie'=>'nullable|string|max:100',
             'Cantidad'=>'required|int',
             'Ubicacion'=>'required|string|max:100',
             'Foto'=>'max:10000|mimes:jpg,jpeg,png',
        ];

        $mensaje=[
            'required'=> 'El :attribute del artículo es obligatorio',
            'id_estado.required'=> 'El estado del artículo es obligatorio',
            'Marca.required'=>'La :attribute del artículo es obligatoria',
            'Cantidad.required'=>'La :attribute que hay del artículo es obligatoria',
            'Ubicacion.required'=>'La :attribute del artículo es obligatoria',
            'Foto.required'=>'La foto es obligatoria',
        ];

        $this->validate($request, $campos,$mensaje);

        $estados = Estado::all();
        $datos = request()->except(['_token']);

        if ($request->hasFile('Foto')) {
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }else {
            $datos['Foto'] = 'default/default_image.png';
        }

        $number = mt_rand(1000000000,9999999999);
        //Verifica si el número de serie ya existe, si existe genera otro número
        if($this->numArticulo($number)){
            $number = mt_rand(1000000000,9999999999);
        }
        $datos['NumSerie'] = $number;

        Articulo::create($datos);
        return redirect('articulo')->with('mensaje', 'Artículo agregado con éxito');
    }

    public function numArticulo($number){
        return Articulo::where('NumSerie', $number)->exists();
    }

    public function show($id)
    {
        $users = User::all();
        $estados = Estado::all();
        $articulo = Articulo::findOrFail($id);
        $audits = Audit::all(); //para mostrar los audits
        //return view('articulos.show')->with('articulos', $articulo);
        return view('articulos.show', compact('articulo','estados','users','audits'))->with('articulos', $articulo);
    }

    public function edit($id)
    {
        $estados = Estado::all();
        
        $articulo = Articulo::findOrFail($id);
        return view('articulos.edit', compact('articulo','estados'));
    }

    public function updateCategoria(Request $request, $id)
    {
        $detalle = request()->except(['_token', '_method']);
        Articulo::where('id','=',$id)->update($detalle);
        $articulo = Articulo::findOrFail($id);
        return redirect('articulo.show')->with('mensaje', 'Artículo modificado con éxito');
    }

    public function update(Request $request, $id)
    {
        $estados = Estado::all();

        $campos=[
            'id_estado'=>'required|int|',
            'Nombre'=>'required|string|max:100',
             'Marca'=>'required|string|max:100',
             'Modelo'=>'required|string|max:100',
             'NumSerie'=>'nullable|string|max:100',
             'Cantidad'=>'required|int',
             'Ubicacion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=> 'El :attribute del artículo es obligatorio',
            'id_estado.required'=> 'El estado del artículo es obligatorio',
            'Marca.required'=>'La :attribute del artículo es obligatoria',
            'Cantidad.required'=>'La :attribute que hay del artículo es obligatoria',
            'Ubicacion.required'=>'La :attribute del artículo es obligatoria',
            //'Foto.required'=>'La foto es obligatoria',
        ];

        if ($request->hasFile('Foto')) {
            $campos['Foto'] = 'max:10000|mimes:jpg,jpeg,png';
        }
    
        $this->validate($request, $campos, $mensaje);
    
        $articulo = Articulo::findOrFail($id);
    
        // Guardamos datos actuales para comparar luego
        $original = $articulo->getOriginal();
    
        // Solo actualizamos si algo cambió
        $datos = $request->only([
            'id_estado', 'Nombre', 'Marca', 'Modelo', 'NumSerie', 'Cantidad', 'Ubicacion'
        ]);
    
        foreach ($datos as $key => $value) {
            if ($articulo->$key != $value) {
                $articulo->$key = $value;
            }
        }
    
        // Si se cargó nueva foto, actualizamos
        if ($request->hasFile('Foto')) {
            if ($articulo->Foto && $articulo->Foto != 'default/default_image.png') {
                Storage::delete('public/' . $articulo->Foto);
            }
            $articulo->Foto = $request->file('Foto')->store('uploads', 'public');
        }
    
        // Solo guardamos si hay cambios
        if ($articulo->isDirty()) {
            $articulo->save();
            return redirect('articulo')->with('mensaje', 'Artículo actualizado con cambios');
        }
    
        return redirect('articulo')->with('mensaje', 'No hubo cambios en el artículo');
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);

        // Verifica si la foto no es la por defecto antes de eliminarla
        if ($articulo->Foto && $articulo->Foto != 'default/default_image.png') {
            Storage::delete('public/' . $articulo->Foto);
        }
        
        Articulo::destroy($id);
        
        return redirect('articulo')->with('mensaje', 'Artículo eliminado con éxito');
    }
}
