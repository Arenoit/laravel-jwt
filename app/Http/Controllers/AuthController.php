<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            Toastr::error('Usuario no encontrado');
            return back()->withInput();
        }

        if (!\Hash::check($credentials['password'], $user->password)) {
            Toastr::error('Contraseña incorrecta');
            return back()->withInput();
        }

        if (!$token = JWTAuth::attempt($credentials)) {
            Toastr::error('Credenciales inválidas');
            return back()->withInput();
        }
    }
    public function register(Request $request) 
    {
        $credentials = $request->only('name', 'email', 'password');

        // Verificar si ya existe el usuario
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            // Crear el usuario manualmente con datos estáticos
            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']), // Ya está hasheada
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Intentar login con las credenciales
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
    }
}
