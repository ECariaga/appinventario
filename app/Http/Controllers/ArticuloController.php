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

        Articulo::create($datos);
        return redirect('articulo')->with('mensaje', 'Artículo agregado con éxito');
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

        if ($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
           // $mensaje=['Foto.required'=>'La foto es obligatoria',];
        } 

        $this->validate($request, $campos,$mensaje);

        $datos = request()->except(['_token', '_method']);
        
        if ($request->hasFile('Foto')) {
            $articulo = Articulo::findOrFail($id);
            Storage::delete('public/'.$articulo->Foto);
            $datos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        $articulo = Articulo::findOrFail($id);
        //Articulo::where('id', '=', $id)->update($datos);
        
        //Metodo de Update Modificado para Audit
        $articulo->Nombre=$request->Nombre;
        $articulo->Marca=$request->Marca;
        $articulo->Modelo=$request->Modelo;
        $articulo->NumSerie=$request->NumSerie;
        $articulo->Cantidad=$request->Cantidad;
        $articulo->Ubicacion=$request->Ubicacion;
        $articulo->save();

        //return view('articulos.edit', compact('articulo'));
        return redirect('articulo')->with('mensaje', 'Artículo modificado con éxito');
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
