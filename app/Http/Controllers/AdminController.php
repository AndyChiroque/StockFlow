<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    // GET /admin/users — lista de usuarios
    public function index(): View
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    // GET /admin/users/create — formulario
    public function create(): View
    {
        return view('admin.users.create');
    }

    // POST /admin/users — guardar
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,mid,low'],
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    // GET /admin/users/{user}/edit — formulario edición
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    // PUT /admin/users/{user} — actualizar
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:admin,mid,low'],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado.');
    }

    // DELETE /admin/users/{user} — eliminar
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado.');
    }
}