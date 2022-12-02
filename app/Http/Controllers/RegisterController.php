<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {

        return view('auth.register');
    }

    /*
    public function store(){

        $this->validate(request(),[
            'name'=> 'required',
            'email'=> 'required|email|unique',
            'password'=> 'required|confirmed',
        ]);
        $user = User::create(request(['name','email','password']));

        auth()->login($user);
        return redirect()->to('/articulo');
    }
    */
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/login')->with('success','Usuario registrado con éxito');
    }
}
