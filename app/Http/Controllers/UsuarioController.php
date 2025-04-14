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
        $user = User::findOrFail($id);
        
        if($user->role == 'admin') {
            return redirect('lista-usuarios')->with('error', 'No se puede eliminar un usuario administrador');
        }
        
        $user->delete();
 
        return redirect('lista-usuarios')->with('success', 'Usuario eliminado con éxito');
    }
}
