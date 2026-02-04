<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        
        // Verificar permiso
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para ver usuarios.');
        }

        $c_usuarios = User::all();
        //dd($users);
        //$c_usuarios = User::with('permisoUsuario')->get();
        return inertia('Promociones/catalogos/Permisos', compact('c_usuarios'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para crear usuarios.');
        }

        return inertia('Promociones/catalogos/Usuarios_form');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para crear usuarios.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario' => 'required|in:administrador,supervisor,capturista',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'Este email* ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'tipo_usuario.required' => 'El tipo de usuario es obligatorio.',
        ]);

        //dd( $validated );
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipo_usuario' => $validated['tipo_usuario'],
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Show the form for editing a user.
     */
    public function edit(User $user)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para editar usuarios.');
        }

        return inertia('Promociones/catalogos/Usuarios_form', [
            'c_usuario' => $user,
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para editar usuarios.');
        }

        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario' => 'required|in:administrador,supervisor,capturista',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'Este email ya está registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'tipo_usuario.required' => 'El tipo de usuario es obligatorio.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->tipo_usuario = $validated['tipo_usuario'];
        
        // Solo actualizar contraseña si se proporcionó
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403, 'No tienes permiso para eliminar usuarios.');
        }

        // No permitir que el usuario se elimine a sí mismo
        if ($user->id === auth()->id()) {
            return back()->withErrors(['error' => 'No puedes eliminar tu propio usuario.']);
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}