<?php

namespace App\Http\Controllers;

use App\Models\Permiso_usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Router;

class PermisoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $c_usuarios = User::with('permisoUsuario')->get();
        return inertia('Promociones/catalogos/Permisos', compact('c_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permiso_usuario $permiso_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permiso_usuario $permiso_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permiso_usuario $permiso_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permiso_usuario $permiso_usuario)
    {
        //
    }
}
