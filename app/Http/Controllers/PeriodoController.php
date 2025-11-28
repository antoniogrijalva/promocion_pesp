<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = Periodo::orderByDesc('fecha_inicio')->get();

       
        return inertia('Promociones/catalogos/Periodos', ['periodos' => $periodos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return inertia('Promociones/catalogos/Periodos_captura');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Periodo::create($request->all());
        return redirect()->route('periodos.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        //$c_periodo = $periodo;
        $c_periodo=Periodo::findOrFail($periodo->id);
       //dd($c_periodo);
        return inertia('Promociones/catalogos/Periodos_captura', ['c_periodo' => $c_periodo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodo $periodo)
    {
        //preguntar si hay un registro en el modelo Periodo donde activo sea true y el id sea diferente al del periodo que se esta editando
        $existeActivo = Periodo::where('activo', true)
            ->where('id', '!=', $periodo->id)
            ->exists();
        if ($request->activo && $existeActivo) {
            return redirect()->back()->withErrors(['activo' => 'Ya existe un periodo activo. Solo puede haber un periodo activo a la vez.']);
        }
        $periodo->update($request->all());
        return redirect()->route('periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        //
    }
}
