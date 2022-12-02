<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {

        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credenciales = $request->validate([
            'email'=>['required','email','string'],
            'password'=>['required','string']
        ]);

        $remember = request()->filled('remember');

        if(Auth::attempt($credenciales, $remember)){
            request()->session()->regenerate();
            return redirect()->to('/articulo');
        }

        throw ValidationException::withMessages([
            'email'=> 'Estas credenciales no coniciden con los registros'
        ]);
        
    }
   
    public function destroy(){
        auth()->logout();

        return redirect()->to('/login');
    }
}
