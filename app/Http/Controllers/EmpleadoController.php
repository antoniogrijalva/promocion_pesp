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
       // modificar el contenido del $request para poner todos los campos de timpo text o string a mayusculas 
       $input = $request->all();
       foreach ($input as $key => $value) {
           if (is_string($value)) {
               $input[$key] = strtoupper($value);
           }
       }
       
        Empleado::create($input);
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
        $empleado=Empleado::findOrFail($empleado->id);
         return inertia('Promociones/Empleados_captura', ['c_empleados' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $input = $request->all();
        foreach ($input as $key => $value) {
            if (is_string($value)) {
                $input[$key] = strtoupper($value);
            }
        }

        $empleado->update($input);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
