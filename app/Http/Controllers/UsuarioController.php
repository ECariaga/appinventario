<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $datosuser['usuarios'] = User::paginate(100);
       
        return view('usuarios.index', $datosuser);
    }

    public function destroy($id)
    {
        User::findOrFail($id);
        User::destroy($id);
 
        return redirect('lista-usuarios')->with('mensaje', 'Usuario eliminado con éxito');
    }
}
