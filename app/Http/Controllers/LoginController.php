<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('name','password'),$request->remember)){
            return back()->with('message', 'Credenciales Incorrectas')->withInput();
        }

        return redirect()->intended(route('fruit.index'));
        
    }

     // Cerrar sesión
     public function destroy() {
        auth()->logout();
        return redirect()->route('index');
    }
}
