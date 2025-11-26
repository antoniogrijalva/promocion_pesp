<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tomar los valores del modelo empleado
        $empleados = Empleado::all();
       
        //retornar la vista con los valores
        return inertia('Promociones/Empleados', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       return inertia('Promociones/Empleados_captura');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       //grabar la informacion
        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado grabado correctamente');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
