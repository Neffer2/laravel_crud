<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show (){
        if (Auth::check()){
            return redirect()->route('main_panel');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){

        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros datos.',
            ])->onlyInput('email');
 
        }

        return redirect()->route('main_panel')->with('success', "Bienvenido usuario");
 
    }

    public function logOut(Request $request){

        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect('/');
    }
} 

