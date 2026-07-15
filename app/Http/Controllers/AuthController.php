<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // GET /login
    public function showLogin(): View
    {
        return view('auth.login');
    }

     // POST /login
    public function login(Request $request): RedirectResponse
    {
        // Paso 1: validar que email y password estén presentes y con formato
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Paso 2: intentar autenticar. Auth::attempt busca el usuario,
        // verifica el password hasheado. Si coincide, inicia sesión.
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();  // previene session fixation
            return redirect()->intended('/dashboard');
        }

        // Paso 3: si falla, volver al formulario con mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ])->onlyInput('email');  // solo rellena el campo email, no el password
    }

    // GET /register
    public function showRegister(): View
    {
        return view('auth.register');
    }

    // POST /register
    public function register(Request $request): RedirectResponse
    {
        // Paso 1: validar todos los campos
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],  // unique:users = no puede repetirse
            'password' => ['required', 'min:8', 'confirmed'],   // confirmed = busca password_confirmatio
        ]);

        $validated['role'] = 'low';  // asignar rol por defecto

        // Paso 2: crear el usuario. El password se hashea solo (cast 'hashed' en User.php)
        $user = User::create($validated);

        // Paso 3: iniciar sesión con el nuevo usuario
        Auth::login($user);

        return redirect('/dashboard');
    }

    // POST /logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();                          // cierra sesión
        $request->session()->invalidate();       // borra datos de sesión
        $request->session()->regenerateToken();  // regenera token CSRF

        return redirect('/login');
    }

}
